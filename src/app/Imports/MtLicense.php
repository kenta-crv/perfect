<?php
namespace App\Imports;

use App\Models\MtLicenses;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithStartRow;

class MtLicense implements ToCollection, WithStartRow
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
        @ini_set('memory_limit', -1);
        foreach($collections as $row){
            MtLicenses::updateOrCreate([
                'id' => $row[0]
            ],
            [
                'license' => $row[9],
                'company_name' => $row[4],
            ]);
        }
        return 'Done';
    }
}