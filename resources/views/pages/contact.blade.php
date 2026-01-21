@extends('layout.app')

@section('content')
<div class="container mt-5">
    <h1>{{ $title }}</h1>

    <form style="max-width: 600px;">
        <div class="mb-3">
            <label class="form-label">Name</label>
            <input type="text" class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label">Message</label>
            <textarea class="form-control" rows="5"></textarea>
        </div>

        <button class="btn btn-primary">Send Message</button>
    </form>
</div>
@endsection
