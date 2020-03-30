@extends("main")
@section("title" , "| About")

 @section("content")

 @auth('web')
   <h1>hahahahFUNGUJETOLOL</h1>
   <div class="row">
        <div class="col-md-12">
        <H1>About me </H1>
        <p>hehehehehuhhuhuh</p>
        </div>
@endauth
@guest('web')
    <div class="row">
        <div class="col-md-12">
        <H1>About me </H1>
        <p>hehehehehuhhuhuh</p>
        </div>
@endsection
@endguest
