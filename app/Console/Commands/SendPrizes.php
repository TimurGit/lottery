<?php

namespace App\Console\Commands;

use App\Models\BankContract;
use App\PrizeManager;
use App\User;
use Illuminate\Console\Command;

class SendPrizes extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'prize:sendmoney {count}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send prizes';

    private $bankContract;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(BankContract $bankContract)
    {
        $this->bankContract = $bankContract;
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $users = User::inRandomOrder()->take($this->argument('count') ?? 10)->get();
        foreach ($users as $user)
        {
            $moneyPrize = app('App\Models\MoneyPrize')->generate();
            $this->info($user->name.' send '. $moneyPrize->value);
            $this->bankContract->transferToBankAccount($user, $moneyPrize->value);
        }
    }
}
