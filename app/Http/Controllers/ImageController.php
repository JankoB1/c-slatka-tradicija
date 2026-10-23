<?php

namespace App\Http\Controllers;

use App\Services\ImageService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\Image;
use Intervention\Image\ImageManager;


class ImageController
{
    // Samo slike do 30 MB. mimes proverava sadrzaj fajla, ne ime koje je poslao klijent.
    private const IMAGE_RULES = ['required', 'file', 'mimes:jpg,jpeg,png,webp,gif,avif', 'max:30720'];

    protected ImageService $imageService;
    function __construct()
    {
        $this->imageService = new ImageService();
    }

    public function uploadImage(Request $request)
    {
        $request->validate(['image' => self::IMAGE_RULES]);
        $path = $request->file('image')->store('upload', 'public');
        $pathWithoutUpload = Str::replaceFirst('upload/', '', $path);
        return $pathWithoutUpload;
    }

    public function addImage(Request $request)
    {
        // Frontend salje ime oblika <timestamp>.png; sve ostalo bi moglo da upise fajl van upload/ ili .php
        $request->validate([
            'imageData' => ['required', 'string'],
            'xOffset' => ['nullable', 'numeric'],
            'imageName' => ['required', 'regex:/^[0-9]{1,20}\.png$/'],
        ]);
        $this->imageService->saveMaskImage($request);
    }

    // Controller method to handle image upload
    public function uploadImageMce(Request $request)
    {
        $request->validate(['file' => self::IMAGE_RULES]);
        $path = $request->file('file')->store('uploads', 'public');
        return response()->json(['location' => url("/storage/$path")]);
    }

    public function uploadImageUser(Request $request)
    {
        $request->validate(['image' => self::IMAGE_RULES]);
        $image_path = $request->file('image')->store('upload', 'public');
        $user = Auth::user();
        $user->image_path = $image_path;
        $user->save();
        return $image_path;

        /*$imgpath = request()->file('file')->store('uploads', 'public');
        return response()->json(['location' => "/storage/$imgpath"]);*/
    }

    public function cropImage(Request $request) {
        $manager = new ImageManager(new Driver());
        $image = $manager->read(file_get_contents($this->uploadedImagePath($request)));

        $r = $image->width() / $request->imgWidth;

        $top = $r * $request->cropBoxTop;
        $left = $r * $request->cropBoxLeft;
        $width = $r * $request->cropBoxWidth;
        $height = $r * $request->cropBoxHeight;

        $image->crop($width, $height, $left, $top);

        $imageName = time() . '.jpg';
        $croppedImagePath = 'public/upload/' . $imageName;
        Storage::put($croppedImagePath, (string) $image->encode());

        return $imageName;
    }

    public function cropImageTest(Request $request) {
        $manager = new ImageManager(new Driver());
        $image = $manager->read(file_get_contents($this->uploadedImagePath($request)));
        $image->rotate(-$request->rotate);

        $direction = $request->vertical != 'false' ? $request->imgHeight : $request->imgWidth;
        $r = $image->width() / $direction;

        $top = $r * $request->cropBoxTop;
        $left = $r * $request->cropBoxLeft;
        $width = $r * $request->cropBoxWidth;
        $height = $r * $request->cropBoxHeight;

        $image->crop($width, $height, $left, $top);

        $imageName = time() . '.jpg';
        $croppedImagePath = 'public/upload/' . $imageName;
        Storage::put($croppedImagePath, (string) $image->encode());

        return $imageName;
    }

    // Crop sme da cita samo fajl iz storage/upload, bez ../ i podfoldera
    private function uploadedImagePath(Request $request): string
    {
        $request->validate([
            'imagePath' => ['required', 'string', 'regex:#^/storage/upload/[A-Za-z0-9_-][A-Za-z0-9._-]*$#'],
            'imgWidth' => ['required', 'numeric', 'gt:0'],
            'imgHeight' => ['nullable', 'numeric', 'gt:0'],
            'cropBoxTop' => ['required', 'numeric'],
            'cropBoxLeft' => ['required', 'numeric'],
            'cropBoxWidth' => ['required', 'numeric'],
            'cropBoxHeight' => ['required', 'numeric'],
        ]);

        $path = storage_path('app/public/upload/' . basename($request->imagePath));
        abort_unless(is_file($path), 404);
        return $path;
    }

}
