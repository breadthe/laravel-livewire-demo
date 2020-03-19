<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Widget extends Model
{
    public static function boot()
    {
        parent::boot();

        self::created(function (Widget $widget) {
            $widget->short_id = bin2hex(openssl_random_pseudo_bytes(4));
            $widget->save();
        });
    }

    public function tags()
    {
        return $this
            ->belongsToMany(Tag::class, 'tag_widget', 'widget_id', 'tag_id')
            ->orderBy('name');
    }
}
