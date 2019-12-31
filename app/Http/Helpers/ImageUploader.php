<?php

namespace Edaacil\Http\Helpers;

use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Image;

function imageUploader($data)
{
    $image = $data->file('image_uploader');# column in the database
    $filename = 'Edaacil' . time(). '.' .$image->getClientOriginalExtension();
    Storage::disk('public')->put($filename, File::get($image), 'public');

    $file = public_path('profileImages/'.$filename);

    # Resize the image, width = null, height = 250
    if (file_exists($file)){
        $image = Image::make($file);
        $image->resize(null,250,function($constraint){
            $constraint->aspectRatio();
        });

        $image->save();
    }
    return $filename;
}