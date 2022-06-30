<?php

namespace App\Http\Controllers;

use App\Models\Folder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function tailleImages()
    {
        $sizeImages = DB::table('documents')->where('type', 'image')->value('file'); 
        foreach($sizeImages as $sizeImage)
        {
            $fileSize = File::size(public_path('documents/'.$sizeImage.''));
        }
        return $fileSize;
    }


    public function welcome()
    {
        $folders = Folder::all(); 
        $images = DB::table('documents')->where('type', 'image')->count(); 
        $videos = DB::table('documents')->where('type', 'video')->count(); 
        $audios = DB::table('documents')->where('type', 'audio')->count(); 
        $pdf = DB::table('documents')->where('type', 'pdf')->count(); 
        $word = DB::table('documents')->where('type', 'word')->count(); 
        $excel = DB::table('documents')->where('type', 'excel')->count(); 
        $txt = DB::table('documents')->where('type', 'txt')->count();
        $total = DB::table('documents')->count();

        $sizeImages = DB::table('documents')->where('type', 'image')->get(); 
        foreach($sizeImages as $sizeImage){
            $fileSize = File::size(public_path('documents/'.$sizeImage->file.''));  
        }
        $test=collect($fileSize);
        function formatBytes($fileSize, $precision = 2)
        {
          $base = log($fileSize, 1024);
          $suffixes = array('', 'K', 'M', 'G', 'T');   
          
          return round(pow(1024, $base - floor($base)), $precision) .' '. $suffixes[floor($base)];
        }
           
            
        return view('welcome',
        [
            'folders' => $folders,
            'images' => $images,
            'videos' => $videos,
            'audios' => $audios,
            'pdf' => $pdf,
            'word' => $word,
            'excel' => $excel,
            'txt' => $txt,
            'total' => $total,
            'sizeImages'=>$sizeImages,
            'fileSize'=>formatBytes($fileSize),
            'test'=>$test,
        ]);
    }
   

    
    public function doc()
    {
        $id=Auth::user()->folder_id;
        $folders = DB::table('folders')->where('id', $id)->get();
        
        $folder_id=$id;
        return view(
            'home',
            [
                'folders' => $folders
            ]
        );
      
    
    }


    public function files()
    {
        $id=Auth::user()->id;
        $documents = DB::table('documents')->where('id', $id)->get();
        
        $folder_id=$id;
        return view(
            '',
            [
                'documents' => $documents
            ]
        );
      
    
    }

}