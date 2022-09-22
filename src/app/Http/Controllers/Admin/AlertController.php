<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Validation\ValidationException;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Alert;
class AlertController extends Controller
{
    public function index(Request $request){
        $admin = Admin::find($request->session()->get('LoggedUser'));
        if($admin == null){
            return redirect(route('admin.login'));
        }else{
            $alert = Alert::all();
            // dd($alert);
            return view('admin.alert.index',['alert'=>$alert]);
        }

    }
    public function addAlert(Request $request){
        $admin = Admin::find($request->session()->get('LoggedUser'));
        if($admin == null){
            return redirect(route('admin.login'));
        }else{
            return view('admin.alert.indexAdd');
        }

    }
    public function createAlert(Request $request){
        $this->validate($request, [
            'name'    => 'required',
            'rule' => 'required',
            'priority' => 'required',
            // 'flag' => 'required',
        ],
        [
            'name.required'    => '要',
            'rule.required'    => '要',
            'priority.required'    => '要',
            // 'flag.required'    => '要',
        ]);
        $input = $request->all();
        $input['flag'] = $request->has('flag');
        $alert = new Alert();
        $alert->name=$input['name'];
        $alert->rule=$input['rule'];
        $alert->priority=$input['priority'];

        if(($request->has('trial_flag')) || ($request->has('starter_flag')) || ($request->has('basic_flag')) || ($request->has('enterprise_flag')) ) {
            if($request->has('trial_flag')){
                $alert->trial_flag= 1;
                }else{
                    $alert->trial_flag= 0;
                }
                if($request->has('starter_flag')){
                    $alert->starter_flag= 1;
                }else{
                    $alert->starter_flag= 0;
                }
                if($request->has('basic_flag')){
                    $alert->basic_flag= 1;
                }else{
                    $alert->basic_flag= 0;
                }
                if($request->has('enterprise_flag')){
                    $alert->enterprise_flag= 1;
                }
                else{
                    $alert->enterprise_flag= 0;
            }

                $alert->save();
            return redirect()->route('admin.alert.index');
            } else{
                throw ValidationException::withMessages(['flag' => '要']);
                return redirect()->back();
            }

    }

    public function edit(Request $request){
        $alert = Alert::find($request->id);
        $adminChecked = Admin::find($request->session()->get('LoggedUser'));
        // dd($alert);
        if($adminChecked == null){
            return redirect(route('admin.login'));
        }else{
            return view('admin.alert.indexEdit',['edit' => $alert]);
        }
    }
    public function update(Request $request){
        $update_alert = Alert::find($request->alert_id);
        $adminChecked = Admin::find($request->session()->get('LoggedUser'));
        if($adminChecked == null){
            return redirect(route('admin.login'));
        }else{
            // dd($update_alert);
            $update_alert->name = $request->input('name');
            $update_alert->rule = $request->input('rule');
            $update_alert->priority = $request->input('priority');
            if($request->has('trial_flag')){
                $update_alert->trial_flag= 1;
            }else{
                $update_alert->trial_flag= 0;
            }
            if($request->has('starter_flag')){
                $update_alert->starter_flag= 1;
            }else{
                $update_alert->starter_flag= 0;
            }
            if($request->has('basic_flag')){
                $update_alert->basic_flag= 1;
            }else{
                $update_alert->basic_flag= 0;
            }
            if($request->has('enterprise_flag')){
                $update_alert->enterprise_flag= 1;
            }else{
                $update_alert->enterprise_flag= 0;
            }
            $update_alert->save();
            return redirect()->route('admin.alert.index');
        }
    }
}
