@extends ('main')

@section('title', "| $category->name Category")

@section('content')
<div class="row">
		<div class="col-md-8">
			<h1>{{ $category->name }} Tag <small>{{ $category->posts()->count() }} Posts</small></h1>
		</div>
		<div class="col-md-2 ">
			<a href="{{ route('categories.edit', $category->id) }}" class="btn btn-primary pull-right btn-block" style="margin-top:20px;">Edit</a>
		</div>
	
	</div>


<div class="row">
<div class="col-md-12">
<table class ="table">
 <thead>
     <tr>
         <th>#</th>
         <th>Title</th>
         <th>Tags</th>
         <th></th>
     </tr>
 </thead>
 <tbody>
       @foreach($category->posts as $post)
       <tr>
       <th>{{$post->id}}</th>
       <td>{{$post->title}}</td>
       <td>
       <span class="badge badge-secondary">{{$category->name}}</span>
    
       </td>
       <td><a href="{{ route('Posts.show' , $post->id)}}" class="btn btn-info btn-sm">view</td>
       </tr>
       @endforeach
 </tbody>
</table>
</div>
</div>

@endsection