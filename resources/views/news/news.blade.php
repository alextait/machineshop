
@extends('layouts.main')

@section('content')

        
<section class="news">
    <div class="container">
        <h1 class="center">News</h1>


       @foreach ($newsArticles as $NewsItem)
            <div class="post lined-column-container">
                <div class="column-3 lined-column">
                    <div class="lined-column-header">
                        <h3>{{$NewsItem->heading}}</h3>
                    </div>
                    <p>           
                        {{ date('j F Y', strtotime($NewsItem->created_at)) }}
                    </p>
                </div>
                <div class="column-8 shift-1">
                    {!! substr($NewsItem->body,0,70)  !!}
                    <br />
                    <a href="{{route('news.show', $NewsItem->id)}}">Read the full story</a>
                </div>
            </div>
        @endforeach
       


        <div class="pagination-wrapper">
        <ul class="pagination" role="pagination">




        </ul>
</div>

    </div>
</section>

@endsection