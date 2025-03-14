<h4 class="my-4">Recommendation Stories</h4>
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
</div>

{{-- <h4 class="my-4">Stay Connected</h4>
<div class="row g-4">
  <div class="col-12">
    <a href="#" class="w-100 rounded btn btn-primary d-flex align-items-center p-3 mb-2">
      <i class="fab fa-youtube btn btn-light btn-square rounded-circle me-3"></i>
      <span class="text-white">Theun Dev</span>
    </a>
    <a href="#" class="w-100 rounded btn btn-danger d-flex align-items-center p-3 mb-4">
      <i class="fab fa-github btn btn-light btn-square rounded-circle me-3"></i>
      <span class="text-white">Sahrul Romadi</span>
    </a>
  </div>
</div> --}}
