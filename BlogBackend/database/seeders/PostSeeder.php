<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Post;
use App\Models\Tag;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $post = Post::create([
            'user_id' => 1,
            'title' => 'My First Blog Post',
            'content' => 'This is the content of my first post.'
        ]);

        $tags = Tag::insert([
            ['tag_name' => 'travel'],
            ['tag_name' => 'life'],
            ['tag_name' => 'food']
        ]);

        $post->tags()->attach([1, 2]); // Gán tags cho blog
    }
}
