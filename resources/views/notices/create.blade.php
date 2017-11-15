@extends('layouts.app')

@section('content')

	<h1 class="page-heading">Prepare a DMCA Notice</h1>


	{!! Form::open(['method'=>'POST', 'route'=>'confirm']) !!}


		<div class="form-group">
			
			{!! Form::label('provider_id', 'Who are we sending this to?') !!}
			{!! Form::select('provider_id', $providers, null, ['class'=>'form-control']) !!}
			

		</div>


		<div class="form-group">
			
			{!! Form::label('infringing_title', 'What is the title of the content that is being ingringed upon.') !!}
			{!! Form::text('infringing_title', null, ['class'=>'form-control']) !!}
			{!! $errors->first('infringing_title', '<p class="text-danger">:message</p>') !!}

		</div>

		<div class="form-group">
			
			{!! Form::label('infringing_link', 'What is the link to where this content is located') !!}
			{!! Form::text('infringing_link', null, ['class'=>'form-control']) !!}
			{!! $errors->first('infringing_link', '<p class="text-danger">:message</p>') !!}

		</div>

		<div class="form-group">
			
			{!! Form::label('original_link', 'To verify that you own the content, we now need the link to the original content on your server.') !!}
			{!! Form::text('original_link', null, ['class'=>'form-control']) !!}
			{!! $errors->first('original_link', '<p class="text-danger">:message</p>') !!}


		</div>

		<div class="form-group">
			
			{!! Form::label('original_description', 'And, Finally, It might help to provide some extra information related to this DMCA notice') !!}
			{!! Form::text('original_description', null, ['class'=>'form-control']) !!}
			{!! $errors->first('original_description', '<p class="text-danger">:message</p>') !!}

		</div>

		<div class="form-group">

			{!! Form::submit('Preview Notice', ['class'=>'btn btn-primary form-control']) !!}

		</div>





	{!! Form::close() !!}
	

@endsection