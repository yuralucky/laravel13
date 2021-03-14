@extends('layout')
@section('content')
    <div class="container">
        <div class="row">
            {{Auth::user()->name}}
            <a href="{{route('form-post')}}" class="btn btn-dark">Add new post</a>
                        <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">Title</th>
                    <th scope="col">Author</th>
                    <th scope="col">Category</th>
                    <th scope="col">Tags</th>
                    <th scope="col">Text</th>
                    <th scope="col">Date of updated</th>
                </tr>
                </thead>
                <tbody>

                @foreach($posts as $post)
                    <tr>
                        <th scope="row">{{$post->title}}</th>
                        <td>{{$post->user->name}}</td>
                        <td><a href="#">{{$post->category->title}}</td>
                        <td>@foreach($post->tags as $tag)
                                <span><a href="#">{{$tag->title}}</a></span>
                            @endforeach
                        </td>
                        <td>{{$post->body}}</td>
                        <td>{{$post->created_at->diffForHumans()}}</td>
                    </tr>

                @endforeach


                </tbody>
            </table>
        </div>
    </div>

@endsection
