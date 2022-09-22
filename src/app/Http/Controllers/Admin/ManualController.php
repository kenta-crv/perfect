<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Manual;
use Illuminate\Support\Facades\File;
class ManualController extends Controller
{
    public function index(Request $request){
        // dd($document);
        $mpdf = new \Mpdf\Mpdf();
        $manual = Manual::where('scene', 1)->first();
        // dd(!File::exists(public_path('file/'.$manual->file_name)));
        // $document = $manual[0]->url;
        // dd(File::exists(public_path('file')));
        // if(!File::exists(public_path('file')) === false){
        //     return redirect(route('storeAdmin.home'));
        // }

        if($manual !== NULL){
            if(File::exists(public_path('file/'.$manual->file_name))){
                // dd("ari ni sud naay files");
                $final_document = public_path('file/'.$manual->file_name);
               
                    // dd($manual[0]->file_name);
                    $pagecount = $mpdf->setSourceFile($final_document);
                  
                    // $pagecount = $mpdf->setSourceFile('paygent.pdf');
                    $tplId = $mpdf->importPage($pagecount);
                    $mpdf->useTemplate($tplId);
                    $mpdf->autoScriptToLang = true;
                    $mpdf->autoLangToFont = true;
                    $mpdf->SetXY(25, 49);
                    $mpdf->Output();
            }else{
                // dd("sa else ni sud walay files");
                return redirect(route('storeAdmin.home'));
            }
        }else{
            return redirect(route('storeAdmin.home'));
        }

        // if(File::exists(public_path('file/'.$manual->file_name))){
        //     // dd("ari ni sud naay files");
        //     $final_document = public_path('file/'.$manual->file_name);
           
        //         // dd($manual[0]->file_name);
        //         $pagecount = $mpdf->setSourceFile($final_document);
              
        //         // $pagecount = $mpdf->setSourceFile('paygent.pdf');
        //         $tplId = $mpdf->importPage($pagecount);
        //         $mpdf->useTemplate($tplId);
        //         $mpdf->autoScriptToLang = true;
        //         $mpdf->autoLangToFont = true;
        //         $mpdf->SetXY(25, 49);
        //         $mpdf->Output();
        // }else{
        //     // dd("sa else ni sud walay files");
        //     return redirect(route('storeAdmin.home'));
        // }

      
        
        // if(!File::exists(public_path('file') === false)){
        //     if($manual !== NULL){
        //         $final_document = public_path('file/'. $manual->file_name);
           
        //         // dd($manual[0]->file_name);
        //         $pagecount = $mpdf->setSourceFile($final_document);
              
        //         // $pagecount = $mpdf->setSourceFile('paygent.pdf');
        //         $tplId = $mpdf->importPage($pagecount);
        //         $mpdf->useTemplate($tplId);
        //         $mpdf->autoScriptToLang = true;
        //         $mpdf->autoLangToFont = true;
        //         $mpdf->SetXY(25, 49);
        //         $mpdf->Output();
        //     }
        // }

      
        
       
    }
}
