<x-mail::message>
    # New order from the form

    {{ $maildata['phone'] ?? '-' }}
    {{ $maildata['email'] ?? '-' }}

    Thanks, {{ config('app.name') }}
</x-mail::message>
