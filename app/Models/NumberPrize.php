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
    private $_value;

    private function setValue($val) {
        $this->_value = $val;
    }

    private function getValue() {
        return $this->_value;
    }

    public function generate($start=1, $end=200)
    {
        $value = rand($start, $end);
        $this->value = $value;
        return $this;
    }
}