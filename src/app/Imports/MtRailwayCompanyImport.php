<?php

namespace App\Imports;

use App\Models\MtRailwayCompany;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithStartRow;

class MtRailwayCompanyImport implements ToCollection, WithStartRow
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
            // BillingUser::updateOrCreate([
            //     "id" => $row[9],
            //     ],[
            //         'account_id' => $row[1],
            //         'plan_id' => $row[2],
            //         'billing_date' => $row[3],
            //         'add_user_fee'=> $row[4],
            //         'add_property_fee' => $row[5]
            //     ]);
            MtRailwayCompany::create([
                'company_cd' => $row[0],
                'company_name' => $row[2],
                'company_name_k' => $row[3],
                'company_name_r' => $row[5],
            ]);
            
        }
        return 'Done';
    }
}
