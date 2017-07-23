
@section('title', '| View Projects')


<style>
    .hire-item{
        margin-bottom:20px !important;
    }
</style>


@include('partials.head')


<body class="categorylanding menu-push">
    <div class="wrapper" style="background-image:url(/img/background.jpg);">
        @include('partials.header')
        
        <section>
            <div class="container">
                
                <div class="row">
                @foreach($hires as $hire)
                    
                    <div class="column-3 hire-item">                        
                        <h2>
                            {{$hire->heading}}
                        </h2>   
                        <img class="img" src="{{asset('img/hire/' . $hire->image)}}">
                        <br /><br />
                        {!!$hire->detail!!}
                    </div>
               
                @endforeach

                </div>
            </div>
        </section>
    </div>
    
    @include('partials.search')

    @include('partials.footer')

</body>