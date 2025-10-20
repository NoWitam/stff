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
        <img src="{{ $location->data->thumbnail }}" alt="{{ $location->data->name }}" />

        <div class="properties">
            <h1>{{ $location->data->name }}</h1>

            <div class="property">
                <small>Adres</small>
                <p>{{ $location->data->address }}</p>
            </div>

            <div class="property column">
                <small>Opis</small>
                <p>
                    {{ $location->data->description }}
                </p>
            </div>
        </div>

        <iframe 
            src="{{ $location->data->map }}" 
            class="map"
            referrerpolicy="no-referrer-when-downgrade"
        ></iframe>
    </section>
@endsection