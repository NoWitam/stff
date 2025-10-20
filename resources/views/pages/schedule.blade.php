@extends('layouts.list')

@section('title', 'PROGRAM')

@section('content')
    <ul>
        @foreach ($events->data as $event)
            <li>
                <a 
                    href="{{ route('movies', ['event' => $event->id]) }}"
                >
                    <img src="{{ $event->thumbnail }}" alt="{{ $event->secondary_name }}" />
                    <div>
                        <div class="mt">
                            <small>{{ $event->date }}</small>
                            <h1>{{ $event->name }}</h1>
                        </div>
                        <p>{{ $event->secondary_name }}</p>
                    </div>
                </a>
                @if($event->tickets->isEmpty())
                    <a class="button shadow" href="{{ route('tickets') . '#' . $event->first_ticket_code }}">
                        <div class="icon"></div>
                        Zobacz bilet
                        <img src=" {{ asset('icons/ticket.svg') }}" class="icon" />
                    </a>
                @else
                    <button class="button shadow modal-btn" data-tickects='{{ json_encode($event->tickets) }}'>
                        <div class="icon"></div>
                        Wygeneruj bilet
                        <img src=" {{ asset('icons/ticket.svg') }}" class="icon" />
                    </button>
                @endif
            </li>
        @endforeach
    </ul>
@endsection

@section('modals')
    <div id="modal" class="modal">
        <form class="modal-content" action="{{ route('generate.ticket') }}" method="POST">
            @csrf
            <div class="buttons">
                <button type="button" class="button close modal-close">
                    Zamknij
                </button>
                <button type="submit" class="button">
                    Wygeneruj
                </button>
            </div>
        </form>
    </div>
@endsection

@section('scripts')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="{{ asset('js/schedule.js') }}"></script>
@endsection