<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Models\Admin;
use App\Models\NotPaymentUser;
use App\Models\Accounts;
use App\Models\BillingUser;
use Illuminate\Support\Arr;
use App\Actions\PlansIncrease;


class HomeController extends Controller
{
    public function index(Request $request, PlansIncrease $plan_increase){
        $admin = Admin::find($request->session()->get('LoggedUser'));
        $notpaymentuser30 = Accounts::join('not_payment_user', 'accounts.id', '=', 'not_payment_user.account_id')
                                    ->where('accounts.plans', 1)
                                    ->whereDate('not_payment_user.start_date', '<=', now()->subDays(-30)->endOfDay())
                                    ->whereDate('not_payment_user.end_date', '>=', now()->subDays(-30)->endofDay())
                                    // ->orderBy('accounts.id','asc')
                                    ->count();
        $notpaymentuser60 = Accounts::join('not_payment_user', 'accounts.id', '=', 'not_payment_user.account_id')
                                    ->where('accounts.plans', 1)
                                    ->whereDate('not_payment_user.start_date', '<=', now()->subDays(-60)->endOfDay())
                                    ->whereDate('not_payment_user.end_date', '>=', now()->subDays(-60)->endofDay())
                                    // ->orderBy('accounts.id','asc')
                                    ->count();
        $notpaymentuser90 = Accounts::join('not_payment_user', 'accounts.id', '=', 'not_payment_user.account_id')
                                    ->where('accounts.plans', 1)
                                    ->whereDate('not_payment_user.start_date', '<=', now()->subDays(-90)->endOfDay())
                                    ->whereDate('not_payment_user.end_date', '>=', now()->subDays(-90)->endofDay())
                                    // ->orderBy('accounts.id','asc')
                                    ->count();
        $resultstarter = $notpaymentuser30 + $notpaymentuser60 + $notpaymentuser90;
        //basic
        $notpaymentuserbasic30 = Accounts::join('not_payment_user', 'accounts.id', '=', 'not_payment_user.account_id')
                                    ->where('accounts.plans', 2)
                                    ->whereDate('not_payment_user.start_date', '<=', now()->subDays(-30)->endOfDay())
                                    ->whereDate('not_payment_user.end_date', '>=', now()->subDays(-30)->endofDay())
                                    // ->orderBy('accounts.id','asc')
                                    ->count();
        $notpaymentuserbasic60 = Accounts::join('not_payment_user', 'accounts.id', '=', 'not_payment_user.account_id')
                                    ->where('accounts.plans', 2)
                                    ->whereDate('not_payment_user.start_date', '<=', now()->subDays(-60)->endOfDay())
                                    ->whereDate('not_payment_user.end_date', '>=', now()->subDays(-60)->endofDay())
                                    // ->orderBy('accounts.id','asc')
                                    ->count();
        $notpaymentuserbasic90 = Accounts::join('not_payment_user', 'accounts.id', '=', 'not_payment_user.account_id')
                                    ->where('accounts.plans', 2)
                                    ->whereDate('not_payment_user.start_date', '<=', now()->subDays(-90)->endOfDay())
                                    ->whereDate('not_payment_user.end_date', '>=', now()->subDays(-90)->endofDay())
                                    // ->orderBy('accounts.id','asc')
                                    ->count();
        $resultbasic = $notpaymentuserbasic30 + $notpaymentuserbasic60 + $notpaymentuserbasic90;

        //enterprise
        $notpaymentuserenterprise30 = Accounts::join('not_payment_user', 'accounts.id', '=', 'not_payment_user.account_id')
                                    ->where('accounts.plans', 3)
                                    ->whereDate('not_payment_user.start_date', '<=', now()->subDays(-30)->endOfDay())
                                    ->whereDate('not_payment_user.end_date', '>=', now()->subDays(-30)->endofDay())
                                    // ->orderBy('accounts.id','asc')
                                    ->count();
        $notpaymentuserenterprise60 = Accounts::join('not_payment_user', 'accounts.id', '=', 'not_payment_user.account_id')
                                    ->where('accounts.plans', 3)
                                    ->whereDate('not_payment_user.start_date', '<=', now()->subDays(-60)->endOfDay())
                                    ->whereDate('not_payment_user.end_date', '>=', now()->subDays(-60)->endofDay())
                                    // ->orderBy('accounts.id','asc')
                                    ->count();
        $notpaymentuserenterprise90 = Accounts::join('not_payment_user', 'accounts.id', '=', 'not_payment_user.account_id')
                                    ->where('accounts.plans', 3)
                                    ->whereDate('not_payment_user.start_date', '<=', now()->subDays(-90)->endOfDay())
                                    ->whereDate('not_payment_user.end_date', '>=', now()->subDays(-90)->endofDay())
                                    // ->orderBy('accounts.id','asc')
                                    ->count();
        $resultenterprise = $notpaymentuserenterprise30 + $notpaymentuserenterprise60 + $notpaymentuserenterprise90;

        $total = $resultbasic + $resultstarter + $resultenterprise;
        $total1month = $notpaymentuser30 + $notpaymentuserbasic30 + $notpaymentuserenterprise30;
        $total2month = $notpaymentuser60 + $notpaymentuserbasic60 + $notpaymentuserenterprise60;
        $total3month = $notpaymentuser90 + $notpaymentuserbasic90 + $notpaymentuserenterprise90;

        $plans = Accounts::where('plans', 1)->get();

        $ranking = Accounts::query()
        // ->leftjoin('not_payment_user', 'accounts.id', '=', 'not_payment_user.account_id')
        ->select(
            'accounts.id',
            'accounts.company_name',
            'accounts.plans',
            'not_payment_user.amount',

            DB::raw("count(accounts.plans = not_payment_user.amount) as total_amount")
        )
        ->leftjoin('not_payment_user', 'accounts.id', '=', 'not_payment_user.account_id')
        ->groupBy([
            'not_payment_user.account_id',
            'accounts.id',
            'not_payment_user.amount',
        ])->orderBy('not_payment_user.amount', 'DESC')
        ->limit(20)
        ->get();
        // return response()->json($ranking);

        $plan_increase = $plan_increase->getPlansIncrease();

        if($admin == null){
            return redirect(route('admin.login'));
        }else{
            return view('admin.home',[
                'starter30' => $notpaymentuser30,
                'starter60' => $notpaymentuser60,
                'starter90' => $notpaymentuser90,
                'basic30' => $notpaymentuserbasic30,
                'basic60' => $notpaymentuserbasic60,
                'basic90' => $notpaymentuserbasic90,
                'enterprise30' => $notpaymentuserenterprise30,
                'enterprise60' => $notpaymentuserenterprise60,
                'enterprise90' => $notpaymentuserenterprise90,
                'starter' => $resultstarter,
                'basic' => $resultbasic,
                'enterprise' => $resultenterprise,
                'total' => $total,
                'total1month' => $total1month,
                'total2month' => $total2month,
                'total3month' => $total3month,
                'rank' => $ranking,
                'clean_trial' => $plan_increase,
            ]);
        }

    }


}
