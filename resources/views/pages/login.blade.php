@extends('layout.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">

            <div class="card shadow-sm">
                <div class="card-body p-4">

                    <h2 class="text-center mb-2">Welcome Back</h2>

                    <p class="text-center text-muted mb-4">
                        Log in to access your dashboard and APIs.
                    </p>

                    <form>
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" class="form-control" placeholder="you@example.com">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <input type="password" class="form-control">
                        </div>

                        <a href="/dashboard" class="btn btn-outline-secondary btn-lg">Login</a>
                        
                    </form>

                    <p class="text-center text-muted mt-3 mb-0">
                        Don’t have an account?
                        <a href="/register">Create one</a>
                    </p>

                </div>
            </div>

        </div>
    </div>
</div>
@endsection
