<?php

namespace App\Console\Commands;

use App\Exports\BillingExport;
use Illuminate\Console\Command;
use Maatwebsite\Excel\Facades\Excel;
class CreateBillingCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'billing:export';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Export Billing';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $date = date('Y-m-d');
        Excel::store(new BillingExport, '/excel-billing/billing'. $date .'.xlsx','public') ? $this->info(true) : $this->error('error');
        Excel::store(new BillingExport, '/pdf-billing/billing'. $date .'.pdf','public',\Maatwebsite\Excel\Excel::MPDF) ? $this->info(true) : $this->error('error');
        $this->info('Success, The file path /src/storage/app/public/(excel-billing or pdf-billing)');
    }
}
