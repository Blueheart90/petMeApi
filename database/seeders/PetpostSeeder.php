<?php

namespace Database\Seeders;

use App\Models\AdoptionProcess;
use App\Models\Image;
use App\Models\Petpost;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PetpostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $petposts = Petpost::factory(20)->create();

        foreach ($petposts as $key => $post) {
            Image::factory(3)->create([
                'imageable_id' => $post->id,
                'imageable_type' => Petpost::class,
            ]);


            if ($key < 5) {
                AdoptionProcess::factory(1)->create([
                    'petpost_id' => $post->id,
                    'user_id' => User::where('id', '!=', $post->user_id)->get()->random(1)->first()->id,
                ]);
            }
        }
    }
}
