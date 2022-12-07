<form action="" wire:submit.prevent="submit">
    <x-input
        type="tel"
        label="Phone"
        name="phone"
    />

    <x-input
        label="Email"
        name="email"
        type="email"
    />

    <x-input
        label="Email"
        name="email"
        type="email"
    />

    <x-input
        label="Email"
        name="email"
        type="email"
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
            text-white font-bold
            hover:bg-primary-800 
            focus:ring-primary/40 focus:ring-4 focus:outline-none
        "
    >
        Submit
    </button>

    {{-- {{ $errors }} --}}

    @if (session()->has('message'))
        <div class="bg-green-500">
            {{ session('message') }}
        </div>
    @endif
</form>
