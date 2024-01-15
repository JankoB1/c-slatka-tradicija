<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ImageService;
class ImageController extends Controller
{
    protected ImageService $imageService;

    public function __construct() {
        $this->imageService = new ImageService();
    }

    public function uploadImage(Request $request) {
        if($request->ajax()) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $this->imageService->addImage($imageName);
            $image->move(public_path('uploads'), $imageName);
            $imagePath = asset('uploads/' . $imageName);
            return response()->json(['success' => true, 'image_name' => $imagePath]);
        }
    }
}
