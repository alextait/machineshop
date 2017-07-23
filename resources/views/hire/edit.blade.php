
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
                Edit News Article
            </h1>

            <a href="/hire" class="btn btn-primary" >List Hires</a>

            <hr />
        
            {!! Form::model($hire, array('route' => array('hire.update', $hire->id), 'method' => 'PUT' , 'files'=>true) ) !!}

                <input name="_token" type="hidden" value="{{ csrf_token() }}">

                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                {{-- Heading --}}
                <div class="row">
                    <div class="column-6">
                        <label for="heading" />Heading</label>
                        {{Form::text('heading')}}
                    </div>
           

                {{-- Category --}}
           
                    <div class="column-6">     
                        <label for="detail" />Category</label>
                        <select required name="hire_category_id">
                            <option value="">Select</option>
                            @foreach($hireCategories as $hireCategory)
                                <option @if ($hireCategory->id == $hire->hireCategory->id)selected="selected"@endif value="{{$hireCategory->id}}">
                                    {{$hireCategory->title}}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
 <br />
                {{-- Body --}}
                <div class="row">   
                    <div class="column-12">     
                        <label for="detail" />Detail</label>
                        {{Form::textarea('detail')}}
                    </div>
                </div>
                
                <br />
                 {{-- Image --}}
                <div class="row">   
                    <div class="column-6">     
                        <h3>Upload hire image</h3>
                        <img src="{{asset('img/hire/' . $hire->id . '/' . $hire->image)}}">
                    </div>
                    <div class="column-6">     
                        <label class=" btn-file">
                            {{ Form::label('image', 'Update Hire Image')}}
                            {{ Form::file('image')}}
                        </label>
                    </div>
                </div>
              

                <br />
                <div class="row">   
                    <div class="column-12">     
                        <div class="pull-right">
                            <input type="submit" value="Update Hire" class="btn btn-primary" />
                        </div>
                    </div>
                </div>

            {!! Form::close() !!}  

        

  
            </form> 


        </section>
    </div>
    
@endsection