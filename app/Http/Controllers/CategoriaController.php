<?php

namespace App\Http\Controllers;

use App\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categorias = Categoria::paginate(20);
        return view('categorias.lista_categoria')
            ->with('categorias', $categorias);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Categoria  $Categoria
     * @return \Illuminate\Http\Response
     */
    public function insert()
    {
        if (!$this->AdminAllowed()) {
            return redirect()->back()->with('alert', 'Você não tem permissão para realizar essa ação!');
        }

        return view('categorias.insert_categoria');
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

        $categorias = new Categoria;
        $categorias->categoria = $r->categoria;
        $categorias->save();

        return redirect(route('categoria'))->withSuccess('Categoria cadastrada com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Categoria  $Categoria
     * @return \Illuminate\Http\Response
     */
    public function show(Request $r)
    {
        if (!$this->AdminAllowed()) {
            return redirect()->back()->with('alert', 'Você não tem permissão para realizar essa ação!');
        }

        $categorias = Categoria::where('id',$r->id)->firstOrFail();
        return $categorias;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Categoria  $Categoria
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $r)
    {
        if (!$this->AdminAllowed()) {
            return redirect()->back()->with('alert', 'Você não tem permissão para realizar essa ação!');
        }

        $categorias = Categoria::find($r->id);
        if($categorias === null){
            return redirect()->back()->with('alert', 'Categoria não localizada!'); 
        } else 
        {
        return view('categorias.edit_categoria')
            ->with('categorias', $categorias);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Categoria  $Categoria
     * @return \Illuminate\Http\Response
     */
    public function update(Request $r)
    {
        if (!$this->AdminAllowed()) {
            return redirect()->back()->with('alert', 'Você não tem permissão para realizar essa ação!');
        }

        $categorias = Categoria::find($r->id);

        if ($categorias === null) {
            return redirect('')->with('alert', 'Categoria não localizada!');;
        }

        $categorias->categoria = mb_strtolower($r->categoria, 'UTF-8');

        $categorias->update();

        return redirect(route('categoria'))->withSuccess('Categoria alterada com sucesso!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Categoria  $Categoria
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $r)
    {
        if (!$this->AdminAllowed()) {
            return redirect()->back()->with('alert', 'Você não tem permissão para realizar essa ação!');
        }

        $categorias = Categoria::where('id', $r->id)->delete();
        return redirect(route('categoria'))->withSuccess('Categoria excluída com sucesso!');
    }
}
