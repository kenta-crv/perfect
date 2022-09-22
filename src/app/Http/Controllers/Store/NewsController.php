<?php

namespace App\Http\Controllers\Store;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Notifications;
use App\Models\Accounts;
class NewsController extends Controller
{
    public function index(Request $request){
        // Temp Auth
        if($request->session()->get('LoggedUser')){
            $request->session()->forget('loginRedirect');
        }

        $news_list = Notifications::where('target_store', '=', 1)->get();
        $user = Accounts::find($request->session()->get('LoggedUser'));
        if($user == null){

            $request->session()->put('loginRedirect', route($request->route()->getName()));
            return redirect(route('storeAdmin.index'));
        }else{
            return view('store.news.index', [
                'news' => $news_list->first(),
                'news_list' => $news_list,
            ]);
        }

    }

    public function show(Request $request)
    {
        // Temp Auth
        if($request->session()->get('LoggedUser')){
            $request->session()->forget('loginRedirect');
        }

        $news_list = Notifications::where('target_store', '=', 1)->get();
        $news = $news_list->find($request->news_id);
        $user = Accounts::find($request->session()->get('LoggedUser'));

        if($user == null){
            $request->session()->put('loginRedirect', route($request->route()->getName(), $request->news_id));
            return redirect(route('storeAdmin.index'));
        }else{
            return view('store.news.index', [
                'news' => $news,
                'news_list' => $news_list
            ]);
        }
    }
}
