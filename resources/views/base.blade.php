<!DOCTYPE html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        @include('parts.head')
    </head>

    <body class="flex flex-col min-h-screen bg-white text-neutral-900">
        @include('parts.header')

        @if($page->slug != 'index')
            <div class="container w-full my-8">
                <ul class="flex">
                    @foreach($breadcrumbs as $key => $item)
                        <li>
                            @if(!empty($item['link']))
                                <a class="text-primary hover:text-secondary" href="{{ $item['link'] }}">{{ $item['title'] }}</a><span class="mx-2">/</span>
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
            <div class="container w-full pb-20 prose xl:prose-lg prose-a:text-primary hover:prose-a:text-secondary">
                {!! $page->content !!}
            </div>
        @endif

        @empty(!$page->blocks)
            @foreach($page->blocks as $item)
                <x-dynamic-component :component="'blocks.' . $item['type']" :block="$item['data'] ?? []" />
            @endforeach
        @endempty

        @section('page') @endsection

        @yield('page')
        
        @include('parts.footer')

        @livewireScripts
    </body>
</html>
