<!DOCTYPE html>
<html>
<head>
    <title>OMDb App</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

@if(session()->has('user'))
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="/movies">OMDb App</a>

    <div class="ml-auto">
        <a href="/movies" class="btn btn-outline-light btn-sm mr-2">{{ __('messages.movie') }}</a>
        <a href="/favorite" class="btn btn-outline-warning btn-sm mr-2">{{ __('messages.favorite') }}</a>
        <a href="/lang/en" class="btn btn-outline-info btn-sm mr-1">EN</a>
        <a href="/lang/id" class="btn btn-outline-info btn-sm mr-3">ID</a>
        <a href="/logout" class="btn btn-danger btn-sm">{{ __('messages.logout') }}</a>
    </div>
</nav>
@endif

<div class="container mt-4">
    @yield('content')
</div>

</body>
</html>
