@extends("main")
@section("title", "|Admin Dashboard")
@section("content")
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header"></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                   

                    You are logged in!<br/>
                     <a href="{{url('/', )}}"><button class="btn btn-success btn-lg btn-block">Home Page</button></a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
