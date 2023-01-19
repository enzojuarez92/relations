<?php

namespace Database\Seeders;

use App\Models\Video;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VideoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Video::factory(40)->create()->each(function ($video) {

            $video->image()->save(Video::factory(Image::class))->make();
            $video->tags()->attach(array(rand(1, 12)));

            $number_comment = rand(1, 6);

            for ($i = 0; $i < $number_comment; $i++) {
                $video->comments()->save(Video::factory(Comment::class)->make());
            }
        });
    }

    public function array($max)
    {
        $values = [];

        for ($i = 1; $i < $max; $i++) {
            $values[$i];
        }

        return $values;
    }
}
