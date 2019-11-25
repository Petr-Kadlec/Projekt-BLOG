@extends('main')

@section('title', '| Edit Blog Post')

@section('content')
 
<div class="row">
<div class="form-group">
		{!! Form::model($post, ['route' => ['Posts.update', $post->id], 'method' => 'PUT']) !!}</div>
		<div class="col-md-8">
        <div class="form-group"> {{ Form::label('title', 'Title:') }}
     {{ Form::text('title', null, ["class" => 'form-control input-lg']) }}
        {{ Form::label('body', "Body:", ['class' => 'form-spacing-top']) }}
        {{ Form::textarea('body', null, ['class' => 'form-control']) }}
        </div>
        </div>
	
       
		
        <div class="col-md-4">
    

			<div class="well">
				<dl class="dl-horizontal">
                <div class="form-group">
					<dt>Created At:</dt>
              <dd>{{ date('j M Y H:i', strtotime($post->created_at)) }}</dd>
				</dl>

				<dl class="dl-horizontal">
              <dt>Last Updated:</dt>
                <dd>{{ date('j M Y H:i', strtotime($post->updated_at)) }}</dd>
				</dl>
				<hr>
                </div>
				<div class="row">
					<div class="col-sm-6">
                   
                  {!! Html::linkRoute('Posts.show', 'Cancel', array($post->id), array('class' => 'btn btn-danger btn-block')) !!}
					</div>
					<div class="col-sm-6">
                    	{{ Form::submit('Save Changes', ['class' => 'btn btn-success btn-block']) }}
					
                    </div>
				</div>

			
            </div>
		</div>
		{!! Form::close() !!}
	</div>	<!-- end of .row (form) -->

@stop 