@extends('layout.layout')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-sm-8 col-md-6">
                <form class="form mt-5" action="{{ route('login') }}" method="post">
                    @csrf
                    <h3 class="text-center text-dark">Login</h3>
                    <div class="form-group">
                        <label for="email" class="text-dark">Email:</label><br>
                        <input type="email" name="email" id="email" class="form-control">
                        @error('email')
                            <p class="alert alert-danger shadow-sm mt-2">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="form-group mt-3">
                        <label for="password" class="text-dark">Password:</label><br>
                        <input type="password" name="password" id="password" class="form-control">
                        @error('password')
                            <p class="alert alert-danger shadow-sm mt-2">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="remember-me" class="text-dark"></label><br>
                        <input type="submit" name="submit" class="btn btn-secondary btn-md" value="submit">
                    </div>
                    <div class="text-right mt-2">
                        <a href="/register" class="text-primary">Register here</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
