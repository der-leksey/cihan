<header class="bg-blue-700 text-white">
    <div class="container">
        <div class="flex justify-between py-2 border-solid border-b border-sky-600">
            <div>
                <a class="mr-6" href="mailto:{{ @$contacts['email'] }}" target="_blank">{{ @$contacts['email'] }}</a>
                <a href="tel:{{ @str_replace([' ', '-', '(', ')'], '', $contacts['phone']) }}">{{ $contacts['phone'] }}</a>
            </div>
            <div>TR RU</div>
            <div>soc</div>
        </div>

        <div class="flex justify-between py-5">
            <a class="text-2xl uppercase" href="/">{{ $settings['site_name'] ?? 'site_name' }}</a>

            <ul>
                @foreach($menu['items'] as $item)
                    <li>
                        <a href="/page/{{ $item['data']['slug'] }}">{{ $item['label'] }}</a>
                        
                        @if($item['children'])
                            <ul>
                                {{-- Render the item's children here... --}}
                            </ul>
                        @endif
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</header>
