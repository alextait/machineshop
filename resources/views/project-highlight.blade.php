
@extends('layouts.main')

@section('content')

<div class="banner">
    <div class="swiper-container swiper-container-horizontal swiper-container-fade">
        <div class="swiper-wrapper" style="transition-duration: 0ms;">

         

            @foreach($displayItems as $displayItem)

                
                <div class="swiper-slide swiper-slide-active" style="background-image: url('/img/article/{{$displayItem->displayItemID}}/big.jpg');  width: 1903px; ">
                    <div class="image-overlay"></div>
                    <div class="container">
                        <div class="banner-text">
                            <h2>{{ $displayItem->heading }}</h2>
                            <p>{{ $displayItem->subheading }}</p>
                            <a href="/view-project/{{$displayItem->displayItemID}}/" class="btn">
                                View Project
                            </a>
                        </div>
                    </div>
                </div>
               

            @endforeach

            
            {{-- <div class="swiper-slide swiper-slide-next" style="background-image: url('/img/article/media/screen-shot-2016-08-11-at-175625.jpg'); width: 1903px; ">
                <div class="image-overlay"></div>
                <div class="container">
                    <div class="banner-text">
                        <h2>Little French Lobster</h2>
                        <p>Gourmet stop frame animation</p>
                            <a href="http://www.machineshop.co.uk/special-effects/models-miniatures/o2-lobster/" class="btn">View Project</a>
                    </div>
                </div>
            </div>
            <div class="swiper-slide" style="background-image: url('/img/article/media/untitled-1.jpg'); width: 1903px; ">
                <div class="image-overlay"></div>
                <div class="container">
                    <div class="banner-text">
                        <h2>Sky Fluid Viewing</h2>
                        <p>Lovely liquids and amazing models</p>
                            <a href="http://www.machineshop.co.uk/special-effects/liquid-effects/sky-fluid-viewing/" class="btn">View Project</a>
                    </div>
                </div>
            </div>
            <div class="swiper-slide" style="background-image: url('/img/article/media/6-jpeg.jpg'); width: 1903px; ">
                <div class="image-overlay"></div>
                <div class="container">
                    <div class="banner-text">
                        <h2>Schwartz Spices</h2>
                        <p>Who said food and Pyro's dont mix?</p>
                            <a href="http://www.machineshop.co.uk/special-effects/pyrotechnics-atmospherics/schwartz/" class="btn">View Project</a>
                    </div>
                </div>
            </div>
            <div class="swiper-slide" style="background-image: url('/img/article/media/article-2304607-191b3207000005dc-411_964x588.jpg'); width: 1903px; ">
                <div class="image-overlay"></div>
                <div class="container">
                    <div class="banner-text">
                        <h2>adidas</h2>
                        <p>The Chelsea team are feeling blue</p>
                            <a href="http://www.machineshop.co.uk/special-effects/liquid-effects/adidas-blue-liquid/" class="btn">View Project</a>
                    </div>
                </div>
            </div>
            <div class="swiper-slide" style="background-image: url('/img/article/media/banner-sony4k.jpg'); width: 1903px; ">
                <div class="image-overlay"></div>
                <div class="container">
                    <div class="banner-text">
                        <h2>Sony 4K TV</h2>
                        <p>Three tonnes of petals made to erupt from a dormant volcano in Central America.</p>
                            <a href="http://www.machineshop.co.uk/special-effects/pyrotechnics-atmospherics/sony-4k-tv-volcano-eruption/" class="btn">View Project</a>
                    </div>
                </div>
            </div> --}}
        </div><!-- End swiper wrapper  -->

        <div class="swiper-pagination swiper-pagination-clickable">
            <span class="swiper-pagination-bullet swiper-pagination-bullet-active"></span>
            <span class="swiper-pagination-bullet"></span>
            <span class="swiper-pagination-bullet"></span>
            <span class="swiper-pagination-bullet"></span>
            <span class="swiper-pagination-bullet"></span>
            <span class="swiper-pagination-bullet"></span>
        </div>

    </div><!-- End swiper container  -->

 
</div><!-- End banner  -->

@endsection