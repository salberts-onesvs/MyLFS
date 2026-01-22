@extends('layout.app')

@section('content')
<h1>Create Post</h1>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

{{-- ✅ ONE form, files enabled --}}
{!! Form::open(['route' => 'posts.store', 'files' => true]) !!}

    <div class="form-group">
        {{ Form::label('title', 'Title') }}
        {{ Form::text('title', old('title'), [
            'class' => 'form-control',
            'placeholder' => 'Title'
        ]) }}
    </div>

    <div class="form-group">
        {{ Form::label('body', 'Body') }}
        {{ Form::textarea('body', old('body'), [
            'class' => 'form-control',
            'id' => 'body-editor',
            'rows' => 10
        ]) }}
    </div>

    {{-- ✅ Image upload --}}
    <div class="form-group">
        {{ Form::label('cover_image', 'Cover Image') }}
        {{ Form::file('cover_image', ['class' => 'form-control']) }}
    </div>

    {{ Form::submit('Submit', ['class' => 'btn btn-primary']) }}

{!! Form::close() !!}
@endsection

@section('scripts')
<script>
    CKEDITOR.replace('body-editor');
</script>
@endsection
