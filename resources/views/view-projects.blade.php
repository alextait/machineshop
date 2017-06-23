
@extends('layouts.main')

@section('content')


<style>

</style>

<section>
    <div class="container">
        
     <h1 class="center">{{$pagetitle}}</h1>

        <div class="mobile-btn-subnav" id="subnav-toggle">Menu</div>
        <nav class="page-navigation">
            <ul>
                <li class="active">
                    <a href="/all-projects/">All Projects</a>
                </li>



              {{var_dump($subCategoryItems -> count())}}


                @foreach($subCategoryItems as $subCategoryItem)

                    {{var_dump('TETS')}}
                 

                   {{-- 
                    <div class="project-column">
                        <li>
                            <a href="/special-projects/">Tet</a>
                        </li>
                    </div>
 --}}
                @endforeach
               
            </ul>
        </nav>

        <div class="row">
            <div class="category-summary">
                <p>
                    {{$aboutSection}}
                </p>
            </div>
        </div>


        <div class="row projects-container">

            @foreach($displayItems as $displayItem)

                <div class="project-column">
                     <a href="/view-project/{{ $displayItem->displayitemid }}/" class="project-box">
                        <img src="/img/article/{{ $displayItem->displayitemid }}/square.jpg" alt="project-name" />
                        <h4 class="image-overlay-title">{{ $displayItem->heading }}</h4>
                    </a>
                </div>

            @endforeach
            
        </div>

        <div class="text-right ">
            {!! $displayItems->links() !!}
        </div>


      {{--   <div class="pagination-wrapper">
            <ul class="pagination" role="pagination">
                

                    <li class="page-number active"><a href="?page=1">1</a></li>
                    <li class="page-number"><a href="?page=2">2</a></li>
                    <li class="page-number"><a href="?page=3">3</a></li>
                    <li class="page-number"><a href="?page=4">4</a></li>

                    <li><a class="next-page" href="?page=2"><span class="icon-chevron-right"></span></a></li>

            </ul>
        </div> --}}

    </div>
</section>

    </div>
    

@endsection