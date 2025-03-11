@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="page-inner">
        <div class="page-header">
            <h3 class="fw-bold mb-3">{{ auth()->user()->name }} Draft</h3>
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
                    <a href="">Draft</a>
                </li>
                <li class="separator">
                    <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item active">
                    <a>My Draft</a>
                </li>
            </ul>
        </div>
        @if (session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert" id="error-alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"> </button>
        </div>
        @endif
        {{-- Content --}}
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <ul class="nav nav-tabs nav-line nav-color-secondary justify-content-center" id="line-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="line-draft-tab" data-bs-toggle="pill" href="#line-draft" role="tab" aria-controls="pills-home" aria-selected="true">Draft</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="line-accepted-tab" data-bs-toggle="pill" href="#line-accepted" role="tab" aria-controls="pills-profile" aria-selected="false">Accepted</a>
                        </li>
                    </ul>
                    <div class="tab-content mt-3 mb-3" id="line-tabContent">
                        <div class="tab-pane fade show active" id="line-draft" role="tabpanel" aria-labelledby="line-draft-tab">
                            <div class="card-header mb-3">
                                <h4 class="card-title">Kelola Cerita</h4>
                            </div>
                            <div class="table-responsive">
                                <table id="basic-datatables" class="display table table-striped table-hover text-center">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>ID</th>
                                            <th>Judul</th>
                                            <th>Kategori</th>
                                            <th>Terakhir Diperbarui</th>
                                            <th>Status</th>
                                            <th style="width: 5%">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>No</th>
                                            <th>ID</th>
                                            <th>Judul</th>
                                            <th>Kategori</th>
                                            <th>Terakhir Diperbarui</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @foreach ($notAcceptedStories as $stories)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $stories->id }}</td>
                                            <td>{{ $stories->title }}</td>
                                            <td>{{ $stories->category->name }}</td>
                                            <td>{{ $stories->updated_at->translatedFormat('m/d/Y H:i') }}</td>
                                            <td>{{ $stories->status }}</td>
                                            <td>
                                                <div class="form-button-action d-flex justify-content-center align-items-center">
                                                    @if ($stories->status == 'Reject')
                                                    <span data-bs-toggle="tooltip" title="Edit">
                                                        <a href="{{ route('stories.edit', $stories->id) }}" class="btn btn-link btn-primary btn-lg">
                                                            <i class="fa fa-edit"></i>
                                                        </a>
                                                    </span>
                                                    @elseif ($stories->status == 'Pending')
                                                    <span data-bs-toggle="tooltip" title="View">
                                                        <a href="{{ route('stories.view', $stories->id) }}" class="btn btn-link btn-primary btn-lg">
                                                            <i class="far fa-eye"></i>
                                                        </a>
                                                    </span>
                                                    @endif
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="line-accepted" role="tabpanel" aria-labelledby="line-accepted-tab">
                            <div class="card-header mb-3">
                                <h4 class="card-title">Manage Stories</h4>
                            </div>
                            <div class="table-responsive">
                                <table id="basic-datatables2" class="display table table-striped table-hover text-center">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>ID</th>
                                            <th>Judul</th>
                                            <th>Kategori</th>
                                            <th>Terakhir Diperbarui</th>
                                            <th>Status</th>
                                            <th style="width: 5%">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>No</th>
                                            <th>ID</th>
                                            <th>Judul</th>
                                            <th>Kategori</th>
                                            <th>Terakhir Diperbarui</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @foreach ($acceptedStories as $stories)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $stories->id }}</td>
                                            <td>{{ $stories->title }}</td>
                                            <td>{{ $stories->category->name }}</td>
                                            <td>{{ $stories->updated_at->translatedFormat('m/d/Y H:i') }}</td>
                                            <td>{{ $stories->status }}</td>
                                            <td>
                                                <div class="form-button-action d-flex justify-content-center align-items-center">
                                                    <span data-bs-toggle="tooltip" title="View">
                                                        <a href="{{ route('stories.show', $stories->id) }}" class="btn btn-link btn-primary btn-lg">
                                                            <i class="far fa-eye"></i>
                                                        </a>
                                                    </span>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('custom-footer')
<script>
    $(document).ready(function() {
        $("#basic-datatables").DataTable({});
    });

    $(document).ready(function() {
        $("#basic-datatables2").DataTable({});
    });

</script>
@endsection

<script>
    document.addEventListener('DOMContentLoaded', (event) => {
        setTimeout(() => {
            const alert = document.getElementById('error-alert');
            if (alert) {
                alert.classList.remove('show');
                alert.classList.add('fade');
                setTimeout(() => alert.remove(), 150);
            }
        }, 5000);
    });

</script>
