<?php

namespace App\Http\Controllers;

use Auth;
use App\Categoria;
use App\Postagem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Session;
use Illuminate\Database\Eloquent\Builder;

class PostagemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categorias = Categoria::all();
        $posts = Postagem::paginate(20);
        return view('posts.lista_post')
            ->with('posts', $posts)
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
     * @param  \App\Postagem  $Postagem
     * @return \Illuminate\Http\Response
     */
    public function insert()
    {
        if (!$this->AdminAllowed()) {
            return redirect()->back()->with('alert', 'Você não tem permissão para realizar essa ação!');
        }

        $categorias = Categoria::all();
        return view('posts.insert_post')
                ->with('categorias', $categorias);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function salvar(Request $r)
    {
        //if (!$this->AdminAllowed() and Auth::User()->id !== $r->autor_id) {
        if (!$this->AdminAllowed()) {
            return redirect()->back()->with('alert', 'Você não tem permissão para realizar essa ação!');
        }
        $validatedData = Validator::make($r->all(), [
            'titulo' => 'required',
            'categoria_id' => 'required',
            'autor_id' => 'required',
            'conteudo' => 'required',
          ]);
        if ($validatedData->fails())
        {
            return redirect(route('posts'))->with(['erros' => $validatedData]);
        }

        $r->file('fileupload')->move(public_path('/images'), $r->file('fileupload')->getClientOriginalName());

        $data = $r->all();
        $posts = Postagem::create([
            'titulo' => $r->titulo,
            'categoria_id' => $r->categoria_id,
            'autor_id' => $r->autor_id,
            'imagem' => $r->file('fileupload')->getClientOriginalName(),
            'conteudo' => $r->conteudo
            ]);
        $posts->save();        

       return redirect(route('posts'))->withSuccess('Post cadastrado com sucesso!');
    }

    public function salvar_imagem(Request $r)
    {

        if (!$this->AdminAllowed()) {
            return redirect()->back()->with('alert', 'Você não tem permissão para realizar essa ação!');
        }

    }    

    /**
     * Display the specified resource.
     *
     * @param  \App\Postagem  $Postagem
     * @return \Illuminate\Http\Response
     */
    public function show(Request $r)
    {
        $posts = Postagem::where('id', $r->id)->paginate(5);
        return view('welcome')
            ->with('posts',$posts);
    }

    public function busca_categoria(Request $r)
    {
        $posts = Postagem::where('categoria_id', $r->pcategoria)->paginate(5);
        return view('welcome')
            ->with('posts',$posts);
    }

    public function busca_texto(Request $r)
    {
        $posts = Postagem::where('conteudo', 'like', '%' . $r->ptexto . '%')->paginate(5);
        return view('welcome')
            ->with('posts',$posts);
    }

    public function busca_autor(Request $r)
    {
        $posts = Postagem::whereHas('autor', function (Builder $query) {
            $query->where('name', 'like', '%' . $r->pautor . '%');
        })->paginate(5);
        return view('welcome')
            ->with('posts',$posts);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Postagem  $Postagem
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $r)
    {
        if (!$this->AdminAllowed()) {
            return redirect()->back()->with('alert', 'Você não tem permissão para realizar essa ação!');
        }

        $categorias = Categoria::all();
        $posts = Postagem::find($r->id);
        if($posts === null){
            return redirect()->back()->with('alert', 'Post de usuário não localizado!'); 
        } else 
        {
            return view('posts.insert_post')
                ->with('posts', $posts)
                ->with('categorias', $categorias);
            }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Postagem  $Postagem
     * @return \Illuminate\Http\Response
     */
    public function update(Request $r)
    {
        if (!$this->AdminAllowed()) {
            return redirect()->back()->with('alert', 'Você não tem permissão para realizar essa ação!');
        }

        $posts = Postagem::find($r->id);

        if ($posts === null) {
            return redirect('')->with('alert', 'Post não localizado!');;
        }

        $posts->type = mb_strtolower($r->type, 'UTF-8');

        $posts->update();

        return redirect(route('posts'))->withSuccess('Post alterado com sucesso!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Postagem  $Postagem
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $r)
    {
        if (!$this->AdminAllowed()) {
            return redirect()->back()->with('alert', 'Você não tem permissão para realizar essa ação!');
        }

        $posts = Postagem::where('id', $r->id)->first();
        File::delete('images/'.$posts->imagem);
        //Storage::delete('public', $posts->imagem);
        $posts->delete();
        return redirect(route('posts'))->withSuccess('Post excluído com sucesso!');
    }
}
