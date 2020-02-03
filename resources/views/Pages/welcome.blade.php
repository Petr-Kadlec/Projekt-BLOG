@extends("main")
@section("title" , "| Homepage")
 @section("content")
 
 
 @section("stylesheets")
{{ Html::style("css/nav.css") }}
@endsection
  <div class="col-md-12">
  <div class="jumbotron">
  <h1>Welcome To my Blog </h1>
  <p class = "lead"> Hello Thank you so much for visiting my blog, you can se some newest post in this page and all the post are on the blog section or you will get redicted if you press the button on the bottom see all posts.</p>

</div>
  </div>
  <div class="row">
    <div class="col-md-12 ">

            @foreach($posts as $post)


      <div class = "post">
      <h3 class="text-break">{{ $post->title }}</h3></a>
       <p class="text-break">{{substr($post->body, 0, 300)}}{{ strlen($post->body) > 300 ? "...": " "}} </p>
       <h5 class="text-break">Published: {{date("j M Y" , strtotime($post->created_at))}}</h5>
       <a href="{{url('blog', $post->slug)}}" class="btn btn-primary"><h4>Read More</h2></a>
     
       
       </div> 
   
      @endforeach
    </div>

    
   <div class="col-sm-12">
    
    <a href="{{ route('blog.index') }}" class="btn"><h3>See All Posts</h2></a>
  </div> 
 
  </div>


@endsection












