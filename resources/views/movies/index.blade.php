@extends('layout')

@section('content')

<h4>{{ __('messages.searchMovie') }}</h4>

<div class="input-group mb-4">
    <input type="text" id="keyword" class="form-control" placeholder="Search movie...">
    <div class="input-group-append">
        <button class="btn btn-primary" onclick="searchMovie()">{{ __('messages.search') }}</button>
    </div>
</div>

<div class="row" id="movies"></div>

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
let page = 1;
let keyword = '';
let isLoading = false;

function searchMovie(){
    keyword = document.getElementById('keyword').value;
    page = 1;
    document.getElementById('movies').innerHTML = '';
    loadMore();
}

function loadMore(){
    if(isLoading || keyword === '') return;
    isLoading = true;

    fetch('/movies/search?keyword=' + keyword + '&page=' + page)
    .then(res => res.json())
    .then(data => {

        if(data.Search){

            data.Search.forEach(m => {

                let poster = m.Poster !== "N/A" 
                    ? m.Poster 
                    : "https://dummyimage.com/300x450/cccccc/000000&text=No+Image";

                let card = `
                <div class="col-md-3 mb-4">
                    <div class="card shadow-sm h-100">
                        <img src="${poster}" 
                             class="card-img-top" 
                             style="height:300px;object-fit:cover;" 
                             loading="lazy"
                             onerror="this.onerror=null;this.src='https://dummyimage.com/300x450/cccccc/000000&text=No+Image';">

                        <div class="card-body text-center">
                            <h6>${m.Title}</h6>

                            <!-- Tombol Detail & Fav sejajar -->
                            <div class="d-flex justify-content-center mt-2">
                                <a href="/movies/${m.imdbID}" class="btn btn-info btn-sm mx-1">
                                    Detail
                                </a>

                                <button class="btn btn-warning btn-sm mx-1 fav-btn"
                                        data-id="${m.imdbID}"
                                        data-title="${m.Title}"
                                        data-poster="${poster}">
                                    ❤️ Fav
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                `;

                document.getElementById('movies')
                    .insertAdjacentHTML('beforeend', card);

            });

            page++;
        }

        isLoading = false;
    });
}

window.onscroll = function(){
    if(window.innerHeight + window.scrollY >= document.body.offsetHeight - 100){
        loadMore();
    }
};

// Event Delegation untuk tombol favorite
document.addEventListener('click', function(e){

    if(e.target.classList.contains('fav-btn')){

        let button = e.target;

        let movie = {
            imdbID: button.dataset.id,
            Title: button.dataset.title,
            Poster: button.dataset.poster
        };

        fetch('/favorite/add',{
            method:'POST',
            headers:{
                'Content-Type':'application/json',
                'X-CSRF-TOKEN':'{{ csrf_token() }}'
            },
            body:JSON.stringify({
                imdbID:movie.imdbID,
                movie:movie
            })
        })
        .then(()=> {
            button.classList.remove('btn-warning');
            button.classList.add('btn-success');
            button.innerHTML = '✔ Added';
            button.disabled = true;

            showToast();
        });

    }

});

function showToast(){
    $('#favToast').toast('show');
}
</script>

@endsection
