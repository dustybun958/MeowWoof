{{-- <!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link href="{{ asset('loginForm/css/bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset('loginForm/css/font-awesome.min.css') }}" rel="stylesheet">
<link href="{{ asset('loginForm/css/style.css') }}" rel="stylesheet">
<link rel="icon" href="{{ asset('img/Vector.svg') }}" type="image/x-icon" />
<title>Register</title>
</head>

<body>
  <section class="form-02-main">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="_lk_de">
            <div class="form-03-main">
              <div class="logo">
                <img src="{{ asset('img/user.png') }}">
              </div>
              <form method="POST" action="{{ route('register.submit') }}">
                @csrf
                <div class="form-group">
                  <input type="text" name="name" class="form-control _ge_de_ol" placeholder="Enter Name" aria-required="true" required>
                </div>

                <div class="form-group">
                  <input type="email" name="email" class="form-control _ge_de_ol" type="text" placeholder="Enter Email" aria-required="true" required>
                </div>

                <div class="form-group">
                  <input type="password" name="password" class="form-control _ge_de_ol" type="text" placeholder="Enter Password" aria-required="true" required>
                  <i class="fa fa-eye position-absolute" id="togglePassword" style="cursor: pointer; right: 20px; top: 50%; transform: translateY(-50%);"></i>
                </div>

                <div class="form-group">
                  <input type="password" name="password_confirmation" class="form-control _ge_de_ol" type="text" placeholder="Confirm Password" aria-required="true" required>
                  <i class="fa fa-eye position-absolute" id="toggleConfirmPassword" style="cursor: pointer; right: 20px; top: 50%; transform: translateY(-50%);"></i>
                </div>

                <div class="form-group">
                  <button type="submit" class="_btn_04" id="loginButton">Register</button>
                </div>

                <div class="form-group nm_lk">
                  <p>Or Login With</p>
                </div>

                <div class="form-group pt-0">
                  <div class="_social_04">
                    <ol>
                      <li><i class="fa fa-facebook"></i></li>
                      <li><i class="fa fa-twitter"></i></li>
                      <li>
                        <a href="{{ route('login') }}">
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
  <title>MeowWoof - Register</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
  <link href="{{ asset('loginForm/css/font-awesome.min.css') }}" rel="stylesheet">
  <link href="{{ asset('loginForm/css/style.css') }}" rel="stylesheet">
  <link rel="icon" href="{{ asset('img/Vector.svg') }}" type="image/x-icon" />

  <style>
    .illustration-section {
      background: linear-gradient(135deg, #6366F1 0%, #8B5CF6 100%);
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 2rem;
    }

    .login-section {
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 2rem;
    }

    .login-content {
      max-width: 400px;
      width: 100%;
    }

    .password-toggle {
      position: absolute;
      right: 15px;
      top: 50%;
      transform: translateY(-50%);
      cursor: pointer;
      z-index: 10;
      color: #6366F1;
    }

    .spinner-overlay {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: rgba(255, 255, 255, 0.8);
      display: none;
      justify-content: center;
      align-items: center;
      z-index: 9999;
    }

    .btn-primary {
      background-color: #6366F1;
      border-color: #6366F1;
    }

    .btn-primary:hover {
      background-color: #4F46E5;
      border-color: #4F46E5;
    }

    .form-control:focus {
      border-color: #6366F1;
      box-shadow: 0 0 0 0.25rem rgba(99, 102, 241, 0.25);
    }

    .link-primary {
      color: #6366F1 !important;
    }

    .link-primary:hover {
      color: #4F46E5 !important;
    }

    .social-buttons {
      display: flex;
      justify-content: center;
      gap: 1rem;
    }

    .social-button {
      width: 40px;
      height: 40px;
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      border: 1px solid #E5E7EB;
      color: #6366F1;
      transition: all 0.3s ease;
    }

    .social-button:hover {
      background-color: #6366F1;
      color: white;
      border-color: #6366F1;
    }

    .form-floating>.form-control:focus~label,
    .form-floating>.form-control:not(:placeholder-shown)~label {
      color: #6366F1;
    }

    .pet-image {
      max-width: 80%;
      height: auto;
    }

    @media (max-width: 991.98px) {
      .login-content {
        padding: 1rem;
      }
    }

  </style>
</head>
<body>
  <!-- Loading Spinner -->
  <div class="spinner-overlay" id="loadingSpinner">
    <div class="spinner-border text-primary" role="status">
      <span class="visually-hidden">Loading...</span>
    </div>
  </div>

  <div class="container-fluid min-vh-100">
    <div class="row min-vh-100">
      <!-- Left Section - Illustration -->
      <div class="col-lg-6 d-none d-lg-flex illustration-section" data-aos="fade-right">
        <div class="illustration-content text-center">
          <img src="{{ asset('img/bg-login.png') }}" alt="bg-login" class="img-fluid mb-4 pet-image">
          <h1 class="display-4 text-white mb-3 fw-light">MeowWoof</h1>
          <p class="lead text-white-50">A place where pet stories come alive</p>
          <div class="floating-pets">
            <div class="blob"></div>
          </div>
        </div>
      </div>

      <!-- Right Section - Register Form -->
      <div class="col-lg-6 login-section" data-aos="fade-left">
        <div class="login-content">
          <div class="text-center mb-5">
            <img src="{{ asset('admin/img/kaiadmin/meowwoof.svg') }}">
            <p class="mt-3 text-muted">Join our pet-loving community! 🐾</p>
          </div>

          <!-- Alert for errors -->
          <div id="alertContainer"></div>

          <form method="POST" action="{{ route('register.submit') }}" id="registerForm">
            @csrf
            <div class="form-floating mb-4">
              <input type="text" name="name" class="form-control" id="name" placeholder="Enter Name" required>
              <label for="name">Full Name</label>
            </div>

            <div class="form-floating mb-4">
              <input type="email" name="email" class="form-control" id="email" placeholder="Enter Email" required>
              <label for="email">Email address</label>
            </div>

            <div class="form-floating mb-4 position-relative">
              <input type="password" name="password" class="form-control" id="password" placeholder="Enter Password" required>
              <label for="password">Password</label>
              <i class="fa fa-eye password-toggle" id="togglePassword"></i>
            </div>

            <div class="form-floating mb-4 position-relative">
              <input type="password" name="password_confirmation" class="form-control" id="password_confirmation" placeholder="Confirm Password" required>
              <label for="password_confirmation">Confirm Password</label>
              <i class="fa fa-eye password-toggle" id="toggleConfirmPassword"></i>
            </div>

            <button type="submit" class="btn btn-primary w-100 py-3 mb-4">Create Account</button>

            <p class="text-center text-muted">
              Already have an account? <a href="{{ route('login') }}" class="text-decoration-none link-primary">Sign in</a>
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
    function togglePasswordVisibility(inputId, toggleId) {
      const input = document.getElementById(inputId);
      const toggle = document.getElementById(toggleId);

      toggle.addEventListener('click', function() {
        const type = input.getAttribute('type') === 'password' ? 'text' : 'password';
        input.setAttribute('type', type);
        toggle.classList.toggle('fa-eye');
        toggle.classList.toggle('fa-eye-slash');
      });
    }

    togglePasswordVisibility('password', 'togglePassword');
    togglePasswordVisibility('password_confirmation', 'toggleConfirmPassword');

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
      const form = $('#registerForm');

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

        // Password confirmation check
        const password = $('#password').val();
        const confirmPassword = $('#password_confirmation').val();

        if (password !== confirmPassword) {
          showAlert('Passwords do not match');
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
              showAlert('Registration successful! Redirecting...', 'success');
              setTimeout(() => {
                window.location.href = response.redirect_url;
              }, 1500);
            } else {
              toggleLoading(false);
              showAlert(response.message || 'Registration failed. Please try again.');
            }
          }
          , error: function(xhr, status, error) {
            toggleLoading(false);
            let errorMessage = 'An error occurred. Please try again later.';

            if (xhr.responseJSON && xhr.responseJSON.message) {
              errorMessage = xhr.responseJSON.message;
            }

            showAlert(errorMessage);
            console.error('Registration error:', error);
          }
        });
      });
    });

  </script>

  @include('components.admin-footer')
</body>
</html>
