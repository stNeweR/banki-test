<?php

namespace App\Http\Controllers;

use App\Http\Requests\ImageRequest;
use Illuminate\Http\Request;
use App\Models\Image;
use Illuminate\Support\Str;

class ImageController extends Controller
{

    public function index()
    {
        $images = Image::all();

        if ($images->isEmpty()) {
            abort(404);
        }

        return view('images.index', [
            'images' => $images
        ]);
    }
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
            $extension = $image->getClientOriginalExtension();

            $transliteratedFileName = Str::slug($fileName, '-');
            $transliteratedFileName = Str::substr($transliteratedFileName, 0, -3);
            $fileName = strtolower($transliteratedFileName) . '.' . $extension;


            if (Image::query()->where('name', $fileName)->exists()) {
                $fileName = uniqid() . '.' . $extension;
            }
            $image->storeAs('public/images', $fileName);
            Image::query()->create([
                'name' => $fileName,
            ]);
        }

        return redirect()->back()->with('message', 'Фото успешно добавлены');
    }
}
