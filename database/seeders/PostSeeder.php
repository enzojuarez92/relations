<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\Image;
use App\Models\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Post::factory(40)->create()->each(function ($post) {

            $post->image()->save(Post::factory(Image::class))->make();
            $post->tags()->attach(array(rand(1, 12)));

            $number_comment = rand(1, 6);

            for ($i = 0; $i < $number_comment; $i++) {
                $post->comments()->save(Post::factory(Comment::class)->make());
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
