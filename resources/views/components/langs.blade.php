@foreach(Config::get('translatable.locales') as $lang)
    <a href="/{{ $lang }}" @class([
        'font-bold text-secondary' => $lang == app()->getLocale(),
        'flex items-center py-4',
    ])>
        <x-dynamic-component class="w-6 mr-2" component="{{ 'flag-4x3-' . ($lang == 'en' ? 'us' : $lang) }}"/>
        {{ strtoupper($lang) }}
    </a>
@endforeach