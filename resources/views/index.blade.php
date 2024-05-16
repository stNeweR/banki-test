@extends('layouts.main')

@section('page.title')Форма для добавления файла@endsection

@section('page')
    <div class="flex flex-col items-center justify-center min-h-screen">
        <div class="flex  w-1/2 justify-center flex-col bg-white p-4 rounded-lg shadow-md">
            <h1 class="text-center mb-4 font-bold text-xl">Решение тестового задания</h1>
            <form action="{{ route('image.store')}}" method="POST" enctype="multipart/form-data" class="flex flex-col gap-4">
                @csrf
                @method('post')
                <label for="images[]">Выберите файлы которые будем загружать</label>
                <input type="file" name="images[]" id="images[]" class="mr-2" multiple>
                <input type="file" name="images[]" id="images[]" class="mr-2" multiple>
                <input type="file" name="images[]" id="images[]" class="mr-2" multiple>
                <input type="file" name="images[]" id="images[]" class="mr-2" multiple>
                <input type="file" name="images[]" id="images[]" class="mr-2" multiple>
                @error('images')
                    <div class="text-red-500 mt-2">{{ $message }}</div>
                @enderror
                @error('images.*')
                    <div class="text-red-500 mt-2">{{ $message }}</div>
                @enderror
                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Отправить фото</button>
            </form>
        </div>
    </div>
@endsection
