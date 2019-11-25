@extends("main")
@section("title" , "| All Posts")

@section("content")

<div class="row">
  <div class="col-md-10 mt-3" >
  <h1>ALL Posts</h1>
  </div>
  <div class="col-md-2 mt-2">
   <a href="{{ route('Posts.create') }}" class="btn btn-lg btn-block btn-primary">Create new Post</a>
  </div>
  <div class="col-md-12">
  <hr>
  </div>
</div>


<div class="row">
 <div class="col-md-12">
 <table class="table">
 <thead>
    <th> #</th>
    <th>TITLE</th>
    <th>Body</th>
    <th>Created At</th>
    <th></th>
 </thead>
 <tbody>
    @foreach($posts as $post)
        <tr>
        <th>{{$post->id}}</th>
        <td>{{$post->title}}</td>
        <td>{{substr($post->body, 0, 50)}} {{ strlen($post->body) > 50 ? "..." : "" }} </td>
        <td>{{date("j M Y" , strtotime($post->created_at))}}</td>
        <td><a href ="{{ route('Posts.show' , $post->id) }}" class="btn btn-light">View</a><a href = "{{route('Posts.edit', $post->id)}}" class ="btn btn-primary">Edit</a> </td>
        </tr>
    @endforeach
 </tbody>

 </table>
 </div>
</div>

@endsection