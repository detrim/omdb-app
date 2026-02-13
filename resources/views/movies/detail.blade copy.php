@extends('layout')

@section('content')

<div class="card shadow">
    <div class="row no-gutters">

        <div class="col-md-4">
            <img src="{{ $movie->Poster }}" class="img-fluid" loading="lazy">
        </div>

        <div class="col-md-8">
            <div class="card-body">
                <h4>{{ $movie->Title }}</h4>
                <p>{{ $movie->Plot }}</p>
                <p><strong>Year:</strong> {{ $movie->Year }}</p>
                <p><strong>Genre:</strong> {{ $movie->Genre }}</p>

                <button class="btn btn-warning" onclick="addFav()">{{ __('messages.addFavorite') }}</button>
                <a href="/movies" class="btn btn-secondary">{{ __('messages.back') }}</a>
            </div>
        </div>

    </div>
</div>

<script>
function addFav(){
fetch('/favorite/add',{
method:'POST',
headers:{
'Content-Type':'application/json',
'X-CSRF-TOKEN':'{{ csrf_token() }}'
},
body:JSON.stringify({imdbID:"{{ $movie->imdbID }}",movie:@json($movie)})
});
}
</script>

@endsection
