<?php

use Illuminate\Database\Seeder;
use App\Post;


class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Test::create([
                'title' => 'Test post title 1',
                'message' => 'WOWOWOWOW'
        ]);
        
        Test::create([
                'name' => 'Vasya222',
                'message' => 'sdsdssd'
        ]);
        
        
    }
}
