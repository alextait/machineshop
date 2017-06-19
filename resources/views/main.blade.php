<!DOCTYPE html>
<!-- saved from url=(0029)http://www.machineshop.co.uk/ -->
<html lang="en">


<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Machine Shop | Special Effects services and Hire for TV, Films and Commercials; Interactive Exhibition Design and Build; Art Fabrication for Museums and Galleries. </title>
    <!-- Meta -->

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Machine Shop supplies Special Effects services and Special Effects Hire for TV, Films and Commercials. Machine Shop are also specialists in Art Fabrication and Interactive Exhibition Design and Build, for Museums and Art Galleries in the UK and internationally.">
    <meta name="keywords" content="Special Effects UK, Special Effect, SFX, TV FX, Special FX, Movie FX, Film Special Effects, Motion Picture Special Effects, Special Effects Hire, FX Rigs, Floor Effects, Pyrotechnics, Pyrotechnic Effects, Atmospheric effects, Models, Miniatures, Liquid Effects, Animatronics, Puppets, Motion Control, High Speed Special Effects, Film Costumes">
    <link rel="shortcut icon" href="http://www.machineshop.co.uk/images/favicon.ico">
   

    <link href="{{asset('css/app.css')}}" rel="stylesheet" type="text/css" />

    <link href="{{asset('css/global.css')}}" rel="stylesheet" type="text/css" />

  <!--   <link rel="stylesheet" type="text/css" href="._files/global.min.css"> -->

        <!--[if lt IE 10]>
            <script src="/scripts/lib/html5shiv.min.js"></script>
            <script src="/scripts/lib/respond.min.js"></script>
        <![endif]-->

        <!-- Google Analytics -->
        <!--     
        <script>
        window.ga=window.ga||function(){(ga.q=ga.q||[]).push(arguments)};ga.l=+new Date;
        ga('create', 'UA-4870570-1', 'auto');
        ga('send', 'pageview');
        </script> 


        <script async="" src="./analytics.js.download">

        </script>
        -->
        <!-- End Google Analytics -->
</head>

<body class="home menu-push">

    <div class="wrapper">
                
        @yield('partials.header')

      	@yield('content')
    
      	@yield('partials.search')

      	@yield('partials.footer')	  
      	 
	</div>

    <script type="text/javascript" src="{{asset('js/app.js')}}"></script>
    
    <script>
         var mySwiper = new Swiper ('.swiper-container', {
            // Optional parameters
            direction: 'horizontal',
            loop: true,
            
            // If we need pagination
            pagination: '.swiper-pagination'
            ,paginationClickable: true
            
            // Navigation arrows
            //nextButton: '.swiper-button-next',
            //prevButton: '.swiper-button-prev',
            
            // And if we need scrollbar
            //,scrollbar: '.swiper-scrollbar'
          })        
    </script>
</body>
</html>