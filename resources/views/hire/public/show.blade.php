
@section('title', '| View Hire')

@section('description', $hire->heading)


@include('partials.head')

<body class="project menu-push">

    <div class="wrapper" >
                
        @include('partials.header')

                
        <div class="background-image" style="background-image:url('/img/article/{!!$hire->id!!}/{{$featuredFile}}"></div>
        <div class="image-overlay"></div>
        <div class="container">
    <div class="breadcrumb-container">
    
    <ul class="">
        
    </ul>

    </div>
</div>
            
        <div class="banner-page">
            <div class="banner-text center">
                <div class="container">
                    <h1>{!!$hire->heading!!}</h1>
                </div>
            </div>
        </div>

        <section>
            <div class="container">
                <div class="row">
                    <div class="column-4 project-carousel">
                        <img />
                    </div>

                    <div class="column-4 project-summary">
                          {!!$hire->detail!!}
                    </div>

                    <div class="column-4 video-image" data-toggle="modal" data-target="#video">
                        <img src="http://img.youtube.com/vi/{!!$hire->youtubeLink!!}/0.jpg" alt="" />
                        <a class="overlay"><span class="icon icon-play"></span></a>
                    </div>
                </div>
            </div>
        </section>



    </div> {{-- End wrapper --}}
     
    @include('partials.search')

    @include('partials.footer')
    










