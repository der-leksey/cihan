<form action="">
    <x-forms.input
        type="tel"
        label="Phone"
        name="phone"
        wire:model="input"
    />
    {{ $input }}


    <button
        @click($input = 1)
        type="button"
        class="
            w-full px-5 py-4
            text-white font-medium
            rounded-lg
            bg-blue-700
            hover:bg-blue-800 
            focus:ring-blue-300 focus:ring-4 focus:outline-none"
    >Default</button>
</form>