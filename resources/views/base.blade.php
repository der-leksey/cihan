<!DOCTYPE html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ $page->title }} | {{ $settings['site_name'] ?? 'site_name' }}</title>
        @vite('resources/js/app.js')
        @livewireStyles

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    </head>

    <body class="flex flex-col min-h-screen">
        @include('parts.header')

        @if(!empty($page->blocks))
            @foreach($page->blocks as $item)
                @include("blocks.contact_form", ['block' => $item['data']])
            @endforeach
        @endif

        @section('page')
        @endsection

        @yield('page')
        

        @include('parts.footer')

        @livewireScripts
    </body>
</html>
