@extends('layout.app')

@section('content')
    <h1>Latest Posts</h1>

    @if($posts->count() === 0)
        <p>No posts available.</p>
    @endif

    @foreach($posts as $post)
        <div class="card mb-3">
            <div class="card-body">

                {{-- Clickable title --}}
                <h3>
                    <a href="{{ route('posts.show', $post) }}">
                        {{ $post->title }}
                    </a>
                </h3>

                {{-- Author --}}
                <small class="text-muted">
                    By {{ $post->user->name ?? 'Unknown' }} ·
                    {{ $post->created_at->format('M d, Y') }}
                </small>

                {{-- Excerpt --}}
                <p class="mt-2">
                    {{ Str::limit(strip_tags($post->body), 200) }}
                </p>

                {{-- CTA --}}
                <a href="{{ route('posts.show', $post) }}" class="btn btn-sm btn-outline-primary">
                    Read More
                </a>

                {{-- Owner actions --}}
                @can('update', $post)
                    <a href="{{ route('posts.edit', $post) }}" class="btn btn-sm btn-secondary ms-2">
                        Edit
                    </a>
                @endcan

            </div>
        </div>
    @endforeach
    <div>    
    {{ $posts->links() }}
    </div>
    @endsection
    {{-- Pagination --}}
    {{--<div class="mt-4">
        {{ $posts->links() }}
    </div>
@endsection --}}
