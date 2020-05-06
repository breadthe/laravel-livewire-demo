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

    <div>
        @if($total = $widgets->count())
            <div class="mt-4 flex justify-between">
                <div class="flex">
                    Per page:
                    <select wire:model="perPage">
                        <option>10</option>
                        <option>15</option>
                        <option>25</option>
                    </select>
                </div>

                <div class="flex">
                    Sort by:
                    <select wire:model="sort">
                        <option value="name|asc" title="Title ascending">Title &downarrow;</option>
                        <option value="name|desc" title="Title descending">Title &uparrow;</option>
                        <option value="created_at|asc" title="Date ascending">Date &downarrow;</option>
                        <option value="created_at|desc" title="Date descending">Date &uparrow;</option>
                    </select>
                </div>



            </div>
            <hr class="border-t mb-4">

            @foreach($widgets as $widget)
                @livewire('edit-name', compact('widget'), key($widget->id))

                @if($tags = $widget->tags)
                    <div class="mb-4 -mt-1 -mx-2">
                        @foreach($tags as $tag)
                            <small
                                    class="mx-1 {{ in_array($tag->id, $filters) ? 'bg-blue-200 text-blue-900' : 'bg-gray-200 text-gray-900' }} rounded-full px-2 shadow"
                            >
                                {{ $tag->name }}
                            </small>
                        @endforeach
                    </div>
                @endif
            @endforeach


            <p class="mb-4 border-t pt-1 text-sm text-center leading-5 text-gray-700">
                Showing
                <span class="font-medium">{{ $widgets->firstItem() }}</span>
                to
                <span class="font-medium">{{ $widgets->lastItem() }}</span>
                of
                <span class="font-medium">{{ $widgets->total() }}</span>
                results
            </p>

            {{ $widgets->links() }}





        @else
            no results
        @endif
    </div>
</div>
