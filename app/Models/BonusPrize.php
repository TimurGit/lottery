<?php

namespace App\Models;


class BonusPrize extends NumberPrize
{
    const COEFFICIENT = 0.1;

    public function setValueAttribute($val) {
        $this->value = $val;
    }

    public function getValueAttribute() {
        return $this->value;
    }

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
        $moneyPrize = app('App\Models\MoneyPrize');
        $moneyPrize->value = $this->value * BonusPrize::COEFFICIENT;
        return $moneyPrize;
    }
}