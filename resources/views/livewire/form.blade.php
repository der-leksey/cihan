<form action="" wire:submit.prevent="submit">
    <x-input
        :label="$settings['ln.form.name'] ?? 'Name'"
        name="name"
    />

    <x-input
        type="tel"
        :label="$settings['ln.form.phone'] ?? 'Phone'"
        name="phone"
    />

    <x-input
        label="Email"
        name="email"
        type="email"
    />

    <button
        type="submit"
        class="
            w-full px-5 py-4
            rounded-xl
            bg-primary
            text-white font-bold uppercase tracking-widest
            bg-gradient-to-r from-primary to-secondary
            focus:ring-primary/20 focus:ring-4 focus:outline-none
            hover:bg-gradient-to-l
        "
    >
        {{ $settings['ln.form.submit'] ?? 'Submit' }}
    </button>

    {{-- {{ $errors }} --}}

    @if (session()->has('message'))
        <div class="bg-green-700">
            {{ session('message') }}
        </div>
    @endif
</form>
