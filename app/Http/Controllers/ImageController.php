<?php

namespace App\Http\Controllers;

use App\Services\ImageService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImageController
{

    protected ImageService $imageService;
    function __construct()
    {
        $this->imageService = new ImageService();
    }

    public function uploadImage(Request $request)
    {
        return $request->file('image')->store('upload', 'public');
    }

    public function addImage(Request $request)
    {
        $this->imageService->saveMaskImage($request);
    }

    // Controller method to handle image upload
    public function uploadImageMce(Request $request)
    {
        $fileName=$request->file('file')->getClientOriginalName();
        $path=$request->file('file')->storeAs('uploads', $fileName, 'public');
        return response()->json(['location' => url("/storage/$path")]);

        /*$imgpath = request()->file('file')->store('uploads', 'public');
        return response()->json(['location' => "/storage/$imgpath"]);*/
    }

}
