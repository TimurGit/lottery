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
        factory(\App\User::class)->create([
            'name' => 'User',
            'email' => 'user@example.com',
            'password' => bcrypt('secret')
        ]);
        $users = factory(App\User::class, 50)->create();
    }
}
