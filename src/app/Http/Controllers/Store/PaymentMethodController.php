<?php

namespace App\Http\Controllers\Store;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Accounts;

class PaymentMethodController extends Controller
{
    //registration
    public function index(Request $request){

        $user = Accounts::find($request->session()->get('LoggedUser'));
        if($user == null){
            return redirect(route('storeAdmin.index'));
        }else{
            return view('store.paymentMethod.index');
        }
    }

    //Change payment method to credit card
    public function credit(Request $request){
        $user = Accounts::find($request->session()->get('LoggedUser'));
        if($user == null){
            return redirect(route('storeAdmin.index'));
        }
        else{
            return view('store.paymentMethod.credit');
        }

    }

    //The payment method has been changed to credit card.
    public function creditComplete(Request $request){

        $user = Accounts::find($request->session()->get('LoggedUser'));
        if($user == null){
            return redirect(route('storeAdmin.index'));
        }
        else{
            return view('store.paymentMethod.creditComplete');
        }

    }

    //Change payment method to debit card
    public function debit(Request $request){
        $user = Accounts::find($request->session()->get('LoggedUser'));
        if($user == null){
            return redirect(route('storeAdmin.index'));
        }
        else{
            return view('store.paymentMethod.debit');
        }

    }
    //口座振替への変更を申込む button on Credit page
    public function debitSuccess(Request $request){
        $accounts = Accounts::find($request->session()->get('LoggedUser'));
        if($accounts == null){
            return redirect(route('storeAdmin.index'));
        }
        else{
            $accounts->payment_method = 0;
            $accounts->save();

            return redirect('/store/contractBilling');
        }
    }

}
