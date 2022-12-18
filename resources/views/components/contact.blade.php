@if($type == 'social')
    @foreach($contact['social'] as $item)
        <a href="{{ $item['link'] }}" target="_blank" rel="nofollow noopener" {{ $attributes }}>
            <x-dynamic-component :component="'si-' . $item['icon']" class="w-5 h-5"/>
        </a>
    @endforeach
@endif

@if($type == 'email')
    <a href="mailto:{{ $contact['email'] }}" target="_blank" {{ $attributes }}>{{ $contact['email'] }}</a>
@endif

@if($type == 'phone')
    <a href="tel:{{ $contact['phone_link'] }}" target="_blank" {{ $attributes }}>{{ $contact['phone'] }}</a>
@endif

@if($type == 'address')
    {{ $address }}
@endif

@if($type == 'map')
    <div class="rounded-xl overflow-hidden">
        {!! $contact['map'] !!}
    </div>
@endif