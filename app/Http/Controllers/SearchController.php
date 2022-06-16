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
        $key = trim($request->get('doc'));
        $tag=trim($request->get('tag'));
        $date=trim($request->get('date'));

        $documents = Document::query()
            ->where('designation', 'like', "%{$key}%")
            ->orWhere('file', 'like', "%{$key}%")
            ->orWhere('created_at','like',$date)
            ->orderBy('created_at', 'desc')
            ->get();

        $folders = Folder::all();

        $tags = Tag::query()
                ->where('slug', 'like', "%{$tag}%")
                ->get();

       

        return view('search', [
            'key' => $key,
            'tag'=>$tag,
            'date'=>$date,
            'documents' => $documents,
            'folders' => $folders,
            'tags' => $tags
        ]);
    }
}
