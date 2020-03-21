<div class="flex items-center justify-between -mx-2 hover:bg-gray-100">
    <div
        class="flex items-center justify-between w-full"
        x-data="
            {
                 isEditing: false,
                 isName: '{{ $isName }}',
                 focus: function() {
                    const textInput = this.$refs.textInput;
                    textInput.focus();
                    textInput.select();
                 }
            }
        "
        x-cloak
    >
        <div
            class="p-2"
            x-show=!isEditing
        >
            <span
                class="border-b border-dashed border-gray-500"
                x-bind:class="{ 'font-bold': isName }"
                x-on:click="isEditing = true; $nextTick(() => focus())"
            >{{ $origName }}</span>
        </div>
        <div x-show=isEditing class="flex flex-col mb-2">
            <form class="flex" wire:submit.prevent="save">
                <input
                    type="text"
                    class="px-2 border border-gray-400 text-lg shadow-inner"
                    placeholder="100 characters max."
                    x-ref="textInput"
                    wire:model.lazy="newName"
                    x-on:keydown.enter="isEditing = false"
                    x-on:keydown.escape="isEditing = false"
                >
                <button type="button" class="px-1 ml-2 text-3xl" title="Cancel" x-on:click="isEditing = false">𐄂</button>
                <button
                    type="submit"
                    class="px-1 ml-1 text-3xl font-bold text-green-600"
                    title="Save"
                    x-on:click="isEditing = false"
                >✓</button>
            </form>
            <small class="text-xs">Enter to save, Esc to cancel</small>
        </div>
    </div>
</div>
