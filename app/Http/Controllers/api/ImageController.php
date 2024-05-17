<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Image;
use App\Http\Resources\ImageResource;

class ImageController extends Controller
{
    public function index()
    {
        $images = Image::all();
        return ImageResource::collection($images);
    }

    public function show($image_id)
    {
        $image = Image::query()->findOrFail($image_id);

        return new ImageResource($image);
    }
}
