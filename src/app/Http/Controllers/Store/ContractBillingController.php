<?php

namespace App\Http\Controllers\Store;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BillingUser;
use App\Models\Accounts;
class ContractBillingController extends Controller
{
    public function index(){
        return view('store.contractbilling.index');
    }

    public function payingBilling(Request $request){
        $user = Accounts::find($request->session()->get('LoggedUser'));
        if($user == null){
            return redirect(route('storeAdmin.index'));
        }else{
            return view('store.contractbilling.payingBilling');
        }

    }

    public function billingInformation(){
        $user = session()->get('LoggedUser');
        $account = Accounts::find($user);
        $billing = BillingUser::where('account_id', $user)->get();
        // $payment_method = $account->payment_method;
        if($user == null){
            return redirect(route('storeAdmin.index'));
        }else{
            return view('store.contractbilling.billingInformation',[
                'bills' => $billing,
                'account' => $account,
                // 'payment_method' => $payment_method,
            ]);
        }
        // return response()->json($billing);

    }

    public function pdf(){
        $user = session()->get('company_name');
        // $user = session()->get('CompanyName');
        $contract_number = session()->get('contract_number');
        // $contract_number = session()->get('ContractNumber');
        $html = $user . $contract_number;
        $mpdf = new \Mpdf\Mpdf();
        $pagecount = $mpdf->setSourceFile('furikomiyoushi.pdf');
        $tplId = $mpdf->importPage($pagecount);
        $mpdf->useTemplate($tplId);
        $mpdf->autoScriptToLang = true;
        $mpdf->autoLangToFont = true;
        $mpdf->SetXY(25, 49);
        $mpdf->WriteHTML('<br/><br/><br/><br/><br/>'. $user);
        if(isset($contract_number[0])){
            $mpdf->SetXY(77, 50);
            $mpdf->WriteHTML('<br/><br/><br/><br/><br/><br><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>'. $contract_number[0]);
        }

        if(isset($contract_number[1])){
            $mpdf->SetXY(81, 50);
            $mpdf->WriteHTML('<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>'. $contract_number[1]);
        }

        if(isset($contract_number[2])){
            $mpdf->SetXY(86, 50);
            $mpdf->WriteHTML('<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>'. $contract_number[2]);
        }

        if(isset($contract_number[3])){
            $mpdf->SetXY(91, 50);
            $mpdf->WriteHTML('<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>'. $contract_number[3]);
        }
        
        if(isset($contract_number[4])){
            $mpdf->SetXY(96, 50);
            $mpdf->WriteHTML('<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>'. $contract_number[4]);
        }
        
        if(isset($contract_number[5])){
            $mpdf->SetXY(102, 50);
            $mpdf->WriteHTML('<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>'. $contract_number[5]);
        }

        if(isset($contract_number[6])){
            $mpdf->SetXY(107, 50);
            $mpdf->WriteHTML('<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>'. $contract_number[6]);
        }
        
        if(isset($contract_number[7])){
            $mpdf->SetXY(112, 50);
            $mpdf->WriteHTML('<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>'. $contract_number[7]);
        }

        if(isset($contract_number[8])){
            $mpdf->SetXY(117, 50);
            $mpdf->WriteHTML('<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>'. $contract_number[8]);
        }
        
        if(isset($contract_number[9])){
            $mpdf->SetXY(122, 50);
            $mpdf->WriteHTML('<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>'. $contract_number[9]);
        }

        if(isset($contract_number[10])){
            $mpdf->SetXY(127, 50);
            $mpdf->WriteHTML('<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>'. $contract_number[10]);
        }

        if(isset($contract_number[11])){
            $mpdf->SetXY(132, 50);
            $mpdf->WriteHTML('<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>'. $contract_number[11]);
        }
        
        if(isset($contract_number[12])){
            $mpdf->SetXY(137, 50);
            $mpdf->WriteHTML('<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>'. $contract_number[12]);
        }

        if(isset($contract_number[13])){
            $mpdf->SetXY(142, 50);
            $mpdf->WriteHTML('<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>'. $contract_number[13]);
        }

        if(isset($contract_number[14])){
            $mpdf->SetXY(147, 50);
            $mpdf->WriteHTML('<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>'. $contract_number[14]);
        }
        $mpdf->Output();
    }
}
