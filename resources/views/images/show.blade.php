@extends('layouts.main')

@section('page.title')
    Фото {{ $image->id }}
@endsection

@section('page')
    <div>
        <div class="flex flex-row items-center justify-between pb-2">
            <div>
                <p><b>Название: </b>{{ Str::substr($image->name, 0, -4) }}</p>
                <p><b>Дата добавления: </b>{{ $image->date }}</p>
                <p><b>Время добавления: </b>{{ $image->time }}</p>
            </div>
            <a href="{{ route('images.download', $image->id ) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Скачать фотографию как zip</a>

        </div>
        <img src="{{ asset('/storage/images/' . $image->name) }}" alt="{{ $image->name}}">
    </div>
@endsection
