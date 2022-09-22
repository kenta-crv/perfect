<?php

namespace App\Http\Controllers\Store;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SettingScrapping;
use App\Models\ScrapingTarget;
use Illuminate\Support\Facades\Hash;
use App\Models\Accounts;
use App\Models\MailSendingListHeadquarter;

class DistributionSiteController extends Controller
{
    //
    public function index(){
        $user = session()->get('LoggedUser');
        $store_id = session()->get('StoreId');
        $sites = ScrapingTarget::where('account_id', $user)->pluck('site_id')->all();
        
        // if($user == null){
        //     return redirect(route('storeAdmin.index'));
        // }else if($store_id == 1){
        //     return redirect(route('storeAdmin.home'));
        // }
        // else{
            return view('store.distributionSite.index',[
                'sites' => $sites,
            ]);
        // }

    }

    public function informationSetting(){
        $store_id = session()->get('StoreId');
        if($store_id == 1){
            return redirect(route('storeAdmin.home'));
        }
        


        $user = session()->get('LoggedUser');
        $distribution = config('const.distributions');
        $scraping_id = SettingScrapping::
            //  join('setting_scraping_target as sst', 'setting_scraping_id.account_id', 'sst.account_id')
             join('accounts as a', 'setting_scraping_id.account_id', 'a.id')
             ->where('a.id', session()->get('LoggedUser'))
            //  ->where('sst.site_id', 'setting_scraping_id.site_id')
            //  ->select('sst.site_id as sites_id' )
            //  ->select( 'setting_scraping_id.site_id as scraping_id')

            ->get();
        
            // return response()->json($scraping_id);
        $item_data = [];
        foreach($distribution as $key => $item){
            foreach($scraping_id as  $item_scraping){
                if($item_scraping['site_id'] == $key){
                    $item_data[$item] = $item_scraping;
                }else if(!isset($item_data[$item])){
                    $item_data[$item] = null;
                }
            }
        }
        
        // return response()->json($item_data);
       
        $sites = ScrapingTarget::where('account_id', $user)->pluck('site_id')->all();
        $accounts2 = ScrapingTarget::where('account_id', $user)->get();
        
        $group_id = Accounts::find($user)->group_id;
        $accounts = Accounts::where('group_id', $group_id)->get();
        $user = Accounts::join('setting_scraping_id', 'accounts.id', 'setting_scraping_id.account_id')
        ->where('setting_scraping_id.account_id', $user)
        ->select('accounts.first_name')
        ->get('accounts.first_name');
        // dd($accounts2);
        return view('store.distributionSite.informationSetting',[
            'sites' => $sites,
            'accounts2' => $accounts2,
            'accounts' => $accounts,
            'user' => $user,
            'selected' => $scraping_id,
            'distributions' => $item_data,
        ]);
    
        
    }


    public function create(){

        return view('store.distributionSite.create');
    }

    public function rules($input, $data){
        $validate = $data;
        return $input->validate($validate);
    }


    public function createsite(Request $request){
        $data  = config('validation.validate.distributions');
        $rules = $this->rules($request, $data);

        if($rules){
            SettingScrapping::create($request->all());
            return redirect()->back()->with('success', 'Successfully Added');

        }
        // return $rules;

    }

    public function createScraping(Request $request){
        $account_id = $request->account_id;
        $scraping_target = ScrapingTarget::where('account_id', $account_id);

        $scraping_target->delete();

            foreach(request('targetSite') as $key => $value){
                ScrapingTarget::create([
                    'site_id' => $key,
                    'account_id' => $request->account_id
                ]);
            }

            $user = Accounts::find($request->session()->get('LoggedUser'));
             if($user->store_id != 1){
                return redirect()->back();
             }else{
                return redirect()->to('store/setting/distribution');
            }
    }

    public function editScraping(Request $request){

       $update =  SettingScrapping::find($request->id)->update($request->all());

        return response()->json($update);
    }

    public function setting(){
        //$group_id = session()->get('group_id');
        $account_id = session()->get('LoggedUser');
        $store_id = session()->get('StoreId');
        $group_id = Accounts::find($account_id)->group_id;
        // dd($group_id);
        // $accounts = MailSendingListHeadquarter::where('group_id', $group_id)
        //     ->get();
        $accounts = Accounts::where('group_id', $group_id)
        ->where('store_id', '=', 1)
        ->get();

        $accounts_store_id = Accounts::where('store_id', '=', 0)->get();
        

        // return response()->json($accounts_store_id);


        $accounts2 = ScrapingTarget::where('account_id', $account_id)->get();
        // $mainAccounts = MailSendingListHeadquarter::where('group_id', $group_id)->get();
        $mainAccounts = Accounts::where('group_id', $group_id)->get();

        // return response()->json($accounts2);

        // if($account_id == null){
        //     return redirect(route('storeAdmin.index'));
        // }else{
        //     return view('store.distributionSite.setting',[
        //         'accounts' => $accounts,
        //         'accounts2' => $accounts2,
        //         'mainAccounts' => $mainAccounts,
        //     ]);
        // }
        
            // dd($store_id);
        if($store_id == 1){
            return view('store.distributionSite.setting',[
                'accounts' => $accounts,
                'accounts2' => $accounts2,
                'mainAccounts' => $mainAccounts,
            ]);
        }
        if($store_id == 0){
            return view('store.distributionSite.setting2',[
                'accounts' => $accounts_store_id,
                'accounts2' => $accounts2,
                'mainAccounts' => $mainAccounts,
            ]);
        }

    }

    public function crateSetting(Request $request){
        $user = session()->get('LoggedUser');

        $input = $request->all();
        $input['account_id'] = $user;
        SettingScrapping::create($input);
    }

}
