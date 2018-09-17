<?php

namespace App\Models;


class MoneyPrize extends NumberPrize
{
    public function generate($start = 1, $end = 200)
    {
        $genObj = parent::generate($start, $end);
        if ($genObj->value)
        {
                \DB::update('update common_accounts set count = count-? where id = ?', [$genObj->value, 1]);
                $count = CommonAccount::find(1)->count;
                if ($count<0)
                {
                    \DB::update('update common_accounts set count = count+? where id = ?', [$genObj->value, 1]);
                    $genObj->value = 0;
                    return $genObj;
                }
                else{
                    return $genObj;
                }

        }
    }

}