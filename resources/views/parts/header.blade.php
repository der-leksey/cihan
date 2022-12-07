<header class="relative">
  
        <div class="">
            <div class="container flex justify-between items-center">
            
                <div class="grid grid-flow-col gap-5 items-center">
                    <a href="/en" @class([
                        'font-bold border-b-black' => $lang == 'en',
                        'flex items-center py-2 border-y-2 ',
                    ])><x-flag-4x3-us class="w-6 mr-2"/> EN</a>

                    <a href="/ru" @class([
                        'font-bold border-b-black' => $lang == 'ru',
                        'flex items-center py-2 border-y-2 ',
                    ])><x-flag-4x3-ru class="w-6 mr-2"/> RU</a>
                </div>

                <div>
                    <a class="mr-8" href="mailto:{{ @$contacts['email'] }}" target="_blank">{{ @$contacts['email'] }}</a>
                    <a href="tel:{{ @str_replace([' ', '-', '(', ')'], '', $contacts['phone']) }}">{{ $contacts['phone'] }}</a>
                </div>

                <div class="grid grid-flow-col gap-5 items-center">
                    <x-contacts type="social"/>

                    <a href=""><x-si-whatsapp class="w-5 h-5"/></a>
                    <a href=""><x-si-instagram class="w-5 h-5"/></a>
                    <a href=""><x-si-vk class="w-5 h-5"/></a>
                </div>
            </div>
        </div>

        <div class="bg-primary text-white">
            <div class="container flex justify-between items-center">
                <a class="text-2xl uppercase font-bold tracking-widest" href="/{{ $lang }}">{{ $settings['site_name'] ?? 'site_name' }}</a>

                <ul class="flex xl:text-lg">
                    @foreach($menu['items'] as $item)
                        <li class="relative ml-8 group">
                            @if($item['slug'] == 'index')
                                <a class="flex items-center h-24" href="/{{ $lang }}">{{ $item['label'] }}</a>
                            @else
                                <a class="flex items-center h-24" href="/{{ $lang }}/page/{{ $item['slug'] }}">{{ $item['label'] }}</a>
                            @endif
                            
                            @if(!empty($item['children']))
                                <ul class="hidden group-hover:block absolute -left-6 w-max py-6 bg-slate-50 shadow-2xl text-black text-base">
                                    @foreach($item['children'] as $child)
                                        <li>
                                            <a class="flex items-center py-1 px-6" href="/{{ $lang }}/page/{{ $child['slug'] }}">{{ $child['label'] }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            @endif
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
</header>
