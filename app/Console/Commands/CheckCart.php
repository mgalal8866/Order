<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Tenant;
use App\Facade\Tenants;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Cache;

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

        Log::alert("Run Cron job",[]);
        $tenants = Tenant::get();
        $tenants->each(
            function ($tenant) use($tenants) {
                $set = Cache::get($tenants->domin . '_settings', []);
                Log::error($tenants->domin);
                Log::error($tenant->domin);
                if ( $set['notif_sent_cart'] == 1) {
                    Tenants::switchToTanent($tenant);
                    $from = Carbon::now()->subMinutes(5); // 2023-09-04 03:05:44
                    $to = Carbon::now(); // 2023-09-04 03:10:44
                    $users = User::on('tenant')->wherehas('cart', function ($q) use($from,$to) {
                        $q->whereBetween('updated_at', [$from, $to]);
                    })->where('fsm','!=',null)->pluck('fsm');
                    notificationFCM('مرحبا', $set['notif_cart_text'], $users,null,null,null,null,null,false);
                }
            }

        );
    }
}
