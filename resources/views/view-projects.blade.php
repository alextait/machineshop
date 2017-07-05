
@include('partials.head')


<body class="about menu-push">

<div class="wrapper" style="background-image:url('/img/background.jpg')">
        
    @include('partials.header')   

        
    <div class="background-image" style="background-image:url('/img/background-website.png');"></div>
    <div class="image-overlay"></div>

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


		

		</div>
	</section>

</div>
	

@include('partials.search')

 @include('partials.footer')
