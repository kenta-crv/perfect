<?php

namespace App\Console\Commands;


use Illuminate\Console\Command;
use App\Imports\MtStationImport;
use Illuminate\Support\Facades\File;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Storage;
class ImportMtStationCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'mt_station:import';

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
        $path = storage_path('app/public/excel-mt_station');
        $files = File::allFiles($path);
        foreach($files as $f){
            Excel::import(new MtStationImport, '/excel-mt_station/'.$f->getFileName(), 'public')
            ?$this->info('Successfuly importing data for '.$f->getFileName())
            : $this->info('Fail to import '.$f->getFileName());
        }
    }
}