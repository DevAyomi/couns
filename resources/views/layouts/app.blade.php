<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

         <!-- Bootstrap CSS -->
        <!--=====================================================================================-->
        <link rel="stylesheet" type="text/css" href="{{ asset('/counsel/vendor/bootstrap/css/bootstrap.min.css') }}">
       <!--==========================================================================================-->

       <!--=========================================================================================-->
          <link rel="stylesheet" type="text/css" href="{{ asset('counsel/fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}">
        <!--==========================================================================================-->
        <link rel="stylesheet" type="text/css" href="{{ asset('profile/style.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('counsel/css/request.css') }}">
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <!------ Include the above in your HEAD tag ---------->

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">

        @livewireStyles

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>
    </head>
    <body class="font-sans antialiased">
        <x-jet-banner />

        <div class="min-h-screen bg-gray-100">
            @livewire('navigation-menu')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>

        @stack('modals')

        @livewireScripts
        
         <script src="{{ asset('counsel/vendor/jquery/jquery-3.2.1.min.js') }}"></script>
         <script src="{{ asset('counsel/vendor/bootstrap/js/popper.js') }}"></script>
        <script src="{{ asset('counsel/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('counsel/vendor/select2/select2.min.js') }}"></script>
        <script src="{{ asset('counsel/vendor/tilt/tilt.jquery.min.js') }}"></script>

    </body>
</html>
