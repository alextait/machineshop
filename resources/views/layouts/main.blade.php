
@include('partials.head')

@yield('stylesheets')

<body class="home menu-push">

	<div class="wrapper">
	            
	    @include('partials.header')

	  	@yield('content')

	    @include('partials.search')

		@include('partials.footer')

		
	</div>
	
	 @yield('scripts')
</body>
</html>


