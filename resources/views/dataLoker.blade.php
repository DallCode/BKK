@extends('layout.main')

@section('content')

    @if(session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

<h4 class="card-title">Data Loker</h4>

<div class="container mt-4">
    <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#addJobModal">Tambah Data Loker</button>

    <table class="table table-light table-striped table-bordered">
        <thead>
            <tr>
                <th>Jabatan</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($loker as $lowongan)
            <tr>
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
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>

                      <!-- Button to Open the Edit Modal -->
        <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editModal{{ $lowongan->id_lowongan_pekerjaan }}">
            Edit
        </button>

        <!-- The Edit Modal -->
        <div class="modal fade" id="editModal{{ $lowongan->id_lowongan_pekerjaan }}" tabindex="-1" aria-labelledby="editModalLabel{{ $lowongan->id_lowongan_pekerjaan }}" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editModalLabel{{ $lowongan->id_lowongan_pekerjaan }}">Edit Lowongan: {{ $lowongan->jabatan }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ route('lowongan.update', $lowongan->id_lowongan_pekerjaan) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="jabatan{{ $lowongan->id_lowongan_pekerjaan }}" class="form-label">Jabatan Pekerjaan</label>
                                <input class="form-control" type="text" id="jabatan{{ $lowongan->id_lowongan_pekerjaan }}" name="jabatan" value="{{ $lowongan->jabatan }}" placeholder="Jabatan pekerjaan" autofocus />
                            </div>
                            <div class="mb-3">
                                <label for="jenis_waktu_pekerjaan{{ $lowongan->id_lowongan_pekerjaan }}" class="form-label">Jenis Waktu Pekerjaan</label>
                                <select class="form-control" id="jenis_waktu_pekerjaan{{ $lowongan->id_lowongan_pekerjaan }}" name="jenis_waktu_pekerjaan">
                                    <option value="">Pilih Jenis Waktu Pekerjaan</option>
                                    <option value="Waktu Kerja Standar (Full-Time)" {{ $lowongan->jenis_waktu_pekerjaan == 'Waktu Kerja Standar (Full-Time)' ? 'selected' : '' }}>Waktu Kerja Standar (Full-Time)</option>
                                    <option value="Waktu Kerja Paruh Waktu (Part-Time)" {{ $lowongan->jenis_waktu_pekerjaan == 'Waktu Kerja Paruh Waktu (Part-Time)' ? 'selected' : '' }}>Waktu Kerja Paruh Waktu (Part-Time)</option>
                                    <option value="Waktu Kerja Fleksibel (Flexible Hours)" {{ $lowongan->jenis_waktu_pekerjaan == 'Waktu Kerja Fleksibel (Flexible Hours)' ? 'selected' : '' }}>Waktu Kerja Fleksibel (Flexible Hours)</option>
                                    <option value="Shift Kerja (Shift Work)" {{ $lowongan->jenis_waktu_pekerjaan == 'Shift Kerja (Shift Work)' ? 'selected' : '' }}>Shift Kerja (Shift Work)</option>
                                    <option value="Waktu Kerja Bergilir (Rotating Shift)" {{ $lowongan->jenis_waktu_pekerjaan == 'Waktu Kerja Bergilir (Rotating Shift)' ? 'selected' : '' }}>Waktu Kerja Bergilir (Rotating Shift)</option>
                                    <option value="Waktu Kerja Jarak Jauh (Remote work)" {{ $lowongan->jenis_waktu_pekerjaan == 'Waktu Kerja Jarak Jauh (Remote work)' ? 'selected' : '' }}>Waktu Kerja Jarak Jauh (Remote work)</option>
                                    <option value="Waktu Kerja Kontrak (Contract Work)" {{ $lowongan->jenis_waktu_pekerjaan == 'Waktu Kerja Kontrak (Contract Work)' ? 'selected' : '' }}>Waktu Kerja Kontrak (Contract Work)</option>
                                    <option value="Waktu Kerja Proyek (Project-Based Work)" {{ $lowongan->jenis_waktu_pekerjaan == 'Waktu Kerja Proyek (Project-Based Work)' ? 'selected' : '' }}>Waktu Kerja Proyek (Project-Based Work)</option>
                                    <option value="Waktu Kerja Tidak Teratur (Irregular Work)" {{ $lowongan->jenis_waktu_pekerjaan == 'Waktu Kerja Tidak Teratur (Irregular Work)' ? 'selected' : '' }}>Waktu Kerja Tidak Teratur (Irregular Work)</option>
                                    <option value="Waktu Kerja Sementara (Temporary Work)" {{ $lowongan->jenis_waktu_pekerjaan == 'Waktu Kerja Sementara (Temporary Work)' ? 'selected' : '' }}>Waktu Kerja Sementara (Temporary Work)</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="tanggal_akhir{{ $lowongan->id_lowongan_pekerjaan }}" class="form-label">Batas Waktu</label>
                                <input type="date" class="form-control" id="tanggal_akhir{{ $lowongan->id_lowongan_pekerjaan }}" name="tanggal_akhir" value="{{ $lowongan->tanggal_akhir }}" placeholder="Batas Waktu" />
                            </div>
                            <div class="mb-3">
                                <label for="deskripsi{{ $lowongan->id_lowongan_pekerjaan }}" class="form-label">Deskripsi</label>
                                <textarea class="form-control" id="deskripsi{{ $lowongan->id }}" name="deskripsi" placeholder="Deskripsi">{{ $lowongan->deskripsi }}</textarea>
                            </div>
                            {{-- <div>Status: {{ $lowongan->status }}</div> --}}
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
                </td>
            </tr>
            @endforeach

        </tbody>
    </table>
</div>

<!-- Modal untuk menambah data loker -->
<div class="modal fade" id="addJobModal" tabindex="-1" aria-labelledby="addJobModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addJobModalLabel">Tambah Data Loker</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('lowongan.store') }}"  method="POST">
                    @csrf
                    <!-- Form input sesuai yang sebelumnya -->
                    <div class="mb-3">
                        <label for="jabatan_pekerjaan" class="form-label" required>Jabatan Pekerjaan</label>
                        <input class="form-control" type="text" id="jabatan_pekerjaan" name="jabatan_pekerjaan" placeholder="Jabatan pekerjaan" autofocus required />
                    </div>
                    <div class="mb-3">
                        <label for="jenis_waktu_pekerjaan" class="form-label">Jenis Waktu Pekerjaan</label>
                        <select class="form-control" id="jenis_waktu_pekerjaan" name="jenis_waktu_pekerjaan" required>
                            <option value="">Pilih Jenis Waktu Pekerjaan</option>
                            <option value="Waktu Kerja Standar (Full-Time)">Waktu Kerja Standar (Full-Time)</option>
                            <option value="Waktu Kerja Paruh Waktu (Part-Time)">Waktu Kerja Paruh Waktu (Part-Time)</option>
                            <option value="Waktu Kerja Fleksibel (Flexible Hours)">Waktu Kerja Fleksibel (Flexible Hours)</option>
                            <option value="Shift Kerja (Shift Work)">Shift Kerja (Shift Work)</option>
                            <option value="Waktu Kerja Bergilir (Rotating Shift)">Waktu Kerja Bergilir (Rotating Shift)</option>
                            <option value="Waktu Kerja Jarak Jarah (Remote work)">Waktu Kerja Jarak Jarah (Remote work)</option>
                            <option value="Waktu Kerja Kontrak (Contract Work)">Waktu Kerja Kontrak (Contract Work)</option>
                            <option value="Waktu Kerja Proyek (Project-Based Work)">Waktu Kerja Proyek (Project-Based Work)</option>
                            <option value="Waktu Kerja Tidak Teratur (Irregular Work)">Waktu Kerja Tidak Teratur (Irregular Work)</option>
                            <option value="Waktu Kerja Sementara (Temporary Work)">Waktu Kerja Sementara (Temporary Work)</option>
                            <!-- Tambahkan opsi lainnya jika diperlukan -->
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="tanggal_akhir" class="form-label">Batas Waktu</label>
                        <input type="date" class="form-control" id="tanggal_akhir" name="tanggal_akhir" placeholder="Batas Waktu" required />
                    </div>

                    <div class="mb-3">
                        <label for="deskripsi" class="form-label">Deskripsi</label>
                        <textarea class="form-control" id="deskripsi" name="deskripsi" placeholder="Deskripsi" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Tambah</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
