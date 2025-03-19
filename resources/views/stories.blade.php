<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>MeowWoof - Stories Collection</title>
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
      background-color: #f8f9fa;
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
      padding: 60px 0;
    }

    @media (min-width: 768px) {
      section {
        padding: 80px 0;
      }
    }

    .section-header {
      margin-bottom: 30px;
      text-align: center;
    }

    @media (min-width: 768px) {
      .section-header {
        margin-bottom: 50px;
      }
    }

    .section-header h2 {
      font-size: 1.8rem;
      font-weight: 800;
      color: var(--dark-color);
      margin-bottom: 15px;
      position: relative;
      display: inline-block;
    }

    @media (min-width: 768px) {
      .section-header h2 {
        font-size: 2.5rem;
      }
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
      font-size: 1rem;
      color: #666;
    }

    @media (min-width: 768px) {
      .section-header p {
        font-size: 1.1rem;
      }
    }

    .text-gradient {
      background: linear-gradient(45deg, var(--primary-color), var(--secondary-color));
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      display: inline-block;
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
      padding: 10px 0;
      background-color: rgba(255, 255, 255, 0.95);
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
      transition: all 0.3s ease;
    }

    .navbar-brand {
      font-weight: 800;
      font-size: 1.5rem;
      color: var(--primary-color);
    }

    @media (min-width: 768px) {
      .navbar-brand {
        font-size: 1.8rem;
      }
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
      display: block;
      margin: 5px 0;
      text-align: center;
      text-decoration: none;
    }

    @media (min-width: 992px) {

      .login-btn,
      .register-btn {
        display: inline-block;
        margin: 0;
        text-decoration: none;
      }
    }

    /* Page Header */
    .page-header {
      background: linear-gradient(135deg, rgba(255, 107, 107, 0.9), rgba(78, 205, 196, 0.9)), url('https://images.unsplash.com/photo-1457369804613-52c61a468e7d?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D');
      background-size: cover;
      background-position: center;
      padding: 120px 0 60px;
      text-align: center;
      color: white;
      position: relative;
      margin-bottom: 30px;
    }

    .page-header h1 {
      font-size: 2.5rem;
      font-weight: 800;
      margin-bottom: 15px;
    }

    .page-header p {
      font-size: 1.2rem;
      max-width: 700px;
      margin: 0 auto;
      opacity: 0.9;
    }

    /* Search Bar */
    .search-container {
      max-width: 800px;
      margin: -30px auto 30px;
      position: relative;
      z-index: 10;
    }

    .search-form {
      display: flex;
      background: white;
      border-radius: 50px;
      box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
      overflow: hidden;
      padding: 5px;
    }

    .search-input {
      flex: 1;
      border: none;
      padding: 15px 20px;
      font-size: 1rem;
      border-radius: 50px;
    }

    .search-input:focus {
      outline: none;
    }

    .search-btn {
      background-color: var(--primary-color);
      color: white;
      border: none;
      padding: 15px 30px;
      border-radius: 50px;
      font-weight: 700;
      cursor: pointer;
      transition: all 0.3s ease;
    }

    .search-btn:hover {
      background-color: #ff5252;
    }

    /* Category Pills */
    .category-container {
      margin-bottom: 40px;
    }

    .category-scroll {
      display: flex;
      overflow-x: auto;
      padding: 10px 0;
      scrollbar-width: none;
      -ms-overflow-style: none;
      gap: 10px;
    }

    .category-scroll::-webkit-scrollbar {
      display: none;
    }

    .category-pill {
      flex: 0 0 auto;
      padding: 8px 20px;
      background-color: white;
      border-radius: 50px;
      font-weight: 600;
      font-size: 0.9rem;
      color: var(--dark-color);
      border: 1px solid #eee;
      cursor: pointer;
      transition: all 0.3s ease;
      box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
      white-space: nowrap;
    }

    .category-pill:hover,
    .category-pill.active {
      background-color: var(--primary-color);
      color: white;
      border-color: var(--primary-color);
    }

    /* Cards & Carousels */
    .section-title {
      font-size: 1.5rem;
      font-weight: 800;
      margin-bottom: 20px;
      display: flex;
      align-items: center;
      gap: 10px;
    }

    .section-title i {
      color: var(--primary-color);
    }

    .section-title .view-all {
      font-size: 0.9rem;
      color: var(--primary-color);
      text-decoration: none;
      margin-left: auto;
    }

    .story-card {
      background-color: #fff;
      border-radius: 15px;
      overflow: hidden;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
      transition: all 0.3s ease;
      height: 100%;
      margin-bottom: 30px;
    }

    @media (min-width: 992px) {
      .story-card {
        margin-bottom: 0;
      }
    }

    .story-card:hover {
      transform: translateY(-10px);
      box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
    }

    .story-image {
      height: 180px;
      overflow: hidden;
      position: relative;
    }

    @media (min-width: 768px) {
      .story-image {
        height: 200px;
      }
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

    .story-badge {
      position: absolute;
      top: 15px;
      right: 15px;
      background: rgba(255, 107, 107, 0.9);
      color: white;
      padding: 5px 12px;
      border-radius: 50px;
      font-size: 0.8rem;
      font-weight: 700;
    }

    .story-trending {
      background: rgba(255, 230, 109, 0.9);
      color: var(--dark-color);
    }

    .story-new {
      background: rgba(78, 205, 196, 0.9);
      color: white;
    }

    .story-content {
      padding: 15px;
    }

    @media (min-width: 768px) {
      .story-content {
        padding: 20px;
      }
    }

    .story-meta {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 10px;
      font-size: 0.85rem;
      color: #888;
    }

    .story-author {
      display: flex;
      align-items: center;
      gap: 10px;
    }

    .author-avatar {
      width: 30px;
      height: 30px;
      border-radius: 50%;
      object-fit: cover;
    }

    .story-stats {
      display: flex;
      gap: 15px;
    }

    .story-stats span {
      display: flex;
      align-items: center;
      gap: 5px;
    }

    .story-content h3 {
      font-size: 1.2rem;
      margin-bottom: 10px;
      color: var(--dark-color);
      display: -webkit-box;
      -webkit-line-clamp: 2;
      -webkit-box-orient: vertical;
      overflow: hidden;
      text-overflow: ellipsis;
      height: 2.8rem;
    }

    @media (min-width: 768px) {
      .story-content h3 {
        font-size: 1.3rem;
      }
    }

    .story-categories {
      display: flex;
      flex-wrap: wrap;
      gap: 5px;
      margin-bottom: 10px;
    }

    .story-category {
      background-color: rgba(255, 107, 107, 0.1);
      color: var(--primary-color);
      padding: 3px 10px;
      border-radius: 50px;
      font-size: 0.75rem;
      font-weight: 600;
    }

    .story-text {
      color: #666;
      margin-bottom: 15px;
      font-size: 0.9rem;
      display: -webkit-box;
      -webkit-line-clamp: 3;
      -webkit-box-orient: vertical;
      overflow: hidden;
      text-overflow: ellipsis;
      height: 4.5rem;
    }

    @media (min-width: 768px) {
      .story-text {
        font-size: 0.95rem;
      }
    }

    .read-more-btn {
      font-size: 0.85rem;
      padding: 5px 15px;
      width: 100%;
    }

    /* Featured Slider */
    .featured-slider {
      position: relative;
      margin-bottom: 60px;
    }

    .featured-story {
      position: relative;
      height: 350px;
      border-radius: 20px;
      overflow: hidden;
      box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
    }

    .featured-story img {
      width: 100%;
      height: 100%;
      object-fit: cover;
    }

    .featured-overlay {
      position: absolute;
      bottom: 0;
      left: 0;
      right: 0;
      padding: 30px;
      background: linear-gradient(to top, rgba(0, 0, 0, 0.8), transparent);
      color: white;
    }

    .featured-badge {
      display: inline-block;
      background: rgba(255, 107, 107, 0.9);
      color: white;
      padding: 5px 12px;
      border-radius: 50px;
      font-size: 0.8rem;
      font-weight: 700;
      margin-bottom: 10px;
    }

    .featured-overlay h3 {
      font-size: 1.8rem;
      margin-bottom: 10px;
    }

    .featured-meta {
      display: flex;
      justify-content: space-between;
      margin-bottom: 15px;
      font-size: 0.9rem;
      opacity: 0.9;
    }

    .featured-desc {
      font-size: 1rem;
      opacity: 0.9;
      margin-bottom: 20px;
    }

    .featured-btn {
      background-color: var(--primary-color);
      color: white;
      padding: 8px 20px;
      border-radius: 50px;
      font-weight: 600;
      text-decoration: none;
      display: inline-block;
      transition: all 0.3s ease;
    }

    .featured-btn:hover {
      background-color: #ff5252;
      color: white;
    }

    .slider-nav {
      position: absolute;
      top: 50%;
      transform: translateY(-50%);
      width: 40px;
      height: 40px;
      background-color: rgba(255, 255, 255, 0.8);
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      color: var(--dark-color);
      font-size: 1.2rem;
      cursor: pointer;
      z-index: 10;
      transition: all 0.3s ease;
    }

    .slider-nav:hover {
      background-color: white;
      box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
    }

    .slider-prev {
      left: 20px;
    }

    .slider-next {
      right: 20px;
    }

    .slider-indicators {
      display: flex;
      justify-content: center;
      gap: 8px;
      margin-top: 20px;
    }

    .slider-dot {
      width: 10px;
      height: 10px;
      border-radius: 50%;
      background-color: #ddd;
      cursor: pointer;
      transition: all 0.3s ease;
    }

    .slider-dot.active {
      background-color: var(--primary-color);
      width: 25px;
      border-radius: 10px;
    }

    /* Trending Categories Card */
    .trending-category {
      position: relative;
      height: 180px;
      border-radius: 15px;
      overflow: hidden;
      margin-bottom: 20px;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
      transition: all 0.3s ease;
    }

    .trending-category:hover {
      transform: translateY(-5px);
      box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
    }

    .trending-category img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      transition: all 0.5s ease;
    }

    .trending-category:hover img {
      transform: scale(1.1);
    }

    .trending-overlay {
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      background: linear-gradient(to bottom, rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.7));
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      padding: 20px;
      color: white;
      text-align: center;
    }

    .trending-overlay h4 {
      font-size: 1.3rem;
      margin-bottom: 5px;
      font-weight: 800;
    }

    .trending-overlay p {
      font-size: 0.9rem;
      opacity: 0.9;
    }

    /* Recommendations */
    .recommendation-header {
      background-color: #f0f0f0;
      padding: 20px;
      border-radius: 15px;
      margin-bottom: 20px;
      display: flex;
      flex-direction: column;
      gap: 10px;
    }

    @media (min-width: 768px) {
      .recommendation-header {
        flex-direction: row;
        align-items: center;
      }
    }

    .recommendation-icon {
      width: 40px;
      height: 40px;
      background-color: var(--primary-color);
      color: white;
      display: flex;
      align-items: center;
      justify-content: center;
      border-radius: 50%;
      font-size: 1.2rem;
    }

    @media (min-width: 768px) {
      .recommendation-icon {
        width: 50px;
        height: 50px;
        font-size: 1.4rem;
      }
    }

    .recommendation-text {
      flex: 1;
    }

    .recommendation-text h3 {
      font-size: 1.2rem;
      margin-bottom: 5px;
    }

    @media (min-width: 768px) {
      .recommendation-text h3 {
        font-size: 1.4rem;
      }
    }

    .recommendation-text p {
      font-size: 0.9rem;
      color: #666;
      margin-bottom: 0;
    }

    /* Footer */
    .footer {
      background-color: #2d3436;
      color: #fff;
      padding: 50px 0 20px;
    }

    @media (min-width: 768px) {
      .footer {
        padding: 80px 0 20px;
      }
    }

    .footer-logo {
      font-size: 1.5rem;
      font-weight: 800;
      margin-bottom: 15px;
      color: #fff;
    }

    @media (min-width: 768px) {
      .footer-logo {
        font-size: 2rem;
        margin-bottom: 20px;
      }
    }

    .footer p {
      color: rgba(255, 255, 255, 0.7);
      margin-bottom: 15px;
      font-size: 0.9rem;
    }

    @media (min-width: 768px) {
      .footer p {
        margin-bottom: 20px;
        font-size: 1rem;
      }
    }

    .footer-social a {
      color: #fff;
      margin-right: 12px;
      font-size: 16px;
      transition: all 0.3s ease;
    }

    @media (min-width: 768px) {
      .footer-social a {
        margin-right: 15px;
        font-size: 18px;
      }
    }

    .footer-social a:hover {
      color: var(--primary-color);
    }

    .footer h5 {
      font-size: 1.1rem;
      margin-bottom: 15px;
      color: #fff;
      margin-top: 20px;
    }

    @media (min-width: 768px) {
      .footer h5 {
        font-size: 1.2rem;
        margin-bottom: 20px;
        margin-top: 0;
      }
    }

    .footer-links {
      list-style: none;
      padding: 0;
      margin: 0;
    }

    .footer-links li {
      margin-bottom: 8px;
    }

    @media (min-width: 768px) {
      .footer-links li {
        margin-bottom: 10px;
      }
    }

    .footer-links a {
      color: rgba(255, 255, 255, 0.7);
      text-decoration: none;
      transition: all 0.3s ease;
      font-size: 0.9rem;
    }

    @media (min-width: 768px) {
      .footer-links a {
        font-size: 1rem;
      }
    }

    .footer-links a:hover {
      color: var(--primary-color);
      padding-left: 5px;
    }

    .subscription-form {
      display: flex;
      flex-direction: column;
      margin-top: 15px;
      gap: 10px;
    }

    @media (min-width: 576px) {
      .subscription-form {
        flex-direction: row;
      }
    }

    .subscription-form .form-control {
      border-radius: 8px;
      border: none;
      padding: 10px 15px;
    }

    @media (min-width: 576px) {
      .subscription-form .form-control {
        border-radius: 50px 0 0 50px;
      }
    }

    .subscription-form .btn {
      border-radius: 8px;
      padding: 10px 15px;
    }

    @media (min-width: 576px) {
      .subscription-form .btn {
        border-radius: 0 50px 50px 0;
      }
    }

    @media (min-width: 768px) {

      .subscription-form .form-control,
      .subscription-form .btn {
        padding: 12px 20px;
      }
    }

    .footer-bottom {
      text-align: center;
      padding-top: 20px;
      margin-top: 30px;
      border-top: 1px solid rgba(255, 255, 255, 0.1);
    }

    @media (min-width: 768px) {
      .footer-bottom {
        padding-top: 30px;
        margin-top: 50px;
      }
    }

    .footer-bottom p {
      margin-bottom: 0;
      font-size: 0.85rem;
    }

    @media (min-width: 768px) {
      .footer-bottom p {
        font-size: 0.9rem;
      }
    }

    /* Back to Top Button */
    .back-to-top {
      position: fixed;
      bottom: 20px;
      right: 20px;
      width: 40px;
      height: 40px;
      background-color: var(--primary-color);
      color: white;
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 1.2rem;
      cursor: pointer;
      z-index: 99;
      opacity: 0;
      visibility: hidden;
      transition: all 0.3s ease;
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }

    .back-to-top.visible {
      opacity: 1;
      visibility: visible;
    }

    .back-to-top:hover {
      background-color: #ff5252;
      transform: translateY(-5px);
    }

    /* Pagination */
    .pagination-container {
      margin-top: 40px;
      display: flex;
      justify-content: center;
    }

    .pagination {
      display: flex;
      gap: 5px;
    }

    .page-link {
      width: 40px;
      height: 40px;
      display: flex;
      align-items: center;
      justify-content: center;
      border-radius: 50%;
      font-weight: 600;
      color: var(--dark-color);
      border: 1px solid #eee;
      transition: all 0.3s ease;
    }

    .page-link:hover,
    .page-link.active {
      background-color: var(--primary-color);
      color: white;
      border-color: var(--primary-color);
    }

    .page-item:first-child .page-link,
    .page-item:last-child .page-link {
      width: auto;
      padding: 0 15px;
      border-radius: 20px;
    }

  </style>
</head>
<body>
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-light fixed-top">
    <div class="container">
      <a class="navbar-brand" href="{{route('index')}}">
        <span class="logo-text">MeowWoof</span>
        <i class="fas fa-paw ms-2"></i>
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          @if(Route::has('login'))
          @auth
          <li class="nav-item ms-lg-3">
            <a href="{{ url('/dashboard') }}" style="text-decoration: none;" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500"><button class="btn btn-outline-primary login-btn">Dashboard</button></a>
          </li>
          @else
          <li class="nav-item ms-lg-3">
            <a href="{{route('login')}}" style="text-decoration: none;"><button class="btn btn-outline-primary login-btn">Masuk</button></a>
          </li>
          @if(Route::has('register'))
          <li class="nav-item ms-lg-2">
            <a href="{{route('register')}}" style="text-decoration: none;"><button class="btn btn-primary register-btn">Daftar</button></a>
          </li>
          @endif
          @endauth
          @endif
        </ul>
      </div>
    </div>
  </nav>

  <!-- Page Header -->
  <section class="page-header">
    <div class="container">
      <h1>Kumpulan Cerita MeowWoof</h1>
      <p>Temukan cerita menarik dari para penulis berbakat dari berbagai latar belakang dan genre</p>
    </div>
  </section>

  <!-- Most Popular Stories -->
  <section class="popular-stories">
    <div class="container">
      <h2 class="section-title">
        <i class="fas fa-fire"></i> Cerita Paling Banyak Dibaca
      </h2>

      <div class="row">
        @foreach ($popularStories->take(3) as $stories)
        <div class="col-lg-4 col-md-6 mb-4">
          <div class="story-card">
            <div class="story-image">
              <img src="{{ $stories->image ? asset('storage/images/' . $stories->image) : asset('img/noimg.jpg') }}" alt="Story thumbnail">
              <span class="story-badge">HOT</span>
            </div>
            <div class="story-content">
              <div class="story-meta">
                <div class="story-author">
                  <img src="{{ $stories->author->image ? asset('storage/images/' . $stories->author->image) : asset('img/default.jpeg') }}" alt="Author" class="author-avatar">
                  <span>{{$stories->author->name}}</span>
                </div>
                <div class="story-stats">
                  <span><i class="far fa-eye"></i> {{$stories->views}}</span>
                  <span><i class="far fa-heart"></i> {{$stories->likes->count()}}</span>
                </div>
              </div>
              <h3>{{$stories->title}}</h3>
              <div class="story-categories">
                <span class="story-category">{{$stories->category->name}}</span>
              </div>
              <p class="story-text text-justify" style="overflow: hidden; position: relative;">
                {{ Str::limit(strip_tags($stories->content), 180, ' ...') }}
              </p>
              <button class="btn btn-sm btn-outline-primary read-more-btn" onclick="location.href='{{ route('stories.show', $stories->id) }}'">Baca Selengkapnya</button>
            </div>
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </section>



  <!-- Latest Stories -->
  <section class="latest-stories">
    <div class="container">
      <h2 class="section-title">
        <i class="fas fa-clock"></i> Cerita Terbaru
      </h2>

      <div class="row">
        @foreach ($latestStories as $stories)
        <div class="col-lg-4 col-md-6 mb-4">
          <div class="story-card">
            <div class="story-image">
              <img src="{{ $stories->image ? asset('storage/images/' . $stories->image) : asset('img/noimg.jpg') }}" alt="Story thumbnail">
              <span class="story-badge story-new">BARU</span>
            </div>
            <div class="story-content">
              <div class="story-meta">
                <div class="story-author">
                  <img src="{{ $stories->author->image ? asset('storage/images/' . $stories->author->image) : asset('img/default.jpeg') }}" alt="Author" class="author-avatar">
                  <span>{{$stories->author->name}}</span>
                </div>
                <div class="story-stats">
                  <span><i class="far fa-clock"></i>{{ $stories->created_at->diffForHumans() }}</span>
                </div>
              </div>
              <h3>{{$stories->title}}</h3>
              <div class="story-categories">
                <span class="story-category">{{$stories->category->name}}</span>
              </div>
              <p class="story-text text-justify" style="overflow: hidden; position: relative;">
                {{ Str::limit(strip_tags($stories->content), 180, ' ...') }}
              </p>
              <button class="btn btn-sm btn-outline-primary read-more-btn" onclick="location.href='{{ route('stories.show', $stories->id) }}'">Baca Selengkapnya</button>
            </div>
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </section>

  <!-- Recommendations -->
  <section class="recommendations">
    <div class="container">
      <div class="recommendation-header">
        <div class="recommendation-icon">
          <i class="fas fa-lightbulb"></i>
        </div>
        <div class="recommendation-text">
          <h3>Rekomendasi Cerita Untukmu</h3>
        </div>
      </div>

      <div class="row">
        @foreach (\App\Models\Stories::where('status', 'Accept')->inRandomOrder()->take(5)->get() as $stories)
        <div class="col-lg-4 col-md-6 mb-4">
          <div class="story-card">
            <div class="story-image">
              <img src="{{ $stories->image ? asset('storage/images/' . $stories->image) : asset('img/noimg.jpg') }}" alt="Story thumbnail">
              <span class="story-badge story-trending">REKOMENDASI</span>
            </div>
            <div class="story-content">
              <div class="story-meta">
                <div class="story-author">
                  <img src="{{ $stories->author->image ? asset('storage/images/' . $stories->author->image) : asset('img/default.jpeg') }}" alt="Author" class="author-avatar">
                  <span>{{$stories->author->name}}</span>
                </div>
                <div class="story-stats">
                  <span><i class="far fa-eye"></i> {{$stories->views}}</span>
                  <span><i class="far fa-heart"></i> {{$stories->likes->count()}}</span>
                </div>
              </div>
              <h3>{{$stories->title}}</h3>
              <div class="story-categories">
                <span class="story-category">{{$stories->category->name}}</span>
              </div>
              <p class="story-text text-justify" style="overflow: hidden; position: relative;">
                {{ Str::limit(strip_tags($stories->content), 180, ' ...') }}
              </p>
              <button class="btn btn-sm btn-outline-primary read-more-btn" onclick="location.href='{{ route('stories.show', $stories->id) }}'">Baca Selengkapnya</button>
            </div>
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </section>

  <!-- Footer -->
  <footer class="footer">
    <div class="container">
      <div class="row">
        <div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
          <h3 class="footer-logo">
            <span class="text-gradient">MeowWoof</span>
          </h3>
          <p>Platform untuk semua kalangan berbagi cerita, pengalaman, dan kreativitas mereka dengan dunia.</p>
          <div class="footer-social">
            <a href="#"><i class="fab fa-facebook-f"></i></a>
            <a href="#"><i class="fab fa-twitter"></i></a>
            <a href="#"><i class="fab fa-instagram"></i></a>
            <a href="#"><i class="fab fa-youtube"></i></a>
          </div>
        </div>
        <div class="col-lg-2 col-md-6 col-6 mb-4 mb-md-0">
          <h5>Tautan</h5>
          <ul class="footer-links">
            <li><a href="">Beranda</a></li>
            <li><a href="">Cerita</a></li>
            <li><a href="">Tentang Kami</a></li>
            <li><a href="">Galeri</a></li>
            <li><a href="">Kontak</a></li>
          </ul>
        </div>
        <div class="col-lg-2 col-md-6 col-6 mb-4 mb-md-0">
          <h5>Dukungan</h5>
          <ul class="footer-links">
            <li><a href="#">FAQ</a></li>
            <li><a href="#">Bantuan</a></li>
            <li><a href="#">Kebijakan Privasi</a></li>
            <li><a href="#">Syarat & Ketentuan</a></li>
          </ul>
        </div>
        <div class="col-lg-4 col-md-6">
          <h5>Berlangganan</h5>
          <p>Dapatkan pembaruan terbaru dari kami</p>
          <div class="subscription-form">
            <input type="email" class="form-control" placeholder="Alamat Email">
            <button type="submit" class="btn btn-primary">Langganan</button>
          </div>
        </div>
      </div>
      <div class="footer-bottom">
        <p>&copy; 2025 <span class="text-gradient">MeowWoof</span>. Hak Cipta Dilindungi.</p>
      </div>
    </div>
  </footer>

  <!-- Back to Top Button -->
  <div class="back-to-top">
    <i class="fas fa-arrow-up"></i>
  </div>

  <!-- Bootstrap JS Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <!-- jQuery -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <!-- Custom JS -->
  <script>
    // Back to top button
    $(window).scroll(function() {
      if ($(this).scrollTop() > 300) {
        $('.back-to-top').addClass('visible');
      } else {
        $('.back-to-top').removeClass('visible');
      }
    });

    $('.back-to-top').click(function() {
      $('html, body').animate({
        scrollTop: 0
      }, 800);
      return false;
    });

    // Category pills
    $('.category-pill').click(function() {
      $('.category-pill').removeClass('active');
      $(this).addClass('active');
    });

    // Featured slider functionality
    let currentSlide = 0;
    const totalSlides = 3; // Change this to match your number of slides

    function showSlide(index) {
      // Here you would implement the logic to show the correct slide
      // For a real implementation, you would have multiple slides in the HTML
      $('.slider-dot').removeClass('active');
      $('.slider-dot').eq(index).addClass('active');
      currentSlide = index;
    }

    $('.slider-next').click(function() {
      currentSlide = (currentSlide + 1) % totalSlides;
      showSlide(currentSlide);
    });

    $('.slider-prev').click(function() {
      currentSlide = (currentSlide - 1 + totalSlides) % totalSlides;
      showSlide(currentSlide);
    });

    $('.slider-dot').click(function() {
      const index = $(this).index();
      showSlide(index);
    });

    // Auto-rotate slider
    setInterval(function() {
      $('.slider-next').click();
    }, 5000);

  </script>
</body>
</html>
