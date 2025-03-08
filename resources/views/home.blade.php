<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>MeowWoof - Platform Kontribusi Anak</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800&display=swap" rel="stylesheet">
  <link rel="icon" href="{{ asset('img/Vector.svg') }}" type="image/x-icon" />
  <style>
    /* Global Styles */
    :root {
      --primary-color: #ff6b6b;
      --secondary-color: #4ecdc4;
      --accent-color: #ffe66d;
      --dark-color: #2d3436;
      --light-color: #f9f9f9;
      --font-primary: 'Nunito', sans-serif;
    }

    body {
      font-family: var(--font-primary);
      color: var(--dark-color);
      overflow-x: hidden;
    }

    h1,
    h2,
    h3,
    h4,
    h5,
    h6 {
      font-weight: 700;
    }

    section {
      padding: 80px 0;
    }

    .section-header {
      margin-bottom: 50px;
    }

    .section-header h2 {
      font-size: 2.5rem;
      font-weight: 800;
      color: var(--dark-color);
      margin-bottom: 15px;
      position: relative;
      display: inline-block;
    }

    .section-header h2:after {
      content: '';
      position: absolute;
      width: 50px;
      height: 4px;
      background-color: var(--primary-color);
      bottom: -10px;
      left: 50%;
      transform: translateX(-50%);
      border-radius: 2px;
    }

    .section-header p {
      font-size: 1.1rem;
      color: #666;
    }

    .btn-primary {
      background-color: var(--primary-color);
      border-color: var(--primary-color);
    }

    .btn-primary:hover,
    .btn-primary:focus {
      background-color: #ff5252;
      border-color: #ff5252;
    }

    .btn-outline-primary {
      color: var(--primary-color);
      border-color: var(--primary-color);
    }

    .btn-outline-primary:hover,
    .btn-outline-primary:focus {
      background-color: var(--primary-color);
      border-color: var(--primary-color);
    }

    /* Navbar */
    .navbar {
      padding: 15px 0;
      background-color: rgba(255, 255, 255, 0.95);
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
      transition: all 0.3s ease;
    }

    .navbar-brand {
      font-weight: 800;
      font-size: 1.8rem;
      color: var(--primary-color);
    }

    .logo-text {
      background: linear-gradient(45deg, var(--primary-color), var(--secondary-color));
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
    }

    .navbar-nav .nav-link {
      font-weight: 600;
      color: var(--dark-color);
      padding: 10px 15px;
      transition: all 0.3s ease;
    }

    .navbar-nav .nav-link:hover,
    .navbar-nav .nav-link.active {
      color: var(--primary-color);
    }

    .login-btn,
    .register-btn {
      font-weight: 600;
      padding: 8px 20px;
      border-radius: 50px;
    }

    /* Hero Section - Enhanced */
    .hero-section {
      padding: 180px 0 100px;
      background: linear-gradient(135deg, #f9f9f9 0%, #f0f0f0 100%);
      position: relative;
      overflow: hidden;
    }

    .hero-particles {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-image: radial-gradient(rgba(255, 107, 107, 0.1) 2px, transparent 2px),
        radial-gradient(rgba(78, 205, 196, 0.1) 2px, transparent 2px);
      background-size: 40px 40px, 30px 30px;
      background-position: 0 0, 20px 20px;
      animation: particleAnimation 20s linear infinite;
    }

    @keyframes particleAnimation {
      0% {
        background-position: 0 0, 20px 20px;
      }

      100% {
        background-position: 40px 40px, 60px 60px;
      }
    }

    .hero-content {
      position: relative;
      z-index: 2;
    }

    .hero-badge {
      display: inline-block;
      background: rgba(255, 107, 107, 0.1);
      color: var(--primary-color);
      font-weight: 700;
      font-size: 0.9rem;
      padding: 8px 16px;
      border-radius: 50px;
      margin-bottom: 20px;
      border: 1px solid rgba(255, 107, 107, 0.3);
    }

    .hero-title {
      font-size: 3.5rem;
      font-weight: 800;
      margin-bottom: 20px;
      color: var(--dark-color);
      line-height: 1.2;
    }

    .text-gradient {
      background: linear-gradient(45deg, var(--primary-color), var(--secondary-color));
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      display: inline-block;
    }

    .hero-subtitle {
      font-size: 1.2rem;
      color: #666;
      margin-bottom: 30px;
      line-height: 1.6;
    }

    .hero-buttons {
      margin-bottom: 30px;
    }

    .pulse-btn {
      animation: pulse 2s infinite;
      box-shadow: 0 0 0 0 rgba(255, 107, 107, 0.7);
    }

    @keyframes pulse {
      0% {
        transform: scale(1);
        box-shadow: 0 0 0 0 rgba(255, 107, 107, 0.7);
      }

      70% {
        transform: scale(1.05);
        box-shadow: 0 0 0 10px rgba(255, 107, 107, 0);
      }

      100% {
        transform: scale(1);
        box-shadow: 0 0 0 0 rgba(255, 107, 107, 0);
      }
    }

    .hero-stats {
      display: flex;
      gap: 30px;
      margin-top: 30px;
    }

    .stat-item {
      display: flex;
      flex-direction: column;
    }

    .stat-number {
      font-size: 1.8rem;
      font-weight: 800;
      color: var(--primary-color);
    }

    .stat-label {
      font-size: 0.9rem;
      color: #666;
    }

    .hero-image-container {
      position: relative;
      height: 450px;
    }

    .hero-image {
      position: absolute;
      border-radius: 20px;
      box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
      transition: all 0.5s ease;
    }

    .hero-image img {
      border-radius: 20px;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
    }

    .main-image {
      width: 80%;
      z-index: 3;
      top: 0;
      right: 0;
      animation: float 6s ease-in-out infinite;
    }

    .floating-image-1 {
      width: 40%;
      z-index: 2;
      bottom: 30px;
      left: 0;
      animation: float 8s ease-in-out infinite 1s;
    }

    .floating-image-2 {
      width: 35%;
      z-index: 1;
      top: 50px;
      left: 20px;
      animation: float 7s ease-in-out infinite 0.5s;
    }

    .hero-blob {
      position: absolute;
      width: 300px;
      height: 300px;
      background: linear-gradient(45deg, rgba(255, 107, 107, 0.2), rgba(78, 205, 196, 0.2));
      border-radius: 50%;
      filter: blur(40px);
      z-index: 0;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      animation: blobAnimation 10s ease-in-out infinite alternate;
    }

    @keyframes blobAnimation {
      0% {
        border-radius: 50%;
        transform: translate(-50%, -50%) scale(1);
      }

      50% {
        border-radius: 60% 40% 70% 30% / 40% 50% 60% 50%;
        transform: translate(-50%, -50%) scale(1.1);
      }

      100% {
        border-radius: 40% 60% 30% 70% / 60% 30% 70% 40%;
        transform: translate(-50%, -50%) scale(1);
      }
    }

    @keyframes float {
      0% {
        transform: translateY(0px);
      }

      50% {
        transform: translateY(-20px);
      }

      100% {
        transform: translateY(0px);
      }
    }

    .hero-wave {
      position: absolute;
      bottom: 0;
      left: 0;
      width: 100%;
    }

    /* About Section */
    .about-section {
      background-color: #fff;
    }

    .feature-card {
      text-align: center;
      padding: 40px 20px;
      border-radius: 15px;
      background-color: #fff;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
      transition: all 0.3s ease;
      height: 100%;
    }

    .feature-card:hover {
      transform: translateY(-10px);
      box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
    }

    .feature-icon {
      width: 80px;
      height: 80px;
      margin: 0 auto 20px;
      display: flex;
      align-items: center;
      justify-content: center;
      background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
      border-radius: 50%;
      color: #fff;
      font-size: 30px;
    }

    .feature-card h3 {
      font-size: 1.5rem;
      margin-bottom: 15px;
      color: var(--dark-color);
    }

    .feature-card p {
      color: #666;
      font-size: 1rem;
    }

    /* Stories Section */
    .stories-section {
      background-color: #f9f9f9;
    }

    .story-card {
      background-color: #fff;
      border-radius: 15px;
      overflow: hidden;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
      transition: all 0.3s ease;
      height: 100%;
    }

    .story-card:hover {
      transform: translateY(-10px);
      box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
    }

    .story-image {
      height: 200px;
      overflow: hidden;
    }

    .story-image img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      transition: all 0.5s ease;
    }

    .story-card:hover .story-image img {
      transform: scale(1.1);
    }

    .story-content {
      padding: 20px;
    }

    .story-content h3 {
      font-size: 1.3rem;
      margin-bottom: 5px;
      color: var(--dark-color);
    }

    .story-age {
      color: #888;
      font-size: 0.9rem;
      margin-bottom: 15px;
    }

    .story-text {
      color: #666;
      margin-bottom: 15px;
      font-size: 0.95rem;
    }

    .read-more-btn {
      font-size: 0.85rem;
      padding: 5px 15px;
    }

    .load-more-btn {
      padding: 10px 30px;
      border-radius: 50px;
      font-weight: 600;
    }

    /* Gallery Section */
    .gallery-section {
      background-color: #fff;
    }

    .gallery-item {
      margin-bottom: 30px;
      overflow: hidden;
      border-radius: 10px;
      cursor: pointer;
      position: relative;
    }

    .gallery-item img {
      transition: all 0.5s ease;
      border-radius: 10px;
    }

    .gallery-item:hover img {
      transform: scale(1.05);
    }

    /* CTA Section */
    .cta-section {
      background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
      color: #fff;
      padding: 60px 0;
    }

    .cta-section h2 {
      font-size: 2.2rem;
      font-weight: 800;
      margin-bottom: 15px;
    }

    .cta-section p {
      font-size: 1.1rem;
      opacity: 0.9;
    }

    /* Contact Section */
    .contact-section {
      background-color: #f9f9f9;
    }

    .contact-info {
      padding-right: 30px;
    }

    .contact-item {
      display: flex;
      align-items: flex-start;
      margin-bottom: 30px;
    }

    .contact-item i {
      font-size: 24px;
      color: var(--primary-color);
      margin-right: 20px;
      margin-top: 5px;
    }

    .contact-item h3 {
      font-size: 1.2rem;
      margin-bottom: 5px;
      color: var(--dark-color);
    }

    .contact-item p {
      color: #666;
    }

    .social-media {
      margin-top: 30px;
    }

    .social-icon {
      display: inline-flex;
      align-items: center;
      justify-content: center;
      width: 40px;
      height: 40px;
      background-color: #fff;
      color: var(--primary-color);
      border-radius: 50%;
      margin-right: 10px;
      box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
      transition: all 0.3s ease;
    }

    .social-icon:hover {
      background-color: var(--primary-color);
      color: #fff;
      transform: translateY(-3px);
    }

    .contact-form .form-control {
      padding: 12px 15px;
      border-radius: 8px;
      border: 1px solid #ddd;
      margin-bottom: 15px;
    }

    .contact-form .form-control:focus {
      box-shadow: 0 0 0 3px rgba(255, 107, 107, 0.2);
      border-color: var(--primary-color);
    }

    .contact-form textarea.form-control {
      min-height: 150px;
    }

    .contact-form button {
      padding: 12px;
      font-weight: 600;
      border-radius: 8px;
    }

    /* Footer */
    .footer {
      background-color: #2d3436;
      color: #fff;
      padding: 80px 0 20px;
    }

    .footer-logo {
      font-size: 2rem;
      font-weight: 800;
      margin-bottom: 20px;
      color: #fff;
    }

    .footer p {
      color: rgba(255, 255, 255, 0.7);
      margin-bottom: 20px;
    }

    .footer-social a {
      color: #fff;
      margin-right: 15px;
      font-size: 18px;
      transition: all 0.3s ease;
    }

    .footer-social a:hover {
      color: var(--primary-color);
    }

    .footer h5 {
      font-size: 1.2rem;
      margin-bottom: 20px;
      color: #fff;
    }

    .footer-links {
      list-style: none;
      padding: 0;
      margin: 0;
    }

    .footer-links li {
      margin-bottom: 10px;
    }

    .footer-links a {
      color: rgba(255, 255, 255, 0.7);
      text-decoration: none;
      transition: all 0.3s ease;
    }

    .footer-links a:hover {
      color: var(--primary-color);
      padding-left: 5px;
    }

    .subscription-form {
      display: flex;
      margin-top: 15px;
    }

    .subscription-form .form-control {
      border-radius: 50px 0 0 50px;
      border: none;
      padding: 12px 20px;
    }

    .subscription-form .btn {
      border-radius: 0 50px 50px 0;
      padding: 12px 20px;
    }

    .footer-bottom {
      text-align: center;
      padding-top: 30px;
      margin-top: 50px;
      border-top: 1px solid rgba(255, 255, 255, 0.1);
    }

    .footer-bottom p {
      margin-bottom: 0;
    }

    /* Modal Styles */
    .modal-content {
      border-radius: 15px;
      border: none;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
    }

    .modal-header {
      border-bottom: none;
      padding-bottom: 0;
    }

    .modal-body {
      padding: 30px;
    }

    .modal-title {
      font-weight: 700;
      color: var(--dark-color);
    }

    .form-label {
      font-weight: 600;
      color: var(--dark-color);
    }

    .form-control {
      padding: 12px 15px;
      border-radius: 8px;
      border: 1px solid #ddd;
    }

    .form-control:focus {
      box-shadow: 0 0 0 3px rgba(255, 107, 107, 0.2);
      border-color: var(--primary-color);
    }

    /* Story Modal */
    .story-modal-content {
      padding: 20px;
    }

    .story-modal-content img {
      width: 100%;
      max-height: 300px;
      object-fit: cover;
      border-radius: 10px;
      margin-bottom: 20px;
    }

    .story-modal-content h3 {
      .story-modal-content h3 {
        font-size: 1.8rem;
        margin-bottom: 10px;
      }

      .story-modal-content .story-age {
        font-size: 1rem;
        margin-bottom: 20px;
      }

      .story-modal-content p {
        font-size: 1.1rem;
        line-height: 1.8;
      }

      /* Responsive Styles */
      @media (max-width: 991px) {
        .hero-section {
          padding: 150px 0 80px;
        }

        .hero-title {
          font-size: 2.8rem;
        }

        .hero-image-container {
          height: 400px;
          margin-top: 40px;
        }

        .contact-info {
          padding-right: 0;
          margin-bottom: 40px;
        }

        .hero-stats {
          gap: 20px;
        }
      }

      @media (max-width: 767px) {
        section {
          padding: 60px 0;
        }

        .section-header h2 {
          font-size: 2rem;
        }

        .hero-section {
          padding: 120px 0 60px;
        }

        .hero-title {
          font-size: 2.2rem;
        }

        .hero-image-container {
          height: 350px;
        }

        .feature-card,
        .story-card {
          margin-bottom: 30px;
        }

        .cta-section h2 {
          font-size: 1.8rem;
        }

        .cta-section .btn {
          margin-top: 20px;
        }

        .hero-stats {
          flex-wrap: wrap;
          gap: 15px;
        }

        .stat-number {
          font-size: 1.5rem;
        }
      }

      /* Animations */
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

      .fadeIn {
        animation: fadeIn 1s ease forwards;
      }

      .delay-1 {
        animation-delay: 0.2s;
      }

      .delay-2 {
        animation-delay: 0.4s;
      }

      .delay-3 {
        animation-delay: 0.6s;
      }

  </style>
</head>
<body>
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-light fixed-top">
    <div class="container">
      <a class="navbar-brand" href="#">
        <span class="logo-text">MeowWoof</span>
        <i class="fas fa-paw ms-2"></i>
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a class="nav-link active" href="#beranda">Beranda</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#tentang">Tentang Kami</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#cerita">Cerita Kontributor</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#galeri">Galeri</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#kontak">Kontak</a>
          </li>
          @if(Route::has('login'))
          @auth
          <a href="{{ url('/dashboard') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dashboard</a>
          @else
          <li class="nav-item ms-lg-3">
            <a href="{{route('login')}}"><button class="btn btn-outline-primary login-btn" data-bs-toggle="modal" data-bs-target="#loginModal">Masuk</button></a>
          </li>
          @if(Route::has('register'))
          <li class="nav-item ms-2">
            <a href="{{route('register')}}"><button class="btn btn-primary register-btn" data-bs-toggle="modal" data-bs-target="#registerModal">Daftar</button></a>
          </li>
          @endif
          @endauth
          @endif
        </ul>
      </div>
    </div>
  </nav>


  <!-- Hero Section -->
  <section id="beranda" class="hero-section">
    <div class="hero-particles"></div>
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-6">
          <div class="hero-content">
            <div class="hero-badge">
              <span>Platform Kreativitas Anak #1 di Indonesia</span>
            </div>
            <h1 class="hero-title">Bersama Anak-Anak, <span class="text-gradient">Ciptakan Dunia</span> yang Lebih Baik</h1>
            <p class="hero-subtitle">Platform untuk anak-anak berbagi cerita, pengalaman, dan kreativitas mereka dengan dunia. Bergabunglah dengan ribuan anak berbakat lainnya!</p>
            <div class="hero-buttons">
              <button class="btn btn-primary btn-lg me-3 pulse-btn" data-bs-toggle="modal" data-bs-target="#registerModal">Mulai Sekarang</button>
              <button class="btn btn-outline-primary btn-lg" id="learnMoreBtn">Pelajari Lebih Lanjut</button>
            </div>
            <div class="hero-stats">
              <div class="stat-item">
                <span class="stat-number">10K+</span>
                <span class="stat-label">Kontributor</span>
              </div>
              <div class="stat-item">
                <span class="stat-number">25K+</span>
                <span class="stat-label">Karya</span>
              </div>
              <div class="stat-item">
                <span class="stat-number">100+</span>
                <span class="stat-label">Sekolah</span>
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-6">
          <div class="hero-image-container">
            <div class="hero-image main-image">
              <img src="https://images.unsplash.com/photo-1560969184-10fe8719e047?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80" alt="Anak-anak bahagia" class="img-fluid rounded-4 shadow-lg">
            </div>
            <div class="hero-image floating-image-1">
              <img src="https://images.unsplash.com/photo-1475275166152-f1e8005f9854?q=80&w=2072&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="Anak bermain musik" class="img-fluid rounded-4 shadow-lg">

            </div>
            <div class="hero-image floating-image-2">
              <img src="https://images.unsplash.com/photo-1585435656462-8abb322cbb68?q=80&w=2071&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="Anak laki-laki melukis" class="img-fluid rounded-4 shadow-lg">

            </div>
            <div class="hero-blob"></div>
          </div>
        </div>
      </div>
    </div>
    <div class="hero-wave">
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
        <path fill="#ffffff" fill-opacity="1" d="M0,96L48,112C96,128,192,160,288,160C384,160,480,128,576,122.7C672,117,768,139,864,149.3C960,160,1056,160,1152,138.7C1248,117,1344,75,1392,53.3L1440,32L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path>
      </svg>
    </div>
  </section>

  <!-- About Section -->
  <section id="tentang" class="about-section">
    <div class="container">
      <div class="section-header text-center">
        <h2>Tentang MeowWoof</h2>
        <p>Platform yang menginspirasi anak-anak untuk berbagi dan berkontribusi</p>
      </div>
      <div class="row mt-5">
        <div class="col-md-4">
          <div class="feature-card">
            <div class="feature-icon">
              <i class="fas fa-heart"></i>
            </div>
            <h3>Inspirasi</h3>
            <p>Menginspirasi anak-anak untuk mengekspresikan kreativitas mereka melalui cerita dan seni.</p>
          </div>
        </div>
        <div class="col-md-4">
          <div class="feature-card">
            <div class="feature-icon">
              <i class="fas fa-users"></i>
            </div>
            <h3>Komunitas</h3>
            <p>Membangun komunitas yang aman dan mendukung untuk anak-anak berbagi pengalaman mereka.</p>
          </div>
        </div>
        <div class="col-md-4">
          <div class="feature-card">
            <div class="feature-icon">
              <i class="fas fa-lightbulb"></i>
            </div>
            <h3>Kreativitas</h3>
            <p>Mendorong kreativitas dan imajinasi anak-anak melalui berbagai aktivitas interaktif.</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Stories Section -->
  <section id="cerita" class="stories-section">
    <div class="container">
      <div class="section-header text-center">
        <h2>Cerita Kontributor Kami</h2>
        <p>Kisah inspiratif dari anak-anak yang telah berkontribusi</p>
      </div>
      <div class="row mt-5">
        <div class="col-lg-4 mb-4">
          <div class="story-card">
            <div class="story-image">
              <img src="https://images.unsplash.com/photo-1545558014-8692077e9b5c?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" alt="Anak perempuan menulis" class="img-fluid">
            </div>
            <div class="story-content">
              <h3>Siti Nurhaliza</h3>
              <p class="story-age">10 Tahun, Jakarta</p>
              <p class="story-text">"Saya senang bisa berbagi cerita tentang petualangan saya dengan kucing peliharaan. MeowWoof membuat saya percaya diri untuk menulis!"</p>
              <button class="btn btn-sm btn-outline-primary read-more-btn">Baca Selengkapnya</button>
            </div>
          </div>
        </div>
        <div class="col-lg-4 mb-4">
          <div class="story-card">
            <div class="story-image">
              <img src="https://images.unsplash.com/photo-1522505449726-e148c41c2a8d?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D8" alt="Anak laki-laki melukis" class="img-fluid">
            </div>
            <div class="story-content">
              <h3>Budi Santoso</h3>
              <p class="story-age">8 Tahun, Surabaya</p>
              <p class="story-text">"Saya suka menggambar anjing dan kucing. Di MeowWoof, banyak teman yang memberikan komentar positif pada gambar saya!"</p>
              <button class="btn btn-sm btn-outline-primary read-more-btn">Baca Selengkapnya</button>
            </div>
          </div>
        </div>
        <div class="col-lg-4 mb-4">
          <div class="story-card">
            <div class="story-image">
              <img src="https://images.unsplash.com/photo-1475275166152-f1e8005f9854?q=80&w=2072&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="Anak bermain musik" class="img-fluid">

            </div>
            <div class="story-content">
              <h3>Anisa Rahma</h3>
              <p class="story-age">12 Tahun, Bandung</p>
              <p class="story-text">"MeowWoof membantu saya membagikan lagu yang saya ciptakan tentang hewan peliharaan. Sekarang saya punya banyak penggemar!"</p>
              <button class="btn btn-sm btn-outline-primary read-more-btn">Baca Selengkapnya</button>
            </div>
          </div>
        </div>
      </div>
      <div class="text-center mt-4">
        <button class="btn btn-primary load-more-btn">Lihat Lebih Banyak Cerita</button>
      </div>
    </div>
  </section>

  <!-- Gallery Section -->
  <section id="galeri" class="gallery-section">
    <div class="container">
      <div class="section-header text-center">
        <h2>Galeri Kreativitas</h2>
        <p>Karya-karya menakjubkan dari kontributor muda kami</p>
      </div>
      <div class="row mt-5 gallery-container">
        <div class="col-md-4 col-6 gallery-item">
          <img src="https://images.unsplash.com/photo-1519340241574-2cec6aef0c01?ixlib=rb-1.2.1&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D8" alt="Karya anak" class="img-fluid">

        </div>
        <div class="col-md-4 col-6 gallery-item">
          <img src="https://images.unsplash.com/photo-1522505449726-e148c41c2a8d?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D8" alt="Karya anak" class="img-fluid">
        </div>
        <div class="col-md-4 col-6 gallery-item">
          <img src="https://images.unsplash.com/photo-1517971053567-8bde93bc6a58?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" alt="Karya anak" class="img-fluid">
        </div>
        <div class="col-md-4 col-6 gallery-item">
          <img src="https://images.unsplash.com/photo-1518214598173-1666bc921d66?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" alt="Karya anak" class="img-fluid">
        </div>
        <div class="col-md-4 col-6 gallery-item">
          <img src="https://images.unsplash.com/photo-1511551203524-9a24350a5771?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" alt="Karya anak" class="img-fluid">
        </div>
        <div class="col-md-4 col-6 gallery-item">
          <img src="https://images.unsplash.com/photo-1510337550647-e84f83e341ca?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" alt="Karya anak" class="img-fluid">
        </div>
      </div>
    </div>
  </section>

  <!-- CTA Section -->
  <section class="cta-section">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-8">
          <h2>Bergabunglah dengan Komunitas MeowWoof Hari Ini!</h2>
          <p>Biarkan anak-anak mengekspresikan kreativitas mereka dan berbagi dengan dunia.</p>
        </div>
        <div class="col-lg-4 text-lg-end">
          <a href="{{route('login')}}"> <button class="btn btn-light btn-lg" data-bs-toggle="modal" data-bs-target="#registerModal">Daftar Sekarang</button></a>
        </div>
      </div>
    </div>
  </section>

  <!-- Contact Section -->
  <section id="kontak" class="contact-section">
    <div class="container">
      <div class="section-header text-center">
        <h2>Hubungi Kami</h2>
        <p>Ada pertanyaan? Jangan ragu untuk menghubungi kami</p>
      </div>
      <div class="row mt-5">
        <div class="col-lg-6">
          <div class="contact-info">
            <div class="contact-item">
              <i class="fas fa-map-marker-alt"></i>
              <div>
                <h3>Alamat</h3>
                <p>Jl. Hewan Peliharaan No. 123, Jakarta Selatan, Indonesia</p>
              </div>
            </div>
            <div class="contact-item">
              <i class="fas fa-phone"></i>
              <div>
                <h3>Telepon</h3>
                <p>+62 812 3456 7890</p>
              </div>
            </div>
            <div class="contact-item">
              <i class="fas fa-envelope"></i>
              <div>
                <h3>Email</h3>
                <p>info@meowwoof.id</p>
              </div>
            </div>
            <div class="social-media">
              <a href="#" class="social-icon"><i class="fab fa-facebook-f"></i></a>
              <a href="#" class="social-icon"><i class="fab fa-twitter"></i></a>
              <a href="#" class="social-icon"><i class="fab fa-instagram"></i></a>
              <a href="#" class="social-icon"><i class="fab fa-youtube"></i></a>
            </div>
          </div>
        </div>
        <div class="col-lg-6">
          <form class="contact-form">
            <div class="mb-3">
              <input type="text" class="form-control" placeholder="Nama Lengkap" required>
            </div>
            <div class="mb-3">
              <input type="email" class="form-control" placeholder="Alamat Email" required>
            </div>
            <div class="mb-3">
              <input type="text" class="form-control" placeholder="Subjek" required>
            </div>
            <div class="mb-3">
              <textarea class="form-control" rows="5" placeholder="Pesan" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary w-100">Kirim Pesan</button>
          </form>
        </div>
      </div>
    </div>
  </section>

  <!-- Footer -->
  <footer class="footer">
    <div class="container">
      <div class="row">
        <div class="col-lg-4 mb-4 mb-lg-0">
          <h3 class="footer-logo">MeowWoof</h3>
          <p>Platform untuk anak-anak berbagi cerita, pengalaman, dan kreativitas mereka dengan dunia.</p>
          <div class="footer-social">
            <a href="#"><i class="fab fa-facebook-f"></i></a>
            <a href="#"><i class="fab fa-twitter"></i></a>
            <a href="#"><i class="fab fa-instagram"></i></a>
            <a href="#"><i class="fab fa-youtube"></i></a>
          </div>
        </div>
        <div class="col-lg-2 col-md-4 mb-4 mb-md-0">
          <h5>Tautan</h5>
          <ul class="footer-links">
            <li><a href="#beranda">Beranda</a></li>
            <li><a href="#tentang">Tentang Kami</a></li>
            <li><a href="#cerita">Cerita</a></li>
            <li><a href="#galeri">Galeri</a></li>
            <li><a href="#kontak">Kontak</a></li>
          </ul>
        </div>
        <div class="col-lg-2 col-md-4 mb-4 mb-md-0">
          <h5>Dukungan</h5>
          <ul class="footer-links">
            <li><a href="#">FAQ</a></li>
            <li><a href="#">Bantuan</a></li>
            <li><a href="#">Kebijakan Privasi</a></li>
            <li><a href="#">Syarat & Ketentuan</a></li>
          </ul>
        </div>
        <div class="col-lg-4 col-md-4">
          <h5>Berlangganan</h5>
          <p>Dapatkan pembaruan terbaru dari kami</p>
          <div class="subscription-form">
            <input type="email" class="form-control" placeholder="Alamat Email">
            <button type="submit" class="btn btn-primary">Langganan</button>
          </div>
        </div>
      </div>
      <div class="footer-bottom">
        <p>&copy; 2025 MeowWoof. Hak Cipta Dilindungi.</p>
      </div>
    </div>
  </footer>

  <!-- Story Modal -->
  <div class="modal fade" id="storyModal" tabindex="-1" aria-labelledby="storyModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="storyModalLabel">Cerita Lengkap</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="story-modal-content">
            <!-- Content will be dynamically inserted here -->
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap JS Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <!-- jQuery -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <!-- Custom JS -->
  <script src="script.js"></script>
</body>
</html>
