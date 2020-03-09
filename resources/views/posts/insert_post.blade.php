@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row justify-content-center">
      <div class="col-md-12 col-xs col-sm">
         <div class="card">
            <div class="card-header">{{ __('Inclusão de Post') }}</div>

            <div class="card-body">
               <form method="post" action="/storepost" enctype="multipart/form-data">
                  {{ csrf_field() }}
                  <div class="form-group row">
                     <div class="col-md-4 col-xs col-sm">
                        <label for="titulo">{{ __('Título') }}</label>
                        <input id="titulo" name="titulo" type="text" class="form-control @error('titulo') is-invalid @enderror" required autocomplete="titulo" autofocus>
                     </div>
                     <div class="col-md-4 col-xs col-sm">
                        <label for="categoria_id">{{ __('Categoria') }}</label>
                        <select id="categoria_id" name="categoria_id" class="form-control">
                           @foreach($categorias as $categoria)
                              <option value="{{$categoria->id}}">{{ucfirst($categoria->categoria)}}
                           @endforeach
                        </select>

                        <input id="autor_id" name="autor_id" type="hidden" class="form-control @error('autor_id') is-invalid @enderror" value="{{Auth::User()->id}}" required autocomplete="autor_id" autofocus>
                        <input id="Id" name="Id" type="hidden" class="form-control @error('Id') is-invalid @enderror" value="{{Auth::User()->id}}" required autocomplete="Id" autofocus>
                     </div>
                     <div class="col-md-4 col-xs col-sm">
                        <label for="imagem">{{ __('Imagem') }}</label>
                        <input type="file" name="fileupload" id="fileupload" class="form-control">
                     </div>
                  </div>
                  <div class="form-group row">
                     <div class="col-md-12 col-xs col-sm">
                        <label for="conteudo">{{ __('Conteúdo') }}</label>
                        <textarea id="conteudo" rows="20" name="conteudo" type="text" value="" class="form-control @error('conteudo') is-invalid @enderror" required autocomplete="conteudo" autofocus></textarea>
                     </div>
                  </div>

                  <div class="form-group row mb-0">
                     <div class="col-md-12 col-xs col-sm">
                        <button class="btn btn-primary" type="submit" id="submeter">
                           {{ __('Inserir') }}
                        </button>
                     </div>
                  </div>
               </form>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection
