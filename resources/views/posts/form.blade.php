@extends('layout')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col offset-1">
                <form method="post" action="{{route('store-post')}}">
                    @csrf()
                    <div class="form-group">
                        <label for="exampleInputEmail1">Title</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter title">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Body</label>
                        <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Enter body">
                    </div>

                    <button type="submit" class="btn btn-primary btn-block">Save new post</button>
                </form>

            </div>

        </div>
    </div>
@endsection
