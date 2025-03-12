<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>MeowWoof - Reset Password</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link href="{{ asset('loginForm/css/style.css') }}" rel="stylesheet">
    <link rel="icon" href="{{ asset('img/Vector.svg') }}" type="image/x-icon" />
</head>
<body>
    <div class="container-fluid min-vh-100">
        <div class="row min-vh-100">
            <div class="col-lg-6 d-none d-lg-flex illustration-section" data-aos="fade-right">
                <div class="illustration-content text-center">
                    <img src="{{ asset('img/bg-login.png') }}" alt="bg-login" class="img-fluid mb-4 pet-image">
                    <h1 class="display-4 text-white mb-3 fw-light">MeowWoof</h1>
                    <p class="lead text-white-50">A place where you can share your stories</p>
                </div>
            </div>

            <div class="col-lg-6 login-section" data-aos="fade-left">
                <div class="login-content">
                    <div class="text-center mb-5">
                        <img src="{{ asset('admin/img/kaiadmin/meowwoof.svg') }}">
                        <p class="mt-3 text-muted">Reset your password</p>
                    </div>

                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf
                        <div class="form-floating mb-4">
                            <input type="email" name="email" class="form-control" id="email" placeholder="Enter Email" required value="{{ old('email') }}">
                            <label for="email">Email address</label>
                        </div>

                        <div class="form-floating mb-4">
                            <input type="password" name="password" class="form-control" id="password" placeholder="Enter New Password" required>
                            <label for="password">New Password</label>
                        </div>

                        <div class="form-floating mb-4">
                            <input type="password" name="password_confirmation" class="form-control" id="password_confirmation" placeholder="Confirm New Password" required>
                            <label for="password_confirmation">Confirm New Password</label>
                        </div>

                        <button type="submit" class="btn btn-primary w-100 py-3 mb-4">Reset Password</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 800
            , once: true
            , easing: 'ease-out-cubic'
        });

    </script>
</body>
</html>
