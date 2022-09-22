<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Accounts;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\Admin;
use App\Models\AccountState;

class StoreController extends Controller
{
    //
    public function index(Request $request){
        // $accounts = Accounts::all();
        $admin = Admin::find($request->session()->get('LoggedUser'));
        if($admin == null){
            return redirect(route('admin.login'));
        }else{
            return view('admin.store.index',[
                'accounts' => DB::table('accounts')->limit(5)->paginate(10)
            ]);
        }

    }


    public function insertStore(Request $request){
        $accounts = Accounts::all();
        $store_checked = [];
        foreach(request('store_checked') as $key => $store){
            $store_checked[] = $store;
        }

        // dd($store_checked);

       return view('admin.notification.new',[
        'stores' => $store_checked,
        'key' => $key,
        'accounts' => $accounts
       ]);
    }

    public function detail(Request $request, $id){
        $admin = Admin::find($request->session()->get('LoggedUser'));
        if($admin == null){
            return redirect(route('admin.login'));
        }else{

            $storeDetails = Accounts::where('id', '=', $id)
            ->first();

            $dormant = AccountState::where('account_id', '=', $storeDetails->id)->first();
            //  dd($dormant);
            if($dormant){
                $state = $dormant->state;

                 return view('admin.store.detail', compact('storeDetails','state'));
            }else{
                 return view('admin.store.detail', compact('storeDetails'));
            }


            // dd($state);


        }

    }

    public function dormantConfirm(){
        return view('store.mypage.dormantConfirm');
    }

    public function dormantComplete(){
        $account = AccountState::create([
            'account_id' => session()->get('LoggedStoreUser'),
            'state' => 1,
            'dormant_date' => date('Y-m-d'),
        ]);
        return view('store.mypage.dormantComplete');
    }


    public function restartingAdminConfirm(Request $request,$id){
        // dd($id);
        $admin = Admin::find($request->session()->get('LoggedUser'));
        if($admin == null){
            return redirect(route('admin.login'));
        }else{
            // $storeDetails = Accounts::where('id', '=', $id)
            // ->where('store_id', '=', '1')
            // ->first();
            return view('admin.mypage.restartingAdminConfirm', compact('id'));
        }
    }

    public function restartingAdminComplete(Request $request, $id){
        $admin = Admin::find($request->session()->get('LoggedUser'));
        if($admin == null){
            return redirect(route('admin.login'));
        }else{
            $restart = AccountState::where('account_id', '=', $id);
            if($restart){
                $restart->delete();
                return view('admin.mypage.restartingAdminComplete');
            }else{
                return redirect('admin.store.detail');
            }
            return view('admin.mypage.restartingAdminComplete');
        }
    }




    public function searchAccount(Request $request){
        // dd($request->plans);
        // Init Query
        // dd($request->all());
        $search_plans = [];
        for($i=0;$i<4;$i++){
            if(!isset($request->plans[$i])){
                $search_plans[$i] = '';
            }else{
                $search_plans[$i] = true;
            }
        }
        // $plans = array_merge([0=>'',1=>'',2=>'',3=>''], isset($request->plans) ? $request->plans : []);

        $result = Accounts::query();
        // Date From Paginate
        if ($request->from_date) {
            $result = $result
            ->where('created_at', '>=', $request->from_date);
        }

        if($request->to_date){
            $result = $result
            ->where('created_at', '<=', $request->to_date);
        }

        if ($request->from_updated_at) {
            $result = $result
            ->where('updated_at', '>=', $request->from_updated_at);
        }

        if($request->to_updated_at){
            $result = $result
            ->where('updated_at', '<=', $request->to_updated_at);
        }

        if ($request->from_access_date) {

            $result = $result
            ->where('updated_at', '>=', $request->from_access_date);
        }

        if($request->to_access_date){
            $result = $result
            ->where('updated_at', '<=', $request->to_access_date);
        }





        if($request->account_id){
            // return dd($request->account_id);
            // $result = Accounts::where('id', 'LIKE', '%'.$request->account_id.'%')->get();
            $result = $result->where('id', 'like binary', '%'.$request->account_id.'%');//->get();
            // return view('admin.store.result', [
            //     'searched' => $result
            // ]);
        }

        if($request->account_license){
            $result = $result->where('license', 'like binary', '%'.$request->account_license.'%');//->get();
            // return view('admin.store.result', [
            //     'searched' => $result
            // ]);
        }

        if($request->account_company){
            $result = $result->where('company_name', 'like binary', '%'.$request->account_company.'%');//->get();
            // return view('admin.store.result', [
            //     'searched' => $result
            // ]);
        }

        if($request->account_tel){
            $result = $result->where('tel', 'like binary', '%'.$request->account_tel.'%');//->get();
            // return view('admin.store.result', [
            //     'searched' => $result
            // ]);
        }

        if($request->account_address){
            $result = $result->where('address', 'like binary', '%'.$request->account_address.'%');//->limit($request->select_limit)->get();
            // return view('admin.store.result', [
            //     'searched' => $result
            // ]);
        }

        if($request->plans){
            $result = $result->whereIn('plans', $request->plans ?? []);
            // return view('admin.store.result', [
            //     'searched' => $result
            // ]);
        }

        // Select Limit
        $select_limit = $request->select_limit ?? 15;
        $search_params = $request->all();
        $search_params['updated_at'] = $request->updated_at ? Carbon::parse($request->updated_at)->format('Y年m月d日') : Carbon::now()->format('Y年m月d日');

        return view('admin.store.result', [
            'accounts' => $result->paginate($request->select_limit),
            'search' => $search_params,
            'plans' => $search_plans,
            'select_limit' => $select_limit
        ]);

    }

    public function selectBox(Request $request){
        // $result = Accounts::all();
        // $result = $result->get()->limit($request->select_limit);
        $posts = Accounts::limit($request->select_limit)->get();

        return response()->json($posts);

    }

    // public function getAccounts(){

    //     // $data_accounts = DB::table('accounts')->limit(5);
    //     // return response()->json($data_accounts);
    // }


}
