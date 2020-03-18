<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{

    public static function boot()
    {
        parent::boot();

        self::created(function (Tag $tag) {
            $tag->short_id = bin2hex(openssl_random_pseudo_bytes(4));
            $tag->save();
        });
    }

    public function widgets()
    {
        return $this->belongsToMany(Widget::class);
    }
}
