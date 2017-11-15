@extends('layouts.app')

@section('content')

	<h1 class="text-center">Your Notices</h1>
	<hr class="alert-danger">

	<table class="table table-striped table-bordered table-hover">
		
		<thead>
			<th>This Content:</th>
			<th>Accessible Here:</th>
			<th>Is Infringing Upon my Work Here:</th>
			<th>Notice Sent:</th>
			<th>Content Removed:</th>
		</thead>
		<tbody>
			
			@foreach ($notices as $notice)

				<tr>
					
					<td>{{ $notice->infringing_title }}</td>
					<td>{!! link_to($notice->infringing_link) !!}</td>
					<td>{!! link_to($notice->original_link) !!}</td>
					<td>{{ $notice->created_at->diffForHumans() }}</td>
					<td>
						
						{!! Form::open(['method'=>'PATCH', 'url'=>'notices/'. $notice->id]) !!}
						<div class="form-group">
								
							<input type="checkbox" name="content_removed" id="content_removed" class="form-check-input" {{ $notice->content_removed?"checked":"" }}>

							{!! Form::submit('Update',['class'=>'btn btn-primary form-control']) !!}

						</div>
						{!! Form::close() !!}

					</td>

				</tr>
			@endforeach

		</tbody>

	</table>

	@if(!count($notices))
		<p text-center>You haven't sent any DMCA notices yet</p>
	@endif


@endsection