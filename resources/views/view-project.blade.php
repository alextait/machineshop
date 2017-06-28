
@extends('layouts.main')

@section('content')


<style>

</style>

<section>

    <div class="background-image" style="background-image:url('/img/article/{!!$Project->ProjectID!!}/big.jpg');"></div>
    <div class="image-overlay"></div>
        
    <div class="banner-page">
        <div class="banner-text center">
            <div class="container">
                <h1> {{$Project->heading}}</h1>
            </div>
        </div>
    </div>
    <section>
        <div class="container">
            <div class="row">
                    <div class="column-4 project-carousel">
                        <div class="swiper-container">
                            <div class="swiper-wrapper">
{{--                                     <div class="swiper-slide">
                                                <img src="/media/1009/sony4k-slider1.jpg?anchor=center&amp;mode=crop&amp;width=383&amp;height=286&amp;rnd=130823828800000000" alt="" />
                                    </div>
                                    <div class="swiper-slide">
                                                <img src="/media/1010/sony4k-slider2.jpg?anchor=center&amp;mode=crop&amp;width=383&amp;height=286&amp;rnd=130823828800000000" alt="" />
                                    </div>
                                    <div class="swiper-slide">
                                                <img src="/media/1012/sony4k-slider3.jpg?anchor=center&amp;mode=crop&amp;width=383&amp;height=286&amp;rnd=130823828800000000" alt="" />
                                    </div>
                                    <div class="swiper-slide">
                                                <img src="/media/1014/sony4k-slider4.jpg?anchor=center&amp;mode=crop&amp;width=383&amp;height=286&amp;rnd=130823828800000000" alt="" />
                                    </div>
                                    <div class="swiper-slide">
                                                <img src="/media/1011/sony4k-slider5.jpg?anchor=center&amp;mode=crop&amp;width=383&amp;height=286&amp;rnd=130823828800000000" alt="" />
                                    </div>
                                    <div class="swiper-slide">
                                                <img src="/media/1013/sony4k-slider6.jpg?anchor=center&amp;mode=crop&amp;width=383&amp;height=286&amp;rnd=130823828800000000" alt="" />
                                    </div> --}}
                            </div>
                            <span class="arrow icon-chevron-left"></span>
                            <div class="swiper-pagination"></div>
                            <span class="arrow icon-chevron-right"></span>
                                
                        </div>
                    </div>

                <div class="column-4 project-summary">
                    {!!html_entity_decode($Project->detail)!!}
                </div>

                    <div class="column-4 video-image" data-toggle="modal" data-target="#video">
                        <img src="http://img.youtube.com/vi/awOg8P4MlEc/0.jpg" alt="" />
                        <a class="overlay"><span class="icon icon-play3"></span></a>
                    </div>

            </div>

        </div>
    </section>



</section>
    

@endsection