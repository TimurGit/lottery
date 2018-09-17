<?php
/**
 * Created by PhpStorm.
 * User: timurmustafin
 * Date: 16.09.18
 * Time: 1:48
 */

namespace App\Models;


abstract class NumberPrize extends Prize
{
    protected $appends = ['value'];
    protected $value;

    public function setValueAttribute($val) {
        $this->value = $val;
    }

    public function getValueAttribute() {
        return $this->value;
    }

    public function generate($start=1, $end=200)
    {
        $value = rand($start, $end);
        $this->value = $value;
        return $this;
    }
}