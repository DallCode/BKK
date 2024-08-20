@extends('layout.main')

@section('content')
<div class="card-body">

<h4 class="card-title">Akun Perusahaan</h4>
@if ($message = Session::get('success'))
    <div class="alert alert-success">{{ $message }}</div>
@endif

<!-- Button trigger modal tambah -->
<button type="button" class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#addModal">
    Tambah Perusahaan
</button>

<table class="table table-light table-striped table-bordered" id="companyTable">
    <thead>
        <tr>
            <th>Nama Perusahaan</th>
            <th>Bidang Usaha</th>
            <th>No Telepon</th>
            <th>Alamat</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($perusahaan as $p)
        <tr>
            <td>{{$p->nama}}</td>
            <td>{{$p->bidang_usaha}}</td>
            <td>{{$p->no_telepon}}</td>
            <td>{{$p->alamat}}</td>
            <td>
                <!-- Button trigger modal edit -->
                <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editModal-{{ $p->id_data_perusahaan }}">
                    Edit
                </button>
            </td>
        </tr>

        <!-- Modal for edit -->
        <div class="modal fade" id="editModal-{{ $p->id_data_perusahaan }}" tabindex="-1" aria-labelledby="editModalLabel-{{ $p->id_data_perusahaan }}" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editModalLabel-{{ $p->id_data_perusahaan }}">Edit Perusahaan</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- Form for edit -->
                        <form action="{{ route('perusahaan.update', $p->id_data_perusahaan) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama Perusahaan</label>
                                <input type="text" class="form-control" id="nama" name="nama" value="{{ $p->nama }}">
                            </div>
                            <div class="mb-3">
                                <label for="bidang_usaha" class="form-label">Bidang Usaha</label>
                                <input type="text" class="form-control" id="bidang_usaha" name="bidang_usaha" value="{{ $p->bidang_usaha }}">
                            </div>
                            <div class="mb-3">
                                <label for="no_telepon" class="form-label">No Telepon</label>
                                <input type="text" class="form-control" id="no_telepon" name="no_telepon" value="{{ $p->no_telepon }}">
                            </div>
                            <div class="mb-3">
                                <label for="alamat" class="form-label">Alamat</label>
                                <textarea class="form-control" id="alamat" name="alamat">{{ $p->alamat }}</textarea>
                            </div>
                            <div class="mb-3">
                                <label for="status" class="form-label">Status</label>
                                <select class="form-select" id="status" name="status">
                                    <option value="Aktif" {{ $p->status === 'Aktif' ? 'selected' : '' }}>Aktif</option>
                                    <option value="Tidak Aktif" {{ $p->status === 'Tidak Aktif' ? 'selected' : '' }}>Tidak Aktif</option>
                                </select>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </tbody>
</table>

<div class="d-flex justify-content-left">
    {{ $perusahaan->links('vendor.pagination.bootstrap-5') }}
  </div>

</div>

<!-- Modal for add -->
<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addModalLabel">Tambah Perusahaan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Form for add -->
                <form action="{{ route('perusahaan.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama Perusahaan</label>
                        <input type="text" class="form-control" id="nama" name="nama" required>
                    </div>
                    <div class="mb-3">
                        <label for="bidang_usaha" class="form-label">Bidang Usaha</label>
                        <input type="text" class="form-control" id="bidang_usaha" name="bidang_usaha" required>
                    </div>
                    <div class="mb-3">
                        <label for="no_telepon" class="form-label">No Telepon</label>
                        <input type="text" class="form-control" id="no_telepon" name="no_telepon" required>
                    </div>
                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat</label>
                        <input class="form-control" id="alamat" name="alamat" required>
                    </div>
                    <div class="mb-3">
                        <label for="username" class="form-label">email</label>
                        <input class="form-control" id="username" name="username" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">password</label>
                        <input class="form-control" type="password"  id="password" name="password" required>
                    </div>
                    {{-- <div class="mb-3">
                        <label for="alamat" class="form-label"></label>
                        <textarea class="form-control" id="alamat" name="alamat" required></textarea>
                    </div> --}}

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Add Data</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
