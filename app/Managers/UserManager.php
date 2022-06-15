<?php

namespace App\Managers;

use App\Models\User;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;



class UserManager{
    public function build(User $user,UserRequest $request ){
        $user->email= $request->input('email');  
        $user->password=Hash::make($request->input('password')) ; 
        $user->nom= $request->input('nom'); 
        $user->prenom= $request->input('prenom'); 
        $user->nomar= $request->input('nomar'); 
        $user->prenomar= $request->input('prenomar'); 
        $user->telephone= $request->input('telephone');
        if($request->hasFile('image')){
            $destination='images/users/'.$user->image;
            if(File::exists($destination)){
                File::delete($destination);
            }
            $file=$request->file('image');
            $extention=$file->getClientOriginalExtension();
            $filename=$user->nom.'.'.$extention;
            $file->move('images/users/',$filename);
            $user->image=$filename;
        }
        $user->role= $request->input('role'); 
        $user->status= $request->input('status');  
        $user->groupe_id= $request->input('groupe') ;          
        $user->save();
    }
}