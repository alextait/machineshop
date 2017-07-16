


@extends('layouts.main')

@section('title', '| Search Results')

@section('stylesheets')
	<style>
		th{text-align: left;}
		h1{margin-top: 4%}
	</style>

@endsection
	


@section('content')
	<div class="container">
		<h1>
			Search Results for "{{$search}}"
		</h1>
		<table class="table" style="width:100%;">
			<thead>
				<th>Header</th>
				<th>Body</th>
				<th>Created At</th>
				<th></th>
			</thead>
			<tbody>
		
				@foreach ($projects as $Project)
					
					<tr>
					
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
								
							</div>
				
							<br />
						</td>
					</tr>

				@endforeach

			</tbody>
		</table>
	</div>
@endsection