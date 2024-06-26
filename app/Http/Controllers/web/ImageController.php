<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Http\Requests\ImageFilterRequest;
use App\Http\Requests\ImageRequest;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Image;
use Illuminate\Support\Str;
use ZipArchive;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    public function index(ImageFilterRequest $request)
    {
        $query = Image::query();

        if ($request->has('name') && !empty($request->name)) {
            $name = Str::slug($request->name, '-');
            $query->where('name' , 'like', '%' . $name . '%');
        }

        if ($request->has('date') && !empty($request->date)) {
            $query->where('date', $request->date);
        }

        if ($request->has('time') && !empty($request->time)) {
            $time = Carbon::parse($request->time)->toTimeString();
            $query->where('time', $time);
        }

        $images = $query->get();

        return view('images.index', [
            'images' => $images,
            'filters' => $request->all()
        ]);
    }

    public function show($image_id)
    {
        $image = Image::query()->findOrFail($image_id);

        return view('images.show', [
            'image' => $image
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

    public function downloadZip($image_id)
    {
        $image = Image::query()->findOrFail($image_id);
        $zip = new ZipArchive();
        $zipFileName = 'photos.zip';

        $tempFile = tempnam(sys_get_temp_dir(), 'zip');
        $zip->open($tempFile, ZipArchive::CREATE);
        $imagePath = public_path() . '/storage/images/' . $image->name;
        $zip->addFile($imagePath, basename($imagePath));

        $zip->close();

        redirect()->route('images.show', $image_id);
        return response()->download($tempFile, $zipFileName)->deleteFileAfterSend(true);
    }
}
