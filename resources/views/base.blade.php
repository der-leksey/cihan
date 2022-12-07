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
        <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:ital,wght@0,400;0,700;1,400&display=swap" rel="stylesheet">
    </head>

    <body class="flex flex-col min-h-screen">
        @include('parts.header')

        

        @if($page->slug != 'index')
            <div class="container w-full my-8">
                <ul class="flex">
                    @foreach($breadcrumbs as $key => $item)
                        <li>
                            @if(!empty($item['link']))
                                <a class="text-primary" href="{{ $item['link'] }}">{{ $item['title'] }}</a><span class="mx-2">/</span>
                            @else
                                <span>{{ $item['title'] }}</span>
                            @endif
                        </li>
                    @endforeach
                </ul>
            </div>

            <div class="container w-full mb-16">
                <h1 class="title">{{ $page->title }}</h1>
            </div>
        @endif

        @if(!empty($page->content) && $page->content != '<p></p>')
            <div class="container w-full pb-20 prose xl:prose-lg">
                {!! $page->content !!}
            </div>
        @endif

        @if(!empty($page->blocks))
            @foreach($page->blocks as $item)
                <x-dynamic-component :component="'blocks.' . $item['type']" :block="$item['data'] ?? []" />
            @endforeach
        @endif

        <section class="section py-24">
            <div class="container">
                <iframe class="rounded-xl" src="https://yandex.ru/map-widget/v1/?um=constructor%3Aa4b08ac7cfd09496fb8d30045c3fee310bdd6b2817d84011f8dae0c02e5d49ba&amp;source=constructor" width="100%" height="400" frameborder="0"></iframe>
            </div>
        </section>


        @section('page')
        @endsection

        @yield('page')
        
        @include('parts.footer')

        @livewireScripts
    </body>
</html>
