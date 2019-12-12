@extends("main")
@section("title", "|View Post")
@section("content")

<div class="row ">
<div class="col-md-8  ">
<h1 class="text-break">{{ $post->title  }}</h1>
<p class="lead text-break ">{{ $post->body  }}</p>
</div>

 <div class="col-md-4">
 <div class="well">
<dl class="dl-horizontal">
<dt>url:</dt>
<dd><a href="{{ url($post->slug) }}"> {{ Html::link(url('blog' , $post->slug), url('blog' ,$post->slug)) }}</a></dd>
</dl>

<dt>Created At:</dt>
<dd>{{ date("j M Y H:i", strtotime($post->created_at))}}</dd>
</dl>

<dl class="dl-horizontal">
<dt>Last Updated:</dt>
<dd>{{date("j M Y H:i", strtotime($post->updated_at)) }}</dd>
</dl>
<hr>
<div class="row">
  <div class="col-sm-6">
    <a href="{{ route('Posts.edit', $post->id) }}" class="btn btn-primary btn-block">Edit</a>
  </div>
  <div class="col-sm-6">
  <form method="POST" action="{{ route('Posts.destroy', $post->id) }}">
    <input type="submit" value="Delete" onclick="return confirm('Are you sure?')" class="btn btn-danger btn-block">
    <input type="hidden" name="_token" value="{{ Session::token() }}"> {{ method_field('DELETE') }}

</div>

</form>


  </div>
  <div class="row">
  <div class="col-sm-12">
    <br>
    <a href="{{ route('Posts.index') }}" class="btn btn-light btn-block">Show all Posts</a>
     </div>
</div>
     </div>
   </div>
 
 </div>
 <div class="row">
  <div class="col-sm-12">
    <br>
    <a href="{{ route('home') }}" class="btn btn-light btn-block">Vrátit se na domovskou Stránku</a>
  </div> 
@endsection