<x-blocks.block :block="$block">
    <x-slot name="main">

        <div class="grid grid-cols-1 xl:grid-cols-2 gap-8">
            @foreach($block['items'] as $key => $item)
                <div class="flex items-center py-8 px-8 bg-slate-50 rounded-xl">
                    <x-image :id="$item['image']" w="100" class="mr-8"></x-image>

                    <div>
                        @empty(!$item['title'])
                            <h3 class="text-slate-800 text-xl font-bold">{{ $item['title'] }}</h3>
                        @endempty

                        @empty(!$item['text'])
                            <p class="mt-2">{{ $item['text'] }}</p>
                        @endempty
                    </div>
                </div>
            @endforeach
        </div>

    </x-slot>
</x-blocks>