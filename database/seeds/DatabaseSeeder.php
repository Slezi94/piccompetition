<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'super_admin',
            'email' => 'super_admin@gmail.com',
            'password' => Hash::make('admin'),
            'super_admin' => true,
            'ban' => false
        ]);

        DB::table('users')->insert([
            'name' => 'user1',
            'email' => 'user2@test.com',
            'password' => Hash::make('user1'),
            'super_admin' => false,
            'ban' => false
        ]);

        DB::table('users')->insert([
            'name' => 'user2',
            'email' => 'user1@test.com',
            'password' => Hash::make('user2'),
            'super_admin' => false,
            'ban' => false

        ]);

    }
}
