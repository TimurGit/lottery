<?php

namespace App\Models;


class BonusPrize extends NumberPrize
{
    const COEFFICIENT = 0.1;

    public function generate($start = 1, $end = 200)
    {
        return parent::generate(10, 1000);
    }

    public static function transferToUserAccount($user, $value)
    {
        $user->bonus += $value;
        $user->save();
    }

    public function convertBonusToMoney()
    {
        $newvalue = $this->value * BonusPrize::COEFFICIENT;
        return $newvalue;
    }
}