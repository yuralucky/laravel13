@extends('layout')

@section('content')
        <link href="{{ asset('/resources/css/login.css') }}" rel="stylesheet">
    <div class="d-flex justify-content-center h-100">
        <div class="card">
            <div class="card-header">
                <h3>Sign In</h3>
                <div class="d-flex justify-content-end social_icon">
                    <span><a href="{{$link}}"><i class="fab fa-gitlab"></i></a></span>
                    <span><i class="fab fa-twitter-square"></i></span>
                </div>
            </div>
            <div class="card-body">
                <form>
                    <div class="input-group form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                        </div>
                        <input type="text" class="form-control" placeholder="email">

                    </div>
                    <div class="input-group form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-key"></i></span>
                        </div>
                        <input type="password" class="form-control" placeholder="password">
                    </div>

                    <div class="form-group">
                        <input type="submit" value="Login" class="btn float-right login_btn btn-block">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
