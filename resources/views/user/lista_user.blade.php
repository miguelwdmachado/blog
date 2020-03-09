@extends('layouts.app')

@section('content')
<div class="container-fluid">
   <div class="row">
      <div class="col-12 col-xs col-sm col-md col-lg text-center"><h3>{{ __('Usuários') }}</h3></div>
   </div>
   <div class="row">
      <div class="col-12 col-sm col-md col-lg">
         <div class="card">
            <div class="card-header">
               <div class="row text-center">
                  <div class="col-1 col-xs-1 col-sm-1 col-md-1 col-lg-1 text-center linha-vertical ltab" style="min-width:50px">Id</div>
                  <div class="col-4 col-xs-2 col-sm-2 col-md-4 col-lg-4 linha-vertical ltab">Nome</div>
                  <div class="col-3 col-xs-2 col-sm-2 col-md-3 col-lg-3 linha-vertical ltab">E-Mail</div>
                  <div class="col-3 col-xs-1 col-sm-1 col-md-3 col-lg-3 linha-vertical ltab" style="min-width:50px">Tipo</div>
                  <div class="col-1 col-xs-1 col-sm-1 col-md-1 col-lg-1 text-center ltab" style="min-width:70px">Ações</div>
               </div>
            </div>
            <div class="card-body">
               @foreach($users as $user)
               <div class="row">
                  <div class="col-1 col-xs-1 col-sm-1 col-md-1 col-lg-1 text-center linha-vertical ltab" style="min-width:50px">{{$user->id}}</div>
                  <div class="col-4 col-xs-2 col-sm-2 col-md-4 col-lg-4 linha-vertical ltab">{{$user->name}}</div>
                  <div class="col-3 col-xs-2 col-sm-2 col-md-3 col-lg-3 linha-vertical ltab">{{$user->email}}</div>
                  <div class="col-3 col-xs-1 col-sm-1 col-md-3 col-lg-3 linha-vertical ltab" style="min-width:50px">{{ucfirst($user->type->type)}}</div>
                  <div class="col-1 col-xs-1 col-sm-1 col-md-1 col-lg-1 text-center ltab" style="min-width:70px"><i class="fas fa-edit" style="cursor: pointer" onclick="edit({{$user->id}})" title="Editar Usuário"></i></div>
               </div>
               <hr class="lh"/>
               @endforeach
            </div>
         </div>
      </div>
   </div>
   <form action="{{route('edituser')}}" method="POST" id="edit_form">
		@csrf
		<input type="hidden" name="id" value="" id="ed"/>
   </form>

</div>
@endsection
@section('scripts')
<script type="text/javascript">
    function edit(id){
      $('#ed').val(id);
		$('#edit_form').submit();
    }
</script>
   @if(session('success'))
      <script>alert("{{session('success')}}")</script>
   @endif
   @if(session('error'))
      <script>alert("{{session('error')}}")</script>
   @endif
@endsection