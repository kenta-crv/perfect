<?php

namespace App\Imports;

use App\Models\MtCities;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithStartRow;

class MtCitiesImport implements ToCollection, WithStartRow
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
        foreach ($collections as $row) {
            MtCities::updateOrCreate([
                'id' => $row[0]
            ],[
                'address_code' => $row[1],
                'prefecture_code' => $row[2],
                'area_code' => $row[4],
                'cities_code' => $row[5],
                'cities_name' => $row[10],
                'cities_name_k' => $row[11],
                'area_name' => $row[12]
            ]);
        }
        return 'Done';
    }
}
