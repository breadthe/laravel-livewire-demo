<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Widget extends Model
{
    public function tags()
    {
        return $this
//            ->belongsToMany(Tag::class, 'widget_tag', 'widget_id', 'tag_id')
            ->belongsToMany(Tag::class, 'tag_widget', 'widget_id', 'tag_id')
//            ->using(TagWidget::class)
//            ->withPivot('tag_id')
            ->orderBy('name')
            ;
    }
}
