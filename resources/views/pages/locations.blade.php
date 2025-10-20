@extends('layouts.list')

@section('title', 'MIEJSCA')

@section('content')
    <ul>
        @foreach ($locations->data as $location)
            <li class="cinemas-list">
                <a 
                    href="{{ route('location', ['location' => $location->id]) }}"
                >
                    <img src="{{ $location->thumbnail }}" alt="{{ $location->name }}" />
                    <h1>{{ $location->name }}</h1>
                    <small>{{ $location->address }}</small>
                </a>
            </li>
        @endforeach
    </ul>
@endsection