
@section('title', '| Hire')

@include('partials.head')


<body class="hirelanding menu-push">
    <div class="wrapper" style="background-image:url(/img/background.jpg);">
        
    @include('partials.header')

    <section>
        <div class="container">
            <h1 class="center">Hire</h1>
            <div class="row">
                <div class="category-summary">
                    <p>Machine Shop have a large range of equipment available for hire - from floor effects to specialist triggering equipment to soft  rop weapons. We also offer specialist 3D services and high-speed shooting equipment. If you cannot see what you need call us!</p>
                </div>
            </div>
            <div class="row">
                <div class="projects-container">
                    <div class="column-6">
                        <a href="{{route('hire.public.listequipmenthire')}}" class="project-box">
                            <img src="/img/equipment_hire.jpg" alt="project-name" />
                            <h4 class="image-overlay-title">Equipment Hire</h4>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
    
@include('partials.search')

@include('partials.footer')

 
    
