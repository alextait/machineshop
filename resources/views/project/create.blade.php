
@extends('layouts.main')

@section('title', '| Create Project')

@section('stylesheets')
    <script>
        tinymce.init({
            selector: 'textarea'
            , plugins: "link" 
            , menubar : "false"
        });
    </script>
    {{Html::style('css/select2.min.css')}}
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
                        <input required type="text" class="form-control" name="heading" placeholder="Heading" />
                    </div>
                    <div class="column-3">
                        <label for="subheading" >Sub Heading</label>
                        <input type="text" class="form-control" name="subheading" placeholder="Sub Heading" />
                    </div>
                    <div class="column-3">
                        <label for="youtubelink" />Youtube LINK ID</label>
                        <input type="text" class="form-control" name="youtubelink" style="min-width:200px;" placeholder="Enter your youtube ID" />
                    </div>
                    <div class="column-3">
                        <label for="priority" />Priority</label>
                        <select name="priority" class="form-control">
                      
                            <option value="3">Low</option>  
                            <option value="2">Medium</option>  
                            <option value="1">High</option>    
                           
                        </select>
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
                
                        <h3>Carousel Images</h3>
                        <label class=" btn-file"></label>  
                        <input type="file" class="form-control" name="carouselImages[]" placeholder="" multiple>

                 
                        <div class="pull-right">
                            <input type="submit" value="Add Project" class="btn btn-primary" />
                        </div>
                    </div>

                </div>

                <h3>Tags</h3>
                <div class="row">  
                     <div class="column-12">  
                        <label for="tags" />Tags</label>  
                        <select name="tags[]" class="form-control select2-multi" multiple="multiple">
                            <option>Select</option>    
                            @foreach($tags as $tag)
                                 <option value="{{$tag->id}}">{{$tag->name}}</option>    
                            @endforeach
                        </select>
                    </div>
                </div>

            </form> 
        </section>
    </div>
    
@endsection

@section('scripts')
    {!! Html::script('js/select2.min.js') !!}
    <script type="text/javascript">
        $('.select2-multi').select2();
    </script>
@endsection