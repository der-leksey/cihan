<x-blocks.block aaa="'bbb'">



    <x-slot name="title"></x-slot>
    <x-slot name="introtext"></x-slot>
    <x-slot name="main">
        <div class="grid grid-cols-2 gap-24 items-center">
            <div class="">
                <h2 class="title">{{ $block['title'] ?? 'title' }}</h2> 
                <p class="my-8">{{ $block['introtext'] ?? 'introtext' }}</p>
                <livewire:form /> 
            </div>

            <div class="">
                @if(!empty($block['image']))
                    <x-image id="{{ $block['image'] }}" w="1/2" h="800" class="rounded-xl" />
                @endif
            </div>
        </div>
    </x-slot>
</x-blocks>