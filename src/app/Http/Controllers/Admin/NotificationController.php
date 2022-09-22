<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Notifications;
class NotificationController extends Controller
{
    public function index(Request $request){
        $admin = Admin::find($request->session()->get('LoggedUser'));
        $notification = Notifications::all();
        if($admin == null){
            return redirect(route('admin.login'));
        }else{
            return view('admin.notification.index', [
                'notification' => $notification
            ]);
        }
        
    }

    public function informationDetails(Request $request){
        $admin = Admin::find($request->session()->get('LoggedUser'));
        $notification = Notifications::find($request->id);
        if($admin == null){
            return redirect(route('admin.login'));
        }else{
            return view('admin.notification.informationDetails',[
                'notifications' => $notification
            ]);
        }
        
    }

    public function new(Request $request){
        $selected = $request->session()->get('selected');
        // dd($selected);
        if($selected == null){
            return redirect()->back();
        }
        $admin = Admin::find($request->session()->get('LoggedUser'));
        if($admin == null){
            return redirect(route('admin.login'));
        }else{
            return view('admin.notification.new', [
                'company_name'=> $selected,
            ]);
        }
        


        
        
    }

    public function newNotif(Request $request){

        $storesSelected = [];
        $storesSelectedKey = [];
        foreach(request('storesSelect') as $key => $value){
            $storesSelected[] = $value;
            $storesSelectedKey[] = $key;
            
             Notifications::create([
                'target_store' => $storesSelected[$key],
                'flag' => 1,
                'mail_flag' => $request->mail_flag,
                'date_in' => $request->date_in,
                'time_in' => $request->time_in,
                'date_out' => $request->date_out,
                'time_out' => $request->time_out,
                'title' => $request->title,
                'content' => $request->content,
                'date_content' => $request->date_content,
            ]);
            
           
           
        }
        return redirect ('/admin/notification/new')->with('status', 'Notice added successfully');
    }

    public function getTargetCompany(Request $request){
        $selected = $request->session()->put('selected', $request->input);
        return response()->json($selected);
    }
}
