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
       
          User::create([

            'name' => 'Yuriy Yurenko',
            'email' => 'yurenkoyura@gmail.com',
            'password' => bcrypt('123123123'),
            'role_id' => 1, //admin
        ]);
        
        User::create([

            'name' => 'test user',
            'email' => 'testtest@qwert.xcv',
            'password' => bcrypt('testtesttest'),
            'role_id' => 2, //simple user
        ]);
        
    }
}
