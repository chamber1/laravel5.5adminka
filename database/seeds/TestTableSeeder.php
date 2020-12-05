<?php

use Illuminate\Database\Seeder;
use App\Test;


class TestTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Test::create([
                'name' => 'Vasya',
                'message' => 'WOWOWOWOW'
        ]);
        
        Test::create([
                'name' => 'Vasya222',
                'message' => 'sdsdssd'
        ]);
        
        
    }
}
