<?php

namespace App\Http\Controllers\Api\Flask;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\Models\Accounts;
use Illuminate\Support\Facades\Log;

class FlaskController extends Controller
{
    public function searchScraping(Request $request)
    {

        $site_name = $request->site;

        $template_request = config('const.sample_requests2')[$site_name];

        // if(in_array($site_name, ['tokyu', 'sumitomo', 'mitsui', 'atbb', 'itandibb'])){
            $template_request = json_decode($request['search_parameters'], true);
        // }

        if(isset($request->first_ten) && $request->first_ten == true){
            $template_request['first_ten'] = true;
        }

        if(isset($request->user_id)){
            $site_id = array_search($site_name, array_keys(config('const.sample_requests2')));
            $user_account = Accounts::find($request->user_id)->scraping_id->where('site_id', $site_id)->first();
            if($user_account != null){
                $template_request['user_name'] = $user_account->login_id;
                $template_request['user_pass'] = $user_account->password;
            }
        }

        $is_production = env('APP_ENV') === 'production' ? true : false;
        $response = null;

        // try{
        set_time_limit(3000);

        // $response = Http::post($is_production ? 'http://10.0.2.43:80/api/'. $site_name .'/search_property' :'http://localhost:8080/api/'. $site_name .'/search_property', $template_request);
        $response = Http::post($is_production ? 'http://127.0.0.1:8080/api/'. $site_name .'/search_property' :'http://localhost:8080/api/'. $site_name .'/search_property', $template_request);
        // }catch(\Illuminate\Http\Client\ConnectionException $e){
        //     return ['status' => 500];
        // }

        if($response->failed() || !$response ){
            return ['status' => 500];
        }

        // session([
        //     'ajax_result_properties1' => array_merge(Session::get('ajax_result_properties') ?? [])
        //     // 'ajax_result_properties1' => array_merge($request->session()->get('ajax_result_properties') ?? [], array_merge($response->json()['payload']))
        // ]);

        return $response->json();
    }

    public function getPtable(Request $request)
    {

        $site_name = $request->site;

        $template_request = config('const.sample_requests2')[$site_name];

        if(in_array($site_name, ['tokyu', 'mitsui', 'itandibb'])){
            $template_request = json_decode($request['search_parameters'], true);
        }

        if(isset($request->first_ten) && $request->first_ten == true){
            $template_request['first_ten'] = true;
        }

        if(isset($request->user_id)){
            $site_id = array_search($site_name, array_keys(config('const.sample_requests2')));
            $user_account = Accounts::find($request->user_id)->scraping_id->where('site_id', $site_id)->first();
            if($user_account != null){
                $template_request['user_name'] = $user_account->login_id;
                $template_request['user_pass'] = $user_account->password;
            }
        }

        // Make ID
        $template_request['browser_id'] = Str::random(16);

        $is_production = env('APP_ENV') === 'production' ? true : false;
        $response = null;
        // try{
        set_time_limit(3000);
        // $response = Http::post($is_production ? 'http://10.0.2.43:80/api/'. $site_name .'/get_ptable' :'http://localhost:8080/api/'. $site_name .'/get_ptable', $template_request);
        $response = Http::post($is_production ? 'http://127.0.0.1:8080/api/'. $site_name .'/get_ptable' :'http://localhost:8080/api/'. $site_name .'/get_ptable', $template_request);
        // }catch(\Illuminate\Http\Client\ConnectionException $e){
        //     return ['status' => 500];
        // }

        if($response->failed() || !$response ){
            return ['status' => 500];
        }

        // session([
        //     'ajax_result_properties1' => array_merge(Session::get('ajax_result_properties') ?? [])
        //     // 'ajax_result_properties1' => array_merge($request->session()->get('ajax_result_properties') ?? [], array_merge($response->json()['payload']))
        // ]);

        return $response->json();
    }

    public function getBatch(Request $request)
    {
        $site_name = $request->site;

        // $template_request = config('const.sample_requests2')[$site_name];

        // if(in_array($site_name, ['tokyu'])){
        $template_request = json_decode($request['search_parameters'], true);
        // }

        $is_production = env('APP_ENV') === 'production' ? true : false;
        $response = null;

        // try{
        set_time_limit(3000);
        // $response = Http::post($is_production ? 'http://10.0.2.43:80/api/'. $site_name .'/get_batch' :'http://localhost:8080/api/'. $site_name .'/get_batch', $template_request);
        $response = Http::post($is_production ? 'http://127.0.0.1:8080/api/'. $site_name .'/get_batch' :'http://localhost:8080/api/'. $site_name .'/get_batch', $template_request);
        // }catch(\Illuminate\Http\Client\ConnectionException $e){
        //     return ['status' => 500];
        // }

        if($response->failed() || !$response ){
            return ['status' => 500];
        }

        // session([
        //     'ajax_result_properties1' => array_merge(Session::get('ajax_result_properties') ?? [])
        //     // 'ajax_result_properties1' => array_merge($request->session()->get('ajax_result_properties') ?? [], array_merge($response->json()['payload']))
        // ]);

        return $response->json();
    }
}
