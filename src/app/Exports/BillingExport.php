<?php

namespace App\Exports;

use App\Models\BillingUser;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class BillingExport implements FromView, ShouldAutoSize
// WithMapping
{

    use Exportable;

    public function view() : View  //query()
    {
        return view('store.contractbilling.billingCommand', [
            'contractBilling' => BillingUser::all()
        ]);
    }
    // public function map() : array
    // {

    // }
}
