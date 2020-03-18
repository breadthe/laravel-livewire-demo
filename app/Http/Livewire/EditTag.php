<?php

namespace App\Http\Livewire;

use App\Tag;
use Illuminate\Database\QueryException;
use Illuminate\Support\Str;
use Livewire\Component;

class EditTag extends Component
{
    public $tagId;
    public $shortId;
    public $origTag; // initial tag state
    public $newTag; // dirty tag state
    public $isTag; // determines whether to display it in bold text

    public function mount(Tag $tag)
    {
        $this->tagId = $tag->id;
        $this->shortId = $tag->short_id;
        $this->origTag = $tag->name;

        $this->init($tag); // initialize the component state
    }

    public function render()
    {
        return view('livewire.edit-tag');
    }

    public function save()
    {
        $tag = Tag::findOrFail($this->tagId);
        $newTag = (string)Str::of($this->newTag)->trim()->substr(0, 100); // trim whitespace & more than 100 characters
        $newTag = $newTag === $this->shortId ? null : $newTag; // don't save it as tag name it if it's identical to the short_id

        $tag->name = $newTag ?? null;
        $tag->save();

        $this->init($tag); // re-initialize the component state with fresh data after saving
    }

    private function init(Tag $tag)
    {
        $this->origTag = $tag->name ?: $this->shortId;
        $this->newTag = $this->origTag;
        $this->isTag = $tag->name ?? false;
    }
}
