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

    <div class="wrapper gradient-background">
                
    
        @include('partials.header')

      	@yield('content')
    
	    <div class="footer-search">
	        <div class="container">
	            <div class="column-10">
	                <form action="http://www.machineshop.co.uk/search" method="GET">
	                    <input type="text" name="q">
	                    <button type="submit" class="btn-black">Search</button>
	                </form>
	            </div>
	        </div>
	    </div>

	    <footer>
	        <div class="container">
	            <h3>Follow Us</h3>
	            <div class="social">
	                <ul>
	                    <li>
	                        <a href="https://www.facebook.com/MachineShopSpecialEffects?fref=ts" target="_blank">
	                            <span class="icon-facebook"></span>
	                        </a>
	                    </li>
	                    <li>
	                        <a href="https://www.youtube.com/user/machineshoppaul" target="_blank">
	                            <span class="icon-youtube3"></span>
	                        </a>
	                    </li>
	                </ul>
	            </div>
	            <a href="mailto:info@machineshop.co.uk" class="email">info@machineshop.co.uk</a>
	            <div class="address">
	                <ul>
	                    <li>MachineShop, 180 Acton Lane, Park Royal, London, NW10 7NH</li>
	                    <li>Tel: 020 8961 5888</li>
	                    <li>Fax: 020 8961 5885</li>
	                </ul>
	            </div>
	        </div>
	    </footer>
	</div>

    <style>

    </style>


    <script type="text/javascript" src="{{asset('js/app.js')}}"></script>

</body>
</html>