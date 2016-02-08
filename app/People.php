<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use User;
use Image;	
use Event;

class People extends Model
{
       protected $table='user_profile';
       protected $fillable = ['fname','lname','mobile','phone','dob','adrs1','adrs2','city','state','country','pan_number','department','designation','education','google','facebook','website','skype','linkedin','twitter','photo'];

    public function user()
    {
        return $this->belongsTo('User', 'user_id');
    }

    	
public function setPhotoAttribute($file) {

    	$source_path = upload_tmp_path($file);
		
		if ($file && file_exists($source_path)) 
		{
			upload_move($file,'people');
			Image::make($source_path)->resize(320, 240)->save($source_path);
			upload_move($file,'people','medium');
			Image::make($source_path)->resize(175, 130)->save($source_path);
			upload_move($file,'people','thumb');

			@unlink($source_path);
			$this->deleteFile();
		}
		$this->attributes['photo'] = $file;
			if ($file == '') 
			{
				$this->deleteFile();
				$this->attributes['photo'] = "";

			}
		}
		public function photo_url($type='original') 
		{
			if (!empty($this->photo))
				return upload_url($this->photo,'people',$type);
			elseif (!empty($this->photo) && file_exists(tmp_path($this->photo)))
				return tmp_url($this->photo);
			else
				return asset('img/advertising.jpg');
		}
		public function deleteFile() 
		{
			upload_delete($this->photo,'people',array('original','thumb','medium'));
		}
}
Event::listen('eloquent.deleting:People', function($model) {
		$model->deleteFile();
	});
