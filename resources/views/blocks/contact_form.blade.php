@extends('blocks.base')

@section('block_container')
    <div class="grid grid-cols-2 gap-16">
        <div class="">
            @parent
            <livewire:form /> 
        </div>
        <div class="">
            <x-image id="{{ $block['image'] }}" />
        </div>
    </div>
@endsection

@section('block_main')

@endsection