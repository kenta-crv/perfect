<?php

namespace App\Imports;

use App\Models\MtLine;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithStartRow;

class MtLineImport implements ToCollection, WithStartRow
{

    /**
     * @return int
     */
    public function startRow(): int
    {
        return 2;
    }

    /**
    * @param Collection $collection
    */
    public function collection(Collection $collections)
    {
        foreach($collections as $row){
            MtLine::updateOrCreate([
                "line_cd" => $row[0],
                ],[
                    'line_cd' => $row[0],
                    'company_cd' => $row[1],
                    'line_name' => $row[2],
                    'line_name_k'=> $row[3],
                ]);
        }
        return 'Done';
    }
}
