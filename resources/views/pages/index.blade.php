@extends('layout.app')

@section('content')
<div class="container mt-5">
    <div class="p-5 mb-4 bg-light rounded-3 text-center">
        <h1>{{ $title }}</h1>

        <p class="lead">
            Welcome to My Laravel From Scratch API Experiment.
            Build, test, and integrate powerful APIs with real-time features.
        </p>

        <div class="d-flex justify-content-center gap-3 mt-4">
            <a href="/register" class="btn btn-primary btn-lg">
                Get Started
            </a>

            <a href="/login" class="btn btn-outline-secondary btn-lg">
                Login
            </a>
        </div>
    </div>
</div>
@endsection
