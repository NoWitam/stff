@extends('layouts.list')

@section('title', $movies->header)

@section('content')
    <ul id="movies-list" data-movies='@json($movies)'>
        <template id="movie-template">
            <li>
                <a href="{{ route('movie', ['movie' => 'movie_id']) }}">
                    <img src="" alt="" />
                    <div>
                        <div class="mt">
                            <small date></small>
                            <h1 title></h1>
                        </div>
                        <p location></p>
                    </div>
                </a>
            </li>
        </template>
    </ul>
@endsection

@section('scripts')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="{{ asset('js/movies.js') }}"></script>
@endsection