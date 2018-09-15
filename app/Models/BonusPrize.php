<?php

namespace App\Models;


class BonusPrize extends NumberPrize
{
    public function generate($start = 1, $end = 200)
    {
        return parent::generate(10, 1000);
    }
}