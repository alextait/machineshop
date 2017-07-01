
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
                Add Project
            </h1>
        
            <form method="POST" action="/project" accept-charset="UTF-8" enctype="multipart/form-data">

                <input name="_token" type="hidden" value="{{ csrf_token() }}">

                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="row">
                    <div class="column-3">
                        <label for="heading" />Heading</label>
                        <input type="text" class="form-control" name="heading" placeholder="Heading" />
                    </div>
                    <div class="column-3">
                        <label for="subheading" >Sub Heading</label>
                        <input type="text" class="form-control" name="subheading" placeholder="Sub Heading" />
                    </div>
                    <div class="column-5">
                        <label for="youtubelink" />Youtube LINK ID</label>
                        <input type="text" class="form-control" name="youtubelink" style="min-width:200px;" placeholder="Enter your youtube ID" />
                    </div>
                </div>
                
                <div class="row">   
                    <div class="column-12">     
                        <label for="detail" />Description</label>
                        <textarea name="detail" class="form-control"></textarea>
                    </div>
                </div>

                <hr />
                
                <div class="row">   
                    <div class="column-6">     
                        <h3>Categories</h3>
                        <label for="category1" />Select Category</label>  
                        <select name="category1" class="form-control">
                            <option >Select</option>    
                            @foreach($Categories as $category)
                                 <option value="{{$category->id}}">{{$category->category}}</option>    
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

                    </div>

                    <div class="column-6">     
                        <h3>Images</h3>
                        
                        <label class=" btn-file">
                            {{ Form::label('featured_image', 'Upload large image (Ideally 1920 x 1080 pixels)')}}
                            {{ Form::file('featured_image')}}
                        </label>

                        <label class=" btn-file">
                            {{ Form::label('thumb_image', 'Select Medium Image (Ideally 640 x 310 pixels)')}}
                            {{ Form::file('thumb_image')}}
                        </label>    
                
                       
                        <label class=" btn-file ">
                            {{ Form::label('carousel_image', 'Carousel Image')}}
                            {{ Form::file('carousel_image')}}
                        </label>

                 
                        <div class="pull-right">
                            <input type="submit" value="Add Project" class="btn btn-primary" />
                        </div>
                    </div>

                </div>

  
            </form> 


        </section>
    </div>
    
@endsection