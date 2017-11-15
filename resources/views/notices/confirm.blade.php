@extends('layouts.app')

@section('content')

	<h1 class="text-center">Confirm</h1>
	<hr class="alert-danger">

	{!! Form::open(['route'=>'notices.store']) !!}

	<div class="form-group">
		
		{!! Form::label('template', 'Template:') !!}
		{!! Form::textarea('template', $template, ['class'=>'form-control']) !!}

	</div>

	<div class="form-group">
		
		{!! Form::submit('Deliver DMCA Notice Now', ['class'=>'form-control btn btn-primary']) !!}

	</div>

	{!! Form::close() !!}

@endsection