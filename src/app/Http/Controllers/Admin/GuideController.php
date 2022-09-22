<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Guide;
use App\Models\Manual;
use URL;
use Illuminate\Support\Facades\File;
class GuideController extends Controller
{
    //
    public function index(Request $request){
      $guide = Guide::all();
      return view('admin.guide.index',[
        'guides' => $guide
      ]);

    }

    public function addForm(){
      return view('admin.guide.new');
    }

    public function rules($input, $data){
      $validate = $data;
      return $input->validate($validate);
    }

    public function insertGuide(Request $request){
        $data  = config('validation.validate.guide');
        $rules = $this->rules($request, $data);

        if($rules){
            Guide::create($request->all());
            return redirect()->route('admin.guide.index');

        }
    }

    public function editGuide($id){
      $guide = Guide::find($id);
        return view('admin.guide.edit',[
            'guides' => $guide,
        ]);
    }

    public function updateGuide(Request $request){
      $request->validate([
        'guide_name' => 'required',
        'guide_place' => 'required',
        'guide_body' => 'required'
      ],
      [
          'guide_name.required' => 'ガイド名を入力',
          'guide_place.required' => 'ガイドプレイスを入力',
          'guide_body.required' => 'ガイド本体を入力'
      ]);
        $guide = Guide::find($request->guide_id);
        $guide->guide_name = $request->input('guide_name');
        $guide->guide_place = $request->input('guide_place');
        $guide->guide_body = $request->input('guide_body');
        $guide->save();
        return redirect()->route('admin.guide.index');
    }

    public function uploadImageGuide(Request $request){
        // dd($request->all());
        // $filePath = '/'.$pathname;
        // $image = $request->file('up_file');
        // $access = $request->get('access', 'private');
        // $t = Storage::disk('s3')->putFile($filePath, $image, $access);
        // if ($access === "public") {
        //     $url = Storage::disk('s3')->url($t);
        // } else {
        //     $url = Storage::disk('s3')->temporaryUrl($t, now()->addMinutes(10));
        // }
        // $fileName = auth()->id() . '_' . time() . '.'. $request->file->extension();
        $manual = $request->file('file');
        // dd($manual);
        if($manual == null){
          return redirect()->route('admin.guide.index');
        }
        
        if(File::exists(public_path('file'))){
          File::deleteDirectory(public_path('file'));
        }
        
        $filename = $manual->getClientOriginalName();
        $request->file->move(public_path('file'), $filename);
        $url = URL::asset('temp/'.$filename);
        // dd($url);

        $delete = Manual::where('scene', 1);
        $delete->delete();
        
        $manual = Manual::create([
            'scene' => 1,
            'url' => $url,
            'file_name' => $filename,
        ]);
        return redirect()->route('admin.guide.index');
    }
}

