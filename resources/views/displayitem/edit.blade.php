
@extends('layouts.main')


@section('content')
    <div class="container">
        <section>
            
            <h1>
                Edit Project {{$displayItem->displayitemid}} 
            </h1>

            {!! Form::model($displayItem, ['route' => ['displayitem.update', $displayItem->displayitemid], 'method' => 'PUT']) !!}


          {{--   <form method="POST" action="/displayitem/update" accept-charset="UTF-8"><input name="_token" type="hidden" value="{{ csrf_token() }}"> --}}

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
                        <input type="text" class="form-control" name="heading" placeholder="Heading" value="{{$displayItem->heading}}" />
                        
                        <label for="subheading" >Sub Heading</label>
                        <input type="text" class="form-control" name="subheading" placeholder="Sub Heading" value="{{$displayItem->subheading}}" />
                        
                        <label for="detail" />Description</label>
                        <textarea name="detail" class="form-control">{{$displayItem->detail}}</textarea>
                        
                        <label for="youtubelink" />Youtube Link</label>
                        <input type="text" class="form-control" name="youtubelink" placeholder="Enter your youtube URL here" value="{{$displayItem->youtubelink}}" />
                       

                        <img src="/img/article/{{$displayItem->displayitemid}}/big.jpg" />

                        <label class=" btn-file">
                            Select Large Image <input type="file" hidden>
                        </label>

                       
                        <img src="/img/article/{{$displayItem->displayitemid}}/square.jpg" />
                        
                        <label class=" btn-file">
                            Select Medium Image (640 x 310 pixels)<input type="file" hidden>
                        </label>                       
                        
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
                        <br />
                        <input type="submit" value="Update Display Item" class="btn btn-primary pull-right" />
                    </div>
                </div>
           {!! Form::close() !!}


        </section>
    </div>
    
@endsection