<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Blog</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            background: #f8f9fa;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .auth-container {
            background: white;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            max-width: 450px;
            width: 100%;
        }

        .auth-header {
            background: #2c3e50;
            color: white;
            padding: 30px;
            text-align: center;
            border-radius: 8px 8px 0 0;
        }

        .auth-header h2 {
            margin: 0;
            font-weight: 600;
            font-size: 24px;
        }

        .auth-header p {
            margin: 8px 0 0 0;
            opacity: 0.9;
            font-size: 14px;
        }

        .auth-body {
            padding: 30px;
        }

        .form-label {
            font-weight: 500;
            color: #2c3e50;
            margin-bottom: 6px;
            font-size: 14px;
        }

        .form-control {
            border: 1px solid #dee2e6;
            border-radius: 4px;
            padding: 10px 12px;
            font-size: 14px;
        }

        .form-control:focus {
            border-color: #2c3e50;
            box-shadow: 0 0 0 0.2rem rgba(44, 62, 80, 0.25);
        }

        .btn-register {
            background: #2c3e50;
            border: none;
            border-radius: 4px;
            padding: 10px;
            font-weight: 500;
            color: white;
            width: 100%;
            font-size: 14px;
        }

        .btn-register:hover {
            background: #1a252f;
        }

        .btn-link {
            color: #2c3e50;
            text-decoration: none;
            font-weight: 500;
            font-size: 14px;
        }

        .btn-link:hover {
            text-decoration: underline;
        }

        .alert {
            border-radius: 4px;
            font-size: 14px;
        }

        .password-requirements {
            font-size: 12px;
            color: #6c757d;
            margin-top: 5px;
        }
    </style>
</head>
<body>
    <div class="auth-container">
        <div class="auth-header">
            <h2><i class="fas fa-user-plus"></i> Create Account</h2>
            <p>Sign up for free</p>
        </div>

        <div class="auth-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div class="mb-3">
                    <label for="name" class="form-label">Full Name</label>
                    <div class="input-group">
                        <span class="input-group-text bg-light border-end-0">
                            <i class="fas fa-user text-muted"></i>
                        </span>
                        <input 
                            type="text" 
                            class="form-control border-start-0 @error('name') is-invalid @enderror" 
                            id="name" 
                            name="name" 
                            value="{{ old('name') }}" 
                            required 
                            autofocus
                            placeholder="John Doe"
                        >
                    </div>
                    @error('name')
                        <div class="text-danger small">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email Address</label>
                    <div class="input-group">
                        <span class="input-group-text bg-light border-end-0">
                            <i class="fas fa-envelope text-muted"></i>
                        </span>
                        <input 
                            type="email" 
                            class="form-control border-start-0 @error('email') is-invalid @enderror" 
                            id="email" 
                            name="email" 
                            value="{{ old('email') }}" 
                            required
                            placeholder="you@example.com"
                        >
                    </div>
                    @error('email')
                        <div class="text-danger small">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <div class="input-group">
                        <span class="input-group-text bg-light border-end-0">
                            <i class="fas fa-lock text-muted"></i>
                        </span>
                        <input 
                            type="password" 
                            class="form-control border-start-0 @error('password') is-invalid @enderror" 
                            id="password" 
                            name="password" 
                            required
                            placeholder="Enter your password"
                        >
                    </div>
                    <div class="password-requirements">
                        Password must be at least 8 characters
                    </div>
                    @error('password')
                        <div class="text-danger small">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="password_confirmation" class="form-label">Confirm Password</label>
                    <div class="input-group">
                        <span class="input-group-text bg-light border-end-0">
                            <i class="fas fa-lock text-muted"></i>
                        </span>
                        <input 
                            type="password" 
                            class="form-control border-start-0" 
                            id="password_confirmation" 
                            name="password_confirmation" 
                            required
                            placeholder="Confirm your password"
                        >
                    </div>
                </div>

                <button type="submit" class="btn btn-register mb-3">
                    <i class="fas fa-user-plus"></i> Create Account
                </button>

                <div class="text-center">
                    <p class="mb-0">
                        Already have an account? 
                        <a href="{{ route('login') }}" class="btn-link">Login here</a>
                    </p>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
