@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <!--
    Deve incluir um filtro para encontrar postagens por categoria;
    Deve incluir um filtro para encontrar postagens por texto;
    Deve incluir um filtro para encontrar postagens por autor;
     -->
    @foreach($posts as $post)
    <div class="row">
        <div class="card col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="card-body bodypost">
                <h5 class="card-title titlepost">{{$post->titulo}}</h5>
                <div class="textpost">
                    <img src="images/{{$post->imagem}}" class="card-img2" alt="" align="left">
                    {{$post->conteudo}}
                </div>
            </div>
            <div class="align-self-end autorpost" style="heigth:200px; margin-right:20px">{{$post->autor->name}}</div>
        </div>
    </div>
    @endforeach
    <div class="row">
        <div class="card col-xs-12 col-sm-12 col-md-12 col-lg-12 align-items-center align-middle">{{$posts->links()}}</div>
    </div>
</div>
@endsection
