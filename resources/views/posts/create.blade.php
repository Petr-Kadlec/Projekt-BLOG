@extends("main")

@section("title" , "| Create New Post")
@section("stylesheets")
{!! Html::style("css/select2.min.css") !!}
<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
  <script>tinymce.init({selector:'textarea'});</script>
</script>
@endsection

@section("content")






 
  <div class="col-md-10 ">
    <h1>Create New Post</h1>
    <hr>
    <form method="POST" action="{{ route('Posts.store') }}" enctype="multipart/form-data">
      <div class="form-group">
        <label name="title">Title:</label>
        <input id="title" name="title" class="form-control">
      </div>
      <div class="form-group">
        <label name="slug">slug:</label>
        <input id="slug" name="slug" rows="12" class="form-control">
      </div>
      <div class="form-group">
        
        <label name="category">Category:</label>
       <select class = "form-control" name = "category_id">
                @foreach($categories as $category)
                <option value ="{{$category->id}}">{{$category->name }}</option>
                @endforeach
       </select>

      </div>
      <div class="form-group">
        
    		{{ Form::label('tags', 'Tags:') }}
				<select class="form-control select2-multi" name="tags[]" multiple="multiple">
					@foreach($tags as $tag)
						<option value='{{ $tag->id }}'>{{ $tag->name }}</option>
					@endforeach

				</select>
              {{Form::Label('featured_image', 'Upload feature update')}}
              {{Form::file('featured_image')}}

      </div>
      

      <div class="form-group">
        <label name="body">Post Body:</label>
        <textarea id="body" name="body" rows="12" class="form-control"></textarea>
      </div>
      <input type="submit" value="Create post" class="btn btn-success btn-lg btn-block">
      <input type="hidden" name="_token" value="{{ Session::token() }}">
    </form>
  </div>
</div>
     </div>
   </div>

@endsection
@section("scripts")
{!! Html::script('js/select2.min.js') !!}

<script type="text/javascript">
  $('.select2-multi').select2();
</script>
@endsection




