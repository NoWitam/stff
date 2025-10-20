@extends('layouts.app')

@section('app')
    <header >
        <h1> 
            <a></a>
            @yield('title') 
            <x-link route="tickets" icon="ticket" />
        </h1>
        @if($searchable ?? true)
            <div class="search">
                <input id="search" type="text" placeholder="Szukaj..." />
            </div>
        @endif
    </header>

    <section>
        @yield('content')
    </section>
@endsection