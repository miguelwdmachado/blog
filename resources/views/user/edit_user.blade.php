@extends('layouts.app')

@section('content')
<div class="container-fluid">
   <div class="row justify-content-center">
      <div class="col-md-8 col-xs col-sm">
         <div class="card">
            <div class="card-header">{{ __('Edição de Usuário') }}</div>

            <div class="card-body">
               <form method="POST" action="{{ route('updateuser') }}">
                  @csrf

                  <div class="form-group row">
                     <div class="col-md-8 col-xs col-sm">
                        <label for="name">{{ __('Nome') }}</label>
                        <input type="text" name="name" class="form-control" value="{{$user->name}}" readonly>
                     </div>
                  </div>
                  <div class="form-group row">
                     <div class="col-md-4 col-xs col-sm">
                        <label for="type_id">{{ __('Tipo Atual') }}</label>
                        <input type="text" name="type_id" class="form-control" value="{{ucfirst($user->type->type)}}" readonly>
                     </div>
                     <div class="col-md-4 col-xs col-sm">
                        <label for="type_id">{{ __('Novo Tipo') }}
                        <select id="type_id" name="type_id" class="form-control" style="margin-top:8px">
                           @foreach($user_types as $user_type)
                              <option value="{{$user_type->id}}">{{ucfirst($user_type->type)}}
                           @endforeach
                           <input type="hidden" name="id" value="{{$user->id}}" id="ed"/>
                        </select>
                     </div>
                  </div>

                  <div class="form-group row mb-0">
                     <div class="col-md-8 col-xs col-sm">
                        <button type="submit" class="btn btn-primary">
                           {{ __('Salvar') }}
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