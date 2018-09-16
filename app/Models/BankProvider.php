<?php

namespace App\Models;


class BankProvider implements  BankContract
{

    public function transferToBankAccount($account, $value)
    {
        \Log::info('add $'.$value .' to '.$account);
        // TODO: Implement transferToBankAccount() method.
        return true;
    }
}