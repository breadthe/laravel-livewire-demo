<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    public function widgets()
    {
//        return $this->belongsToMany(Widget::class, 'widget_tag', 'tag_id', 'widget_id');
        return $this->belongsToMany(Widget::class)
//            ->using(TagWidget::class)
            ;
    }
}
