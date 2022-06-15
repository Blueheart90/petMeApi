<?php

namespace Database\Seeders;

use App\Models\Petbreed;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PetbreedSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $json = File::get("database/data/dogBreeds.json");
        $dogBreeds = json_decode($json);

        $json = File::get("database/data/catBreeds.json");
        $catBreeds = json_decode($json);

        $json = File::get("database/data/birdBreeds.json");
        $birdBreeds = json_decode($json);

        foreach ($dogBreeds as $breed) {
            Petbreed::create([
                'name' => $breed->name,
                'pettype_id' => 1
            ]);
        }

        foreach ($catBreeds as $breed) {
            Petbreed::create([
                'name' => $breed->name,
                'pettype_id' => 2
            ]);
        }

        foreach ($birdBreeds as $breed) {
            Petbreed::create([
                'name' => $breed->name,
                'pettype_id' => 3
            ]);
        }
    }
}
