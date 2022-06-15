<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Folder;
use App\Models\Document;
use Illuminate\Http\Request;
use App\Managers\DocumentManager;
use App\Http\Requests\DocumentRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;

class DocumentController extends Controller
{
    private $documentManager;
    public function __construct(DocumentManager $documentManager)
    {
        $this->documentManager = $documentManager;
    }

    public function index()
    {
        $documents = Document::paginate(5);
        return view(
            'documents.index',
            [
                'documents' => $documents
            ]
        );
    }

    public function create(Folder $folder)
    {
        return view('documents.create',[
            'folders'=>Folder::all(),
            'folder'=>$folder,
            'users'=>User::all(),
        ]);
    }

    public function show(Document $document)
    {
        return view('documents.show', compact('document'),[
            'users'=>User::all(),
        ]);
    }

    public function download($id)
    {
        $dl=Document::find($id);
        // return Storage::download($dl->destination, $dl->designation);

        $file= public_path(). "/documents/".$dl->file;

    $headers = array(
              'Content-Type: application/pdf',
            );

    return Response::download($file, $dl->file, $headers);
    }

    public function store(DocumentRequest $request)
    {
        $validated=$request->validated();

        $this->documentManager->build(new Document(),$request);  

        return redirect()->route('folders.index')->with('success',"le document a bien été sauvegardé!");
    }


    public function edit(Document $document)
    {
        return view('documents.edit',[
            'document'=>$document
        ]);
    }

    public function update(DocumentRequest $request,Document $document)
    {
        $this->documentManager->build($document,$request);   

         return redirect()->route('documents')->with('success',"le document a bien été modifié!");
    }


    public function delete(Document $document)
    {
        $document->delete();
        return redirect()->route('documents')->with('success',"le document a bien été supprimé!");
    }
}
