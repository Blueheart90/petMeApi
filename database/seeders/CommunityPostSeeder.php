<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\Image;
use App\Models\CommunityPost;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CommunityPostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $communityPosts = CommunityPost::factory(20)->create();

        foreach ($communityPosts as $post) {
            Image::factory(1)->create([
                'imageable_id' => $post->id,
                'imageable_type' => CommunityPost::class,
            ]);

            Comment::factory(4)->create([
                'commentable_id' => $post->id,
                'commentable_type' => CommunityPost::class,
            ]);
        }
    }
}
