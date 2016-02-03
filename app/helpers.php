<?php

function upload_tmp_path($file) {

  return public_path() . "../tmp/$file";
}
function upload_tmp_url($file) {
  return asset("tmp/$file");
}

function upload_path($file, $model, $variation=false, $relative=null) {
  $use_aws = is_null($relative)? Config::get('aws.use',false) : $relative;
  $folder = "/uploads/". ( empty($variation) || $variation =='original' ? $model : "{$model}-{$variation}" );
  if (!$use_aws && !is_array($variation) && !file_exists(public_path().$folder)) {
      umask(0);
      @mkdir(public_path().$folder, 0777, true);
    }
  $target_path = ($use_aws? "" : public_path()). "$folder/$file";
  return $target_path;
}
function upload_url($file, $model, $variation=false)  {
  $use_aws = Config::get('aws.use',false);
  $folder = "/uploads/". ( empty($variation)  || $variation =='original' ? $model : "{$model}-{$variation}" );
  if(!empty($file)) {
    if($use_aws)
      return Config::get('aws.host')."$folder/$file";
    else
      return asset("$folder/$file");
  } 
  return false;
}
function upload_move($file,$model,$variation=false) {
  $use_aws = Config::get('aws.use',false);
  $source = upload_tmp_path($file);
  $target = upload_path($file,$model,$variation);

  if($use_aws) {    
    AWS::get('s3')->putObject(array(
            'Bucket'     => Config::get('aws.bucket'),
            'Key'        => $target,
            'SourceFile' => $source,
            'ACL'    => 'public-read'
        ));
  } else {
    copy($source, $target);
  }
}

function upload_delete($file,$model,$variations=false) {
  if(empty($file)) return false;;
  if(is_array($variations)) {
    foreach($variations as $variation){
        $local_path = upload_path($file,$model,$variation,false);
        @unlink($local_path);
    } 
  }
}

//   $use_aws = Config::get('aws.use',false);    
//   if($use_aws) {
//     $aws_path = upload_path($file,$model,$variations,true);
//     AWS::get('s3')->deleteObject(array(
//           'Bucket'     => Config::get('aws.bucket'),
//           'Key'        => $aws_path,          
//         ));     
//   }

// }

// function exec_artisan($task,$ret=false) {
//     $is = App::environment() != 'local';
//     $php = $is? "/opt/php53/bin/php" : 'php';
//     $cmd = "$php ".base_path()."/artisan $task --env=".App::environment();
//     shell_exec($cmd);
//     if($ret) die($cmd);
// }
