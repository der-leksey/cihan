<div class="h-2 bg-gradient-to-r from-primary to-secondary"></div>

<footer class="mt-auto py-12 bg-black text-neutral-100 text-center">

    <div class="container flex flex-col items-center">
        <div class="text-2xl">{{ $settings['site_name'] ?? 'site_name' }}</div>

        <div class="mt-2"><x-contact type="email"/></div>
        <div class="mt-2"><x-contact type="phone"/></div>
        <div class="mt-3 grid grid-flow-col gap-5"><x-contact type="social"/></div>
    </div>
</footer>