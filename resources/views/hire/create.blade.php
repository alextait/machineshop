
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
                Create New Hire 
            </h1>
                {!! Form::open(array('route' => array('hire.store') , 'files'=>true)) !!}

                    <input name="_token" type="hidden" value="{{ csrf_token() }}">

                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    {{-- Heading --}}
                    <div class="row">
                        <div class="column-12">
                            <label for="heading" />Heading</label>
                            <input required type="text" class="form-control" name="heading" placeholder="Heading" style="width:100%;"/>
                        </div>
                    </div>
                    <br />
                    {{-- Body --}}
                    <div class="row">   
                        <div class="column-12">     
                            <label for="detail" />Category</label>
                            <select required name="hire_category_id">
                                <option value="">Select</option>
                                @foreach($hireCategories as $hireCategory)
                                    <option value="{{$hireCategory->id}}">
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
                            <textarea name="detail" class="form-control"></textarea>
                        </div>
                    </div>
                    <br />
                    <div class="row">   
                        <div class="column-12">     
                            <div class="pull-right">
                                <input type="submit" value="Add Hire" class="btn btn-primary" />
                            </div>
                        </div>
                    </div>

                    <label class=" btn-file">
                        {{ Form::label('image', 'Upload image')}}
                        {{ Form::file('image')}}
                    </label>

                {!! Form::close() !!}  
            </form> 


        </section>
    </div>
    
@endsection