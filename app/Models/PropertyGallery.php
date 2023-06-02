<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Image;
use Thumbnail;

class PropertyGallery extends Model
{
    use HasFactory;

    public function property(){
        return $this->belongsTo('App\Models\Property');
    }

    public function setFileAttribute($file) {
        $source_path = upload_tmp_path($file);
        if ($file && file_exists($source_path))
        {
            upload_move($file,'gallery');
            Image::make($source_path)->resize(270,155)->save($source_path);
            upload_move($file,'gallery','thumb');
            @unlink($source_path);
        }
        $this->attributes['file'] = $file;
        if ($file == '')
        {
            $this->deleteFile();
            $this->attributes['file'] = "";
        }
    }

    // public function setVideoAttribute($file) {
    //     $source_path = upload_tmp_path($file);
    //     if ($file && file_exists($source_path))
    //     {
    //     	$thumbnail_image = "thumbnail_image.png";
    //         upload_move($file,'gallery');
    //         Thumbnail::getThumbnail($source_path,public_path() . "/uploads/gallery-thumb",$thumbnail_image);
    //         @unlink($source_path);
    //     }
    //     $this->attributes['video'] = $file;
    //     $this->attributes['file'] = $thumbnail_image;
    //     if ($file == '')
    //     {
    //         $this->deleteFile();
    //         $this->attributes['video'] = "";
    //         $this->attributes['file'] = "";
    //     }
    // }

    public function file_url($type='original')
    {
        if (!empty($this->file))
            return upload_url($this->file,'gallery',$type);
        elseif (!empty($this->file) && file_exists(tmp_path($this->file)))
            return tmp_url($this->$file);
        else
            return asset('images/default-gallery.jpg');
    }

    // public function video_url($type='original')
    // {
    //     if (!empty($this->video))
    //         return upload_url($this->video,'gallery',$type);
    //     elseif (!empty($this->video) && file_exists(tmp_path($this->video)))
    //         return tmp_url($this->$video);
    //     else
    //         return asset('images/default-gallery.jpg');
    // }
    public function deleteFile()
    {
        upload_delete($this->file,'gallery',array('original','thumb'));
    }
}
