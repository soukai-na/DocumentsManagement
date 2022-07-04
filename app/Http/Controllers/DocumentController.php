<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Folder;
use App\Models\Document;
use Illuminate\Http\Request;
use App\Managers\DocumentManager;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use App\Http\Requests\DocumentRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class DocumentController extends Controller
{
    private $documentManager;
    public function __construct(DocumentManager $documentManager)
    {
        $this->documentManager = $documentManager;
    }

    //afficher la liste des documents
    public function index()
    {
        $documents = Document::paginate(100);
        return view(
            'documents.index',
            [
                'documents' => $documents
            ]
        );
    }

    //afficher la page de création d'un document
    public function create(Folder $folder)
    {
        return view('documents.create', [
            'folders' => Folder::all(),
            'folder' => $folder,
            'users' => User::all(),
        ]);
    }
    //afficher la page qui contient le scanner
    public function scan(Folder $folder)
    {
        return view('scan', [
            'folders' => Folder::all(),
            'folder' => $folder,
            'users' => User::all(),
        ]);
    }

    //l'affichage d'un document
    public function show(Document $document)
    { 
      $fileSize = File::size(public_path('documents/'.$document->file.''));
      $user = DB::table('users')->where('id', $document->user_id)->value('nom');

      function formatBytes($fileSize, $precision = 2)
      {
        $base = log($fileSize, 1024);
        $suffixes = array('', 'K', 'M', 'G', 'T');   
        
        return round(pow(1024, $base - floor($base)), $precision) .' '. $suffixes[floor($base)];
      }
        return view('documents.show', compact('document'), [
            'users' => User::all(),
            'fileSize'=>formatBytes($fileSize),
            'user'=>$user
        ]);
    }

    //pour télécharger un document
    public function download($id)
    {
        $dl = Document::find($id);

        $file = public_path() . "/documents/" . $dl->file;

        $headers = array(
            'Content-Type: application/pdf',
        );

        return Response::download($file, $dl->file, $headers);
    }
   

    //pour sauvegarder les données de création d'un document
    public function store(DocumentRequest $request,$id)
    {
        
        $validated = $request->validated();

        $this->documentManager->build(new Document(), $request);

        return redirect()->route('folders.tri',$id)->with('success', "le document a bien été sauvegardé!");
    }


    //afficher la page de modification
    public function edit(Document $document)
    {
        return view('documents.edit', [
            'document' => $document
        ]);
    }

    //sauvegarder les données modifiées(seulement les informations d'un document)
    public function update(Request $request, Document $document)
    {
        $request->validate([
            'designation' => 'required',
            'description' => 'required',
        ]);

        $document->update($request->all());

        return redirect()->route('folders.tri',$document->folder_id)->with('success', "le document a bien été modifié!");
    }

    //pour le changemet d'un document et son type
    public function updateFile(Request $request, Document $document)
    {
        $request->validate([
            'file' => 'required|mimes:csv,txt,xlx,xls,pdf,doc,docx,mp3,mp4,jpeg,png,jpg,gif,svg|max:2048',
            'type' => 'required',
        ]);

        $input = $request->all();


        if ($file = $request->file('file')) {
            $destinationPath = 'documents/';
            $profileFile = $document->designation . "." . $file->getClientOriginalExtension();
            $file->move($destinationPath, $profileFile);
            $input['file'] = "$profileFile";
        } else {
            unset($input['file']);
        }

        $document->update($input);

        return redirect()->route('folders.tri',$document->folder_id)->with('success', "le document a bien été modifié!");
    }


    //la suppression d'un document
    public function delete(Document $document)
    {
        $document->delete();
        return redirect()->route('folders.tri',$document->folder_id)->with('success', "le document a bien été supprimé!");
    }
    

    
}
