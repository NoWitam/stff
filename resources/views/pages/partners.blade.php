@extends('layouts.list')

@section('title', 'Partnerzy')

@section('content')
    <ul class="partners-list">
        @foreach ($partners as $type => $images)
            <li>
                <h1>{{ $type }}</h1>
                <div class="gallery">
                    @foreach ($images as $image)
                        <img src="{{ $image }}" alt="Partner Logo" />
                    @endforeach
                </div>
            </li>
            
        @endforeach
    </ul>
@endsection

@section('scripts')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="{{ asset('js/movies.js') }}"></script>
@endsection