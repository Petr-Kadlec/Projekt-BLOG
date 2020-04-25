@extends('main')

@section('title', '| Edit Blog Post')
@section("stylesheets")
{!! Html::style("css/select2.min.css")!!}
<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
  <script>tinymce.init({selector:'textarea'});</script>
</script>
@endsection

@section('content')
 
<div class="row">
<div class="form-group">
		{!! Form::model($post, ['route' => ['Posts.update', $post->id], 'method' => 'PUT', 'files'=> true]) !!}</div>
		<div class="col-md-8">
        <div class="form-group">
		{{ Form::label('title', 'Title:') }}
         {{ Form::text('title', null, ["class" => 'form-control input-lg']) }}
		 <br>
		 
		 {{ Form::label('slug', 'Slug:') }}
		
         {{ Form::text('slug', null, ["class" => 'form-control input-lg']) }}

		 {{ Form::label('category_id', 'Category:') }}
		 {{Form::select('category_id' , $categories, $post->category_id, ['class' => 'form-control']) }}

		 {{ Form::label('tags', 'Tags:' , ["class" => 'form-spacing-top']) }}
		 {{ Form::select('tags[]' , $tags, null, ["class" => ' form-control select2-multi ' ,'multiple' => 'multiple' ]) }}

		 {{Form::label('featured_image', 'Update Featured Image:')}}
		 {{Form::file('featured_image')}}
		
		 <br>
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
@section("scripts")
   {!! Html::script("js/select2.min.js")!!}
   <script type = "text/javascript">
 $(".select2-multi").select2();
$(".select-multi").select2().val({!! json_encode($post->tags()->allRelatedIds())!!}).trigger("change");
</script>
@endsection



