@extends('layout.app')

@section('content')
    <h1>{{ $post->title }}</h1>

    <div>
        {!! $post->body !!}
    </div>

    <hr>

    <small>Written on {{ $post->created_at->format('M d, Y') }}</small>

    @auth
        @if(auth()->user()->id === $post->user_id)
            <div class="d-flex gap-2 mt-3">
                <a href="{{ url()->previous() }}" class="btn btn-outline-primary">
                    Go Back
                </a>

                {!! Form::open([
                    'route' => ['posts.destroy', $post->id],
                    'method' => 'DELETE'
                ]) !!}
                {{ Form::submit('Delete', [
                    'class' => 'btn btn-danger',
                    'onclick' => 'return confirm("Are you sure?")'
                ]) }}
                <!--
                    {{ Form::submit('Delete', ['class' => 'btn btn-danger']) }}
                {!! Form::close() !!}
                -->
            </div>
        @else
            <a href="{{ url()->previous() }}" class="btn btn-outline-primary mt-3">
                Go Back
            </a>
        @endif
    @endauth
@endsection

