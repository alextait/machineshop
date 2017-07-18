@extends('layouts.main')

@section('title', '| All Tags')

@section('content')
	<style>
		.btn-delete{
			padding: 5px;
			font-size: 1em;
		}
	</style>
	<div class="container">
		<div class="row">
			<div class="col-md-3">
				<div class="well">
					{!! Form::open(['route' => 'tags.store', 'method' => 'POST']) !!}
						<h2>New Tag</h2>
						{{ Form::label('name', 'Name:') }}
						{{ Form::text('name', null, ['class' => 'form-control']) }}

						{{ Form::submit('Create New Tag', ['class' => 'btn btn-primary btn-block btn-h1-spacing']) }}
					
					{!! Form::close() !!}
				</div>
			</div>
		</div>	
		<hr />
		<h1>Tags</h1>
		<div class="row">
			<div class="column-12">
				@foreach ($tags as $tag)
					
					<div class="pull-left" style="margin-right:20px;">
						{{ $tag->name }}
					
						{!! Form::open(['route' => ['tags.destroy', $tag->id ], 'method' => 'DELETE']) !!}
							{{ Form::submit('X', ['class' => 'btn btn-delete']) }}
						{!! Form::close() !!}
					</div>
				@endforeach
			</div>
		</div>
	</div>
@endsection