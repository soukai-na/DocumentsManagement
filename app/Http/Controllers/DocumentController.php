<?php

namespace App\Http\Controllers;

use App\Models\Document;
use Illuminate\Http\Request;
use App\Managers\DocumentManager;
use App\Http\Requests\DocumentRequest;

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

    public function create()
    {
        return view('documents.create');
    }

    public function show(Document $document)
    {
        return view('documents.show', compact('document'));
    }

    public function store(DocumentRequest $request)
    {
        $validated=$request->validated();

        $this->documentManager->build(new Document(),$request);  

        return redirect()->route('documents')->with('success',"le document a bien été sauvegardé!");
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
