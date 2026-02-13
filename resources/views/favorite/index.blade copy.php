@extends('layout')

@section('content')

<h4>{{ __('messages.favoriteMovie') }}</h4>

@if(count($favorites))

<div class="row">
@foreach($favorites as $fav)
<div class="col-md-3 mb-4">
    <div class="card shadow-sm h-100">

        <img src="{{ $fav['Poster'] ?? '' }}" 
             class="card-img-top" 
             style="height:300px;object-fit:cover;" 
             loading="lazy">

        <div class="card-body text-center">
            <h6>{{ $fav['Title'] ?? '' }}</h6>

            <button class="btn btn-danger btn-sm remove-btn"
                    data-id="{{ $fav['imdbID'] ?? '' }}">
                {{ __('messages.remove') }}
            </button>
        </div>

    </div>
</div>
@endforeach
</div>

@else
<div class="alert alert-warning text-center">
    {{ __('messages.no_data') }}
</div>
@endif


<script>
document.addEventListener('click', function(e){

    if(e.target.classList.contains('remove-btn')){

        let id = e.target.dataset.id;

        let formData = new FormData();
        formData.append('imdbID', id);
        formData.append('_token', '{{ csrf_token() }}');

        fetch('/favorite/remove',{
            method:'POST',
            body:formData
        })
        .then(res => res.json())
        .then(data => {
            location.reload();
        });

    }

});
</script>

@endsection
