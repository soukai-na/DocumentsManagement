<?php

namespace App\Http\Controllers;

use App\Models\Folder;
use Illuminate\Http\Request;
use App\Managers\FolderManager;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\FolderRequest;

class FolderController extends Controller
{

    private $folderManager;
    public function __construct(FolderManager $folderManager)
    {
        $this->folderManager = $folderManager;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $folders = Folder::all();
        return view(
            'folders.index',
            [
                'folders' => $folders
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('folders.create',[
            'folders'=>Folder::all()
        ]);
    }

    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FolderRequest $request)
    {
        $validated=$request->validated();

        $this->folderManager->build(new Folder(),$request);  

        return redirect()->route('folders.index')->with('success',"le dossier a bien été sauvegardé!");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Folder $folder)
    {
        // return redirect()->route('folders.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Folder $folder)
    {
        return view('folders.edit',[
            'folder'=>$folder
        ]);
    }

    public function tri($id)
    {
        $folders = DB::table('folders')->where('folder_id', $id)->get();
        
        return view(
            'folders.tri',
            [
                'folders' => $folders,
            ]
        );
      
    }
    public function tricreate(Folder $folder)
    {
        return view('folders.create',[
            'folders'=>Folder::all(),
            'folder'=>$folder
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(FolderRequest $request,Folder $folder)
    {
        $this->folderManager->build($folder,$request);   

        return redirect()->route('folders.index')->with('success',"le dossier a bien été modifié!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Folder $folder)
    {
        $folder->delete();
        return redirect()->route('folders.index')->with('success',"le dossier a bien été supprimé");
    }
}
