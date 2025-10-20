@extends('layouts.app')

@section('app')

    <a 
        class="back"
        href="{{ redirect()->back()->getTargetUrl() }}"
    >
        <svg>       
            <image xlink:href="{{ asset('icons/back.svg') }}"/>    
        </svg>
    </a>
    <section class="movie">
        <img src="{{ $movie->data->banner }}" alt="{{ $movie->data->title }}" />

        <div class="properties">
            <h1>{{ $movie->data->title }}</h1>

            <div class="property">
                <small>Data</small>
                <p>{{ $movie->data->date }}</p>
            </div>

            <div class="property">
                <small>Czas</small>
                <p>{{ $movie->data->time }}</p>
            </div>

            <div class="property">
                <small>Miejsce</small>
                <p>{{ $movie->data->location }}</p>
            </div>

            <div class="property">
                <small>Kino</small>
                <p>{{ $movie->data->cinema }}</p>
            </div>

            <div class="property">
                <small>Reżyser</small>
                <p>{{ $movie->data->director }}</p>
            </div>

            <div class="property column">
                <small>Opis</small>
                <p>
                    {{ $movie->data->description }}
                </p>
            </div>

            <div class="property">
                <small>Czas filmu</small>
                <p>{{ $movie->data->duration }}</p>
            </div>
        </div>
    </section>
@endsection