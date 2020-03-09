<?php

namespace App\Http\Controllers;

use App\User;
use App\UserTypes;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::paginate(20);
        return view('user.lista_user')
            ->with('users', $users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $User
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $r)
    {
        if (!$this->AdminAllowed()) {
            return redirect()->back()->with('alert', 'Você não tem permissão para realizar essa ação!');
        }

        $user_types = UserTypes::all();
        $user = User::find($r->id);
        if($user === null){
            return redirect()->back()->with('alert', 'Usuário não localizado!'); 
        } else 
        {
        return view('user.edit_user')
            ->with('user', $user)
            ->with('user_types', $user_types);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $User
     * @return \Illuminate\Http\Response
     */
    public function update(Request $r)
    {
        if (!$this->AdminAllowed()) {
            return redirect()->back()->with('alert', 'Você não tem permissão para realizar essa ação!');
        }

        $users = User::find($r->id);

        if ($users === null) {
            return redirect('')->with('alert', 'Usuário não localizado!');;
        }

        $users->type_id = mb_strtolower($r->type_id, 'UTF-8');

        $users->update();

        return redirect(route('users'))->withSuccess('Usuário alterado com sucesso!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $User
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $r)
    {
        if (!$this->AdminAllowed()) {
            return redirect()->back()->with('alert', 'Você não tem permissão para realizar essa ação!');
        }

        $users = User::where('id', $r->id)->delete();
        return redirect(route('users'))->withSuccess('Usuário excluído com sucesso!');
    }
}
