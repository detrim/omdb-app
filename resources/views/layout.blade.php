<!DOCTYPE html>
<html>
<head>
    <title>OMDb App</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

@if(session()->has('user'))
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="/movies">OMDb App</a>

    <!-- Toggler untuk mobile -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Navbar links -->
    <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
        <div class="navbar-nav">

            <a href="/movies" class="btn btn-outline-light btn-sm mr-2">{{ __('messages.movie') }}</a>
            <a href="/favorite" class="btn btn-outline-warning btn-sm mr-2">{{ __('messages.favorite') }}</a>
            <a href="/lang/en" class="btn btn-outline-info btn-sm mr-1">EN</a>
            <a href="/lang/id" class="btn btn-outline-info btn-sm mr-3">ID</a>
            <a href="/logout" class="btn btn-danger btn-sm">{{ __('messages.logout') }}</a>

        </div>
    </div>
</nav>
@endif

<div class="container mt-4">
    @yield('content')
</div>

<!-- Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
