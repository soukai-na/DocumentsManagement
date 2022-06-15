<?php

namespace App\Http\Controllers;

use App\Models\Folder;
use App\Models\Document;
use Illuminate\Http\Request;
use Conner\Tagging\Model\Tag;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $key = trim($request->get('q'));

        $documents = Document::query()
            ->where('designation', 'like', "%{$key}%")
            ->orWhere('file', 'like', "%{$key}%")
            ->orderBy('created_at', 'desc')
            ->get();

        $folders = Folder::all();

        $tags = Tag::all();

       

        return view('search', [
            'key' => $key,
            'documents' => $documents,
            'folders' => $folders,
            'tags' => $tags
        ]);
    }
}
