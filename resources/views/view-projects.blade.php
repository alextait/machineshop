
@extends('layouts.main')

@section('content')


<style>

</style>

<section>
	<div class="container">
		
	 <h1 class="center">{{$pagetitle}}</h1>

		<div class="mobile-btn-subnav" id="subnav-toggle">Menu</div>
		<nav class="page-navigation">
			<ul>
				<li class="active">
					<a href="/all-projects/">All Projects</a>
				</li>

				@foreach($subCategoryItems as $subCategoryItem)
					<div class="project-column">
						<li>
							<a href="/special-projects/{{$subCategoryItem->id}}">
								{{$subCategoryItem->category}}
							</a>
						</li>
					</div>
				@endforeach
			</ul>
		</nav>

		<div class="row">
			<div class="category-summary">
				<p>
					{{$aboutSection}}
				</p>
			</div>
		</div>
		<div class="row projects-container">

			@foreach($Projects as $Project)

				 @php
					$thumbFile = '';
					foreach ($Project->images as $image){
						if($image->type == 'thumb'){ 
							$thumbFile = $image->filename; 
						}
					}
				 @endphp

				<div class="project-column">
					 <a href="/view-project/{{ $Project->id }}/" class="project-box">
						@php
							$fileLocation = 'img/article/'. $Project->id . '/' . $thumbFile;
							if($thumbFile == '' || !file_exists($fileLocation)) {
								$fileLocation = 'img/article/thumb-placeholder.png';
							}

						@endphp


					
						<img src="/{{$fileLocation}}" title="{{$fileLocation}}" />  
						
						  
						<h4 class="image-overlay-title">
							{{ $Project->heading }} 
					
						</h4>
					</a>
				</div>

			@endforeach
			
		</div>

		<div class="text-right ">
			{!! $Projects->links() !!}
		</div>


	  {{--   <div class="pagination-wrapper">
			<ul class="pagination" role="pagination">
				

					<li class="page-number active"><a href="?page=1">1</a></li>
					<li class="page-number"><a href="?page=2">2</a></li>
					<li class="page-number"><a href="?page=3">3</a></li>
					<li class="page-number"><a href="?page=4">4</a></li>

					<li><a class="next-page" href="?page=2"><span class="icon-chevron-right"></span></a></li>

			</ul>
		</div> --}}

	</div>
</section>

	</div>
	

@endsection