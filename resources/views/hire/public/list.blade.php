
@section('title', '| View Projects')

@section('stylesheets')

@endsection

@include('partials.head')


<body class="categorylanding menu-push">
    <div class="wrapper" style="background-image:url(/img/background.jpg);">
        @include('partials.header')
        
        <section>
            <div class="container">
                
            
                @foreach($hires as $hire)
                     <h2>
                         {{$hire->heading}}
                    </h2>
                    <div class="row">
                          <div class="column-3">                        
                            {!!$hire->detail!!}
                        </div>
                        <div class="column-3">
                            <img class="img" src="{{asset('img/hire/' . $hire->id . '/' . $hire->image)}}">
                        </div>
                    </div>
                @endforeach


            </div>
        </section>
    </div>
    
    @include('partials.search')

    @include('partials.footer')

</body>