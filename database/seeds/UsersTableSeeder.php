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
        	'name' => 'Fabian',
            'username' => 'fabian117',
            'email' => 'fabianloaeza8@gmail.com',
            'password' => bcrypt('123123'),
            'admin' => true
        ]);
    }
}
