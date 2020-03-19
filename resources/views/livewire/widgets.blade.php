<div class="mx-auto">

    <div class="flex items-center">
        <input
            wire:model.debounce.250ms="search"
            wire:ref="search-box"
            type="text"
            name="search"
            value=""
            placeholder="Type something..."
            class="w-full max-w-md border border-gray-300 p-2"
        >

        <div
            wire:loading
            wire:target="search-box"
            class="ml-2 text-gray-500"
        >🔎 searching...</div>
    </div>

    @if($uniqueTags)
        <div class="flex flex-wrap mt-4 -m-1">
            @foreach($uniqueTags as $tag)
                <button
                    wire:click="$emit('filterByTag', {{ $tag['id'] }})"
                    wire:ref="search-box"
                    type="button"
                    class="flex items-center m-1 p-2 {{ in_array($tag['id'], $filters) ? 'bg-blue-500 text-blue-100 shadow' : 'bg-blue-100 text-blue-900' }} hover:bg-blue-200 hover:text-blue-800"
                >
                    {{ $tag['name'] }} <small class="ml-1 font-thin">({{ $tag['count'] }})</small>
                </button>
            @endforeach
        </div>
    @endif

    <div class="">
        @if($total = $widgets->count())
            <div class="mt-4">{{ $total }} results</div>
            <hr class="border-t">
            @foreach($widgets as $widget)
                <div class="flex items-center justify-between p-2 -mx-2 hover:bg-gray-100">
                    @livewire('edit-name', compact('widget'), key($widget->id))

                    @if($tags = $widget->tags)
                        <div class="-mx-1 text-right">
                            @foreach($tags as $tag)
                                <small
                                    class="mx-1 {{ in_array($tag->id, $filters) ? 'bg-blue-200 text-blue-900' : 'bg-gray-200 text-gray-900' }} rounded-full px-2 shadow"
                                >
                                    {{ $tag->name }}
                                </small>
                            @endforeach
                        </div>
                    @endif
                </div>
            @endforeach
        @else
            no results
        @endif
    </div>
</div>
