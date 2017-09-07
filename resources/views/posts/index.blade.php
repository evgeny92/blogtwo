@extends('layouts.main')

@section('title', '| All Posts')

@section('content')

    <div class="row">
        <div class="col-md-10">
            <h1>All Posts</h1>
        </div>
        <div class="col-md-2">
            <a href="{{ route('posts.create') }}" class="btn btn-lg btn-block btn-primary btn-h1-spacing">Create New Post</a>
        </div>
        <hr>
    </div> <!-- End of .row -->

    <div class="row">
        <div class="col-md-12">
            <table class="table">
                <thead>
                    <th>#</th>
                    <th>Title</th>
                    <th>Body</th>
                    <th>Slug</th>
                    <th>Created At</th>
                    <th></th>
                </thead>

                @foreach($posts as $post)
                    <tr>
                        <th>{{ $post->id }}</th>
                        <td>{{ str_limit($post->title, 30) }}</td>
                        <td>{{ str_limit(strip_tags($post->body), 50) }}</td>
                        <td>{{ $post->slug }}</td>
                        <td>{{ $post->created_at->format('d.m.y H:i') }}</td>
                        <td>
                            <a href="{{ route('posts.show', $post->id) }}" class="btn btn-success btn-sm">View</a>
                            <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        </td>
                    </tr>
                @endforeach
            </table>

            <div class="text-center">
                {!! $posts->links() !!}
            </div>

        </div>
    </div>

@endsection