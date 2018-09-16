<?php

use Illuminate\Database\Seeder;

class CommonAccountTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('common_accounts')->insert(['count'=>300]);
    }
}
