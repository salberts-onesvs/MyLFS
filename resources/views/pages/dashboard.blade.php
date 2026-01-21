@extends('layout.app')

@section('content')
<div class="container mt-5">
    <div class="p-5 bg-light rounded-3">
        <h1 class="mb-3">Welcome to Your Dashboard 👋</h1>

        <p class="lead">
            You’re all set! From here you can manage your posts,
            view usage, and access real-time features.
        </p>

        <div class="mt-4">
            <a href="/posts/create" class="btn btn-primary mb-3">
                Create New Post
            </a>

            @if($posts->count() > 0)
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th class="text-end">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($posts as $post)
                            <tr>
                                <td>{{ $post->title }}</td>
                                <td class="text-end">
                                    <a href="/posts/{{ $post->id }}/edit"
                                       class="btn btn-sm btn-primary">
                                        Edit
                                    </a>
                                    <a href="/posts/{{ $post->id }}/"
                                        class="btn btn-sm btn-secondary">
                                        Delete
                                    </a>
                                    
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <p class="text-muted">You haven’t created any posts yet.</p>
            @endif
        </div>
    </div>
</div>
@endsection
