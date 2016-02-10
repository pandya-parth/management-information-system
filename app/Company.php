<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model 
{
    protected $fillable = ['name','logo','website','email','industry','phone','fax','adrs1','adrs2','city','state','country','zipcode'];

    public function setLogoAttribute($file) {

    	$source_path = upload_tmp_path($file);
		
		if ($file && file_exists($source_path)) 
		{
			upload_move($file,'company');
			Image::make($source_path)->resize(320, 240)->save($source_path);
			upload_move($file,'company','medium');
			Image::make($source_path)->resize(175, 130)->save($source_path);
			upload_move($file,'company','thumb');

			@unlink($source_path);
			$this->deleteFile();
		}
		$this->attributes['logo'] = $file;
			if ($file == '') 
			{
				$this->deleteFile();
				$this->attributes['logo'] = "";

			}
		}
		public function logo_url($type='original') 
		{
			if (!empty($this->logo))
				return upload_url($this->logo,'company',$type);
			elseif (!empty($this->logo) && file_exists(tmp_path($this->logo)))
				return tmp_url($this->logo);
			else
				return asset('img/advertising.jpg');
		}
		public function deleteFile() 
		{
			upload_delete($this->logo,'company',array('original','thumb','medium'));
		}


}
