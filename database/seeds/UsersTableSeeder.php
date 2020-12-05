<?php

use Illuminate\Database\Seeder;

use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   
       
        $user = User::create([

            'name' => 'test user',
            'email' => 'testtest@qwert.xcv',
            'password' => bcrypt('testtesttest'),
        ]);
        
        
        User::create([

            'name' => 'Yuriy Yurenko',
            'email' => 'yurenkoyura@gmail.com',
            'password' => bcrypt('glottis123'),
        ]);
    
    }
}
