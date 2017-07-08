
@extends('layouts.main')


@section('content')

	<div class="container">
		<br /><br />
		<div class="row">
			<div class="col-md-6 pull-left">
				<h1>News Admin</h1>
			</div>
			<div class="col-md-6 pull-right">
				<a href="/admin/news/create" class="btn btn-primary">Create New News Article</a>
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
				
				@foreach ($news as $NewsItem)
					
					<tr>
						<th>{{ $NewsItem->id }}</th>
						<td>{{ $NewsItem->heading }}</td>
						<td title="{{strip_tags($NewsItem->body)}}">
							{{ substr(strip_tags($NewsItem->body), 0, 50) }}  {{ strlen(strip_tags($NewsItem->body)) > 50 ? "..." : "" }}
						</td>
						<td>
							{{ date('M j, Y', strtotime($NewsItem->created_at)) }}
						</td>
						<td style="text-align:right;">
							<div class="btn-group" role="group" aria-label="Basic example">
							{{-- 	<a href="/view-project/{{$NewsItem->id}}" class="btn btn-default btn-sm">
									View
								</a>  --}} 
								<a href="{{ route('news.edit', $NewsItem->id) }}" class="btn btn-default btn-sm">
									Edit
								</a>
								<div class="pull-right">
									{!! Form::open(['method' => 'DELETE', 'route' => ['news.destroy', $NewsItem->id], 'onsubmit' => 'return confirm("are you sure ?")']) !!}
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
			{!! $news->links(); !!}
		</div> --}}
			
	</div>




@endsection
