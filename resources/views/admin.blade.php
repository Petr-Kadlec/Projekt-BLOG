@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">ADMIN Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in as ADMIN!
                    <a href="{{ route('Posts.create') }}"><h3 class="text-break">Napsat nový článek</h3></a>
                    <a href="{{url('admin/Posts', )}}"><h3 class="text-break">Všechny Články</h3></a>
                    <a href="{{route('categories.index')}}"><h3 class="text-break">Kategorie</h3></a>
                  
                    <a href="{{url('/', )}}"><h3 class="text-break">Domovská Stránka</h3></a>



                </div>
            </div>
        </div>
    </div>
</div>
@endsection