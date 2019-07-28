<?php

use App\Tag;
use App\Widget;
use Illuminate\Database\Seeder;
use Illuminate\Foundation\Testing\WithFaker;

class DatabaseSeeder extends Seeder
{
    use WithFaker;

    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(TagsSeeder::class);

        $tags = Tag::all();

        factory(Widget::class, 100)
            ->create()
            ->each(function ($widget) use ($tags) {
                // Create a random number of tags for each widget
                for ($i = 1; $i <= random_int(1, 5); $i++) {
                    try {
                        $widget->tags()->save($tags->random());
                    } catch (\Exception $e) {
                        // do nothing
                    }
                }
            });
    }
}
