


<div class="footer-search">
    <div class="container">
        <div class="column-10">
            {!! Form::open(['route' => 'project.results', 'method' => 'POST' ])  !!}
                <input type="text" name="search">
                <button type="submit" class="btn-black">Search</button>
            {!! Form::close() !!}  
        </div>
    </div>
</div>