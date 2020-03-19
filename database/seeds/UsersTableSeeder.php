<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('users')->insert([
    		'name' => config('constants.user.name'),
    		'email' => config('constants.user.email'),
    		'password' => bcrypt(config('constants.user.password')),
    		'role' => config('constants.user.role'),
    	]);

        DB::table('users')->insert([
            'name' => 'Demo',
            'email' => 'demo@demo.com',
            'password' => bcrypt('demo123'),
        ]);

        DB::table('users')->insert([
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'password' => bcrypt('password'),
        ]);

         DB::table('users')->insert([
            'name' => 'Jane Doe',
            'email' => 'jane@example.com',
            'password' => bcrypt('password'),
        ]);
    }
}
