@extends("main")
@section("title" , "| Create New Post")




@section("content")

 
  <div class="col-md-12 col-md-offset-2">
    <h1>Create New Post</h1>
    <hr>
    <form method="POST" action="{{ route('Posts.store') }}">
      <div class="form-group">
        <label name="title">Title:</label>
        <input id="title" name="title" class="form-control">
      </div>
      <div class="form-group">
        <label name="body">Post Body:</label>
        <textarea id="body" name="body" rows="12" class="form-control"></textarea>
      </div>
      <input type="submit" value="Create Post" class="btn btn-success btn-lg btn-block">
      <input type="hidden" name="_token" value="{{ Session::token() }}">
    </form>
  </div>
</div>
     </div>
   </div>
@endsection
