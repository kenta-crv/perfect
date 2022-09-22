<?php

namespace App\Http\Controllers\Store;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CreditCard;
use App\Models\Accounts;
use Mail;
use App\Mail\SendMail;
class CreditCardController extends Controller
{
    public function index(Request $request){
        $user = Accounts::find($request->session()->get('LoggedUser'));
        if($user == null){
            return redirect(route('storeAdmin.index'));
        }else{
            return view('store.creditcard.index');
        }

    }

    public function list(Request $request){
        $credit = CreditCard::get();
        $user = Accounts::find($request->session()->get('LoggedUser'));
        if($user == null){
            return redirect(route('storeAdmin.index'));
        }else{
            return view('store.creditcard.list',[
                'credit' => $credit,
            ]);
        }

    }
    public function registercomplete(Request $request){
        $user = Accounts::find($request->session()->get('LoggedUser'));
        if($user == null){
            return redirect(route('storeAdmin.index'));
        }else{
            return view('store.creditcard.registerComplete');
        }

    }
    public function changecomplete(Request $request){
        $user = Accounts::find($request->session()->get('LoggedUser'));
        if($user == null){
            return redirect(route('storeAdmin.index'));
        }else{
            return view('store.creditcard.changeComplete');
        }

    }
    // public function registercomplete(Request $request){
    //     $user = Accounts::find($request->session()->get('LoggedUser'));
    //     if($user == null){
    //         return redirect(route('storeAdmin.index'));
    //     }else{
    //         return view('store.creditcard.registerComplete');
    //     }

    // }
    // public function changecomplete(Request $request){
    //     $user = Accounts::find($request->session()->get('LoggedUser'));
    //     if($user == null){
    //         return redirect(route('storeAdmin.index'));
    //     }else{
    //         return view('store.creditcard.changeComplete');
    //     }

    // }

    public function change(Request $request){
        $user = Accounts::find($request->session()->get('LoggedUser'));
        if($user == null){
            return redirect(route('storeAdmin.index'));
        }else{
            return view('store.creditcard.change');
        }

    }

    public function insertCredit(Request $request){
        $first_name = session()->get('first_name');
        $last_name = session()->get('last_name');
        $company_name = session()->get('company_name');
        $email = session()->get('email');
        // dd($email);

        $this->validate($request, [
            'card_number'    => 'required',
            'card_holder' => 'required',
            'credit_month' => 'required',
            'credit_year' => 'required',
            'security_code' => 'required',
        ],
        [
            'card_number.required'    => '要',
            'card_holder.required'    => '要',
            'credit_month.required'    => '要',
            'credit_year.required'    => '要',
            'security_code.required'    => '要',

        ]);
        
        $user = Accounts::find($request->session()->get('LoggedUser'));
        if($user == null){
            if($request->all() != null){
                $credits = CreditCard::where('name', $request['card_holder'])->get();
                foreach($credits as $credit){
                    if(! decrypt($credit->number) == $request['card_number']){
                        CreditCard::create([
                            'number' => encrypt($request['card_number']),
                            'name' => $request['card_holder'],
                            'expire_month' => $request['credit_month'],
                            'expire_year' => $request['credit_year'],
                            'security_code' => encrypt($request['security_code']),
                        ]);
                    }
                }
                if(route('register.register.success')){
                    $mailData = [
                        'lastname' => $last_name,
                        'firstname' => $first_name,
                        'company' => $company_name,
                    ];
                    Mail::to($email)->send(new SendMail($mailData));
                    return redirect()->route('register.register.success');
                }
                // return redirect()->to('register/success');
                // dump(encrypt($request['card_number']));
            }else{
                return redirect(route('store.creditcard.index'));
            }
        }else{
            $input = $request->all();
        CreditCard::create([
            'number' => encrypt($request['card_number']),
            'name' => $request['card_holder'],
            'expire_month' => $request['credit_month'],
            'expire_year' => $request['credit_year'],
            'security_code' => encrypt($request['security_code']),
        ]);

             return redirect('/store/contractBilling');
        }
    }
    public function testDecrypt(Request $request){
        $user = Accounts::find($request->session()->get('LoggedUser'));
        if($user == null){
            return redirect(route('store.creditcard.index'));
        }else{
            $id = $request->id;
            $decrypt = CreditCard::query()->where('id','=',$id)->first()->number;
            $decrypteded = decrypt($decrypt);
            dd($decrypteded);
        }

    }
}
