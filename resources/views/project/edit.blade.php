
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
				xx Editing Project "{{$Project->heading}} "
			</h1>

			<a href="/project/create" class="btn btn-primary" >Create Project</a>
			<a href="/project" class="btn btn-primary" >List Projects</a>
			<a href="/view-project/{{$Project->id}}" class="btn btn-primary" >View Project</a>

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
							array_push($extraImages , $image);
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
				
				
				<div class="row">
					<div class="column-6">
						 
						<h3>Large image (Ideally 1920 x 1080 pixels)</h3>
						<img src="{{asset('img/article/' . $Project->id . '/' . $featuredFile)}}">
						
						<br />
						{{$featuredFile}}

						<label class=" btn-file">
							{{ Form::label('featured_image', 'Upload large image (Ideally 1920 x 1080 pixels)')}}
							{{ Form::file('featured_image')}}
						</label>
					</div>
					<div class="column-6">
					<h3>Detail image  (Ideally 340 x 310 pixels)</h3>
						
					
						<img src="{{asset('img/article/' . $Project->id . '/' . $thumbFile)}}">
						<br />
						{{$thumbFile}}

						<label class=" btn-file">
							{{ Form::label('thumb_image', 'Select Medium Image (Ideally 640 x 310 pixels)')}}
							{{ Form::file('thumb_image')}}
						</label>              
						<br />
						<input type="submit" value="Update Project" class="btn btn-primary pull-right" />
					</div>
				</div>
				<hr />
			{!! Form::close() !!}  

				
				<div class="row">
					<div class="column-6">
						<h2>
							Carousel Images
						</h2>
							@if (count($extraImages) > 0)
								<div >
									
									
									@foreach($extraImages as $ExtraImage)
										<br /> 
										 <div class="swiper-slide">
										
											{{ Html::image('img/article/' . $Project->id . '/extra/' . $ExtraImage->filename) }}
										</div>
										{!! Form::model($Project, ['url' => ['/image/destroy', $ExtraImage->id, $Project->id], 'method' => 'DELETE' ]) !!}
											<input type="submit" value="Delete" class="btn btn-primary pull-right" />
											<br/><br/><br/>
										{!! Form::close() !!}  
									

									@endforeach
							
								
								
								</div>
							@endif
							<br />
							<div >
								{!! Form::model($Project, ['route' => ['image.store', $Project->id], 'method' => 'POST' , 'files' => true]) !!}
									<input type="hidden" name="Project_id" value="{{$Project->id}}">
									<br/>
									<h3>
										Add Carousel Image
									</h3>
									<label class=" btn-file">
										{{ Form::label('carousel_image', 'Select Carousel Image')}}
										{{ Form::file('carousel_image')}}
									</label>  
									<br />
									<input type="submit" value="Add Image" class="btn btn-primary pull-left" />
							
								 {!! Form::close() !!}  
							</div>
					

					</div>

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