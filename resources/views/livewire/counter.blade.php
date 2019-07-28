<div class="flex flex-row items-center w-48 justify-between bg-gray-300 p-1">
    <button wire:click="decrement" class="flex items-center justify-center bg-white rounded-full w-2 h-4 p-2">-</button>
    <h1>{{ $count }}</h1>
    <button wire:click="increment" class="flex items-center justify-center bg-white rounded-full w-2 h-4 p-2">+</button>
</div>
