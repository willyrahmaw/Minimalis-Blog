<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 - Page Not Found</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #f8f9fa;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .error-container {
            text-align: center;
            max-width: 600px;
            width: 100%;
        }

        .error-code {
            font-size: 120px;
            font-weight: 700;
            color: #2c3e50;
            margin-bottom: 20px;
            line-height: 1;
            letter-spacing: -5px;
        }

        .error-title {
            font-size: 28px;
            font-weight: 600;
            color: #2c3e50;
            margin-bottom: 15px;
        }

        .error-message {
            font-size: 16px;
            color: #6c757d;
            margin-bottom: 40px;
            line-height: 1.6;
        }

        .btn-home {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            background: #2c3e50;
            color: white;
            padding: 12px 30px;
            border-radius: 6px;
            text-decoration: none;
            font-weight: 500;
            font-size: 16px;
            transition: all 0.3s ease;
        }

        .btn-home:hover {
            background: #1a252f;
            color: white;
            transform: translateY(-2px);
        }

        .icon-container {
            margin-bottom: 30px;
        }

        .icon-container i {
            font-size: 64px;
            color: #dee2e6;
            animation: fadeIn 1s ease;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @media (max-width: 768px) {
            .error-code {
                font-size: 80px;
            }

            .error-title {
                font-size: 22px;
            }

            .error-message {
                font-size: 14px;
            }

            .icon-container i {
                font-size: 48px;
            }
        }
    </style>
</head>
<body>
    <div class="error-container">
        <div class="icon-container">
            <i class="fas fa-file-invoice"></i>
        </div>
        <div class="error-code">404</div>
        <h1 class="error-title">Page Not Found</h1>
        <p class="error-message">
            The page you're looking for doesn't exist or has been moved.
        </p>
        <a href="{{ route('blog.index') }}" class="btn-home">
            <i class="fas fa-arrow-left"></i>
            Back to Home
        </a>
    </div>
</body>
</html>
