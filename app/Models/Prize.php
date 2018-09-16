<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

abstract class Prize extends Model implements PrizeGenerator{

    public function getNameTextAttribute()
    {
        if ($this instanceof Subject)
        {
            return $this->name;
        }
        else{
            return $this->value;
        }

    }

}