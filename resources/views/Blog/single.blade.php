@extends('main')

@section('title', '| $post->title')
@section("content")
   <div class="row">
       <div class="col-md8 col-md-offset-2">
       <h1>{{$post->title}}</h1>
       <p class="text-break">{{$post->body}}</p>
       <hr>
       <p>Posted in : {{ $post->category->name }}</p>
       </div>
    
 
   </div>
   <div class="row">
   <div class="col-sm-12">
    <br>
    <a href="{{ route('home') }}" class="btn btn-light btn-block">Vrátit se na domovskou Stránku</a>
  </div> 
  </div>
@endsection