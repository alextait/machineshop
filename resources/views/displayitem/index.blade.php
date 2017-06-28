
@extends('layouts.main')


@section('content')

	<div class="container">
		
		<h1>Projects</h1>
	
		<div class="row">
			<div class="col-md-12">
				<a href="/displayitem/create" class="btn btn-primary">Create New Project</a>
			</div>
		</div>

		<div class="row">
			<div class="col-md-12">
				<table class="table">
					<thead>
						<th>#</th>
						<th>Header</th>
						<th>Body</th>
						<th>Created At</th>
						<th></th>
					</thead>
					<tbody>
						
						@foreach ($DisplayItems as $DisplayItem)
							
							<tr>
								<th>{{ $DisplayItem->displayitemid }}</th>
								<td>{{ $DisplayItem->heading }}</td>
								<td>
									{{ substr(strip_tags($DisplayItem->detail), 0, 50) }}  {{ strlen(strip_tags($DisplayItem->detail)) > 50 ? "..." : "" }}
								</td>
								<td>
									{{ date('M j, Y', strtotime($DisplayItem->created_at)) }}
								</td>
								<td>
									<a href="{{ route('displayitem.show', $DisplayItem->displayitemid) }}" class="btn btn-default btn-sm">
										View
									</a> 
									<a href="{{ route('displayitem.edit', $DisplayItem->displayitemid) }}" class="btn btn-default btn-sm">
										Edit
									</a>
								</td>
							</tr>

						@endforeach

					</tbody>
				</table>

	{{-- 			<div class="text-center">
					{!! $DisplayItems->links(); !!}
				</div> --}}
			</div>
		</div>
	</div>




@endsection
