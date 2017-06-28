
@extends('layouts.main')



@section('content')
    <div class="container">
        <section>
            
            <h1>
                Add Project
            </h1>
        
            <form method="POST" action="/displayitem" accept-charset="UTF-8" enctype="multipart/form-data">

                <input name="_token" type="hidden" value="{{ csrf_token() }}">

                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="row">
                    <div class="col-md-6">
                            <label for="displayitemcategory" />Select Item Type</label>    
                            <select name="displayitemcategory" class="form-control">
                                <option>Project</option>
                                <option>News</option>
                                <option>Staff Member</option>
                            </select>

                            <label for="heading" />Heading</label>
                            <input type="text" class="form-control" name="heading" placeholder="Heading" />
                            
                            <label for="subheading" >Sub Heading</label>
                            <input type="text" class="form-control" name="subheading" placeholder="Sub Heading" />
                            
                            <label for="detail" />Description</label>
                            <textarea name="detail" class="form-control"></textarea>
                            
                            <label for="youtubelink" />Youtube Link</label>
                            <input type="text" class="form-control" name="youtubelink" placeholder="Enter your youtube URL here" />
                           
                            <label class=" btn-file">
                                {{ Form::label('featured_image', 'Upload large image')}}
                                {{ Form::file('featured_image')}}

                                {{-- Select Large Image <input type="file" hidden> --}}
                                
                            </label>

                            <label class=" btn-file">
                                Select Medium Image (640 x 310 pixels)<input type="file" hidden>
                            </label>
                                                        
                            <input type="submit" value="Add Display Item" class="btn btn-primary" />
                        
                    </div>
                    <div class="col-md-6">
                        <label for="category1" />Select Category</label>  
                        <select name="category1" class="form-control">
                            <option>Category A </option>
                            <option>News</option>
                            <option>Staff Member</option>
                        </select>
                        
                        <label for="category2" />Select Category 2</label>  
                        <select name="category2" class="form-control">
                            <option>Category A </option>
                            <option>News</option>
                            <option>Staff Member</option>
                        </select>
                        
                        <label for="category3" />Select Category 3</label>  
                        <select name="category3" class="form-control">
                            <option>Category A </option>
                            <option>News</option>
                            <option>Staff Member</option>
                        </select>


                    </div>
                </div>
            </form> 


        </section>
    </div>
    
@endsection