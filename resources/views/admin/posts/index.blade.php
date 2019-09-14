@extends('layouts.admin')


@section('content')

    <h1>Posts</h1>

    <table class="table table-bordered table-hover">
        <thead>
        <tr>
            <th>Id</th>
            <th>Photo</th>
            <th>Owner</th>
            <th>Category</th>
            <th>Title</th>
            <th>Body</th>
            <th>View Post</th>
            <th>View Comments</th>
            <th>Created At</th>
            <th>Updated At</th>
        </tr>
        </thead>
        <tbody>
        @if($posts)
            @foreach($posts as $post)
                <tr>
                    <td>{{$post->id}}</td>
                    <td><img height="70" src="{{$post->photo ? $post->photo->file : 'http://placehold.it/400x400'}}" alt="photo"></td>
                    <td><a class="btn btn-default" href="{{route('posts.edit', $post->id)}}">{{$post->user->name}}</a></td>
                    <td>{{$post->category ? $post->category->name : 'Uncategorized'}}</td>
                    <td>{{$post->title}}</td>
                    <td>{{Str::limit($post->body,40)}}</td>
                    <td><a class="btn btn-default" href="{{route('home.post', $post->id)}}">View Post</a></td>
                    <td><a class="btn btn-default" href="{{route('comments.show', $post->id)}}">View Comments</a></td>
                    <td>{{$post->created_at->diffForHumans()}}</td>
                    <td>{{$post->updated_at->diffForHumans()}}</td>
                </tr>
            @endforeach
        @endif
        </tbody>
    </table>

@endsection