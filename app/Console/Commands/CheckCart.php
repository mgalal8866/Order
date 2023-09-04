<?php

namespace App\Console\Commands;

use App\Models\Tenant;
use App\Facade\Tenants;
use App\Models\User;
use Illuminate\Console\Command;

class CheckCart extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'auto:check-cart';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $tenants = Tenant::get();
        $tenants->each(function ($tenant) {
            Tenants::switchToTanent($tenant);
            // User::has('cart')->
        });
    }
}
