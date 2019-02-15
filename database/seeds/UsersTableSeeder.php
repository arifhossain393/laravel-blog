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
            'role_id' => '1',
            'name' => 'Mr.Admin',
            'username' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('123456')

        ]);
        DB::table('users')->insert([
            'role_id' => '2',
            'name' => 'Mr.Author',
            'username' => 'author',
            'email' => 'author@gmail.com',
            'password' => bcrypt('123456')

        ]);
    }
}
