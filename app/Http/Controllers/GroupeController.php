<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Groupe;
use Illuminate\Http\Request;
use App\Managers\GroupeManager;
use App\Http\Requests\GroupeRequest;

class GroupeController extends Controller
{

    private $groupeManager;
    public function __construct(GroupeManager $groupeManager)
    {
        $this->groupeManager = $groupeManager;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $groupes = Groupe::paginate(5);
        return view(
            'groupes.index',
            [
                'groupes' => $groupes,
                'groups'=>Groupe::with('users')->find(2)
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('groupes.create',[
            'users'=>User::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GroupeRequest $request)
    {
        $validated=$request->validated();

        $this->groupeManager->build(new Groupe(),$request);  

        return redirect()->route('groupes')->with('success',"le groupe a bien été sauvegardé!");
    }

   

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Groupe $groupe)
    {
        return view('groupes.edit',[
            'groupe'=>$groupe
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(GroupeRequest $request,Groupe $groupe)
    {
        $this->groupeManager->build($groupe,$request);   

         return redirect()->route('groupes')->with('success',"le groupe a bien été modifié!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Groupe $groupe)
    {
        $groupe->delete();
        return redirect()->route('groupes')->with('success',"le groupe a bien été supprimé!");
    }
}
