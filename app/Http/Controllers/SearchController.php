<?php

namespace App\Http\Controllers;

use App\Models\Folder;
use App\Models\Document;
use Illuminate\Http\Request;
use Conner\Tagging\Model\Tag;
use Conner\Tagging\Model\Tagged;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $key = trim($request->get('doc'));
        $tag=trim($request->get('tag'));
        $date=trim($request->get('date'));
        $typeDoc=trim($request->get('typeDoc'));

        if($key){
            $documents = Document::query()
            ->where('designation', 'like', "%{$key}%")
            ->orWhere('file', 'like', "%{$key}%")
            ->orderBy('created_at', 'desc')
            ->get();
        }
        if($typeDoc){
            $documents = Document::query()
            ->where('type','like', "%{$typeDoc}%")
            ->orderBy('created_at', 'desc')
            ->get();
        }

        if($tag){
            $documents =Tagged::query()
            ->where('tag_slug', 'like', "%{$tag}%")
            ->get();
        }
        

        $folders = Folder::all();

        $tags = Tag::query()
                ->where('slug', 'like', "%{$tag}%")
                ->get();

       

        return view('search', [
            'key' => $key,
            'tag'=>$tag,
            'date'=>$date,
            'typeDoc'=>$typeDoc,
            'documents' => $documents,
            'folders' => $folders,
            'tags' => $tags
        ]);
    }
}
