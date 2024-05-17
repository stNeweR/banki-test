@extends('layouts.main')

@section('page.title')
    Все фото
@endsection

@section('page')
    <div>
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
                        <td class="py-1 px-2 border-gray-700 border-t">{{ $image->name }}</td>
                        <td class="py-1 px-2 border-gray-700 border-t border-l">{{ $image->created_at->format('d.m.Y') }}</td>
                        <td class="py-1 px-2 border-gray-700 border-t border-l">{{ $image->created_at->format('H:i:s') }}</td>
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
