@extends("main")
@section("title", "|Admin Dashboard")
@section("content")
<div class="container">
    <div class="row">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header"><h1>ADMIN Dashboard</h1></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                   <small> You are logged in as ADMIN!</small>
                    <ul class="list-group">
  <li class="list-group-item"><a href="{{ route('Posts.create') }}"><h3 class="text-break">Write new post</h3></a></li>
  <li class="list-group-item"><a href="{{url('admin/Posts', )}}"><h3 class="text-break">All posts</h3></a></li>
  <li class="list-group-item"> <a href="{{route('categories.index')}}"><h3 class="text-break">Categories</h3></a></li>
  <li class="list-group-item"><a href="{{route('tags.index')}}"><h3 class="text-break">Tags</h3></a></li>
  <li class="list-group-item"> <a href="{{url('/', )}}"><h3 class="text-break">Home page</h3></a></li>
</ul>
                  
                </div>
            </div>
        </div>
    </div>
</div>
@endsection