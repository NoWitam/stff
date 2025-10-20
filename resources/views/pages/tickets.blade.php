@extends('layouts.list')

@section('title', 'BILETY')

@section('content')
    <ul>
        @foreach($tickets as $ticket)
            <li id="{{ $ticket['code'] }}">
                <div>
                    <div class="mt">
                        <small>{{ $ticket['date'] }}</small>
                        <h1>{{ $ticket['label'] }}</h1>
                    </div>
                    <img class="ticket" src="{{ asset('tickets/' . $ticket['code'] . '.jpg') }}" alt="{{ 'Bilet ' , $ticket['label'] . ' ' . $ticket['date'] }}" />
                </div>
            </li>
        @endforeach
    </ul>
@endsection

@section('scripts')
@endsection