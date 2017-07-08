
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

            <a href="/admin/news" class="btn btn-primary" >List News Articles</a>

            <hr />
        
            {!! Form::model($newsArticle, array('route' => array('news.update', $newsArticle->id), 'method' => 'PUT')) !!}

                <input name="_token" type="hidden" value="{{ csrf_token() }}">

                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                {{-- Heading --}}
                <div class="row">
                    <div class="column-12">
                        <label for="heading" />Heading</label>
                        {{Form::text('heading')}}
                    </div>
                </div>
                <br />

                {{-- Body --}}
                <div class="row">   
                    <div class="column-12">     
                        <label for="body" />Body</label>
                        {{Form::textarea('body')}}
                    </div>
                </div>


                <br />
                <div class="row">   
                    <div class="column-12">     
                        <div class="pull-right">
                            <input type="submit" value="Update News Article" class="btn btn-primary" />
                        </div>
                    </div>
                </div>

            {!! Form::close() !!}  

        

  
            </form> 


        </section>
    </div>
    
@endsection