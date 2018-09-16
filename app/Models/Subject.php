<?php

namespace App\Models;

class Subject extends Prize
{
    public $timestamps = false;

    protected $casts = [
        'is_active' => 'boolean'
    ];

    public function generate(){
        return static::where('is_active', 1)->inRandomOrder()->first();
    }

    public function apply()
    {
        $this->user_id = \Auth::user()->id;
        $this->is_active = false;
        $this->save();
    }
}