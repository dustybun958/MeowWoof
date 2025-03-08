{{-- <!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link href="{{ asset('loginForm/css/bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset('loginForm/css/font-awesome.min.css') }}" rel="stylesheet">
<link href="{{ asset('loginForm/css/style.css') }}" rel="stylesheet">

<title>Login</title>
</head>

<body>
  <section class="form-02-main">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="_lk_de">
            <div class="form-03-main">
              <div class="logo">
                <img src="{{ asset('admin/img/kaiadmin/meowwoof.svg') }}">
              </div>
              <form method="POST" action="{{ route('login.submit') }}">
                @csrf
                <div class="form-group">
                  <input type="email" name="email" class="form-control _ge_de_ol" type="text" placeholder="Enter Email" aria-required="true" required value="{{ old('email', Cookie::get('email')) }}">
                </div>

                <div class="form-group">
                  <input type="password" name="password" class="form-control _ge_de_ol" type="text" placeholder="Enter Password" aria-required="true" required value="{{ old('password', Cookie::get('password')) }}">
                  <i class="fa fa-eye position-absolute" id="togglePassword" style="cursor: pointer; right: 20px; top: 50%; transform: translateY(-50%);"></i>
                </div>

                <div class="checkbox form-group">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember">
                    <label class="form-check-label" for="remember">
                      Remember me
                    </label>
                  </div>
                  <a href="#">Forgot Password</a>
                </div>

                <div class="form-group">
                  <button type="submit" class="_btn_04" id="loginButton">Login</button>
                </div>

                <div class="form-group nm_lk">
                  <p>Or Register With</p>
                </div>

                <div class="form-group pt-0">
                  <div class="_social_04">
                    <ol>
                      <li><i class="fa fa-facebook"></i></li>
                      <li><i class="fa fa-twitter"></i></li>
                      <li>
                        <a href="{{ route('register') }}">
                          <i class="fa fa-google-plus"></i>
                        </a>
                      </li>
                      <li><i class="fa fa-instagram"></i></li>
                      <li><i class="fa fa-linkedin"></i></li>
                    </ol>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  @include('components.admin-footer')
  <script src="{{ asset('js/togglePassword.js') }}"></script>
</body>

</html> --}}

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>MeowWoof - Login</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
  <link href="{{ asset('loginForm/css/font-awesome.min.css') }}" rel="stylesheet">
  <link href="{{ asset('loginForm/css/style.css') }}" rel="stylesheet">
  <link rel="icon" href="{{ asset('img/Vector.svg') }}" type="image/x-icon" />

  <style>

  </style>
</head>
<body>
  <!-- Loading Spinner -->
  <div class="spinner-overlay" id="loadingSpinner">
    <div class="spinner-border" role="status">
      <span class="visually-hidden">Loading...</span>
    </div>
  </div>

  <div class="container-fluid min-vh-100">
    <div class="row min-vh-100">
      <!-- Left Section - Illustration -->
      <div class="col-lg-6 d-none d-lg-flex illustration-section" data-aos="fade-right">
        <div class="illustration-content text-center">
          {{-- <img src="{{ asset('admin/img/kaiadmin/meowwoof.svg') }}" alt="MeowWoof Logo" class="img-fluid mb-4 pet-image"> --}}
          <img src="{{ asset('img/bg-login.png') }}" alt="bg-login" class="img-fluid mb-4 pet-image">
          <h1 class="display-4 text-white mb-3 fw-light">MeowWoof</h1>
          <p class="lead text-white-50">A place where pet stories come alive</p>
          <div class="floating-pets">
            <div class="blob"></div>
          </div>
        </div>
      </div>

      <!-- Right Section - Login Form -->
      <div class="col-lg-6 login-section" data-aos="fade-left">
        <div class="login-content">
          <div class="text-center mb-5">
            <img src="{{ asset('admin/img/kaiadmin/meowwoof.svg') }}">
            <p class="mt-3 text-muted">Share your best story.. 😊</p>
          </div>

          <!-- Alert for errors -->
          <div id="alertContainer"></div>

          <form method="POST" action="{{ route('login.submit') }}" id="loginForm">
            @csrf
            <div class="form-floating mb-4">
              <input type="email" name="email" class="form-control" id="email" placeholder="Enter Email" required value="{{ old('email', Cookie::get('email')) }}">
              <label for="email">Email address</label>
            </div>

            <div class="form-floating mb-4 position-relative">
              <input type="password" name="password" class="form-control" id="password" placeholder="Enter Password" required value="{{ old('password', Cookie::get('password')) }}">
              <label for="password">Password</label>
              <i class="fa fa-eye password-toggle" id="togglePassword"></i>
            </div>

            <div class="mb-4 d-flex justify-content-between align-items-center">
              <div class="form-check">
                <input type="checkbox" name="remember" class="form-check-input" id="remember" {{ old('remember') ? 'checked' : '' }}>
                <label class="form-check-label text-muted" for="remember">Remember me</label>
              </div>
              <a href="#" class="text-decoration-none link-primary">Forgot password?</a>
            </div>

            <button type="submit" class="btn btn-primary w-100 py-3 mb-4">Sign in</button>

            <p class="text-center text-muted">
              New to MeowWoof? <a href="{{ route('register') }}" class="text-decoration-none link-primary">Create an account</a>
            </p>
          </form>
        </div>
      </div>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <script>
    // Initialize AOS
    AOS.init({
      duration: 800
      , once: true
      , easing: 'ease-out-cubic'
    });

    // Toggle password visibility
    document.getElementById('togglePassword').addEventListener('click', function() {
      const passwordInput = document.getElementById('password');
      const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
      passwordInput.setAttribute('type', type);
      this.classList.toggle('fa-eye');
      this.classList.toggle('fa-eye-slash');
    });

    // Show/hide loading spinner
    function toggleLoading(show) {
      const spinner = document.getElementById('loadingSpinner');
      spinner.style.display = show ? 'flex' : 'none';
    }

    // Show alert message
    function showAlert(message, type = 'danger') {
      const alertContainer = document.getElementById('alertContainer');
      const alertHTML = `
        <div class="alert alert-${type} alert-dismissible fade show" role="alert">
          ${message}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      `;
      alertContainer.innerHTML = alertHTML;
    }

    // Form handling
    $(document).ready(function() {
      const form = $('#loginForm');

      // Input focus effects
      $('.form-control').on('focus blur', function(e) {
        $(this).parents('.form-floating').toggleClass('focused', e.type === 'focus');
      });

      // Form submission
      form.on('submit', function(event) {
        event.preventDefault();

        if (!this.checkValidity()) {
          event.stopPropagation();
          form.addClass('was-validated');
          return;
        }

        toggleLoading(true);

        $.ajax({
          url: $(this).attr('action')
          , type: 'POST'
          , data: new FormData(this)
          , processData: false
          , contentType: false
          , success: function(response) {
            if (response.success) {
              // Redirect to dashboard on success
              window.location.href = response.redirect_url;
            } else {
              toggleLoading(false);
              showAlert(response.message || 'Login failed. Please try again.');
            }
          }
          , error: function(xhr, status, error) {
            toggleLoading(false);
            let errorMessage = 'An error occurred. Please try again later.';

            if (xhr.responseJSON && xhr.responseJSON.message) {
              errorMessage = xhr.responseJSON.message;
            }

            showAlert(errorMessage);
            console.error('Login error:', error);
          }
        });
      });
    });

  </script>

  @include('components.admin-footer')
</body>
</html>
