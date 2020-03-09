@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row justify-content-center">
      <div class="col-md-12 col-xs col-sm">
         <div class="card">
            <div class="card-header">{{ __('Inclusão de IMagem ao Post') }}</div>

            <div class="card-body">
               <form method="POST" action="{{ route('storepostimage') }}" enctype="multipart/form-data">
                  @csrf

                  <div class="form-group row">
                     <div class="col-md-12 col-xs col-sm">
                        <label for="imagem">{{ __('Imagem') }}</label>
                        <input type="file" name="imagem" class="form-control">
                        <input type="hidden" name="id" value="{{$posts->id}}">
                     </div>
                  </div>

                  <div class="form-group row mb-0">
                     <div class="col-md-12 col-xs col-sm">
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