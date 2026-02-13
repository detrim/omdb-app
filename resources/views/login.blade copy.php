@extends('layout')

@section('content')

<div class="row justify-content-center">
    <div class="col-md-4">

        <div class="card shadow">

            {{-- Card Header --}}
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4 class="mb-0">{{ __('messages.login') }}</h4>
                <div>
                    <a href="/lang/en" class="btn btn-outline-info btn-sm">EN</a>
                    <a href="/lang/id" class="btn btn-outline-info btn-sm">ID</a>
                </div>
            </div>

            {{-- Card Body --}}
            <div class="card-body">

                {{-- Error Message --}}
                @if(session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif

                {{-- Login Form --}}
                <form method="POST" action="/login">
                    @csrf

                    <div class="form-group">
                        <input type="text" name="username" class="form-control" placeholder="{{ __('messages.username') }}">
                    </div>

                    <div class="form-group">
                        <input type="password" name="password" class="form-control" placeholder="{{ __('messages.password') }}">
                    </div>

                    <button type="submit" class="btn btn-primary btn-block">
                        {{ __('messages.login') }}
                    </button>
                </form>

            </div>

        </div>

    </div>
</div>

@endsection
