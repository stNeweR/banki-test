@extends('layouts.main')

@section('page.title')
    Фото {{ $image->id }}
@endsection

@section('page')
    <div>
        <p><b>Название: </b>{{ Str::substr($image->name, 0, -4) }}</p>
        <p><b>Дата добавления: </b>{{ $image->created_at->format('d.m.Y') }}</p>
        <p><b>Время добавления: </b>{{ $image->created_at->format('H:i:s') }}</p>
        <img src="{{ asset('/storage/images/' . $image->name) }}" alt="{{ $image->name}}">
    </div>
@endsection
