
@extends('layouts.main')

@section('stylesheets')
	<style>
		th {text-align: left;}
	</style>

@endsection


@section('content')

	

	<div class="container">
		<br /><br />
		<div class="row">
			<div class="col-md-6 pull-left">
				<h1>Hires Admin</h1>
			</div>
			<div class="col-md-6 pull-right">
				<a href="/hire/create" class="btn btn-primary">Create New Hire</a>
			</div>
		</div>

		<hr />

		<table class="table" style="width:100%;">
			<thead>
				<th>#</th>
				<th>Header</th>
				<th>Body</th>
				<th>Category</th>
				<th>Created At</th>

				<th></th>
			</thead>
			<tbody>
				@foreach ($hires as $HireItem)
					<tr>
						<th>{{ $HireItem->id }}</th>
						<td>{{ $HireItem->heading }}</td>
						<td title="{{strip_tags($HireItem->detail)}}">
							{{ substr(strip_tags($HireItem->detail), 0, 50) }}  {{ strlen(strip_tags($HireItem->detail)) > 50 ? "..." : "" }}
						</td>
						<td>
							{{ $HireItem->hireCategory->title}}
						</td>
						<td>
							{{ date('M j, Y', strtotime($HireItem->created_at)) }}
						</td>

						<td style="text-align:right;">
							<div class="btn-group" role="group" aria-label="Basic example">
							{{-- 	<a href="/view-project/{{$HireItem->id}}" class="btn btn-default btn-sm">
									View
								</a>  --}} 
								<a href="{{ route('hire.edit', $HireItem->id) }}" class="btn btn-default btn-sm">
									Edit
								</a>
								<div class="pull-right">
									{!! Form::open(['method' => 'DELETE', 'route' => ['hire.destroy', $HireItem->id], 'onsubmit' => 'return confirm("are you sure ?")']) !!}
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
			{!! $Hires->links(); !!}
		</div> --}}
			
	</div>




@endsection
