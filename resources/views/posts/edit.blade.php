@extends('layout.app')

@section('content')
<h1>Edit Post</h1>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

{!! Form::model($post, [
    'route' => ['posts.update', $post],
    'method' => 'PUT'
]) !!}

<div class="form-group">
    {{ Form::label('title', 'Title') }}
    {{ Form::text('title', old('title', $post->title), [
        'class' => 'form-control',
        'placeholder' => 'Title'
    ]) }}
</div>

<div class="form-group">
    {{ Form::label('body', 'Body') }}
    {{ Form::textarea('body', old('body', $post->body), [
        'class' => 'form-control',
        'id' => 'body-editor',
        'rows' => 10
    ]) }}
</div>

{{ Form::submit('Update Post', ['class' => 'btn btn-primary']) }}

{!! Form::close() !!}
@endsection

@section('scripts')
<script>
    CKEDITOR.replace('body-editor');
</script>
@endsection
