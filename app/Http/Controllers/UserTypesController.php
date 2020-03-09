<?php

namespace App\Http\Controllers;

use App\UserTypes;
use Illuminate\Http\Request;

class UserTypesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_types = UserTypes::paginate(20);
        return view('usertypes.lista_user_types')
            ->with('user_types', $user_types);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\UserTypes  $userTypes
     * @return \Illuminate\Http\Response
     */
    public function insert()
    {
        if (!$this->AdminAllowed()) {
            return redirect()->back()->with('alert', 'Você não tem permissão para realizar essa ação!');
        }

        return view('usertypes.insert_user_types');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $r)
    {
        if (!$this->AdminAllowed()) {
            return redirect()->back()->with('alert', 'Você não tem permissão para realizar essa ação!');
        }

        $user_types = new UserTypes;
        $user_types->type = $r->type;
        $user_types->save();

        return redirect(route('usertypes'))->withSuccess('Tipo cadastrado com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\UserTypes  $userTypes
     * @return \Illuminate\Http\Response
     */
    public function show(Request $r)
    {
        if (!$this->AdminAllowed()) {
            return redirect()->back()->with('alert', 'Você não tem permissão para realizar essa ação!');
        }

        $user_types = UserTypes::where('id',$r->id)->firstOrFail();
        return $user_types;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\UserTypes  $userTypes
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $r)
    {
        if (!$this->AdminAllowed()) {
            return redirect()->back()->with('alert', 'Você não tem permissão para realizar essa ação!');
        }

        $user_types = UserTypes::find($r->id);
        if($user_types === null){
            return redirect()->back()->with('alert', 'Tipo de usuário não localizado!'); 
        } else 
        {
        return view('usertypes.edit_user_types')
            ->with('user_types', $user_types);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\UserTypes  $userTypes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $r)
    {
        if (!$this->AdminAllowed()) {
            return redirect()->back()->with('alert', 'Você não tem permissão para realizar essa ação!');
        }

        $user_types = UserTypes::find($r->id);

        if ($user_types === null) {
            return redirect('')->with('alert', 'Tipo não localizado!');;
        }

        $user_types->type = mb_strtolower($r->type, 'UTF-8');

        $user_types->update();

        return redirect(route('usertypes'))->withSuccess('Tipo alterado com sucesso!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\UserTypes  $userTypes
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $r)
    {
        if (!$this->AdminAllowed()) {
            return redirect()->back()->with('alert', 'Você não tem permissão para realizar essa ação!');
        }

        $user_types = UserTypes::where('id', $r->id)->delete();
        return redirect(route('usertypes'))->withSuccess('Tipo excluído com sucesso!');
    }
}
