<?php

use App\Tag;
use App\Widget;
use Illuminate\Database\Seeder;

class TagsSeeder extends Seeder
{
    public function run()
    {
        $tags = factory(Tag::class, 25)->make();

        foreach ($tags as $tag) {
            try {
                $tag->save();
            } catch (\Illuminate\Database\QueryException $e) {
                // do nothing
            }
        }
    }
}
