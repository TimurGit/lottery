<?php

namespace App\Models;

class Subject extends Prize
{
    public function generate(){
        return static::where('is_active', 1)->inRandomOrder()->first();
    }
}