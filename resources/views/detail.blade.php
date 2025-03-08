{{-- @extends('layouts.app')

@section('content')
<!-- Single Product Start -->
<div class="container-fluid py-5">
  <div class="container py-5">
    <ol class="breadcrumb justify-content-start mb-4">
      <li class="breadcrumb-item"><a href="{{ route('index') }}">Home</a></li>
<li class="breadcrumb-item active text-dark">{{ $stories->title }}</li>
</ol>
<div class="row g-4">
  <div class="col-lg-8">
    <div class="mb-4">
      <a href="#" class="h1 display-5">{{ $stories->title }}</a>
    </div>
    <div class="position-relative rounded overflow-hidden mb-3">
      <img src="{{ $stories->image ? asset('storage/images/' . $stories->image) : asset('img/noimg.jpg') }}" class="img-zoomin img-fluid rounded w-100" alt="">
      <div class="position-absolute text-white px-4 py-2 bg-primary rounded" style="top: 20px; right: 20px;">
        {{ $stories->category->name }}
      </div>
    </div>
    <p class="my-4">{!! $stories->content !!}
    </p>
    <div class="tab-class">
      <div class="d-flex justify-content-between border-bottom mb-4">
        <ul class="nav nav-pills d-inline-flex text-center">
          <li class="nav-item mb-3">
            <h5 class="mt-2 me-3 mb-0">Tags:</h5>
          </li>
          <li class="nav-item mb-3">
            <a class="d-flex py-2 bg-light rounded-pill active me-2" data-bs-toggle="pill">
              <span class="text-dark" style="width: 100px;">{{ $stories->category->name }}</span>

            </a>
          </li>
        </ul>
        <div class="d-flex align-items-center">
          <form action="{{ route('stories.like', $stories->id) }}" method="POST">
            @csrf
            @if ($stories->likes->where('device_id', session('device_id'))->count())
            <button type="submit" class="btn btn-square">
              <i class="fas fa-thumbs-up text-primary"></i>
            </button>
            @else
            <button type="submit" class="btn btn-square">
              <i class="far fa-thumbs-up text-primary"></i>
            </button>
            @endif
          </form>
          <span class="ms-1">{{ $stories->likes->count() }}</span>
        </div>
      </div>
      <div class="tab-content">
        <div class="tab-pane fade show active">
          <div class="row g-4 align-items-center">
            <div class="col-3">
              <img src="{{ $stories->author->image ? asset('storage/images/' . $stories->author->image) : asset('img/default.jpeg') }}" class="img-fluid w-100 rounded" alt="">
            </div>
            <div class="col-9">
              <h3>{{ $stories->author->name }}</h3>
              <p class="mb-0">{{ $stories->author->bio }}
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="bg-light rounded my-4 p-4">
      <h4 class="mb-4">You Might Also Like</h4>
      <div class="row g-4">
        @foreach ($randomStories as $stories)
        <div class="col-lg-6">
          <div class="d-flex align-items-center p-3 bg-white rounded">
            <img src="{{ $stories->image ? asset('storage/images/' . $stories->image) : asset('img/noimg.jpg') }}" class="img-fluid rounded" alt="" style="width: 100px; height: 100px; object-fit: cover;">
            <div class="ms-3">
              <a href="{{ route('stories.show', $stories->id) }}" class="h5 mb-2">{{ $stories->title }}</a>
              <p class="text-dark mt-3 mb-0 me-3"><i class="fa fa-clock"></i>
                {{ $stories->created_at->translatedFormat('d F Y') }}
              </p>
            </div>
          </div>
        </div>
        @endforeach
      </div>
    </div>

  </div>
  <div class="col-lg-4">
    <div class="row g-4">
      <div class="col-12">
        <div class="p-3 rounded border">
          <div class="input-group w-100 mx-auto d-flex mb-4">
            <input type="search" class="form-control p-3" placeholder="keywords" aria-describedby="search-icon-1">
            <span id="search-icon-1" class="btn btn-primary input-group-text p-3"><i class="fa fa-search text-white"></i></span>
          </div>

          @component('components.col-2')
          @endcomponent

        </div>
      </div>
    </div>
  </div>
</div>
</div>
</div>
<!-- Single Product End -->

<script id="dsq-count-scr" src="//news-center-1.disqus.com/count.js" async></script>
@endsection --}}
@extends('layouts.app')

@section('content')
<style>
  /* Custom styles to match login/register theme */
  .breadcrumb-item a {
    color: #6366F1;
  }

  .breadcrumb-item.active {
    color: #4F46E5;
  }

  .story-title {
    color: #1F2937;
    transition: color 0.3s;
  }

  .story-title:hover {
    color: #6366F1;
    text-decoration: none;
  }

  .category-badge {
    background: linear-gradient(135deg, #6366F1 0%, #8B5CF6 100%);
    border: none;
  }

  .tab-class .nav-pills .nav-link.active {
    background-color: #6366F1;
  }

  .tab-class .nav-pills .nav-link {
    color: #6366F1;
  }

  .like-button {
    border: 1px solid #6366F1;
    background: transparent;
    transition: all 0.3s;
  }

  .like-button:hover {
    background: #6366F1;
    color: white;
  }

  .author-section {
    border: 1px solid #E5E7EB;
    border-radius: 0.5rem;
    padding: 1.5rem;
  }

  .related-stories {
    background: #F3F4F6;
    border-radius: 0.5rem;
  }

  .related-story-card {
    transition: transform 0.3s;
  }

  .related-story-card:hover {
    transform: translateY(-5px);
  }

  .search-button {
    background: linear-gradient(135deg, #6366F1 0%, #8B5CF6 100%);
    border: none;
  }

  .search-input:focus {
    border-color: #6366F1;
    box-shadow: 0 0 0 0.25rem rgba(99, 102, 241, 0.25);
  }

</style>

<!-- Single Story Start -->
<div class="container-fluid py-5">
  <div class="container py-5">
    <ol class="breadcrumb justify-content-start mb-4">
      <li class="breadcrumb-item"><a href="{{ route('index') }}">Home</a></li>
      <li class="breadcrumb-item active">{{ $stories->title }}</li>
    </ol>
    <div class="row g-4">
      <div class="col-lg-8">
        <div class="mb-4">
          <a href="#" class="story-title h1 display-5 text-decoration-none">{{ $stories->title }}</a>
        </div>
        <div class="position-relative rounded overflow-hidden mb-3">
          <img src="{{ $stories->image ? asset('storage/images/' . $stories->image) : asset('img/noimg.jpg') }}" class="img-fluid rounded w-100" alt="" style="object-fit: cover; max-height: 500px;">
          <div class="position-absolute category-badge text-white px-4 py-2 rounded" style="top: 20px; right: 20px;">
            {{ $stories->category->name }}
          </div>
        </div>
        <div class="content-section my-4">
          {!! $stories->content !!}
        </div>

        <!-- Tags and Likes Section -->
        <div class="d-flex justify-content-between align-items-center p-4 bg-light rounded">
          <div class="d-flex align-items-center">
            <h6 class="mb-0 me-3">Tags:</h6>
            <span class="badge bg-primary">{{ $stories->category->name }}</span>
          </div>
          <div class="d-flex align-items-center">
            <form action="{{ route('stories.like', $stories->id) }}" method="POST">
              @csrf
              <button type="submit" class="like-button rounded-circle p-2">
                @if ($stories->likes->where('device_id', session('device_id'))->count())
                <i class="fas fa-thumbs-up text-primary"></i>
                @else
                <i class="far fa-thumbs-up text-primary"></i>
                @endif
              </button>
            </form>
            <span class="ms-2">{{ $stories->likes->count() }}</span>
          </div>
        </div>

        <!-- Author Section -->
        <div class="author-section my-4">
          <div class="row g-4 align-items-center">
            <div class="col-3">
              <img src="{{ $stories->author->image ? asset('storage/images/' . $stories->author->image) : asset('img/default.jpeg') }}" class="img-fluid rounded-circle" alt="">
            </div>
            <div class="col-9">
              <h3 class="mb-2">{{ $stories->author->name }}</h3>
              <p class="text-muted mb-0">{{ $stories->author->bio }}</p>
            </div>
          </div>
        </div>

        <!-- Related Stories Section -->
        <div class="related-stories p-4 my-4">
          <h4 class="mb-4">You Might Also Like</h4>
          <div class="row g-4">
            @foreach ($randomStories as $story)
            <div class="col-lg-6">
              <div class="related-story-card bg-white rounded p-3">
                <div class="d-flex align-items-center">
                  <img src="{{ $story->image ? asset('storage/images/' . $story->image) : asset('img/noimg.jpg') }}" class="img-fluid rounded" alt="" style="width: 100px; height: 100px; object-fit: cover;">
                  <div class="ms-3">
                    <a href="{{ route('stories.show', $story->id) }}" class="h6 text-dark mb-2 d-block">{{ $story->title }}</a>
                    <p class="text-muted small mb-0">
                      <i class="fa fa-clock me-2"></i>
                      {{ $story->created_at->translatedFormat('d F Y') }}
                    </p>
                  </div>
                </div>
              </div>
            </div>
            @endforeach
          </div>
        </div>
      </div>

      <!-- Sidebar -->
      <div class="col-lg-4">
        <div class="sticky-top" style="top: 100px">
          <div class="bg-light rounded p-4">
            <div class="input-group mb-4">
              <input type="search" class="form-control search-input" placeholder="Search stories..." aria-label="Search">
              <button class="btn search-button" type="button">
                <i class="fa fa-search text-white"></i>
              </button>
            </div>

            @component('components.col-2')
            @endcomponent
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Single Story End -->

<script id="dsq-count-scr" src="//news-center-1.disqus.com/count.js" async></script>
@endsection
