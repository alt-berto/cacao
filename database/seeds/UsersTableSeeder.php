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
        //
        DB::table('users')->insert([
            'username' => 'admin',
            'name' => 'leonel',
            'is_admin' => true,
            'email' => 'ing.molinanestor@gmail.com',
            'password' => bcrypt('admin'),
        ]);
    }
}
