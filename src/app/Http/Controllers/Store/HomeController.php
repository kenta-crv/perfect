<?php

namespace App\Http\Controllers\Store;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\QuizInformation;
use App\Models\Event;
use App\Models\Accounts;
use App\Models\ParticipateHistory;
use App\Models\FirstView;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;
use App\Traits\FlaskApiTrait;
use App\Traits\PaginatorTrait;
use App\Traits\AtbbApiTrait;
use App\Models\Search;
use App\Models\Guide;
use App\Models\Manual;
use App\Models\MtStation;
use App\Models\MtLine;
use App\Models\MtRailwayCompany;
use App\Models\ScrapingTarget;
use App\Models\Unreads;
use Illuminate\Support\Facades\Validator;


use Illuminate\Support\Str;

class HomeController extends Controller
{
    use PaginatorTrait, FlaskApiTrait, AtbbApiTrait;
    public function default(){
        return view('store.home.default');
    }

    public function station(Request $request){
    // dd($request->routes_selected);

    $station_view = [];
    foreach($request->routes_selected as $key => $selected){
        $line = MtLine::where('line_name', 'LIKE', "%{$selected}%")->get();
        // $line = MtLine::where('line_name', 'LIKE', "%JR大船渡線%")->get();
        if(count($line) != 0){
            $stations = MtStation::where('line_cd', $line[0]->line_cd)->get();
            array_push($station_view, view('store.mtgroup.mtStation', [
                'index' => $key,
                'line' => $line[0],
                'stations' => $stations
            ])->render());
        }
    }

    return response([
        'stations' => $station_view,
    ]);
    }

    public function mockSearchList(Request $request){


        // Check If Result Pagination
        $paginator = $this->isPagination($request);

        if($paginator['status'] == true){
            // Check if result is not empty
            if(count($paginator['result']) > 0){

                // Store Property Result
                session([
                    'result_id' => $paginator['id'],
                    'result' => $paginator['result']
                ]);

                // Manually Paginate Properties
                $pagination = $this->getPaginator($request, $paginator['result']);
                $pagination->appends(['id' => $paginator['id']]);

                // Return Pagination View
                $store = Accounts::find($request->session()->get('LoggedUser'));
                return view('store.search.list', [
                    'status' => 0,
                    'properties' => $pagination,
                    'store' => $store
                ]);
            }else{
                // (The search result has expired.)
                return redirect()->route('storeAdmin.search.list')->with('api_message', '検索結果が期限切れとなりました。');
            }
        }


        $properties = @config('mocklist.list');




        // $properties = json_encode($properties);
        // dd($properties);

        $result_id = substr(str_shuffle('1234567890abcdefghijklmnopqrstuvwxyz'), 0, 16);
        session([
            'result_id' => $result_id,
            'result' => $properties
        ]);

        // Debug Only


        // Manually Paginate Properties
        $pagination = $this->getPaginator($request, $properties);
        $pagination->appends(['id' => $result_id]);


        return view('store.search.list', [
            'status' => 0,
            'properties' => $pagination,
        ]);
    }

    public function index(Request $request){
       $user_id = $request->session()->get('LoggedStoreUser');
        $manual = Manual::where('scene', 1)->first();
        $unreads = Unreads::where('user_id', '=', $user_id)->where('read_flag', '=', 0)->count();
        $request->session()->put('unreads', $unreads);
        // dd($unreads);
        if($manual !== null){
            $request->session()->put('file_name', $manual->file_name);
        }
        $store = Accounts::find($request->session()->get('LoggedUser'));

        $manual = Manual::all();

        $target = ScrapingTarget::where('account_id', $request->session()->get('LoggedUser'))->get();

        if(session()->get('LoggedUser')){
            $scraping_accounts = Accounts::find($request->session()->get('LoggedUser'))->scraping_id()->get();
        }

        // $manual = Manual::all();
        $id = $request->session()->get('LoggedUser');
        $search = Search::where('account_id', '=', $id)->get();
        // return response()->json($search);

        if($store == null){
            return redirect(route('storeAdmin.index'));
        }else{

            $guide = Guide::all();

            return view('store.home.index',[
                'store' => $store,
                'guide' => $guide,
                'target' => $target,
                'scraping_accounts' => $scraping_accounts,
                'search_name' => $search
            ]);
        }

    }

    public function instead(Request $request, $id)
    {
        $account = Accounts::find($id);

        if($account){
            if($account->email == $account->email && $account->password == $account->password){
                $request->session()->put('LoggedStoreUser', $account->id);
                $request->session()->put('LoggedUser', $account->id);
                $request->session()->put('group_id', $account->group_id);
                $request->session()->put('LoggedFirstName', $account->first_name);
                $request->session()->put('LoggedLastName', $account->last_name);
                $request->session()->put('CompanyName', $account->company_name);
                $request->session()->put('ContractNumber', $account->contract_number);
                $request->session()->put('StoreId', $account->store_id);
                return redirect('/store');
            }
        }
    }

    public function search(){

        return view('store.search.index');
    }

    public function company(Request $request){
        $companies = [];
        // dd($request->all());
       foreach($request->selected_pref as $key => $prefecs_select){
            // dd($prefecs_select['id']);
            $stations = MtStation::where('pref_cd', $prefecs_select['id'])->groupBy('line_cd')->get();
            $stations1 = [];
            foreach($stations as $station){
                // dd($station);
                $company = DB::table('m_line as ml')
                ->join('mt_railway_company as rc', 'rc.company_cd', '=', 'ml.company_cd')
                ->select(
                  'rc.company_name',
                  'ml.line_name',
                  'ml.company_cd'
                )
                ->where('ml.line_cd', '=', $station->line_cd)
                ->first();
                // $stations1[] = $company;
                     if(array_key_exists((int)$company->company_cd, $stations1)){

                        $line_names = $stations1[(int)$company->company_cd]['line_names'];
                        // dump($company);
                        // dd($line_names);
                        // dd($stations1);
                        $line_names[] = $company->line_name;
                        $stations1[(int)$company->company_cd]['line_names'] = $line_names;
                    }else{

                        $stations1[(int)$company->company_cd] = [
                            'company_name' => $company->company_name,
                            'company_cd' => $company->company_cd,
                            'line_names' => [
                                $company->line_name
                            ]
                        ];
                        // dump('false', $stations1);
                    }
            }
            // dd($stations1);

            // return response()->json($stations1);
            array_push($companies, view('store.mtcompany.mtcompany',[
                'index' => $key,
                'companies' => $stations1
            ])->render());

            return response([
                'companies' => $companies
            ]);
       }
    //    dd($companies);
    }

    // Redirect to Ajax List
    public function ajaxSearch(Request $request)
    {
        // dd(date('Y/m/d', strtotime($request->publishing_date)));
        // return response()->json($request['prefectures']);

        // Refresh Result Data Session

        $request->session()->forget('ajax_result_properties');

        $prefselected = [];
        foreach(request('prefectures') as $key => $value){
            $prefselected[] = $value;
        }

        // return response()->json($prefselected);

        $request->validate([
            'site_enabled' => 'required',
            // 'prefectures' => ['required_without:routes']
            // 'cities' => 'required_without:routes',
            // 'routes' => ['required_without:prefectures'],

        ],
        [
            'site_enabled.required' => '検索対象サイトを選択してください。',
            // 'prefectures.required_without' => '都道府県を選択してください。',
            // 'cities.required_without' => '都市を選択してください。',
            // 'routes.required_without' => '路線選択してください。',
        ]
        );

        if(count($request->prefectures ?? []) == 0 && count($request->routes ?? []) == 0){
            return redirect()->back()->withErrors(['prefectures' => '都道府県を選択するか、ルートを選択してください。', 'routes' => '都道府県を選択するか、ルートを選択してください。']);

        }
        // dd($request->all());

        if($request->isMethod('get')){
            return redirect()->back();
        }

        $legend = [
            'reins' => 'レインズ',
            'atbb' => 'atBB',
            'itandibb' => 'イタンジ',
            'tokyu' => '東急住宅リース',
            'mitsui' => '三井不動産レジデンシャルリース',
            'sumitomo' => '住友不動産'
        ];

        
        $site_count_label = [];
        foreach($request->site_enabled as $site){
            $site_count_label[] = [
                'key' => $site,
                'label' => $legend[$site]
            ];

        }


        $prefs = [];
        if(isset($request->prefectures)){
            foreach($request->prefectures as $pref){
                if($pref){
                    $prefs[] = $pref;
                }
            }
        }


        $cities = [];
        if(isset($request->cities)){
            foreach($request->cities as $city){
                if($city){
                    $cities[] = $city;
                }
            }
        }


        $totalsites = count($request->site_enabled);//total sites enabled
        $userAcc = session()->get('LoggedUser');
        $objectType = @config('const.object_type');
        $leasingMaterial = @config('const.leasing_material');
        $searchData = $request->all();
        $planOfHouse = @config('const.plan_of_house');
        $buildingStructures = @config('const.building_structures');
        $videoData = @config('const.video_data');
        $tradeStyle = @config('const.trade_style');
        $request->session()->put('display_mode', $request->display_mode);


        if(!isset($searchData['prefectures'])){
            $searchData['prefectures'] = $request->routes_choosen;
            // $searchData['prefectures'] = $request->route_prefectures;
        }

        return view('store.search.ajax_list', [
            'siteArray' => json_encode($request->site_enabled),
            'siteParams' => json_encode($request->all()),
            'site_count_label' => $site_count_label,
            // 'sample_request' => json_encode($sample_request),
            'site_enabled' => $request->site_enabled,
            'totalsites' => $totalsites,
            'userAcc'  => $userAcc,
            'object_type' => $objectType,
            'leasing_material' => $leasingMaterial,
            'selectedObjectType' => $request->object_type,
            'selectedPref' => $prefs,
            'searchData'   => $searchData,
            'other_fees'   => $request->other_fees,
            'madori'  => $request->madori,
            'planOfHouse' => $planOfHouse,
            'buildingStructures' => $buildingStructures,
            'selected_bldg_str' => $request->bldg_structure,
            'slct_video_data' => $request->video_data,
            'slct_trade_style' => $request->trade_style,
            'video_data' => $videoData,
            'tradeStyle' => $tradeStyle,
            'selectedCity' => $cities,
            'cities' => $request->cities,
            'city' => $request->city,
            'routes' => $request->routes,
            'stations' => $request->stations,
            'airconditioner_center' => $request->airconditioner_center,
            'from_station' => $request->from_station,
            'display_mode' => $request->display_mode
        ]);
    }

    // Sample Flask API1
    public function submitAjax(Request $request)
    {

        sleep(45);
        // Reins Value for Test Only
        $result = $this->getReinsSampleApi();

        return $result;
    }

    // Sample Flask API2
    public function firstTenResults(Request $request)
    {

        // sleep(20);
        // Reins Value and Count for Test Only
        $result = $this->getReinsSampleApi(10);

        return $result;
    }

     // Sample Flask API3
    public function getTotalCount(Request $request)
    {
        return array_fill(0, count($this->getReinsSampleApi()['payload']), '');;
    }
    // Sample Flask API End

    public function pagination(Request $request)
    {
        if(isset($request->pageNumber) && isset($request->pageSize) ){

            $result_table = $request->session()->get('ajax_result_properties', []);
            $result_count = count($result_table);
            if($result_count < 1){
                return [
                    'result_table' => ['','','','','','','','','','',''],
                    'total_count' => 11
                ];
            }
            return [
                'result_table' => $result_table,
                'total_count' => $result_count
            ];
        }
        return redirect()->route('home');
    }

    // Return Tables
    public function tempResults(Request $request)
    {

        $properties = json_decode($request->payload, true);
        // Object to Array
        $result_table = [];
        $property_length = count($request->session()->get('ajax_result_properties') ?? []);
        foreach($properties as $key => $property){
            // $key + 1 to set first index to 1 instead of 0
            $result_table[] = view('store.search.table', ['key' => ($key + 1) + $property_length, 'property' => $property, 'displays_mode' => $request->session()->get('display_mode')])->render();
        }


        session([
            // 'ajax_result' => $property,
            // 'ajax_result_properties' => $properties,
            // 'ajax_result_index' => $key,
            'ajax_result_properties' => array_merge($request->session()->get('ajax_result_properties') ?? [], array_merge($properties))
        ]);

        return response([
            'tables' => $result_table,
            'count' => count($properties),
        ],200);

        // $request->session()->put('ajax_result', $result_table);

    }


      // Return favorites
      public function favorites(Request $request)
      {

          $properties = json_decode($request->payload, true);
          // Object to Array
          $favorites = [];

          foreach($properties as $key => $property){
              $favorites[] = view('store.search.table', ['key' => $key, 'property' => $property])->render();
          }

          return response([
              'favorites' => $favorites,
          ],200);
      }




    // Temporary Top Page Controller
    public function new_list(Request $request)
    {
        $request->validate([
            'site_enabled' => 'required_without_all',
        ],
        [
            'required_without_all' => '検索対象サイトを選択してください。',
        ]
        );

        // dd($request->all());
        $is_production = env('APP_ENV') === 'production' ? true : false;
        // Check If Result Pagination
        $paginator = $this->isPagination($request);


        //total sites that user choose
        $totalsites = count($request->site_enabled);
        $userAcc = session()->get('LoggedUser');
        // $splitSites = ", ";
        // $allSites = '';
        // $sitevalue = config('const.sites');
        // dd($request->site_enabled);
        // foreach($request->site_enabled as $sites){
        //     if($totalsites > 1)
        //         {
        //             $allSites = $allSites . $sites . $splitSites;
        //         }

        //     else {

        //         $allSites = $allSites . $sites;
        //     }
        //     $totalsites -= 1 ;
        // }
        // dd($allSites);



        if($paginator['status'] == true){
            // Check if result is not empty
            if(count($paginator['result']) > 0){

                // Store Property Result
                session([
                    'result_id' => $paginator['id'],
                    'result' => $paginator['result']
                ]);

                // Manually Paginate Properties
                $pagination = $this->getPaginator($request, $paginator['result']);
                $pagination->appends(['id' => $paginator['id']]);


                // Return Pagination View
                return view('store.search.list', [
                    'status' => 0,
                    'properties' => $pagination,
                    'site_enabled' => $request->site_enabled,
                    'totalsites' => $totalsites,
                    'userAcc'  => $userAcc,
                ]);
            }else{
                // (The search result has expired.)
                return redirect()->route('storeAdmin.search.list')->with('api_message', '検索結果が期限切れとなりました。');
            }
        }

        $status = 0;
        $properties = [];

        // Set Max Limit
        $limit_from_request = ($request->reins + $request->atbb + $request->itandibb  + $request->tokyu + $request->mitsui);
        set_time_limit( $limit_from_request * 80 );

        // // Reins
        // if($request->reins == 1){
        //     // dd('reins');
        //     $status = $this->getApiStatus();

        //     if ($status == 0) {
        //         // Using Static Request
        //         $static_request = [
        //             "kind1" => "賃貸マンション",
        //             "type1" => "マンション",
        //             "zumen_flag" => 1,
        //             "image_flag" => 1,
        //             "prefecture" => "埼玉県",
        //             "address1" => "さいたま市西区"
        //         ];

        //         $properties = $this->roboreSearchProperty($static_request);

        //         // Check if Login Succesful
        //         if (isset($properties['status']) && $properties['status'] == false) {
        //             if ($properties['error_message'] == 'LOGIN_ERROR') {
        //                 // (Please check the account information of the API server.)
        //                 return redirect()->route('storeAdmin.index')->with('api_message', 'APIサーバのアカウント情報を確認してください。');
        //             } elseif ($properties['error_message'] == 'SEARCH_ERROR') {
        //                 // (Please try again after a while.)
        //                 return redirect()->route('storeAdmin.index')->with('api_message', 'しばらくしてから、もう一度お試しください。');
        //             }
        //         }
        //     } elseif ($status == 2 && $is_production) {
        //         // (API No Connection.)
        //         return redirect()->route('storeAdmin.index')->with('api_message', 'API 接続なし。');
        //     } elseif ($status == 2 && !$is_production) {
        //         // Only for Local Dev

        //         $status = 0;
        //         $properties = array_merge($this->getRoboreSampleResult());

        //         // Check if Python is available
        //         if (!$properties) {
        //             // (LOCAL: Please install Python.)
        //             return redirect()->route('storeAdmin.index')->with('api_message', 'ローカルです。Pythonをインストールしてください。');
        //         }
        //     }
        // }
        if($request->site_enabled){

        // Reins New
            if(in_array("reins", $request->site_enabled)){
                $sec1 = rand(4,5);
                $sec2 = $sec1 == 5 ? rand(1,5) : rand(1,9);
                $sec = (string) $sec1.".".$sec2;
                $sleep = (float) $sec;
                sleep($sleep);
                $result = $this->getReinsSampleResult();

                if ($result != false) {
                    $properties = array_merge($properties ?? [], array_merge($result));
                }else{
                    // (Please try again after a while.(Reins))
                    return redirect()->route('storeAdmin.index')->with('api_message', 'しばらくしてから、もう一度お試しください。(レインズ)');
                }
            }

            // Atbb
            if(in_array("atbb", $request->site_enabled)){
                // dd('atbb');
                $sec1 = rand(4,5);
                $sec2 = $sec1 == 5 ? rand(1,5) : rand(1,9);
                $sec = (string) $sec1.".".$sec2;
                $sleep = (float) $sec;
                sleep($sleep);
                $atbb_array = $this->getAtbbSampleResult();
                // }else{

                //     $atbb_array = $this->getAtbbLiveResult();
                // }

                if ($atbb_array != false) {
                    $properties = array_merge($properties ?? [], array_merge($atbb_array));
                }else{
                    // (Please try again after a while.(ATBB))
                    return redirect()->route('storeAdmin.index')->with('api_message', 'しばらくしてから、もう一度お試しください。(ATBB)');
                }
            }

            // Itandibb
            // if(in_array("itandibb", $request->site_enabled)){
            //     // dd('itandibb');
            //     // Using Static Request
            //     $static_request = [
            //         "object_type" => ["アパート"],
            //         "prefecture" => "埼玉県",
            //         "address" => "さいたま市西区",
            //         "madori_list" => ["1R", "1LDK"]
            //     ];

            //     $response = $this->itandibbSearchProperty($static_request);

            //     if($response['status'] == 200){
            //         $properties = array_merge($properties ?? [], array_merge($response['payload']));
            //     }elseif($response['status'] == 500 && $is_production){
            //         // (Please try again after a while.(ITANDI BB))
            //         return redirect()->route('storeAdmin.index')->with('api_message', 'しばらくしてから、もう一度お試しください。(イタンジ)');
            //     }elseif($response['status'] == 500 && !$is_production){
            //         // Only for Local Dev

            //         $status = 0;
            //         $properties = array_merge($properties ?? [], array_merge($this->getItandibbSampleResult()));

            //         // Check if Python is available
            //         if (!$properties) {
            //             // (LOCAL: Please install Python.)
            //             return redirect()->route('storeAdmin.index')->with('api_message', 'ローカルです。Pythonをインストールしてください。');
            //         }
            //     }
            // }

            // Temp Itandibb
            if(in_array("itandibb", $request->site_enabled)){
                $sec1 = rand(4,5);
                $sec2 = $sec1 == 5 ? rand(1,5) : rand(1,9);
                $sec = (string) $sec1.".".$sec2;
                $sleep = (float) $sec;
                sleep($sleep);
                $result = $this->getItandibbSampleResult();

                if ($result != false) {
                    $properties = array_merge($properties ?? [], array_merge($result));
                }else{
                    // (Please try again after a while.(ITANDI BB))
                    return redirect()->route('storeAdmin.index')->with('api_message', 'しばらくしてから、もう一度お試しください。(イタンジ)');
                }
            }

            // Tokyu
            if(in_array("tokyu", $request->site_enabled)){
                $sec1 = rand(4,5);
                $sec2 = $sec1 == 5 ? rand(1,5) : rand(1,9);
                $sec = (string) $sec1.".".$sec2;
                $sleep = (float) $sec;
                sleep($sleep);
                $result = $this->getTokyuSampleResult();

                if ($result != false) {
                    $properties = array_merge($properties ?? [], array_merge($result));
                }else{
                    // (Please try again after a while.(Tokyu))
                    return redirect()->route('storeAdmin.index')->with('api_message', 'しばらくしてから、もう一度お試しください。(東急住宅リース)');
                }
            }

            // Mitsui
            if(in_array("mitsui", $request->site_enabled)){
                $sec1 = rand(4,5);
                $sec2 = $sec1 == 5 ? rand(1,5) : rand(1,9);
                $sec = (string) $sec1.".".$sec2;
                $sleep = (float) $sec;
                sleep($sleep);
                $result = $this->getMitsuiSampleResult();

                if ($result != false) {
                    $properties = array_merge($properties ?? [], array_merge($result));
                }else{
                    // (Please try again after a while.(Mitsui))
                    return redirect()->route('storeAdmin.index')->with('api_message', 'しばらくしてから、もう一度お試しください。(三井不動産レジデンシャルリース)');
                }
            }

            // Sumitomo
            if(in_array("sumitomo", $request->site_enabled)){
                $sec1 = rand(4,5);
                $sec2 = $sec1 == 5 ? rand(1,5) : rand(1,9);
                $sec = (string) $sec1.".".$sec2;
                $sleep = (float) $sec;
                sleep($sleep);
                $result = $this->getSumitomoSampleResult();

                if ($result != false) {
                    $properties = array_merge($properties ?? [], array_merge($result));
                }else{
                    // (Please try again after a while.(Sumitomo))
                    return redirect()->route('storeAdmin.index')->with('api_message', 'しばらくしてから、もう一度お試しください。(住友不動産)');
                }
            }
        }

        // (API Server Error.)
        if($properties == []){
            return redirect()->route('storeAdmin.index')->with('api_message', 'APIサーバーエラーです。');
        }

        $result_id = substr(str_shuffle('1234567890abcdefghijklmnopqrstuvwxyz'), 0, 16);

        session([
            'result_id' => $result_id,
            'result' => $properties
        ]);

        // Manually Paginate Properties
        $pagination = $this->getPaginator($request, $properties);
        $pagination->appends(['id' => $result_id]);

        return view('store.search.list', [
            'status' => $status,
            'properties' => $pagination,
            'site_enabled' => $request->site_enabled,
            'totalsites' => $totalsites,
            'userAcc'  => $userAcc,
        ]);
    }

    public function saveSearch(Request $request){
        $create = Search::create([
            "target_site" => $request->target_site,
            "account_id" => $request->account_id,
            "railway_name" => $request->railway_name,
            "station" => $request->station,
            "city" => $request->city,
            "town" => $request->town,
            "name" => $request->name,
            "fee_min" => $request->fee_min,
            "fee_max" => $request->fee_max,
            "area_min" => $request->area_min,
            "area_max" => $request->area_max,
            "keyword" => $request->keyword,
            "year_build_start" => $request->year_build_start,
            "year_build_end" => $request->year_build_end,
            "building_structure" => $request->building_structure,
            "plan_of_house" => $request->plan_of_house,
            "image_flag" => $request->image_flag,
            "publishing_date" => $request->publishing_date ?? '',
            "drawing_flag" => $request->drawing_flag,
            "trade_style_id" => (int)$request->trade_style,
        ]);

        return response()->json($create);
    }

    public function saveHomeSearch(Request $request){
        $id = $request->session()->get('LoggedUser');

        $create = Search::create([
            "target_site" => $request->sites_available,
            "name" => $request->property_name,
            "fee_min" => $request->fee_min,
            "fee_max" => $request->fee_max,
            "area_min" => $request->area_min,
            "area_max" => $request->area_max,
            "step_min" => $request->step_min,
            "step_max" => $request->step_max,
            "keyword" => $request->free_word,
            "year_build_start" => $request->year_build_min,
            "year_build_end" => $request->year_build_max,
            "publishing_date" => $request->publishing_date ?? '',
            "trade_style_id" => (int)$request->trade_style,
            "search_name" => $request->name_search,
            "account_id" => $id,
            "railway_name" => 1,
            "station" => 1,
            "city" => 1,
            "town" => 1,
            "plan_of_house" => 1,
            "plan_of_rent_fee_id" => 1,
            "building_structure" => 1,
            "image_flag" => 1,
            "drawing_flag" => 1,
            "step_flag" => 1,
        ]);

        return redirect()->back();
    }

}
