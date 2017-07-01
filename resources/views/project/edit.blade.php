
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

            {!! Form::model($Project, ['route' => ['project.update', $Project->id], 'method' => 'PUT' , 'files' => true]) !!}

                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="row">
                    <div class="col-md-6">
                        <label for="heading" />Heading</label>
                        <input type="text" class="form-control" name="heading" placeholder="Heading" value="{{$Project->heading}}" />
                        
                        <label for="subheading" >Sub Heading</label>
                        <input type="text" class="form-control" name="subheading" placeholder="Sub Heading" value="{{$Project->subHeading}}" />
                        
                        <label for="detail" />Description</label>
                        <textarea name="detail" class="form-control">
                        
                            {{$Project->detail}}

                        </textarea>
                        
                        <label for="youtubelink" />Youtube Link</label>
                        <input type="text" class="form-control" name="youtubelink" placeholder="Enter your youtube URL here" value="{{$Project->youtubeLink}}" />

                         @php
                            $thumbFile = '';
                            $featuredFile = '';
                            foreach ($Project->images as $image){
                                if($image->type == 'featured'){ 
                                    $featuredFile = $image->filename; 
                                } 
                                
                                if($image->type == 'thumb'){ 
                                    $thumbFile = $image->filename; 
                                }
                            }
                         @endphp

                        <img src="/img/article/{{$Project->id}}/{{$featuredFile}}" />{{$featuredFile}}

                        <label class=" btn-file">
                            Select Large Image <input type="file" name="featured_image" hidden>
                        </label>

                        <img src="/img/article/{{$Project->id}}/{{$thumbFile}}" />
                        
                        <label class=" btn-file">
                            Select Thumbnail Image (340 x 310 pixels)<input type="file" name="thumb_image"  hidden>
                        </label>                       
						 <br />
                        <input type="submit" value="Update Project" class="btn btn-primary pull-right" />
                    </div>
                {!! Form::close() !!}  

		 	
               		<div class="col-md-6">	
	  					<h2>
							Categories
	                    </h2>
				

	                    @foreach($Project->categories aS $Category)
	                    	{!! Form::model($Project, ['url' => ['/categoryproject/destroy', $Project->id , $Category->id], 'method' => 'DELETE' ]) !!}
			               		<input type="hidden" name="Category_id" value="{{$Category->id}}">
				                       	
		                       	<span style="font-size:1.5em;">{{$Category->category}}</span>
	        
	                       		  <input type="submit" value="Delete" class="btn btn-primary pull-right" />
		                		<br/><br/>
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

					</div>
				 {!! Form::close() !!}  



                    {{-- <div class="col-md-6">
                        <label for="category1" />Select Category</label>  
                        <select name="category1" class="form-control">
                            <option >Select</option>    
                            @foreach($Categories as $category)
                                 <option value="{{$category->id}}" {{ Auth::check() ? 'yes' : 'no' }}  {{$category->id}}>{{$category->category}}</option>    
                            @endforeach
                        </select>
                        
                        <label for="category2" />Select Category 2</label>  
                        <select name="category2" class="form-control">
                             <option>Select</option>    
                            @foreach($Categories as $category)
                                 <option value="{{$category->id}}">{{$category->category}}</option>    
                            @endforeach
                        </select>
                   
                        
                        <label for="category3" />Select Category 3</label>  
                        <select name="category3" class="form-control">
                            <option>Select</option>    
                            @foreach($Categories as $category)
                                 <option value="{{$category->id}}">{{$category->category}}</option>    
                            @endforeach
                        </select>
                      
                    </div> --}}
                </div>
           


        </section>
    </div>
    
@endsection