<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Folder;
use App\Models\Groupe;
use Illuminate\Http\Request;
use App\Managers\UserManager;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\DB;

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
                'users' => $users,
                'groupes' => Groupe::all(),
                'folders' => Folder::all()
            ]
        );
    }

    public function compte()
    {

        
        return view('users.compte');
    }
    public function compteUpdate(Request $request, User $user){
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $input = $request->all();


        if ($file = $request->file('image')) {
            $destinationPath = 'images/users/';
            $profileFile = $user->nom . "." . $file->getClientOriginalExtension();
            $file->move($destinationPath, $profileFile);
            $input['image'] = "$profileFile";
        } else {
            unset($input['image']);
        }

        $user->update($input);

        return redirect()->route('compte');
    }

    public function create()
    {
        $folders = DB::table('folders')->where('folder_id', NULL)->get();

        return view('users.create', [
            'groupes' => Groupe::all(),
            'folders' => $folders
        ]);
    }

    public function store(UserRequest $request)
    {
        $validated = $request->validated();

        $this->userManager->build(new User(), $request);

        return redirect()->route('users')->with('success', "le user a bien été sauvegardé!");
    }

    public function edit(User $user)
    {
        $folders = DB::table('folders')->where('folder_id', NULL)->get();

        return view('users.edit', [
            'user' => $user,
            'groupes' => Groupe::all(),
            'folders' => $folders
        ]);
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'nomar' => 'required',
            'prenomar' => 'required',
            'telephone' => 'required|numeric',
            'role' => 'required',
            'status' => 'required'
        ]);
        $user->groupe_id= $request->input('groupe') ;  
        $user->folder_id= $request->input('folder') ; 

        $user->update($request->all());

        return redirect()->route('users')->with('success', "le user a bien été modifié!");
    }

    public function delete(User $user)
    {
        $user->delete();
        return redirect()->route('users')->with('success', "le user a bien été supprimé!");
    }
}
