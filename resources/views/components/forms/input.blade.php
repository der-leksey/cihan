@props([
  'label' => 'label',
  'name' => 'name',
  'type' => 'text',
])



<div class="relative">
    <input
        type="{{ $type }}"
        name="{{ $name }}"
        class="
            block px-2.5 pb-2.5 pt-5 w-full
            rounded-t-lg border-0 border-b-2 border-gray-300
            bg-gray-100
            text-sm text-gray-900 
            appearance-none 
            focus:outline-none focus:ring-0 focus:border-blue-600 peer
        "
        placeholder=" "
        {{ $attributes }}
    />

    <label
        class="
            absolute text-sm text-gray-600 duration-300 transform -translate-y-4 scale-75 top-4 z-10 origin-[0] left-2.5 peer-focus:text-blue-600  peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-4
        "
    >
        {{ $label }}
    </label>
</div>