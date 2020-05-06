<?php

namespace App\Http\Livewire;

use App\Widget;
use Livewire\Component;
use Livewire\WithPagination;

class Widgets extends Component
{
    use WithPagination;

    protected $listeners = ['filterByTag' => 'filterByTag'];

    public $search;
    public $filters = [];
    public $perPage = 10;
    public $sort = 'name|asc';

    public function render()
    {
        $widgets = Widget::with('tags', 'tags.widgets');

        //Get tag count without being affect by pagination
        $uniqueTags = $this->getUniqueTags($widgets->get());

        $this->applySearchFilter($widgets);

        $this->applyTagFilter($widgets);

        $widgets = $widgets->orderBy($this->sortByColumn(), $this->sortDirection())
            ->paginate($this->perPage);

        return view('livewire.widgets')->with(compact('widgets', 'uniqueTags'));
    }

    public function sortByColumn()
    {
        $sort = explode("|", $this->sort);

        return $sort[0] ?? 'name';
    }

    public function sortDirection()
    {
        $sort = explode("|", $this->sort) ?? 'asc';

        return $sort[1] ?? 'asc';
    }

    public function filterByTag($tag)
    {
        if (in_array($tag, $this->filters)) {
            $ix = array_search($tag, $this->filters);

            unset($this->filters[$ix]);
        } else {
            $this->filters[] = $tag;
        }
    }

    private function applySearchFilter($widgets)
    {
        if ($this->search) {
            return $widgets->whereRaw("name LIKE \"%$this->search%\"");
        }

        return null;
    }

    private function applyTagFilter($widgets)
    {
        if ($this->filters) {
            foreach ($this->filters as $filter) {
                $widgets->whereHas('tags', function ($query) use ($filter) {
                    $query->where('id', $filter);
                });
            }
        }

        return null;
    }

    private function getUniqueTags($widgets)
    {
        return $widgets
            ->flatMap(function ($widget) {
                return $widget->tags;
            })
            ->groupBy(function ($tag) {
                return $tag->name;
            })
            ->map(function ($tag, $key) {
                return [
                    'id' => $tag->first()->id,
                    'name' => $key,
                    'count' => $tag->count(),
                ];
            })
            ->sortBy(function ($tag, $key) {
                return $key;
            });
    }

}
