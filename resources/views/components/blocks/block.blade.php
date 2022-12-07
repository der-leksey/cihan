<section class="section py-24">
    <div class="container">
        @if(!empty($title))
            {{ $title }}
        @else
            <h2 class="title mb-12">{{ $block['title'] }}</h2> 
        @endif

        @if(!empty($introtext))
            {{ $introtext }}
        @else
            @if(!empty($block['introtext']))
                <p class="my-8">{{ $block['introtext'] }}</p>
            @endif
        @endif

        @if(!empty($main))
            {{ $main }}
        @endif
    </div>
</section>