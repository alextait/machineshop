
@extends('layouts.main')


@section('stylesheets')

  
   
	<script>
		tinymce.init({
			selector: 'textarea'
			, plugins: "link" 
			, menubar : "false"
		});
	</script>

@endsection



@section('content')
	<div class="container">
		<section>
			
			<h1>
				Editing Project "{{$Project->heading}} "
			</h1>

			<a href="/project/create" class="btn btn-primary" >Create Project</a>
			<a href="/project" class="btn btn-primary" >List Projects</a>

			<br /><br />
			<hr />
			<br />

			{!! Form::model($Project, ['route' => ['project.update', $Project->id], 'method' => 'PUT' , 'files' => true]) !!}

				<input type="hidden" name="_token" value="{{ csrf_token() }}">

				<div class="row">
					<div class="column-3">
						<label for="heading" />Heading</label>
						<input type="text" class="form-control" name="heading" placeholder="Heading" value="{{$Project->heading}}" />
					</div>
					<div class="column-3">    
						<label for="subheading" >Sub Heading</label>
						<input type="text" class="form-control" name="subheading" placeholder="Sub Heading" value="{{$Project->subHeading}}" />
					</div>

					<div class="column-3">    
						<label for="youtubelink" />Youtube Link</label>
						<input type="text" class="form-control" name="youtubelink" placeholder="Enter your youtube URL here" value="{{$Project->youtubeLink}}" style="min-width:200px;" />
					</div>
				</div>

				<div class="row">
					<div class="col-sm-12">    
						<label for="detail" />Description</label>
						<textarea name="detail" class="form-control">
						
							{{$Project->detail}}

						</textarea>
					</div>
				</div>

				@php
					$thumbFile = '';
					$featuredFile = '';
					$extraImages = array();
					foreach ($Project->images as $image){
						if($image->type == 'extra'){ 
							array_push($extraImages , $image->filename);
						} 
						if($image->type == 'featured'){ 
							$featuredFile = $image->filename; 
						} 
						
						if($image->type == 'thumb'){ 
							$thumbFile = $image->filename; 
						}
					}
				@endphp

				<hr />
				
				<h1>Images/Categories</h1>
				<div class="row">
					<div class="column-6">
						 
						<h3>Large image (Ideally 1920 x 1080 pixels)</h3>
						
						<img src="/img/article/{{$Project->id}}/{{$featuredFile}}" />
						<br />
						{{$featuredFile}}

						<label class=" btn-file">
							{{ Form::label('featured_image', 'Upload large image (Ideally 1920 x 1080 pixels)')}}
							{{ Form::file('featured_image')}}
						</label>
					</div>
					<div class="column-6">
					<h3>Detail image  (Ideally 340 x 310 pixels)</h3>
						<img src="/img/article/{{$Project->id}}/{{$thumbFile}}" />
						<br />
						{{$thumbFile}}

						<label class=" btn-file">
							{{ Form::label('thumb_image', 'Select Medium Image (Ideally 640 x 310 pixels)')}}
							{{ Form::file('thumb_image')}}
						</label>  
						
						<label class=" btn-file">
							<input type="file" name="thumb_image"  hidden>
						</label>  
						                   
						<br />
						<input type="submit" value="Update Project" class="btn btn-primary pull-right" />
					</div>
				</div>
				<hr />
				<div class="row">
					<div class="column-6">
						<h3>
							Carousel Images
						</h3>
						<div class="row">
							<div class="column-4 project-carousel">
								<div class="swiper-container">
									<div class="swiper-wrapper">
										@foreach($extraImages as $fileName)
											<br /> 
											 <div class="swiper-slide">
												<img src="/img/article/{!!$Project->id!!}/{{$fileName}}" alt="" />
											</div>
										@endforeach
									</div>
									<span class="arrow icon-chevron-left"></span>
									<div class="swiper-pagination"></div>
									<span class="arrow icon-chevron-right"></span>    
								</div>
							</div>
						</div>
					</div>
				{!! Form::close() !!}  

					<div class="column-6">	
						<h2>
							Categories
						</h2>
						@foreach($Project->categories as $Category)
							{!! Form::model($Project, ['url' => ['/categoryproject/destroy', $Project->id , $Category->id], 'method' => 'DELETE' ]) !!}
								<input type="hidden" name="Category_id" value="{{$Category->id}}">
								<span style="font-size:1.5em;">{{$Category->category}}</span>
								<input type="submit" value="Delete" class="btn btn-primary pull-right" />
								<br/><br/><br/>
							 {!! Form::close() !!}  
						@endforeach
						

						{!! Form::model($Project, ['route' => ['categoryproject.store', $Project->id], 'method' => 'POST' , 'files' => true]) !!}
							<br/>
							<h2>
								Add Another Category
							</h2>

							<input type="hidden" name="Project_id" value="{{$Project->id}}">
							<label for="Category_id" />Select Category</label>  
							<select name="Category_id" class="form-control">
								<option >Select</option>    
								@foreach($Categories as $category)
									<option value="{{$category->id}}">{{$category->category}}</option>    
								@endforeach
							</select>
							<br />
							<input type="submit" value="Add Category" class="btn btn-primary pull-right" />
					
						 {!! Form::close() !!}  

				</div>
		   


		</section>
	</div>
	
@endsection