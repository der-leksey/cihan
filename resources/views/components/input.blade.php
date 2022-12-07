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
            block px-4 pb-2.5 pt-5 w-full
            rounded-xl border border-1 border-slate-200
            bg-slate-50
            text-sm text-gray-900 
            appearance-none 
            focus:outline-none focus:ring-0 focus:border-slate-600 peer
            invalid:text-red-700
            {{ $class }}
        "
        placeholder=" "
        wire:model.defer="{{ $name }}"
        {{ $attributes }}
    />

    <label
        class="
            absolute text-sm text-gray-600 duration-300 transform -translate-y-4 scale-75 top-4 z-10 origin-[0] left-4 peer-focus:text-blue-600  peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-4
        "
    >
        {{ $label }}
    </label>

    @error($name)
        <span class="text-sm text-red-700">
            @lang($message)
        </span>
    @enderror
</div>