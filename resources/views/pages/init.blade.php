<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="theme-color" content="#D10019">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <style>
            .loader, .loader:before, .loader:after {
                border-radius: 50%;
                width: 2.5em;
                height: 2.5em;
                animation-fill-mode: both;
                animation: bblFadInOut 2.2s infinite ease-in-out;
            }
            .loader {
                color: #FFF;
                font-size: 16px;
                position: relative;
                text-indent: -9999em;
                transform: translateZ(0);
                animation-delay: -0.16s;
                position: absolute;
                left: 50%;
                transform: translate(-50%, 0);
                bottom: 55px;
            }
            .loader:before,
            .loader:after {
                content: '';
                position: absolute;
                top: 0;
            }
            .loader:before {
                left: -3.5em;
                animation-delay: -0.32s;
            }
            .loader:after {
                left: 3.5em;
            }

            @keyframes bblFadInOut {
                0%, 80%, 100% { box-shadow: 0 2.5em 0 -1.3em }
                40% { box-shadow: 0 2.5em 0 0 }
            }
            
  
        </style>
    </head>
    <body style="width: 100vw; height: 100vh; padding: 0; margin: 0;">
        <span class="loader"></span>
        <img 
            id="splash"
            src={{ asset('splash.png') }}
            style="width: 100%; height: 100%; padding: 0; margin: 0; object-fit: cover;"
        />

        <script>
            document.querySelector('#splash').addEventListener("load", function () {
                window.location.href = '{{ route('schedule') }}';
            });
        </script>
    </body>
</html>
