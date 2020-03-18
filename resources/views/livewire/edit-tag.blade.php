<div
    x-data="
        {
             isEditing: false,
             isTag: '{{ $isTag }}',
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
            class="border-b border-dotted border-blue-600"
            x-bind:class="{ 'font-bold': isTag }"
            x-on:click="isEditing = true; $nextTick(() => focus())"
        >{{ $origTag }}</span>
    </div>
    <div x-show=isEditing class="flex flex-col">
        <form class="flex" wire:submit.prevent="save">
            <input
                type="text"
                class="px-2 border border-gray-400 text-lg shadow-inner"
                placeholder="100 characters max."
                x-ref="textInput"
                wire:model.lazy="newTag"
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
        @error('newTag') <span class="text-red-500">{{ $message }}</span> @enderror
    </div>
</div>
