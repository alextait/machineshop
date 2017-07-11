



@include('partials.head')

<body class="project menu-push">

    <div class="wrapper" >
                
        @include('partials.header')



         @php
            $thumbFile = '';
            $featuredFile = '';
            $extraImages = array();
            foreach ($Project->images as $image){
                
                if($image->type == 'extra'){ 
                    array_push($extraImages , $image->filename);
                } 
                if($image->type == 'featured'){ 
                    $featuredFile = $image->filename; 
                } 
                
                if($image->type == 'thumb'){ 
                    $thumbFile = $image->filename; 
                }
            }
        @endphp
                
        <div class="background-image" style="background-image:url('/img/article/{!!$Project->id!!}/{{$featuredFile}}"></div>
        <div class="image-overlay"></div>
            
        <div class="banner-page">
            <div class="banner-text center">
                <div class="container">
                    <h1>{!!$Project->heading!!}</h1>
                </div>
            </div>
        </div>

        <section>
            <div class="container">

               

                <div class="row">
                    <div class="column-4 project-carousel">
                        <div class="swiper-container">
                            <div class="swiper-wrapper">
                                @foreach($extraImages as $fileName)
                                    <br /> 
                                     <div class="swiper-slide">
                                        <img src="/img/article/{!!$Project->id!!}/extra/{{$fileName}}" alt="" />
                                    </div>
                                @endforeach
                            </div>
                            <span class="arrow icon-chevron-left"></span>
                            <div class="swiper-pagination"></div>
                            <span class="arrow icon-chevron-right"></span>    
                        </div>
                    </div>

                    <div class="column-4 project-summary">
                          {!!$Project->detail!!}
                    </div>

                    <div class="column-4 video-image" data-toggle="modal" data-target="#video">
                        <img src="http://img.youtube.com/vi/{!!$Project->youtubeLink!!}/0.jpg" alt="" />
                        <a class="overlay"><span class="icon icon-play"></span></a>
                    </div>
                </div>
            </div>
        </section>


        <!-- Modal -->
        <div class="modal fade in" id="video" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="mobile-btn menu-btn active modal-close" id="nav-toggle" data-dismiss="modal" aria-label="Close">
                    <span class="lines"></span>
                </div>
                <div id="player"></div>
            </div>
        </div>

    </div> {{-- End wrapper --}}
     
    @include('partials.search')

    @include('partials.footer')

    {{--     <script type="text/javascript" src="/scripts/vendor/jquery-1.11.3.min.js"></script>
    <script type="text/javascript" src="/scripts/vendor/swiper.jquery.min.js"></script>
    <script type="text/javascript" src="/scripts/vendor/jquery.validate.min.js"></script>
    <script type="text/javascript" src="/scripts/vendor/jquery.validate.unobtrusive.min.js"></script>
    <script type="text/javascript" src="/scripts/vendor/modal.min.js"></script>
    <script type="text/javascript" src="/scripts/global.min.js"></script> --}}
    

    <script>
        var tag = document.createElement('script');
        tag.src = "https://www.youtube.com/iframe_api";
        var firstScriptTag = document.getElementsByTagName('script')[0];
        firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);
        
        jQuery("#video")
        .on('shown.bs.modal',
            function() {
                if (typeof player.playVideo == 'function') {
                    player.playVideo();
                } else {
                    var fn = function() {
                        player.playVideo();
                    };
                    setTimeout(fn, 200);
                }
            });
    
        var player;
    
        function onYouTubeIframeAPIReady() {
            player = new YT.Player('player', {
                height: '390',
                width: '640',
                videoId: '{!!$Project->youtubeLink!!}?enablejsapi=1&amp;version=3&amp;playerapiid=ytplayer&amp;rel=0&amp;showinfo=0&amp;modestbranding=1',
                frameborder: 0,
            });
        }
    
        function pauseVideo() {
            player.pauseVideo();
        }
    </script>








