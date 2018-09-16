<?php
/**
 * Created by PhpStorm.
 * User: timurmustafin
 * Date: 16.09.18
 * Time: 17:56
 */

namespace App\Models;


interface BankContract
{
    public function transferToBankAccount($account, $value);
}