@props(['type' => 'text', 'placeholder', 'wire'])

<input type="{{ $type }}" wire:model.live="{{ $wire }}" placeholder="{{ $placeholder }}"
    class="block md:w-72 p-3 border rounded-lg mt-10 text-sm bg-gray-700 border-gray-600 placeholder-gray-400 text-white">
