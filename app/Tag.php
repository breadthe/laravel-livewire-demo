<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    public function widgets()
    {
        return $this->belongsToMany(Widget::class);
    }
}
