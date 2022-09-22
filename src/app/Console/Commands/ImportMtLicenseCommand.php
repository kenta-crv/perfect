<?php

namespace App\Console\Commands;

use App\Imports\MtLicense;
use Illuminate\Console\Command;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
class ImportMtLineCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'mt_license:import';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $path = storage_path('app/public/excel-mt_license');
        $files = File::allFiles($path);

        foreach($files as $f){
            // @ini_set('memory_limit', -1);
            Excel::import(new MtLicense, '/excel-mt_license/'.$f->getFileName(), 'public')
            ?$this->info('Successfuly importing data for '.$f->getFileName())
            : $this->info('Fail to import '.$f->getFileName());
        }
    }
}
