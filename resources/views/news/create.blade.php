
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
                Add News Article
            </h1>
        
            {!! Form::open(array('route' => array('news.store'))) !!}

                <input name="_token" type="hidden" value="{{ csrf_token() }}">

                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                {{-- Heading --}}
                <div class="row">
                    <div class="column-12">
                        <label for="heading" />Heading</label>
                        <input type="text" class="form-control" name="heading" placeholder="Heading" style="width:100%;"/>
                    </div>
                </div>
                <br />

                {{-- Body --}}
                <div class="row">   
                    <div class="column-12">     
                        <label for="body" />Body</label>
                        <textarea name="body" class="form-control"></textarea>
                    </div>
                </div>
                <br />
                <div class="row">   
                    <div class="column-12">     
                        <div class="pull-right">
                            <input type="submit" value="Add News Article" class="btn btn-primary" />
                        </div>
                    </div>
                </div>

            {!! Form::close() !!}  

        

  
            </form> 


        </section>
    </div>
    
@endsection