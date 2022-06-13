<?php

namespace App\Managers;

use App\Models\Groupe;
use App\Http\Requests\GroupeRequest;



class GroupeManager{
    public function build(Groupe $groupe,GroupeRequest $request ){
        $groupe->nom= $request->input('nom');      
        $groupe->description= $request->input('description');      
        $groupe->save();
    }
}