<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Blog</title>
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
            max-width: 400px;
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

        .btn-login {
            background: #2c3e50;
            border: none;
            border-radius: 4px;
            padding: 10px;
            font-weight: 500;
            color: white;
            width: 100%;
            font-size: 14px;
        }

        .btn-login:hover {
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

        .form-check-input:checked {
            background-color: #2c3e50;
            border-color: #2c3e50;
        }

        .form-check-label {
            font-size: 14px;
        }
    </style>
</head>
<body>
    <div class="auth-container">
        <div class="auth-header">
            <h2><i class="fas fa-lock"></i> Welcome Back</h2>
            <p>Login to your account</p>
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

            <form method="POST" action="{{ route('login') }}">
                @csrf

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
                            autofocus
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
                    @error('password')
                        <div class="text-danger small">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-4">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="remember" name="remember">
                        <label class="form-check-label" for="remember">
                            Remember me
                        </label>
                    </div>
                </div>

                <button type="submit" class="btn btn-login mb-3">
                    <i class="fas fa-sign-in-alt"></i> Login
                </button>

                <div class="text-center">
                    <p class="mb-0">
                        Don't have an account? 
                        <a href="{{ route('register') }}" class="btn-link">Register here</a>
                    </p>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
