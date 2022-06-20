<?php

namespace App\Http\Controllers;

use App\Models\Folder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

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


    public function welcome()
    {
        $folders = Folder::all();
        return view('welcome',
        [
            'folders' => $folders
        ]);
    }

    
    public function doc()
    {
        $id=Auth::user()->id;
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