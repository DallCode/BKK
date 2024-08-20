@extends('layout.main')

@section('content')

@if(session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

<h4 class="card-title">Data Loker</h4>

<div class="container mt-4">


    <table class="table table-striped nowrap" id="lokerTable">
        <thead>
            <tr>
                <th>Jabatan</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($loker as $lowongan)
            <tr data-status="{{ $lowongan->status }}">
                <td>{{ $lowongan->jabatan }}</td>
                <td>{{ $lowongan->status }}</td>
                <td>
                    <!-- Button to Open the Modal -->
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#detailModal{{ $lowongan->id_lowongan_pekerjaan }}">
                        Lihat Detail
                    </button>

                    <!-- The Modal -->
                    <div class="modal fade" id="detailModal{{ $lowongan->id_lowongan_pekerjaan }}" tabindex="-1" aria-labelledby="detailModalLabel{{ $lowongan->id_lowongan_pekerjaan }}" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="detailModalLabel{{ $lowongan->id_lowongan_pekerjaan }}">Detail Lowongan: {{ $lowongan->jabatan }}</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <p><strong>Jabatan:</strong> {{ $lowongan->jabatan }}</p>
                                    <p><strong>Jenis Waktu Pekerjaan:</strong> {{ $lowongan->jenis_waktu_pekerjaan }}</p>
                                    <p><strong>Deskripsi:</strong> {{ $lowongan->deskripsi }}</p>
                                    <p><strong>Tanggal Akhir:</strong> {{ $lowongan->tanggal_akhir }}</p>
                                    <p><strong>Status:</strong> {{ $lowongan->status }}</p>

                                    <!-- Dropdown to change status -->
                                    <form action="{{ route('update.status', $lowongan->id_lowongan_pekerjaan) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <div class="mb-3">
                                            <label for="status{{ $lowongan->id_lowongan_pekerjaan }}" class="form-label"><strong>Ubah Status:</strong></label>
                                            <select class="form-select" id="status{{ $lowongan->id_lowongan_pekerjaan }}" name="status">
                                                <option value="Dipublikasi" {{ $lowongan->status == 'Dipublikasi' ? 'selected' : '' }}>Dipublikasi</option>
                                                <option value="Tidak Dipublikasi" {{ $lowongan->status == 'Tidak Dipublikasi' ? 'selected' : '' }}>Tidak Dipublikasi</option>
                                            </select>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-success">Simpan Perubahan</button>
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="d-flex justify-content-left">
        {{ $loker->links('vendor.pagination.bootstrap-5') }}
      </div>

</div>

@endsection

