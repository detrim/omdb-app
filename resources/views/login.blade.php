@extends('layout')

@section('content')

<div class="row justify-content-center">
    <div class="col-md-4">

        <div class="card shadow">

            {{-- Card Header --}}
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4 class="mb-0">Login</h4>
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
                        <input type="text" name="username" class="form-control" placeholder="username">
                    </div>

                    <div class="form-group">
                        <input type="password" name="password" class="form-control" placeholder="password">
                    </div>

                    <button type="submit" class="btn btn-primary btn-block">
                        Login
                    </button>
                </form>

            </div>

        </div>

    </div>
</div>

@endsection
