@extends("main")
@section("title", "|View Post")
@section("content")

<div class="row ">
<div class="col-md-8  ">
<img src = "{{ asset('images/'.$post->image)}}"/>
<h1 class="text-break">{{ $post->title  }}</h1>
<p class="lead text-break ">{!! $post->body  !!}</p>

<hr>
<div class = "tags">

@foreach($post->tags as $tag)
<span class="badge badge-primary" name =>{{ $tag->name }}  </span> 
@endforeach
</div>
<div id="backend-comments" style="margin-top: 50px;">
				<h3>Comments <small>{{ $post->comments()->count() }} total</small></h3>

				<table class="table">
					<thead>
						<tr>
							<th>Name</th>
							<th>Email</th>
							<th>Comment</th>
							 <th>approved</th>
							<th width="70px"></th>
						</tr>
					</thead>

					<tbody>
						@foreach ($post->comments as $comment)
						<tr>
							<td>{{ $comment->name }}</td>
							<td>{{ $comment->email }}</td>
							<td>{{ $comment->comment }}</td>
							<td> 	{{ Form::model($comment, ['route' => ['comments.approved', $comment->id], 'method' => 'PUT' ,'id' => 'approved']) }}<input <?php if($comment->approved == 1){echo "checked";} ?>   type="checkbox" name='approved' >{{ Form::button('<span class="glyphicon glyphicon-ok"></span>', ['type' => 'submit', 'class' => 'btn btn-success btn-xs'] )  }}{{ Form::close() }} </td>
							<td>
								<a href="{{ route('comments.edit', $comment->id) }}" class="btn btn-xs btn-primary"><span class="glyphicon glyphicon-pencil"></span></a>
								<a href="{{ route('comments.delete', $comment->id) }}" class="btn btn-xs btn-danger"><span class="glyphicon glyphicon-trash"></span></a>
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
		<div class="col-md-4">
			<div class="well">
				<dl class="dl-horizontal">
					<label>Url:</label>
					<p><a href="{{ route('Blog.single', $post->slug) }}">{{ route('Blog.single', $post->slug) }}</a></p>
				</dl>

				<dl class="dl-horizontal">
					<label>Category:</label>
					<p>{{ $post->category->name }}</p>
				</dl>

				<dl class="dl-horizontal">
					<label>Created At:</label>
					<p>{{ date('M j, Y h:ia', strtotime($post->created_at)) }}</p>
				</dl>

				<dl class="dl-horizontal">
					<label>Last Updated:</label>
					<p>{{ date('M j, Y h:ia', strtotime($post->updated_at)) }}</p>
				</dl>
				<hr>
				<div class="row">
					<div class="col-sm-6">
						{!! Html::linkRoute('Posts.edit', 'Edit', array($post->id), array('class' => 'btn btn-primary btn-block')) !!}
					</div>
					<div class="col-sm-6">
						{!! Form::open(['route' => ['Posts.destroy', $post->id], 'method' => 'DELETE']) !!}

						{!! Form::submit('Delete', ['class' => 'btn btn-danger btn-block']) !!}

						{!! Form::close() !!}
					</div>
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