@extends('layouts.app')

@section('content')
<!-- Main Post Section Start -->
<div class="container-fluid py-5">
  <div class="container py-5">
    <div class="row g-4">
      <div class="col-lg-7 col-xl-8 mt-0">
        @foreach ($latestStories->take(1) as $stories)
        <div class="position-relative overflow-hidden rounded">
          <img src="{{ $stories->image ? asset('storage/images/' . $stories->image) : asset('img/noimg.jpg') }}" class="img-fluid rounded img-zoomin w-100" alt="" style="height: 475px" />
          <div class="d-flex justify-content-center px-4 position-absolute flex-wrap" style="bottom: 10px; left: 0">
            <div class="text-white me-4"><i class="fa fa-clock"></i>
              {{ $stories->created_at->translatedFormat('d F Y') }}</div>
            <div class="text-white me-4"><i class="fa fa-eye"></i> {{ $stories->views }}</div>
            <div class="text-white me-4"><i class="fa fa-thumbs-up"></i> {{ $stories->likes->count() }}
            </div>
          </div>
        </div>
        <div class="border-bottom py-3">
          <a href="{{ route('stories.show', $stories->id) }}" class="display-4 text-dark mb-0 link-hover">{{ $stories->title }}</a>
        </div>
        <p class="mt-3 mb-4">
          {!! Str::limit($stories->content, 450, '...') !!}
        </p>
        @endforeach
        @foreach ($popularStories->take(1) as $stories)
        <div class="bg-light p-4 rounded">
          <div class="news-2">
            <h3 class="mb-4">Top Views</h3>
          </div>
          <div class="row g-4 align-items-center">
            <div class="col-md-6">
              <div class="rounded overflow-hidden">
                <img src="{{ $stories->image ? asset('storage/images/' . $stories->image) : asset('img/noimg.jpg') }}" class="img-fluid rounded img-zoomin w-100" alt="" />
              </div>
            </div>
            <div class="col-md-6">
              <div class="d-flex flex-column">
                <a href="{{ route('stories.show', $stories->id) }}" class="h3">{{ $stories->title }}</a>
                <p class="mb-0 fs-5 ms-1">
                  <i class="fa fa-clock">
                    {{ $stories->created_at->translatedFormat('d F Y H:i') }}</i>
                </p>
                <p class="mb-0 fs-5 ms-1">
                  <i class="fa fa-eye"> {{ $stories->views }} Views</i>
                </p>
                <p class="mb-0 fs-5 ms-1">
                  <i class="fa fa-thumbs-up">
                    {{ $stories->likes->count() }} Likes</i>
                </p>
              </div>
            </div>
          </div>
        </div>
        @endforeach
      </div>
      <div class="col-lg-5 col-xl-4">
        <div class="bg-light rounded p-4 pt-0">
          <div class="row g-4">
            @foreach ($latestStories->skip(1)->take(1) as $stories)
            <div class="col-12">
              <div class="rounded overflow-hidden">
                <img src="{{ $stories->image ? asset('storage/images/' . $stories->image) : asset('img/noimg.jpg') }}" class="img-fluid rounded img-zoomin w-100" alt="" />
              </div>
            </div>
            <div class="col-12">
              <div class="d-flex flex-column">
                <a href="{{ route('stories.show', $stories->id) }}" class="h4 mb-2">{{ $stories->title }}</a>
                <p class="fs-5 mb-0">
                  <i class="fa fa-clock">
                    {{ $stories->created_at->translatedFormat('d F Y H:i') }}</i>
                </p>
                <p class="fs-5 mb-0">
                  <i class="fa fa-eye"> {{ $stories->views }}</i>
                </p>
                <p class="fs-5 mb-0">
                  <i class="fa fa-thumbs-up">
                    {{ $stories->likes->count() }}</i>
                </p>
              </div>
            </div>
            @endforeach
            @foreach ($latestStories->skip(2)->take(5) as $stories)
            <div class="col-12">
              <div class="row g-4 align-items-center">
                <div class="col-5">
                  <div class="overflow-hidden rounded">
                    <img src="{{ $stories->image ? asset('storage/images/' . $stories->image) : asset('img/noimg.jpg') }}" class="img-zoomin img-fluid rounded w-100" alt="" />
                  </div>
                </div>
                <div class="col-7">
                  <div class="features-content d-flex flex-column">
                    <a href="{{ route('stories.show', $stories->id) }}" class="h6">{{ $stories->title }}</a>
                    <small><i class="fa fa-clock">
                        {{ $stories->created_at->translatedFormat('d F Y H:i') }} </i>
                    </small>
                    <small><i class="fa fa-eye"> {{ $stories->views }}</i></small>
                    <small>
                      <i class="fa fa-thumbs-up">
                        {{ $stories->likes->count() }}</i>
                    </small>
                  </div>
                </div>
              </div>
            </div>
            @endforeach
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Main Post Section End -->

<!-- Latest Stories Start -->
<div class="container-fluid latest-news py-5">
  <div class="container py-5">
    <h2 class="mb-4">Latest Stories</h2>
    <div class="latest-news-carousel owl-carousel">
      @foreach ($latestStories as $stories)
      <div class="latest-news-item">
        <div class="bg-light rounded">
          <div class="rounded-top overflow-hidden">
            <img src="{{ $stories->image ? asset('storage/images/' . $stories->image) : asset('img/noimg.jpg') }}" class="img-zoomin img-fluid rounded-top w-100" alt="" />
          </div>
          <div class="d-flex flex-column p-4">
            <a href="{{ route('stories.show', $stories->id) }}" class="h4">
              {{ Str::limit($stories->title, 35, '...') }}</a>
            <div class="d-flex justify-content-between">
              <small class="small text-body">{{ 'by ' . $stories->author->name }}</small>
              <small class="text-body d-block"><i class="fas fa-calendar-alt me-1"></i>
                {{ $stories->created_at->translatedFormat('j F Y') }}</small>
            </div>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</div>
<!-- Latest Stories End -->

<!-- Most Populer Stories Start -->
<div class="container-fluid populer-news py-5">
  <div class="container py-5">
    <div class="tab-class mb-4">
      <div class="row g-4">
        <div class="col-lg-8 col-xl-9">
          <div class="d-flex flex-column flex-md-row justify-content-md-between border-bottom mb-4">
            <h1 class="mb-4">Trending Category</h1>
            <ul class="nav nav-pills d-inline-flex text-center">
              @foreach ($topCategory->take(3) as $key => $categories)
              <li class="nav-item mb-3">
                <a class="d-flex py-2 bg-light rounded-pill me-2" data-bs-toggle="pill" href="#tab-{{ $key + 1 }}">
                  <span class="text-dark" style="width: 100px">{{ $categories->name }}</span>
                </a>
              </li>
              @endforeach
            </ul>
          </div>

          <div class="tab-content mb-4">
            @foreach ($topCategory->take(3) as $key => $categories)
            <div id="tab-{{ $key + 1 }}" class="tab-pane fade show p-0 {{ $key === 0 ? 'active' : '' }}">
              <div class="row g-4">
                @foreach ($categories->stories()->where('status', 'Accept')->withCount('likes')->orderBy('likes_count', 'desc')->take(1)->get() as $stories)
                <div class="col-lg-8">
                  <div class="position-relative rounded overflow-hidden">
                    <img src="{{ $stories->image ? asset('storage/images/' . $stories->image) : asset('img/noimg.jpg') }}" class="img-zoomin img-fluid rounded w-100" alt="" />
                    <div class="position-absolute text-white px-4 py-2 bg-primary rounded" style="top: 20px; right: 20px">
                      {{ $categories->name }}
                    </div>
                  </div>
                  <div class="my-4">
                    <a href="{{ route('stories.show', $stories->id) }}" class="h4">{{ $stories->title }}</a>
                  </div>
                  <div class="d-flex">
                    <div class="text-dark me-4"><i class="fa fa-clock"></i>
                      {{ $stories->created_at->translatedFormat('d F Y') }}</div>
                    <div class="text-dark me-4"><i class="fa fa-eye"></i>
                      {{ $stories->views }}</div>
                    <div class="text-dark me-4"><i class="fa fa-thumbs-up"></i>
                      {{ $stories->likes->count() }}
                    </div>
                  </div>
                  <p class="my-4">
                    {!! Str::limit($stories->content, 450, '...') !!}
                  </p>
                </div>
                @endforeach
                <div class="col-lg-4">
                  @foreach ($categories->stories()->where('status', 'Accept')->withCount('likes')->orderBy('likes_count', 'desc')->skip(1)->take(5)->get() as $stories)
                  <div class="row g-4">
                    <div class="col-12">
                      <div class="row g-4 align-items-center pb-4">
                        <div class="col-5">
                          <div class="overflow-hidden rounded">
                            <img src="{{ $stories->image ? asset('storage/images/' . $stories->image) : asset('img/noimg.jpg') }}" class="img-zoomin img-fluid rounded w-100" alt="" />
                          </div>
                        </div>
                        <div class="col-7">
                          <div class="features-content d-flex flex-column">
                            <p class="text-uppercase mb-2">{{ $categories->name }}
                            </p>
                            <a href="{{ route('stories.show', $stories->id) }}" class="h6">{{ $stories->title }}</a>
                            <small class="text-body d-block"><i class="fas fa-calendar-alt me-1"></i>
                              {{ $stories->created_at->translatedFormat('j F Y') }}
                            </small>
                            <small class="text-body d-block"><i class="fas fa-eye me-1"></i>
                              {{ $stories->views }}
                            </small>
                            <small class="text-body d-block"><i class="fas fa-thumbs-up me-1"></i>
                              {{ $stories->likes->count() }}
                            </small>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  @endforeach
                </div>
              </div>
            </div>
            @endforeach
          </div>
        </div>

        <div class="col-lg-4 col-xl-3">
          <div class="row g-4">
            <div class="col-12">
              <div class="p-3 rounded border">
                @component('components.col-2')
                @endcomponent
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
