<?php

namespace App\Http\Controllers\Robore;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\Notifications;
use App\Traits\DownloadFileTrait;
use Illuminate\Support\Facades\Validator;
class HomeController extends Controller
{
    use DownloadFileTrait;
    //
    public function home(){

        $notifications = Notifications::all();
        return view('robore.home', [
            'notifications' => $notifications,
        ]);
    }
    public function no_license(Request $request){
        return redirect('/#robore_inquiry')->with(['from_register' => $request->all()]);
    }
    public function requestInformation(){
        return view('robore.requestInformation');
    }

    public function rules($input){
        $validate = config('validation.validate.contacts');
        $validator = Validator::make($input, $validate);

        return $validator;
    }

    public function saveInquiry(Request $request){
        $input = $this->rules($request->all());
      
        if ($input->fails()) {
            return redirect('/#robore_inquiry')
                ->withErrors($input)
                ->withInput();
        }else{
            return view('robore.inquiryConfirm', [
                'inputRequest' => $request->all(),
            ]);
        }

    }


    public function confirmInquiry(Request $request){
        $save = Contact::create($request->all());
        $save->sendEmailVerificationNotification();

        return view('robore.inquiryThanks');
    }

    public function download($file_name) {
        $file_path = public_path('files/'.$file_name);
        return response()->download($file_path);
    }



}
