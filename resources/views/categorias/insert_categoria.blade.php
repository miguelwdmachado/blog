@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row justify-content-center">
      <div class="col-md-8 col-xs col-sm">
         <div class="card">
            <div class="card-header">{{ __('Inclusão de Categoria') }}</div>

            <div class="card-body">
               <form method="POST" action="{{ route('storecategoria') }}">
                  @csrf

                  <div class="form-group row">
                     <label for="categoria" class="col-md-4 col-xs col-sm col-form-label text-md-right">{{ __('Categoria') }}</label>

                     <div class="col-md-6 col-xs col-sm">
                        <input id="categoria" name="categoria" type="text" class="form-control @error('categoria') is-invalid @enderror" value="" required autocomplete="categoria" autofocus>
                     </div>
                  </div>

                  <div class="form-group row mb-0">
                     <div class="col-md-6 offset-md-4 col-xs col-sm">
                        <button type="submit" class="btn btn-primary">
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