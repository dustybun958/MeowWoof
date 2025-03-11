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
                    <a href="">Stories</a>
                </li>
                <li class="separator">
                    <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item active">
                    <a>Manage</a>
                </li>
            </ul>
        </div>
        {{-- Content --}}
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Kelola Cerita</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="basic-datatables" class="display table table-striped table-hover text-center">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>ID</th>
                                        <th>Judul</th>
                                        <th>Kategori</th>
                                        <th>Peran</th>
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
                                        <th>Peran</th>
                                        <th>Terakhir Diperbarui</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    @foreach ($allStories as $stories)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $stories->id }}</td>
                                        <td>{{ $stories->title }}</td>
                                        <td>{{ $stories->category->name }}</td>
                                        <td>{{ $stories->author->name }}</td>
                                        <td>{{ $stories->updated_at->translatedFormat('m/d/Y H:i') }}</td>
                                        <td class="text-center">
                                            <span class="{{ $stories->status == 'Accept' ? 'badge bg-success' : ($stories->status == 'Reject' ? 'badge bg-danger' : ($stories->status == 'Pending' ? 'badge bg-warning' : '')) }}">
                                                {{ $stories->status }}
                                            </span>
                                        </td>
                                        <td>
                                            <div class="form-button-action d-flex justify-content-center align-items-center">
                                                <span data-bs-toggle="tooltip" title="Delete">
                                                    <form action="{{ route('admin.stories.destroy', $stories) }}" id="deleteButton" data-id="{{ $stories->id }}">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-link btn-danger">
                                                            <i class="fa fa-times"></i>
                                                        </button>
                                                    </form>
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
@endsection

@section('custom-footer')
<script>
    $(document).ready(function() {
        $("#basic-datatables").DataTable({});
    });

</script>
@endsection
