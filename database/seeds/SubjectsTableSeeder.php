<?php

use Illuminate\Database\Seeder;
use App\Models\Subject;

class SubjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Subject::class)->create([
            'is_active'=>true,
            'name' => 'Квартира',
        ]);

        factory(Subject::class)->create([
            'is_active'=>true,
            'name' => 'Автомобиль',
        ]);

        factory(Subject::class)->create([
            'is_active'=>true,
            'name' => 'Фрукт',
        ]);

        factory(Subject::class)->create([
            'is_active'=>true,
            'name' => 'Фейерверк',
        ]);
    }
}
