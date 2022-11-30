@section('block_title')
    <h2 class="text-5xl font-light">{{ $block['title'] }}</h2>
@endsection

@section('block_introtext')
    <p class="my-8">{{ $block['introtext'] }}</p>
@endsection

@section('block_main')
    <h1>block_main</h1>
@endsection

@section('block_container')
    @yield('block_title')
    @yield('block_introtext')
    @yield('block_main')
@endsection

@section('block')
    <section class="py-24">
        <div class="container">
            @yield('block_container')
        </div>
    </section>
@endsection

@yield('block')
