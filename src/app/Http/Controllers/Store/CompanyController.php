<?php

namespace App\Http\Controllers\Store;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Accounts;
use Illuminate\Support\Facades\Session;
use App\Helpers\Helper;
use Illuminate\Support\Facades\Http;
class CompanyController extends Controller
{

    public function index(){
        return view('store.company.index');
    }

    public function profile(){
        return view('store.company.profile');
    }

    public function details(Request $request, $id){
        $user = Accounts::find($request->session()->get('LoggedUser'));
        // $result = $request->session()->get('ajax_result');
        // $ajax_result_properties = $request->session()->get('ajax_result_properties');
        $ajax_result_properties = $request->session()->get('ajax_result_properties');
        // $key = $request->session()->get('ajax_result_index');

        $property_id = $id-1;
        $property_result = $ajax_result_properties[$property_id];
        $helper = new Helper;
        $site_name = $helper->getPropertySiteName($property_result);
        $user_account = $helper->getUserSiteAccount($site_name);
        $is_production = env('APP_ENV') === 'production' ? true : false;
        $response = null;
        $template_request = [
            "detail_link" => $property_result['detail_link'],
            'user_name' => $user_account['user_name'],
            'user_pass' => $user_account['user_pass']
        ];
        // try{
        set_time_limit(3000);
        // $response = Http::post($is_production ? 'http://10.0.2.43:80/api/'. $site_name .'/get_batch' :'http://localhost:8080/api/'. $site_name .'/get_batch', $template_request);
        $response = Http::post($is_production ? 'http://127.0.0.1:8080/api/'. $site_name .'/get_detail' :'http://localhost:8080/api/'. $site_name .'/get_detail', $template_request);
        // }catch(\Illuminate\Http\Client\ConnectionException $e){
        //     return ['status' => 500];
        // }

        if($response->successful()){
            $property_result = array_merge($property_result, $response->json());
        }

        // session([
        //     'ajax_result_properties1' => array_merge(Session::get('ajax_result_properties') ?? [])
        //     // 'ajax_result_properties1' => array_merge($request->session()->get('ajax_result_properties') ?? [], array_merge($response->json()['payload']))
        // ]);

        // dd($property_result);
        if($user == null){
            return redirect(route('storeAdmin.index'));
        }else{
            return view('store.company.details',[
                'properties' => $property_result
            ]);
        }

    }

    public function inquiry(){
        return view('store.company.inquiry');
    }

    public function top(){
        return view('store.company.top');
    }
}
