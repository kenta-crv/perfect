<?php

namespace App\Console\Commands;

use App\Imports\MtLineImport;
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
    protected $signature = 'mt_line:import';

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
        $path = storage_path('app/public/excel-mt_line');
        $files = File::allFiles($path);
        foreach($files as $f){
            Excel::import(new MtLineImport, '/excel-mt_line/'.$f->getFileName(), 'public')
            ?$this->info('Successfuly importing data for '.$f->getFileName())
            : $this->info('Fail to import '.$f->getFileName());
        }
    }
}
