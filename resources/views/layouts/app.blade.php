<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="theme-color" content="#D10019">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

        <link rel="stylesheet" href="{{ asset('css/index.css') }}">

        @yield('scripts')
    </head>
    <body>
        @yield('modals')
        @yield('app')

        <footer>
            <x-link route="schedule" icon="schedule" label="Program" />
            <x-link route="movies" icon="movies" label="Filmy" />
            <x-link route="locations" icon="map" label="Miejsca" />
            <x-link route="discussion-panels" icon="discussion" label="Panele dyskusyjne" />
            <x-link route="partners" icon="partners" label="Partnerzy" />
        </footer>
    </body>
</html>
