<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        {{-- <title>{{ config('app.name', 'RAnLab') }}</title> --}}
        <title>RAnLab Data Portal</title>
        
        <!-- Fonts -->
        <style>
            @font-face {
                font-family: 'Avenir';
                src: url('/fonts/Avenir.ttc') format('truetype');
                /* Add additional src definitions for other font file formats if available */
            }
        </style>

        {{-- <link rel="preconnect" href="https://fonts.bunny.net"> --}}
        {{-- <link href="{{ asset('css/custom.css') }}" rel="stylesheet"> --}}
        {{-- <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css"> --}}
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <script src="//cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        {{-- <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script src="https://cdn.plot.ly/plotly-latest.min.js"></script> --}}


        @livewireStyles()

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased" style="font-family: 'Avenir';">
        <div class="page_container min-h-screen bg-gray-100">

            <div class="nav_container">
                <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
            	@include('layouts.navigation')
			</div><!--NAV_CONTAINER-->

            <div class="sidebar_container" style="font-family: 'Avenir';background-color: #FFFFFF; overflow-y:auto;">
	            @include('layouts.sidebar')
			</div><!--SIDEBAR_CONTAINER-->

            <div class="content_container">

                <!-- Page Heading -->
                @if (isset($header))
                    <header class="content_header">
                            {{ $header }}
                    </header>
                @endif

                <!-- Page Content -->
                <main>
                    @section('content')
                        {{ $slot }}
                    @show
                    
                    
                </main>
            </div><!--CONTENT_CONTAINER-->

        </div>

        @livewireScripts()

    </body>
</html>
