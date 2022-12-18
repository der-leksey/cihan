<header class="relative text-neutral-100">
    <div class="bg-black">
        <div class="container flex justify-between items-center">
        
            <div class="grid grid-flow-col gap-5 items-center">
                <x-langs/>
            </div>

            <div>
                <x-contact type="email" class="mr-8"/>
                <x-contact type="phone"/>
            </div>

            <div class="grid grid-flow-col gap-5">
                <x-contact type="social"/>
            </div>
        </div>
    </div>

    <div class="h-1 bg-gradient-to-r from-primary to-secondary"></div>

    <div class="bg-black">
        <div class="container flex justify-between items-center">
            <a class="flex items-center py-4 text-2xl uppercase font-light tracking-widest" href="/{{ $lang }}">
                {{-- <x-image :id="$settings['logo'] ?? 0" w="60" ratio="257/443" class="mr-4"/> --}}
                {{ $settings['site_name'] ?? 'site_name' }}
            </a>

            <ul class="flex xl:text-lg">
                @foreach($menu as $item)
                    <li class="relative ml-8 group">
                        @if(empty($item['children']))
                            <a class="flex items-center h-24" href="{{ $item['link'] }}">{{ $item['label'] }}</a>
                        @else
                            <button class="flex items-center h-24 peer">
                                {{ $item['label'] }}
                                <x-bi-chevron-down/>
                            </button>

                            <ul class="hidden peer-focus:block group-hover:block absolute -left-6 w-max py-4 bg-slate-50 shadow-2xl text-black text-base">
                                @foreach($item['children'] as $child)
                                    <li>
                                        <a class="flex items-center py-2 px-6" href="{{ $child['link'] }}">{{ $child['label'] }}</a>
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