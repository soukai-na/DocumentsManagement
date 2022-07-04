<?php

namespace App\Http\Controllers;

use App\Models\Folder;
use Illuminate\Http\Request;
use App\Managers\FolderManager;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\FolderRequest;

class FolderController extends Controller
{
    //le manager qui gére les champs de la base de données

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

     //l'affichage des services
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

     //afficher la page de création d'un service
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

     //pour sauvegarder les données de création d'un service
    public function store(FolderRequest $request)
    {
        $validated=$request->validated();

        $this->folderManager->build(new Folder(),$request);  

        return redirect()->route('folders.index')->with('success',"le dossier a bien été sauvegardé!");
    }

    //pour sauvegarder les données de création d'un dossier(sous service, theme,...)
    public function triStore(FolderRequest $request,$id)
    {
        $validated=$request->validated();

        $this->folderManager->build(new Folder(),$request);  

        return redirect()->route('folders.tri',$id)->with('success',"le dossier a bien été sauvegardé!");
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

     //afficher la page de modification d'un dossier
    public function edit(Folder $folder)
    {
        return view('folders.edit',[
            'folder'=>$folder
        ]);
    }

    //tri de dossiers (Exemple: chaque service et leur sous services)
    public function tri($id)
    {
        $folders = DB::table('folders')->where('folder_id', $id)->get();
        $query = DB::table('folders')->where('id', $id)->value('designation');
        $documents=DB::table('documents')->where('folder_id',$id)->get();
        
        $folder_id=$id;
        return view(
            'folders.tri',
            [
                'folders' => $folders,
                'documents'=>$documents,
                'f_id' => $id,
                'desg'=>$query
            ]
        );
      
    }

    //la page de création d'un dossier (sous service, theme, ...)
    public function tricreate(Folder $folder)
    {
        return view('folders.tricreate',[
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

     //pour modifier un dossier
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

     //pour supprimer un dossier
    public function delete(Folder $folder)
    {
        $folder->delete();
        return redirect()->route('folders.index')->with('success',"le dossier a bien été supprimé");
    }
}
