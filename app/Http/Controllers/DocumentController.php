<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Folder;
use App\Models\Document;
use Illuminate\Http\Request;
use App\Managers\DocumentManager;
use Illuminate\Support\Facades\File;
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
        return view('documents.create', [
            'folders' => Folder::all(),
            'folder' => $folder,
            'users' => User::all(),
        ]);
    }

    public function show(Document $document)
    { 
      $fileSize = File::size(public_path('documents/'.$document->file.''));

      function formatBytes($fileSize, $precision = 2)
      {
        $base = log($fileSize, 1024);
        $suffixes = array('', 'K', 'M', 'G', 'T');   
        
        return round(pow(1024, $base - floor($base)), $precision) .' '. $suffixes[floor($base)];
      }
        return view('documents.show', compact('document'), [
            'users' => User::all(),
            'fileSize'=>formatBytes($fileSize)
        ]);
    }

    public function download($id)
    {
        $dl = Document::find($id);
        // return Storage::download($dl->destination, $dl->designation);

        $file = public_path() . "/documents/" . $dl->file;

        $headers = array(
            'Content-Type: application/pdf',
        );

        return Response::download($file, $dl->file, $headers);
    }

    public function store(DocumentRequest $request)
    {
        $validated = $request->validated();

        $this->documentManager->build(new Document(), $request);

        return redirect()->route('folders.index')->with('success', "le document a bien été sauvegardé!");
    }


    public function edit(Document $document)
    {
        return view('documents.edit', [
            'document' => $document
        ]);
    }

    public function update(Request $request, Document $document)
    {
        $request->validate([
            'designation' => 'required',
            'description' => 'required',
        ]);

        $document->update($request->all());

        return redirect()->route('documents')->with('success', "le document a bien été modifié!");
    }
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

        return redirect()->route('documents')->with('success', "le document a bien été modifié!");
    }


    public function delete(Document $document)
    {
        $document->delete();
        return redirect()->route('documents')->with('success', "le document a bien été supprimé!");
    }

    
}
