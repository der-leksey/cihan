<base href="{{ Request::root() }}">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>{{ $page->title }} | {{ $settings['site_name'] ?? 'site_name' }}</title>
<meta name="description" content="{{ $page->description ?? '' }}">
<link rel="canonical" href="{{ url()->current() }}">
<meta property="og:type" content="website">
<meta property="og:title" content="{{ $page->title }} | {{ $settings['site_name'] ?? 'site_name' }}">
<meta property="og:description" content="{{ $page->description ?? '' }}">
<meta property="og:url" content="{{ url()->current() }}">
<meta property="og:image" content="{{ Request::root() . \App\Services\Image::getPath(($page->image ?? $settings['favicon'] ?? 0)) }}">

<x-image :id="$settings['favicon'] ?? 0" w="180" ratio="1/1" format="png">
    <link rel="apple-touch-icon" type="image/png" sizes="180x180" href="{{ $component->thumb }}">
</x-image>
<x-image :id="$settings['favicon'] ?? 0" w="32" ratio="1/1" format="png">
    <link rel="icon" type="image/png" sizes="32x132" href="{{ $component->thumb }}">
</x-image>
<x-image :id="$settings['favicon'] ?? 0" w="16" ratio="1/1" format="png">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ $component->thumb }}">
</x-image>

@vite('resources/js/app.js')
@livewireStyles

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,300;0,400;0,700;1,400&display=swap" rel="stylesheet">