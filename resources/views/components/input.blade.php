@props([
  'label' => 'label',
  'name' => 'name',
  'type' => 'text',
  'class' => '',
])

<div class="relative mb-6">
    <input
        type="{{ $type }}"
        name="{{ $name }}"
        class="
            js-input
            block px-4 pb-2 pt-5 w-full
            rounded-xl border border-1 border-neutral-200
            bg-neutral-50
            text-sm 
            appearance-none 
            focus:outline-none focus:ring-primary/20 focus:ring-4  focus:border-primary peer
            invalid:text-red-700 invalid:focus:ring-red-700/20 invalid:focus:border-red-700
            {{ $class }}
        "
        placeholder=" "
        wire:model.defer="{{ $name }}"
        {{ $attributes }}
    />

    <label
        class="
            absolute text-sm text-neutral-500 duration-300 transform -translate-y-3 scale-75 top-3.5 z-10 origin-[0] left-4
            peer-focus:text-neutral-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-3
        "
    >
        {{ $label }}
    </label>

    @error($name)
        <span class="text-sm text-red-600">
            @lang($message)
        </span>
    @enderror
</div>