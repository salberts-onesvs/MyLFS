@extends('layout.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">

            <div class="card shadow-sm">
                <div class="card-body p-4">

                    <h2 class="text-center mb-2">Create Your Account</h2>

                    <p class="text-center text-muted mb-4">
                        Get access to real-time APIs and developer tools.
                    </p>

                    <form>
                        <div class="mb-3">
                            <label class="form-label">Name</label>
                            <input type="text" class="form-control" placeholder="Jane Doe">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" class="form-control" placeholder="you@example.com">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <input
                                type="password"
                                id="password"
                                class="form-control"
                                placeholder="Minimum 8 characters"
                                onkeyup="checkStrength()"
                            >
                            <small id="passwordHelp" class="form-text"></small>
                        </div>


                        <div class="mb-3">
                            <label class="form-label">Confirm Password</label>
                            <input type="password" class="form-control">
                        </div>

                        <button class="btn btn-primary w-100 mt-2">
                            Create Account
                        </button>
                    </form>

                    <p class="text-center text-muted mt-3 mb-0">
                        Already have an account?
                        <a href="/login">Login</a>
                    </p>

                </div>
            </div>

        </div>
    </div>
</div>
@endsection
