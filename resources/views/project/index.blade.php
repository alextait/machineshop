
@extends('layouts.main')


@section('content')

	<div class="container">
		<br /><br />
		<div class="row">
			<div class="col-md-6 pull-left">
				<h1>Projects</h1>
			</div>
			<div class="col-md-6 pull-right">
				<a href="/project/create" class="btn btn-primary">Create New Project</a>
			</div>
		</div>

		<hr />

		<table class="table" style="width:100%;">
			<thead>
				<th>#</th>
				<th>Header</th>
				<th>Body</th>
				<th>Created At</th>
				<th></th>
			</thead>
			<tbody>
				
				@foreach ($Projects as $Project)
					
					<tr>
						<th>{{ $Project->id }}</th>
						<td>{{ $Project->heading }}</td>
						<td title="{{strip_tags($Project->detail)}}">
							{{ substr(strip_tags($Project->detail), 0, 50) }}  {{ strlen(strip_tags($Project->detail)) > 50 ? "..." : "" }}
						</td>
						<td>
							{{ date('M j, Y', strtotime($Project->created_at)) }}
						</td>
						<td style="text-align:right;">
							<div class="btn-group" role="group" aria-label="Basic example">
								<a href="/view-project/{{$Project->id}}" class="btn btn-default btn-sm">
									View
								</a>  
								<a href="{{ route('project.edit', $Project->id) }}" class="btn btn-default btn-sm">
									Edit
								</a>
								<div class="pull-right">
									{!! Form::open(['method' => 'DELETE', 'route' => ['project.destroy', $Project->id], 'onsubmit' => 'return confirm("are you sure ?")']) !!}
										<input type="submit" value="Delete" class="btn btn-primary"/>
									{!! Form::close() !!}
								</div>
							</div>
				
							<br />
						</td>
					</tr>

				@endforeach

			</tbody>
		</table>

{{-- 			<div class="text-center">
			{!! $Projects->links(); !!}
		</div> --}}
			
	</div>




@endsection
