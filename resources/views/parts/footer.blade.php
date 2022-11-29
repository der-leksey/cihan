<footer class="mt-auto py-12 bg-gray-100 text-center">
    <div class="container">
        <div class="text-2xl">{{ $settings['site_name'] ?? 'site_name' }}</div>
        <div class="mt-2"><a class="" href="mailto:{{ @$contacts['email'] }}" target="_blank">{{ @$contacts['email'] }}</a></div>
        <div class="mt-2"><a href="tel:{{ @str_replace([' ', '-', '(', ')'], '', $contacts['phone']) }}">{{ $contacts['phone'] }}</a></div>
    </div>
</footer>