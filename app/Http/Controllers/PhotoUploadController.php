<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Imagick\Driver;

class PhotoUploadController extends Controller
{
    public static function imageUpload($name, $path, $file): string
    {
        // $image_name = $name.'.webp';
        // $manager = new ImageManager(new Driver());
        // $manager->read($file)->resize($width,$height)->toWebp(75)->save(public_path($path).$name);
        $extension = $file->getClientOriginalExtension();
        $image_name = $name . '.' . $extension;
        $file->move(public_path($path), $image_name);

        return $image_name;
    }

    public static function imageUnlink($path, $name): void
    {
        if ($name) {
            $image_path = public_path($path) . $name;
            if (file_exists($image_path)) {
                unlink($image_path);
            }
        }
    }
}
