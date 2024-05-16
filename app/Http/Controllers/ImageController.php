<?php

namespace App\Http\Controllers;

use App\Http\Requests\ImageRequest;
use Illuminate\Http\Request;
use App\Models\Image;

class ImageController extends Controller
{

    public function store(ImageRequest $request)
    {
        if (!$request->hasFile('images')) {
            return redirect()->back()->with([
                'error' => 'Файл не был загружен'
            ]);
        }

        $images = $request->file('images');

        foreach ($images as $image) {
            $fileName = $image->getClientOriginalName();
            $image->storeAs('public/images', $fileName);
            Image::query()->create([
                'name' => $fileName,
            ]);
        }
    }
}
