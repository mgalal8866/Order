<?php

namespace App\Console\Commands\Tenants;

use App\Facade\Tenants;
use Illuminate\Console\Command;
use App\Models\Tenant;
use App\service\TenantService;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;

class MigtareCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'tenants:migrate';

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
            $this->info('Start migrating : ' . $tenant->domain);
            $this->info('---------------------------------------');
            // Artisan::call('migrate --path=database/migrations/tenants/  --database=tenant');
            Artisan::call('migrate --path=database/migrations/tenants/  --database=tenant');
            // \Artisan::call('migrate:rollback --path=database/migrations/tenants/ --database=tenant' );
            $this->info(Artisan::output());
        });
        return Command::SUCCESS;
    }
}
