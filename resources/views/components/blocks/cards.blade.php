<x-blocks.block :block="$block">
    <x-slot name="main">

        <div class="grid grid-cols-1 sm:grid-cols-3 xl:grid-cols-4 gap-8">
            @foreach($block['items'] as $key => $item)

                <a href="/{{ $lang }}/page/{{ $item->slug }}" class="card">
                    <x-image id="{{ $item->image }}" w="1/4" ratio="4/3" class="rounded-t-xl"/>
                    
                    <div class="px-6 pt-6 pb-8">
                        <h3 class="text-slate-800 text-xl font-bold">{{ $item->title }}</h3>

                        @if(!empty($item->description))
                            <p class="mt-2">
                                {{ $item->description }}
                            </p>
                        @endif
                    </div>
                </a>

            @endforeach
        </div>

    </x-slot>
</x-blocks>