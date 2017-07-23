
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
        <h1>
            Admin
        </h1>
        <section>
            <ul>
                <li>
                    <a href="{{url('/project')}}">
                        Project Admin
                    </a>
                </li>
                <li>
                    <a href="{{url('/news')}}">
                        News Admin
                    </a>
                </li>
                <li>
                    <a href="{{url('/tags')}}">
                        Tag Admin
                    </a>
                </li>
                <li>
                    <a href="{{url('/hire')}}">
                        Hire Admin
                    </a>
                </li>
            </ul>
        </section>
    </div>
    
@endsection