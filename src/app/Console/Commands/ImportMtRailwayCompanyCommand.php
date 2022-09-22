<?php

namespace App\Console\Commands;

use App\Imports\MtRailwayCompanyImport;
use Illuminate\Console\Command;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ImportMtRailwayCompanyCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'mt_railway:import';

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
        $path = storage_path('app/public/excel-mt_railway');

        // $files = File::allFiles(public_path('audio')); //this will locate to src/public folder
        $files = File::allFiles($path);
        foreach($files as $f){
            Excel::import(new MtRailwayCompanyImport(), '/excel-mt_railway/'.$f->getFileName(), 'public')
            ?$this->info('Successfuly importing data for '.$f->getFileName())
            : $this->info('Fail to import '.$f->getFileName());
        }
    }
}
