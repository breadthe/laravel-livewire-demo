<?php

namespace App\Http\Livewire;

use App\Widget;
use Illuminate\Support\Str;
use Livewire\Component;

class EditName extends Component
{
    public $widgetId;
    public $shortId;
    public $origName; // initial widget name state
    public $newName; // dirty widget name state
    public $isName; // determines whether to display it in bold text

    public function mount(Widget $widget)
    {
        $this->widgetId = $widget->id;
        $this->shortId = $widget->short_id;
        $this->origName = $widget->name;

        $this->init($widget); // initialize the component state
    }

    public function render()
    {
        return view('livewire.edit-name');
    }

    public function save()
    {
        $widget = Widget::findOrFail($this->widgetId);
        $newName = (string)Str::of($this->newName)->trim()->substr(0, 100); // trim whitespace & more than 100 characters
        $newName = $newName === $this->shortId ? null : $newName; // don't save it as widget name it if it's identical to the short_id

        $widget->name = $newName ?? null;
        $widget->save();

        $this->init($widget); // re-initialize the component state with fresh data after saving
    }

    private function init(Widget $widget)
    {
        $this->origName = $widget->name ?: $this->shortId;
        $this->newName = $this->origName;
        $this->isName = $widget->name ?? false;
    }
}
