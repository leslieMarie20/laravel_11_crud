<!-- resources/views/auth/login.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- Bootstrap 5 CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f0f2f5;
        }
        .login-card {
            max-width: 400px;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0,0,0,0.1);
        }
        .login-header {
            background-color: #1877f2;
            color: white;
            padding: 1rem;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
            text-align: center;
            font-size: 1.5rem;
        }
        .form-label {
            font-weight: 500;
        }
    </style>
</head>
<body>

<div class="d-flex justify-content-center align-items-center" style="min-height: 100vh;">
    <div class="card login-card">
        <div class="login-header">
            Login to Your Account
        </div>
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="form-group mb-3">
                    <label for="email">Email Address</label>
                    <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" required>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" required>
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group form-check mb-3">
                    <input type="checkbox" name="remember" id="remember" class="form-check-input">
                    <label for="remember" class="form-check-label">Remember Me</label>
                </div>
                <button type="submit" class="btn btn-primary">Login</button>
            </form>
        </div>
    </div>
</div>

<!-- Bootstrap JS (optional, if needed) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
