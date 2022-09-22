<?php

namespace App\Traits;
use Illuminate\Support\Facades\Http;
use App\Helpers\PyScript;

trait FlaskApiTrait
{
    // For Local Data Debug
    public function getRoboreSampleResult()
    {
        $pyscript = new PyScript;

        return $pyscript->run_python('get_sample.py', 'local_robore');
    }

    // For Local Data Debug2
    public function getItandibbSampleResult()
    {
        $pyscript = new PyScript;

        return $pyscript->run_python('get_sample.py', 'local_itandibb');
    }

    // For Local Data Debug3
    public function getTokyuSampleResult()
    {
        $pyscript = new PyScript;

        return $pyscript->run_python('get_sample.py', 'local_tokyu');
    }

    // For Local Data Debug4
    public function getMitsuiSampleResult()
    {
        $pyscript = new PyScript;

        return $pyscript->run_python('get_sample.py', 'local_mitsui');
    }

    // For Local Data Debug5
    public function getSumitomoSampleResult()
    {
        $pyscript = new PyScript;

        return $pyscript->run_python('get_sample.py', 'local_sumitomo');
    }

    // For Local Data Debug6
    public function getReinsSampleResult()
    {
        $pyscript = new PyScript;

        return $pyscript->run_python('get_sample.py', 'local_reins');
    }

    // For Local Data Debug6
    public function getReinsSampleApi($count = 50)
    {
        $pyscript = new PyScript;

        return $pyscript->run_python($count > 10 ? 'get_sample_api.py' : 'get_sample_ten_api.py', 'local_reins');
    }

    public function getApiStatus()
    {
        $is_production = env('APP_ENV') === 'production' ? true : false;
        $response = null;

        try{
            $response = Http::post($is_production ? 'http://10.0.2.43:80/api/get_status' :'http://localhost:80/api/get_status');
        }catch(\Illuminate\Http\Client\ConnectionException $e){
            return 2;
        }

        if($response->failed() || !$response ){
            return 2;
        }

        // Debug Only
        // return 1;


        return $response['status'] == false ? 0 : 1;
    }

    public function roboreSearchProperty($payload)
    {
        $is_production = env('APP_ENV') === 'production' ? true : false;

        // Debug Only
        // $response = Http::post($is_production ? 'http://10.0.2.43:8081/api_test/search_property' :'http://localhost:8081/api_test/search_property',$payload);

        $response = Http::post($is_production ? 'http://10.0.2.43:80/api/robore/search_property' :'http://localhost:80/api/robore/search_property',$payload);

        return $response->json();
    }

    public function itandibbSearchProperty($payload)
    {
        $is_production = env('APP_ENV') === 'production' ? true : false;

        // Debug Only
        // $response = Http::post($is_production ? 'http://10.0.2.43:8081/api_test/search_property' :'http://localhost:8081/api_test/search_property',$payload);
        $response = null;

        try{
            $response = Http::post($is_production ? 'http://10.0.2.43:80/api/itandibb/search_property' :'http://localhost:8081/api/itandibb/search_property',$payload);
        }catch(\Illuminate\Http\Client\ConnectionException $e){
            return ['status' => 500];
        }

        if($response->failed() || !$response ){
            return ['status' => 500];
        }


        return $response->json();
    }
}
