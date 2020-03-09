@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row">
      <div class="col-11 col-xs col-sm col-md col-lg text-center"><h3>{{ __('Tipos de Usuário') }}</h3></div>
      <div class="col-1 col-xs col-sm col-md-1 col-lg-1 pull-right"><a class="btn btn-primary" href="{{route('insertusertypes')}}">{{ __('Incluir') }}</a></div>
   </div>
   <div class="row">
      <div class="col-12 col-sm col-md col-lg">
         <div class="card">
            <div class="card-header">
               <div class="row text-center">
                  <div class="col-1 col-xs-1 col-sm-1 col-md-1 col-lg-1 linha-vertical ltab" style="min-width:50px">Id</div>
                  <div class="col-9 col-xs col-sm col-md-9 col-lg-9 linha-vertical ltab">Tipo</div>
                  <div class="col-2 col-xs-2 col-sm-2 col-md-2 col-lg-2 ltab" style="min-width:100px">Ações</div>
               </div>
            </div>
            <div class="card-body">
               @foreach($user_types as $user_type)
               <div class="row">
                  <div class="col-1 col-xs-1 col-sm-1 col-md-1 col-lg-1 text-center linha-vertical ltab" style="min-width:50px">{{$user_type->id}}</div>
                  <div class="col-9 col-xs col-sm col-md-9 col-lg-9 linha-vertical ltab">{{ucfirst($user_type->type)}}</div>
                  <div class="col-1 col-xs-1 col-sm-1 col-md-1 col-lg-1 text-center linha-vertical ltab" style="min-width:50px"><i class="fas fa-edit" style="cursor: pointer" onclick="edit({{$user_type->id}})" title="Editar Tipo"></i></div>
                  <div class="col-1 col-xs-1 col-sm-1 col-md-1 col-lg-1 text-center ltab" style="min-width:50px"><i class="fas fa-trash-alt" style="cursor: pointer" onclick="del({{$user_type->id}})" title="Excluir Tipo"></i></div>
               </div>
               <hr class="lh"/>
               @endforeach
            </div>
            <div class="card-header">
               <div class="row text-center">
                  {{$user_types->links()}}
               </div>
            </div>
         </div>
      </div>
   </div>
   <form action="{{route('editusertypes')}}" method="POST" id="edit_form">
		@csrf
		<input type="hidden" name="id" value="" id="ed"/>
   </form>
   <form action="{{route('deleteusertypes')}}" method="POST" id="del_form">
		@csrf
		<input type="hidden" name="id" value="" id="eed"/>
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
<script type="text/javascript">
    function del(id){
      $('#eed').val(id);
		$('#del_form').submit();
    }
</script>
   @if(session('success'))
      <script>alert("{{session('success')}}")</script>
   @endif
   @if(session('error'))
      <script>alert("{{session('error')}}")</script>
   @endif
@endsection