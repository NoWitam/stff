@extends('layouts.list')

@section('title', 'PANELE DYSKUSYJNE')

@section('content')
    <ul>
        @foreach ($panels->data as $panel)
            <li>
                <div>
                        <div class="mt ml">
                            <small>{{ $panel->date }}</small>
                        </div>

                        <img src="{{ $panel->banner }}" alt="{{ $panel->title }}" class="w-full" />
                        <h1 class="ml">{{ $panel->title }}</h1>
                                                    <p class="ml">{{ $panel->location }}</p>
                    </div>
                </div>
            </li>
            
        @endforeach
    </ul>
@endsection