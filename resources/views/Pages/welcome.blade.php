@extends("main")
@section("title" , "| Homepage")
 @section("content")
  <div class="col-md-13">
  <div class="jumbotron">
  <h1>my blog </h1>
  <p class = "lead"> HHUHUHU HEHEHEHE</p>
  <p><a class="btn btn-primary btn-lg" href="#" role ="button">Popular Posts</a></p>
</div>
  </div>
  <div class="row  ">
    <div class="col-md-8 ">

            @foreach($posts as $post)


      <div class = "post " >
       <h3 class="text-break">{{ $post->title }}</h3>
       <p class="text-break">{{substr($post->body, 0, 300)}}{{ strlen($post->body) > 300 ? "...": " "}} </p>
       <br>
        <a href="{{url('blog', $post->slug)}}" class="btn btn-primary">Read More</a>
       </div> 
    <hr>
      @endforeach
    </div>

    <div class="col-md-3 col-md-offset-1" >
    <h2>SIDEBAR </h2>
   </div>
  </div>

@endsection












