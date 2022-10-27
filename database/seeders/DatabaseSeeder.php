<?php

namespace Database\Seeders;


// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(5)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        \App\Models\Category::factory(5)->create();
        \App\Models\Post::factory(20)->create();
        \App\Models\Tag::factory(10)->create();
        \App\Models\Comment::factory(50)->create();

        for ($i=0; $i < 50; $i++) { 
            DB::table('posts_tags')->insert([
               'post_id' => rand(1,20),
               'tag_id' => rand(1,10),
           ]);
       }
   
    }
}
