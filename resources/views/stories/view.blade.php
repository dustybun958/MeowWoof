@extends('layouts.admin')

@section('content')
<div class="container">
  <div class="page-inner">
    <div class="page-header">
      <h3 class="fw-bold mb-3">Stories</h3>
      <ul class="breadcrumbs mb-3">
        <li class="nav-home">
          <a href="{{ route('dashboard') }}">
            <i class="icon-home"></i>
          </a>
        </li>
        <li class="separator">
          <i class="icon-arrow-right"></i>
        </li>
        <li class="nav-item">
          <a href="{{ route('stories.status') }}">Stories</a>
        </li>
        <li class="separator">
          <i class="icon-arrow-right"></i>
        </li>
        <li class="nav-item active">
          <a>View</a>
        </li>
      </ul>
    </div>
    {{-- Content --}}
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            @if (!auth()->user()->hasRole('Writer') && isset($stories) && $stories->status != 'Accept')
            <div class="card-header d-flex justify-content-between align-items-center">
              <div class="card-title">{{ $stories->title }}</div>
              <div class="d-flex">
                <form action="{{ route('stories.updateStatus', $stories->id) }}" method="POST" class="me-2">
                  @csrf
                  @method('PATCH')
                  <input type="hidden" name="status" value="Accept">
                  <button type="submit" class="btn btn-success text-light" id="submitButton">
                    Accept
                  </button>
                </form>
                <form action="{{ route('stories.updateStatus', $stories->id) }}" method="POST">
                  @csrf
                  @method('PATCH')
                  <input type="hidden" name="status" value="Reject">
                  <button type="submit" class="btn btn-danger text-light" id="rejectButton">
                    Reject
                  </button>
                </form>
              </div>
            </div>
            @endif
            <div class="card-body">
              <div class="position-relative rounded mb-3">
                <img src="{{ $stories->image ? asset('storage/images/' . $stories->image) : asset('img/noimg.jpg') }}" class="img-fluid rounded w-100" alt="">
                <div class="position-absolute text-white px-4 py-2 bg-primary rounded" style="top: 20px; right: 20px;">
                  {{ $stories->category->name }}
                </div>
              </div>
              <p class="my-2">{!! $stories->content !!}
              </p>
              <div class="card-footer">
                <div class="row g-2 align-items-center mt-1">
                  <div class="col-3">
                    <img src="{{ $stories->author->image ? asset('storage/images/' . $stories->author->image) : asset('img/default.jpeg') }}" class="img-fluid w-100 rounded" alt="">
                  </div>
                  <div class="col-9">
                    <h3>{{ $stories->author->name }}</h3>
                    <p class="mb-0">{{ $stories->author->bio }}</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
