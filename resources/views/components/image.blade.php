@if($slot->isEmpty())
    @if($type == 'image')
        @if($ext != 'svg')
            <picture>
                <source srcset="{{ $thumb }}" type="image/webp">
                <img src="{{ $path }}" alt="" width="{{ $width }}" height="{{ $height }}" loading="lazy" {{ $attributes }}>
            </picture>
        @else
            <img src="{{ $path }}" alt="" width="{{ $width }}" height="{{ $height }}" loading="lazy" {{ $attributes }}>
        @endif
    @endif
@else
    {{ $slot }}
@endif

