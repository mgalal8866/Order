<?php

namespace App\Console\Commands\Tenants;

use App\Facade\Tenants;
use Illuminate\Console\Command;
use App\Models\Tenant;
use App\service\TenantService;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;

class systemmigrateCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'system:migrate';

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

       Artisan::call('migrate --path=database/migrations/system/  --database=mysql');
        return Command::SUCCESS;
    }
}
