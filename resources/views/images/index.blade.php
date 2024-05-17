@extends('layouts.main')

@section('page.title')
    Все фото
@endsection

@section('page')
    <div>
        <form action="" method="GET" class="flex flex-col border-2 py-2 gap-2 px-3 w-1/3">
            <b>Сортировать фотографии!</b>
            <div>
                <label for="name">Поиск по названию:</label>
                <input type="text" name="name" id="name" class="w-full py-1 px-2" value="{{ $filters['name'] ?? ''}}">
            </div>
            <div>
                <label for="date">Поиск по дате:</label>
                <input type="date" name="date" id="date" class="py-1 px-2" value="{{ $filters['date'] ?? ''}}">
            </div>
            <div>
                <label for="time">Поиск по времени загрузки:</label>
                <input type="time" name="time" id="time" class="py-1 px-2" value="{{ $filters['time'] ?? ''}}">
            </div>
            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Сортировать</button>
        </form>
        <table class="w-full text-left">
            <thead>
                <tr>
                    <th class="px-4 py-1">Название:</th>
                    <th class="px-4 py-1 border-gray-700 border-l">Дата загрузки:</th>
                    <th class="px-4 py-1 border-gray-700 border-l">Время загрузки:</th>
                    <th class="px-4 py-1 border-gray-700 border-l">Посмотреть превью:</th>
                    <th class="px-4 py-1 border-gray-700 border-l">Посмотреть фотографию:</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($images as $image)
                    <tr>
                        <td class="py-1 px-2 border-gray-700 border-t">{{ Str::substr($image->name, 0, -4) }}</td>
                        <td class="py-1 px-2 border-gray-700 border-t border-l">{{ $image->date }}</td>
                        <td class="py-1 px-2 border-gray-700 border-t border-l">{{ $image->time }}</td>
                        <td class="py-1 px-2 border-gray-700 border-t border-l"><a href="#" id="open-popup" data-path={{ asset('storage/images/' . $image->name) }}>Посмотреть</a></td>
                        <td class="py-1 px-2 border-gray-700 border-t border-l"><a href="{{ route('images.show', $image->id) }}">Открыть полностью</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="fixed top-0 left-0 h-full w-full bg-black bg-opacity-50 z-50 hidden" id="popup">
        <img src="" alt="Image preview" id="image" class="m-auto w-4/5 h-4/5"></img>
    </div>
@endsection

@push('scripts')
    @vite('resources/js/popup.js')
@endpush
