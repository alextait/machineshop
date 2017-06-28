
@extends('layouts.main')

@section('content')

<div class="banner">
    <div class="swiper-container swiper-container-horizontal swiper-container-fade">
        <div class="swiper-wrapper" style="transition-duration: 0ms;">
            @foreach($Projects as $Project)
                
                @foreach($Project->images as $image)
                    @php
                        if($image->type == 'featured')
                        { 
                            $filename = $image->filename; 
                        }
                    @endphp
                @endforeach

                <div class="swiper-slide swiper-slide-active" style="background-image: url('/img/article/{{$Project->id}}/{{$filename}}');  width: 1903px; ">
                    <div class="image-overlay"></div>
                    <div class="container">
                        <div class="banner-text">
                            <h2>{{ $Project->heading }}</h2>
                            <p>{{ $Project->subHeading }}</p>
                            <a href="/view-project/{{$Project->id}}/" class="btn">
                                View Project
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach



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