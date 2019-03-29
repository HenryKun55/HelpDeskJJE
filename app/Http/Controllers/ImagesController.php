<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class ImagesController extends Controller {

    public function profilePicture($person, $size = 40)
    {
        $storagePath = storage_path('/profile_pictures/' . $person . '/profile_' . $size . '.jpg');

        return Image::make($storagePath)->response();
    }
}
