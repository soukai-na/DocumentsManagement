<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Managers\UserManager;
use App\Http\Requests\UserRequest;

class UserController extends Controller
{
    private $userManager;
    public function __construct(UserManager $userManager)
    {
        $this->userManager = $userManager;
    }

    public function index()
    {
        $users = User::paginate(5);
        return view(
            'users.index',
            [
                'users' => $users
            ]
        );
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(UserRequest $request)
    {
        $validated=$request->validated();

        $this->userManager->build(new User(),$request);  

        return redirect()->route('users')->with('success',"le user a bien été sauvegardé!");
    }

    public function edit(User $user)
    {
        
        return view('users.edit',[
            'user'=>$user
        ]);
    }

    public function update(UserRequest $request,User $user)
    {
        $this->userManager->build($user,$request);   

         return redirect()->route('users')->with('success',"le user a bien été modifié!");
    }
    
    public function delete(User $user)
    {
        $user->delete();
        return redirect()->route('users')->with('success',"le user a bien été supprimé!");
    }
}
