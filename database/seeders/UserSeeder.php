<?php

namespace Database\Seeders;

use App\Models\Image;
use App\Models\Location;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory(5)->create()->each(function ($user) {

            $profile = $user->profile()->save(User::factory(Profile::class)->make());

            $profile->location()->save(User::factory(Location::class)->make());

            $user->groups()->attach($this->array(rand(1, 3)));

            $user->image()->save(User::factory(Image::class)->make([
                'url' => 'https://lorempixel.com/90/90/'
            ]));
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
