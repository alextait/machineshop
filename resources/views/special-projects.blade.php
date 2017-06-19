
@extends('layouts.main')

@section('content')


<style>
.wrapper{
    background-image: url('/img/background-website.png');
    
}
</style>


<section>
    <div class="container">
        

    <ul class="breadcrumb">
        <li><a href="/">Machine Shop</a> <span class="divider">></span></li>
        <li class="active">Special Projects</li>
    </ul>

     <h1 class="center">Special Projects</h1>

        <div class="mobile-btn-subnav" id="subnav-toggle">Menu</div>
        <nav class="page-navigation">
            <ul>
                    <li class="active">
                        <a href="/all-projects/">All Projects</a>
                    </li>
                    <li>
                        <a href="/special-projects/">Special Projects</a>
                    </li>
                    <li>
                        <a href="/theatre-experiential/">Theatre &amp; Experiential</a>
                    </li>
            </ul>
        </nav>

        <div class="row">
            <div class="category-summary">
                <p>Machine Shop have been developing and creating interactive and one off creations for as long as we can remember.  Our Special Projects division was founded to make use of our diverse knowledge and experience.  From the smallest visual detail to the most complex mechanical system we offer a complete service to bring your crazy ideas to life.  Each project is considered to make the most of the creative idea whilst maintaining realism in budgeting.  From initial ideas through 3D CAD, modelling, prototyping, software development and soak testing to complete production runs, our team are simply unfazed by the impossible.</p>
            </div>
        </div>
        <div class="row projects-container">
            <div class="project-column">
                <a href="/special-projects/special-projects/audi-sport/" class="project-box">
                        <img src="/img/article/media/screen-shot-2016-08-11-at-164319.png?anchor=center&amp;mode=crop&amp;width=340&amp;height=310&amp;rnd=131154111520000000" alt="project-name" />
                    <h4 class="image-overlay-title">Audi A4 Sport</h4>
                </a>
            </div>
            <div class="project-column">
                <a href="/special-projects/special-projects/lexus-quadcopters/" class="project-box">
                        <img src="/img/article/media/dscn8238.jpg?anchor=center&amp;mode=crop&amp;width=340&amp;height=310&amp;rnd=130894070840000000" alt="project-name" />
                    <h4 class="image-overlay-title">Lexus Quadcopters</h4>
                </a>
            </div>
            <div class="project-column">
                <a href="/special-projects/special-projects/nest-tobias-rehberger/" class="project-box">
                        <img src="/img/article/media/p1020865.jpg?anchor=center&amp;mode=crop&amp;width=340&amp;height=310&amp;rnd=130894087610000000" alt="project-name" />
                    <h4 class="image-overlay-title">Nest - Tobias Rehberger</h4>
                </a>
            </div>
            <div class="project-column">
                <a href="/special-projects/special-projects/art-machine/" class="project-box">
                        <img src="/img/article/media/pic-4.jpg?anchor=center&amp;mode=crop&amp;width=340&amp;height=310&amp;rnd=130867229800000000" alt="project-name" />
                    <h4 class="image-overlay-title">E_Moot - Art Machine</h4>
                </a>
            </div>
            <div class="project-column">
                <a href="/special-projects/special-projects/toyota-ticklish-car/" class="project-box">
                        <img src="/img/article/media/ticklish_car_12.jpg?anchor=center&amp;mode=crop&amp;width=340&amp;height=310&amp;rnd=130936317500000000" alt="project-name" />
                    <h4 class="image-overlay-title">Toyota Ticklish Car</h4>
                </a>
            </div>
            <div class="project-column">
                <a href="/special-projects/special-projects/nissan-leaf/" class="project-box">
                        <img src="/img/article/media/rsz_db-20131128-2216-0104.jpg?anchor=center&amp;mode=crop&amp;width=340&amp;height=310&amp;rnd=130867361050000000" alt="project-name" />
                    <h4 class="image-overlay-title">Nissan Leaf Virtual Test Drive</h4>
                </a>
            </div>
            <div class="project-column">
                <a href="/special-projects/special-projects/gkn/" class="project-box">
                        <img src="/img/article/media/car.jpg?anchor=center&amp;mode=crop&amp;width=340&amp;height=310&amp;rnd=130894731040000000" alt="project-name" />
                    <h4 class="image-overlay-title">GKN - Transparent car</h4>
                </a>
            </div>
            <div class="project-column">
                <a href="/special-projects/special-projects/pakpoom-silaphan/" class="project-box">
                        <img src="/img/article/media/pakpoom-silaphan-the-blue-valve-detail-3.jpg?anchor=center&amp;mode=crop&amp;width=340&amp;height=310&amp;rnd=130869736920000000" alt="project-name" />
                    <h4 class="image-overlay-title">Pakpoom Silaphan</h4>
                </a>
            </div>
            <div class="project-column">
                <a href="/special-projects/special-projects/bmw-i3-in-store/" class="project-box">
                        <img src="/img/article/media/p2160011.jpg?anchor=center&amp;mode=crop&amp;width=340&amp;height=310&amp;rnd=130894048870000000" alt="project-name" />
                    <h4 class="image-overlay-title">BMW i3 - Interactive game</h4>
                </a>
            </div>
            <div class="project-column">
                <a href="/special-projects/special-projects/giant-louvre-blind/" class="project-box">
                        <img src="/img/article/media/dscn9680.jpg?anchor=center&amp;mode=crop&amp;width=340&amp;height=310&amp;rnd=130867323690000000" alt="project-name" />
                    <h4 class="image-overlay-title">Viking - Giant Louvre</h4>
                </a>
            </div>
        </div>

        <div class="pagination-wrapper">
            <ul class="pagination" role="pagination">
                

                    <li class="page-number active"><a href="?page=1">1</a></li>
                    <li class="page-number"><a href="?page=2">2</a></li>
                    <li class="page-number"><a href="?page=3">3</a></li>
                    <li class="page-number"><a href="?page=4">4</a></li>

                    <li><a class="next-page" href="?page=2"><span class="icon-chevron-right"></span></a></li>

            </ul>
        </div>

    </div>
</section>

    </div>
    

@endsection