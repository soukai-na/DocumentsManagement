<?php

namespace App\Managers;

use App\Models\Folder;
use App\Http\Requests\FolderRequest;

class FolderManager{
    public function build(Folder $folder,FolderRequest $request ){
        $folder->designation= $request->input('designation');     
        $folder->designationar= $request->input('designationar');      
        $folder->type= $request->input('type');       
        $folder->save();
    }
}