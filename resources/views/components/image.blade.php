@if($ext != 'svg')
    <picture>
        <source srcset="{{ $thumb }}" alt="" type="image/webp">
        <img src="{{ $path }}" alt="" width="{{ $width }}" height="{{ $height }}" loading="lazy" {{ $attributes }}>
    </picture>
@else
    <img src="{{ $path }}" alt="" width="{{ $width }}" height="{{ $height }}" loading="lazy" {{ $attributes }}>
@endif

