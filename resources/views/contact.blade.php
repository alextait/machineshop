
@section('title', '| Contact')

@include('partials.head')


<body class="contact menu-push">

<div class="wrapper" >
        
    @include('partials.header')   
      
    <section>
        <div class="map-container">
            <div id="map-canvas"></div>
        </div>
        <div class="container">
            <div class="contact-info column-4">
                <h1>Contact Us</h1>
                <p>180 Acton Lane<br />Park Royal<br />London<br />NW10 7NH</p>
                <p>info@machineshop.co.uk</p>
                <p>Tel:  020 8961 5888<br />Fax: 020 8961 5885</p>
            </div>
        </div>
    </section>   
</div> {{-- End wrapper --}}
 
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCJLfurw9KOuUKjGYrBTvMv65vAU11z1wU"></script>
 
@include('partials.search')

@include('partials.footer')


