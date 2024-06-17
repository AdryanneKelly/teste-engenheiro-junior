@props(['type' => 'text', 'label', 'name', 'placeholder', 'required', 'disabled' => false])

<div class="mb-6">
    <label for="{{ $name }}" class="block mb-2 text-sm font-medium text-white">{{ $label }}</label>
    <input type="{{ $type }}" wire:model.defer="{{ $name }}" id="{{ $name }}"
        name="{{ $name }}"
        class="block w-full p-2  border rounded-lg text-sm bg-gray-700 border-gray-600 placeholder-gray-400 text-white"
        placeholder="{{ $placeholder }}" @if ($required) required @endif
        @if ($disabled) disabled @endif>

</div>
