<?php

namespace App\Imports;

use App\Models\BillingUser;
use App\Models\MtStation;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithStartRow;

class MtStationImport implements ToCollection, WithStartRow
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
            MtStation::updateOrCreate([
                "station_cd" => $row[0],
                ],[
                    'station_cd' => $row[0],
                    'station_g_cd' => $row[1],
                    'station_name' => $row[2],
                    'station_name_k' => $row[3],
                    'line_cd' => $row[5],
                    'pref_cd' => $row[6]
                ]);
        }
        return 'Done';
    }
}
