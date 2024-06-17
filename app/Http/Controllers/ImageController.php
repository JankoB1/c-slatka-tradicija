<?php

namespace App\Http\Controllers;

use App\Services\ImageService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;


class ImageController
{

    protected ImageService $imageService;
    function __construct()
    {
        $this->imageService = new ImageService();
    }

    public function uploadImage(Request $request)
    {
        $path = $request->file('image')->store('upload', 'public');
        $pathWithoutUpload = Str::replaceFirst('upload/', '', $path);
        return $pathWithoutUpload;
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

    public function uploadImageUser(Request $request)
    {
        $image_path = $request->file('image')->store('upload', 'public');
        $user = Auth::user();
        $user->image_path = $image_path;
        $user->save();
        return $image_path;

        /*$imgpath = request()->file('file')->store('uploads', 'public');
        return response()->json(['location' => "/storage/$imgpath"]);*/
    }

}
