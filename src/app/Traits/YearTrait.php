<?php
namespace App\Traits;
use Carbon\Carbon;
trait YearTrait {

    public function AddYears($years_added){
        $current_year = (int)Carbon::now()->format('Y');
        $added_counter = $current_year + $years_added;
        $years_result = [];

        for($i = $current_year; $i <= $added_counter; $i++){
            $years_result[] = $i;
        }
        return $years_result;

    }
}
