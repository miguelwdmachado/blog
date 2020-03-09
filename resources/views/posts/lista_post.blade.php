@extends('layouts.app')

@section('content')
<div class="container-fluid">
   <div class="row">
      <div class="col-11 col-xs col-sm col-md col-lg text-center"><h3>{{ __('Posts') }}</h3></div>
      @guest
      @else
         <div class="col-1 col-xs col-sm col-md-1 col-lg-1 pull-right"><a class="btn btn-primary" href="{{route('insertpost')}}">{{ __('Incluir') }}</a></div>
      @endguest
   </div>
      <div class="form-group row">
         <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
            <label for="bcategoria">Categoria</label>
            <select id="bcategoria" name="bcategoria" class="form-control">
               <option value=""selected>
            @foreach($categorias as $categoria)
               <option value="{{$categoria->id}}">{{ucfirst($categoria->categoria)}}
            @endforeach
            </select>
         </div>
         <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
               <label for="btexto">Texto</label>
               <input type="text" class="form-control" id="btexto" maxlength="20">
         </div>
         <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
               <label for="bautor">Autor</label>
               <input type="text" class="form-control" id="bautor" maxlength="20">
         </div>
      </div>
      <div class="form-group row">
         <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
            <button type="submit" class="btn btn-primary" onclick="busca()">
               {{ __('Buscar') }}
            </button>
            <button type="cancel" class="btn btn-dark" onclick="limpa()">
               {{ __('Limpar') }}
            </button>
         </div>
      </div>
   </div>
   <div class="row">
      <div class="col-12 col-xs col-sm col-md col-lg">
         <div class="card">
            <div class="card-header">
               <div class="row text-center">
                  <div class="col-1 col-xs-1 col-sm-1 col-md-1 col-lg-1 linha-vertical ltab" style="min-width:50px">Id</div>
                  <div class="col-2 col-xs col-sm col-md-2 col-lg-2 linha-vertical ltab">Título</div>
                  <div class="col-2 col-xs col-sm col-md-2 col-lg-2 linha-vertical ltab">Categoria</div>
                  <div class="col-3 col-xs col-sm col-md-3 col-lg-3 linha-vertical ltab">Post</div>
                  <div class="col-2 col-xs col-sm col-md-2 col-lg-2 linha-vertical ltab">Autor</div>
                  <div class="col-2 col-xs-2 col-sm-2 col-md-2 col-lg-2 ltab" style="min-width:100px">Ações</div>
               </div>
            </div>
            <div class="card-body">
               @foreach($posts as $post)
               <div class="row">
                  <div class="col-1 col-xs-1 col-sm-1 col-md-1 col-lg-1 linha-vertical text-center ltab" style="min-width:50px">{{$post->id}}</div>
                  <div class="col-2 col-xs col-sm col-md-2 col-lg-2 linha-vertical ltab">{{ucwords($post->titulo)}}</div>
                  <div class="col-2 col-xs col-sm col-md-2 col-lg-2 linha-vertical ltab">{{$post->categoria->categoria}}</div>
                  <div class="col-3 col-xs col-sm col-md-3 col-lg-3 linha-vertical ltab"><textarea rows='0' cols='45' style='resize: none; border: 0; margin-top: 0; height: 20px;'>{{$post->conteudo}}</textarea></div>
                  <div class="col-2 col-xs col-sm col-md-2 col-lg-2 linha-vertical ltab">{{$post->autor->name}}</div>
                  <div class="col-1 col-xs-1 col-sm-1 col-md-1 col-lg-1 text-center linha-vertical ltab" style="min-width:50px"><i class="fas fa-trash-alt" style="cursor: pointer" onclick="del({{$post->id}})" title="Excluir Post"></i></div>
                  <div class="col-1 col-xs-1 col-sm-1 col-md-1 col-lg-1 text-center ltab" style="min-width:50px"><i class="fas fa-eye" style="cursor: pointer" onclick="select({{$post->id}})" title="Visualizar Post"></i></div>
               </div>
               <hr class="lh"/>
               @endforeach
            </div>
            <div class="card-header">
               <div class="row text-center">
                  {{$posts->links()}}
               </div>
            </div>
         </div>
      </div>
   </div>
   <form action="{{route('deletepost')}}" method="POST" id="del_form">
		@csrf
		<input type="hidden" name="id" value="" id="ed"/>
   </form>
   <form action="{{route('post')}}" method="GET" id="view_form">
		@csrf
		<input type="hidden" name="id" value="" id="eed"/>
   </form>   
   <form action="{{route('postcategoria')}}" method="GET" id="pcat_form">
		@csrf
		<input type="hidden" name="pcategoria" value="" id="pcategoria"/>
   </form>   
   <form action="{{route('posttexto')}}" method="GET" id="ptex_form">
		@csrf
		<input type="hidden" name="ptexto" value="" id="ptexto"/>
   </form>   
   <form action="{{route('postautor')}}" method="GET" id="paut_form">
		@csrf
		<input type="hidden" name="pautor" value="" id="pautor"/>
   </form>   

</div>
@endsection
@section('scripts')
<script type="text/javascript">
    function del(id){
      $('#ed').val(id);
		$('#del_form').submit();
    }
    function select(id){
      $('#eed').val(id);
		$('#view_form').submit();
    }
    function busca(){
       if ($('#bcategoria').val() !== '') {
         var pal_categoria = $('#bcategoria').val();
         $('#pcategoria').val(pal_categoria);
         $('#pcat_form').submit();
       }
       if ($('#btexto').val() !== '') {
         var pal_texto = $('#btexto').val();
         $('#ptexto').val(pal_texto);
         $('#ptex_form').submit();
       }
       if ($('#bautor').val() !== '') {
         var pal_autor = $('#bautor').val();
         $('#pautor').val(pal_autor);
         $('#paut_form').submit();
       }
    }
    function limpa(){
       $('#bcategoria').val('');
       $('#btexto').val('');
       $('#bautor').val('');
    }
</script>
   @if(session('success'))
      <script>alert("{{session('success')}}")</script>
   @endif
   @if(session('error'))
      <script>alert("{{session('error')}}")</script>
   @endif
@endsection