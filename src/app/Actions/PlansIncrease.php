<?php

namespace App\Actions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Models\Accounts;
use App\Models\BillingUser;
use Carbon\Carbon;

class PlansIncrease {

    public function getJoinPlans(){
        $data = BillingUser::select(
            'plan_id',
            'a.id',
            'status',
            'plans',
            'add_user_fee',
            'billing_date',
            DB::Raw('count(plan_id) as stores'),
            DB::Raw('date_format(billing_date, "%m") as month'),
            DB::Raw('sum(add_user_fee) as user_fee'),
            DB::Raw('sum(add_property_fee) as property_fee'),
            DB::Raw('add_property_fee + add_user_fee as total_fee'),

        )
        ->join('accounts as a', 'billing_user.account_id', '=', 'a.id')
        ->groupBy('plan_id')
        ->groupBy('month')
        ->get();

        return $data;
    }

    public function getPlansIncrease(){
        $accounts = Accounts::get();
        $date_now = Carbon::now();
        $prev_month = Carbon::
            createFromFormat('Y-m-d H:i:s', $date_now->subMonth())
            ->format('m');

        $plans_data = [];
        $counter_data_to_array = [];
        $collection = collect([$this->getJoinPlans()]);

        $accounts_plans = config('const.ACCOUNT_PLANS');

        $index = 0;
        $count = 0;

        foreach ($accounts_plans as $key => $account){
            foreach($collection as $trial){
                $index++;
                if(property_exists($trial, $index)){
                    if($trial[$index]['plan_id'] == $key){
                        $count++;
                            $plans_data[$account] =$trial
                            ->where('plan_id', $count)
                            ->filter(function ($item) use ($prev_month){
                                return $item->month >= $prev_month;
                            })->all();
                    }else{
                        $count=0;
                    }
                }else{
                    $count=0;
                }

            }
        }

        foreach($plans_data as $plan_name => $accounts){
            foreach($accounts as $plan){
                if($plan['month'] <= $prev_month){
                    $counter_data_to_array[$plan_name][0] = $plan->attributesToArray();
                }else{
                    $counter_data_to_array[$plan_name][1] = $plan->attributesToArray();

                }
            }
        }

        return $counter_data_to_array;

    }




}
