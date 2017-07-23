
@section('title', '| View Projects')

@include('partials.head')

<body class="categorylanding menu-push">
    <div class="wrapper" style="background-image:url(/img/background.jpg);">
        @include('partials.header')
        
        <section>
            <div class="container">
                
             <h1 class="center"> Equipment Hire</h1>
                <div class="row">
                    <div class="category-summary">
                        <p>
                           Machine Shop has built an extensive catalogue of special effects machinery and rigs over the years, all of which are available for hire. Some items include a Machine Shop technician, who will operate the item for you. If you can't see what you are looking for on these pages please give us a call as it is highly likely we can provide you with exactly what is required.
                        </p>
                    </div>
                </div>
                <div class="row projects-container">
                    @foreach($hireCategories as $hireCategory)
                        <div class="project-column">
                             <a href="/hire/public/list/{{ $hireCategory->id }}/" class="project-box">
                                {{ Html::image('img/hire/categories/' . $hireCategory->image) }}
                                <h4 class="image-overlay-title">
                                    {{ $hireCategory->title }} 
                                </h4>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    </div>
    
    @include('partials.search')

    @include('partials.footer')

</body>