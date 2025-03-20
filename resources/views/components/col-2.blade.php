<div class="recommendation-section p-4 bg-white rounded shadow-sm mb-4">
  <h4 class="mb-4 position-relative pb-3">
    <span class="text-gradient">Rekomendasi Cerita</span>
    <span class="position-absolute" style="height: 3px; width: 50px; background: var(--primary-color); bottom: 0; left: 0; border-radius: 10px;"></span>
  </h4>

  <div class="recommended-stories">
    @foreach (\App\Models\Stories::where('status', 'Accept')->inRandomOrder()->take(5)->get() as $story)
    <div class="recommended-story mb-4">
      <div class="d-flex align-items-center">
        <div class="rec-image">
          <img src="{{ $story->image ? asset('storage/images/' . $story->image) : asset('img/noimg.jpg') }}" class="rounded" alt="{{ $story->title }}">
        </div>
        <div class="rec-content ms-3">
          <span class="category-badge">{{ $story->category->name }}</span>
          <h5 class="mt-2 mb-1">
            <a href="{{ route('stories.show', $story->id) }}" class="text-dark rec-title">
              {{ $story->title }}
            </a>
          </h5>
          <div class="rec-meta d-flex align-items-center">
            <i class="far fa-calendar-alt me-1 text-primary"></i>
            <small>{{ $story->created_at->translatedFormat('d F Y') }}</small>
          </div>
        </div>
      </div>
    </div>
    @endforeach
  </div>

  <div class="text-center mt-4">
    <a href="{{route('indexStories')}}" class="btn btn-sm btn-outline-primary px-4 py-2 rounded-pill">Lihat Semua Cerita</a>
  </div>
</div>

<style>
  .recommendation-section {
    border-radius: 15px;
    border-top: 4px solid var(--primary-color);
  }

  .text-gradient {
    background: linear-gradient(45deg, var(--primary-color), var(--secondary-color));
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    font-weight: 700;
  }

  .recommended-story {
    transition: all 0.3s ease;
    padding: 12px;
    border-radius: 10px;
  }

  .recommended-story:hover {
    background-color: #f8f9fa;
    transform: translateX(5px);
  }

  .recommended-story:not(:last-child) {
    border-bottom: 1px dashed #eee;
  }

  .rec-image {
    width: 70px;
    height: 70px;
    overflow: hidden;
    border-radius: 10px;
    flex-shrink: 0;
  }

  .rec-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.3s ease;
  }

  .recommended-story:hover .rec-image img {
    transform: scale(1.1);
  }

  .category-badge {
    display: inline-block;
    font-size: 0.7rem;
    padding: 2px 8px;
    background-color: rgba(255, 107, 107, 0.1);
    color: var(--primary-color);
    border-radius: 12px;
    font-weight: 600;
  }

  .rec-title {
    display: block;
    font-size: 0.95rem;
    font-weight: 600;
    line-height: 1.3;
    margin-bottom: 5px;
    text-decoration: none;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
    transition: color 0.3s ease;
  }

  .rec-title:hover {
    color: var(--primary-color) !important;
  }

  .rec-meta {
    font-size: 0.75rem;
    color: #888;
  }

</style>

{{-- <h4 class="my-4">Recommendation Stories</h4>
<div class="row g-4 mb-4">
  @foreach (\App\Models\Stories::where('status', 'Accept')->inRandomOrder()->take(5)->get() as $stories)
  <div class="col-12">
    <div class="row g-4 align-items-center features-item">
      <div class="col-4">
        <div class="rounded-circle position-relative">
          <div class="overflow-hidden rounded-circle">
            <img src="{{ $stories->image ? asset('storage/images/' . $stories->image) : asset('img/noimg.jpg') }}" class="img-zoomin img-fluid rounded-circle w-100" alt="">
</div>
</div>
</div>
<div class="col-8">
  <div class="features-content d-flex flex-column">
    <p class="text-uppercase mb-2">{{ $stories->category->name }}</p>
    <a href="{{ route('stories.show', $stories->id) }}" class="h6">
      {{ $stories->title }}
    </a>
    <small class="text-body d-block"><i class="fas fa-calendar-alt me-1"></i>
      {{ $stories->created_at->translatedFormat('d F Y') }}</small>
  </div>
</div>
</div>
</div>
@endforeach
</div> --}}
