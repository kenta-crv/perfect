<?php

namespace App\Http\Controllers\Store;

use App\Http\Controllers\Controller;
// use App\Http\Controllers\Store\PlanSettingsController;
use Illuminate\Http\Request;
use App\Models\Accounts;
class PlanSettingsController extends Controller
{
    //
    public function index(Request $request){
        $user = Accounts::find($request->session()->get('LoggedUser'));
        if($user == null){
            return redirect(route('storeAdmin.index'));
        }else{
            return view('store.robore.planSettings.index', [
                'plan_id' => $user->plans
            ]);
        }

    }

    public function updatePlan(Request $request){
        $user_id = $request->session()->get('LoggedUser');
        $updatedPlan = Accounts::find(session()->get('LoggedUser'))->plans;
        $pl = Accounts::find($updatedPlan);
        $plan = $request->plans;
            Accounts::find($user_id)->update([
            'plans' => $plan
        ]);
        return redirect()->route('storeAdmin.setting.plans');
    }
}
