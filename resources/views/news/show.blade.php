
@extends('layouts.main')




@section('stylesheets')

  
    
    <script>
        tinymce.init({
            selector: 'textarea'
            , plugins: "link" 
            , menubar : "false"
        });
    </script>

@endsection


@section('content')
    <div class="container">
        <section>
            
        <h1 class="center"> 
         {{$newsArticle->heading}}
        </h1>
        <div class="lined-column-container">
            <div class="column-3 lined-column">
                
                <div class="lined-column-header">
                    <h3>
                      {{ date('j F Y', strtotime($newsArticle->created_at)) }}
                    </h3>
                </div>

                <div class="social-share">
                    <span>Share:</span>
                    <a href="https://www.facebook.com/sharer/sharer.php?u=http://machineshop.co.uk/news/joe-harte-start/&t=Joe Harte start" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');return false;" target="_blank" title="Share on Facebook">
                        <span class="icon-facebook"></span>
                    </a>

                    <a href="https://twitter.com/share?url=http://machineshop.co.uk/news/joe-harte-start/&text=Joe Harte start" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');return false;" target="_blank" title="Share on Twitter">
                        <span class="icon-twitter"></span>
                    </a>
                </div>

            </div>
            <div class="column-8 shift-1">
                 {!!$newsArticle->body!!}
            </div>
        </div>
        </section>
    </div>
    
@endsection