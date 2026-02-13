@extends('layout')

@section('content')

<div class="row justify-content-center">
    <div class="col-md-6">

        <div class="card shadow-sm mb-4">
            <img src="{{ $movie->Poster !== 'N/A' ? $movie->Poster : 'https://dummyimage.com/300x450/cccccc/000000&text=No+Image' }}" 
                 class="card-img-top" 
                 style="height:450px;object-fit:cover;" 
                 onerror="this.onerror=null;this.src='https://dummyimage.com/300x450/cccccc/000000&text=No+Image';">

            <div class="card-body">
                <h4 class="card-title">{{ $movie->Title }}</h4>
                <p><strong>Genre:</strong> {{ $movie->Genre }}</p>
                <p><strong>Year:</strong> {{ $movie->Year }}</p>
                <p><strong>Director:</strong> {{ $movie->Director }}</p>
                <p><strong>Plot:</strong> {{ $movie->Plot }}</p>

               
                <div class="d-flex justify-content-center mt-3">
                    <a href="{{ url()->previous() }}" class="btn btn-secondary mx-2">← Back</a>

                    <button id="favBtn" class="btn btn-warning mx-2"
                            data-id="{{ $movie->imdbID }}"
                            data-title="{{ $movie->Title }}"
                            data-poster="{{ $movie->Poster !== 'N/A' ? $movie->Poster : 'https://dummyimage.com/300x450/cccccc/000000&text=No+Image' }}">
                        ❤️ Add to Favorite
                    </button>
                </div>

            </div>
        </div>
    </div>
</div>

<!-- Toast -->
<div style="position: fixed; top: 20px; right: 20px; z-index: 9999;">
    <div id="favToast" class="toast" data-delay="2000">
        <div class="toast-header bg-success text-white">
            <strong class="mr-auto">Success</strong>
        </div>
        <div class="toast-body">
            Added to Favorite
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function(){

    const favBtn = document.getElementById('favBtn');

    favBtn.addEventListener('click', function(){

        const movie = {
            imdbID: favBtn.dataset.id,
            Title: favBtn.dataset.title,
            Poster: favBtn.dataset.poster
        };

        fetch('/favorite/add',{
            method: 'POST',
            headers: {
                'Content-Type':'application/json',
                'X-CSRF-TOKEN':'{{ csrf_token() }}'
            },
            body: JSON.stringify({
                imdbID: movie.imdbID,
                movie: movie
            })
        })
        .then(()=> {
            favBtn.classList.remove('btn-warning');
            favBtn.classList.add('btn-success');
            favBtn.innerHTML = '✔ Added';
            favBtn.disabled = true;

            showToast();
        });
    });

    function showToast(){
        $('#favToast').toast('show');
    }

});
</script>

@endsection
