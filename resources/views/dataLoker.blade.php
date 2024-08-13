@extends('layout.main')

@section('content')
<h4 class="card-title">Data Loker</h4>

<div class="container mt-4">
    <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#addJobModal">Tambah Data Loker</button>
    
    <table class="table table-light table-striped table-bordered">
        <thead>
            <tr>
                <th>Posisi</th>
                <th>Waktu Publikasi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <!-- Contoh data, nanti bisa diganti dengan data dari database -->
            <tr>
                <td>Developer</td>
                <td>2024-08-01</td>
                <td>
                    <button class="btn btn-primary">Detail</button>
                    <button class="btn btn-warning">Edit</button>
                    <button class="btn btn-danger">Hapus</button>
                </td>
            </tr>
        </tbody>
    </table>
</div>

<!-- Modal -->
<div class="modal fade" id="addJobModal" tabindex="-1" aria-labelledby="addJobModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addJobModalLabel">Tambah Info Loker</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3 col-md-15">
                        <label for="jabatan_pekerjaan" class="form-label">Jabatan Pekerjaan</label>
                        <input class="form-control" type="text" id="jabatan_pekerjaan" name="jabatan_pekerjaan" placeholder="Jabatan pekerjaan" autofocus />
                    </div>
                    <div class="mb-3 col-md-12">
                        <label for="jenis_waktu_pekerjaan" class="form-label">Jenis Waktu Pekerjaan</label>
                        <select class="form-control" id="jenis_waktu_pekerjaan" name="jenis_waktu_pekerjaan">
                            <option value="">Pilih Jenis Waktu Pekerjaan</option>
                            <option value="fulltime">Waktu Kerja Standar (Full-Time)</option>
                            <option value="parttime">Waktu Kerja Paruh Waktu (Part-Time)</option>
                            <option value="flexible-hours">Waktu Kerja Fleksibel (Flexible Hours)</option>
                            <option value="shift-work">Shift Kerja (Shift Work)</option>
                            <option value="rotating-shift">Waktu Kerja Bergilir (Rotating Shift)</option>
                            <option value="remote-work">Waktu Kerja Jarak Jauh (Remote Work)</option>
                            <option value="contract-work">Waktu Kerja Kontrak (Contract Work)</option>
                            <option value="project-basedwork">Waktu Kerja Proyek (Project-Based Work)</option>
                            <option value="irreguler-hours">Waktu Kerja Tidak Teratur (Irregular Hours)</option>
                            <option value="temporary-work">Waktu Kerja Sementara (Temporary Work)</option>
                            <!-- Add other options as necessary -->
                        </select>
                    </div>
                    <div class="mb-3 col-md-12">
                        <label for="alamat_lengkap" class="form-label">Alamat Lengkap</label>
                        <input type="text" class="form-control" id="alamat_lengkap" name="alamat_lengkap" placeholder="Alamat Lengkap" />
                    </div>
                    <div class="mb-3 col-md-12">
                        <label for="provinsi" class="form-label">Provinsi</label>
                        <input type="text" class="form-control" id="provinsi" name="provinsi" placeholder="Masukan Provinsi" />
                        {{-- <select class="form-control" id="provinsi" name="provinsi">
                            <option value="">Pilih Provinsi</option>
                            <!-- Add all provinces in Indonesia here -->
                        </select> --}}
                    </div>
                    <div class="mb-3 col-md-12">
                        <label for="kota" class="form-label">Kota/Kabupaten</label>
                        <input type="text" class="form-control" id="kota" name="kota" placeholder="Masukan Kota/Kabupaten" />
                        {{-- <select class="form-control" id="kota" name="kota" disabled>
                            <option value="">Pilih Kota/Kabupaten</option>
                            <!-- Options will be populated dynamically based on selected province -->
                        </select> --}}
                    </div>
                    <div class="mb-3 col-md-12">
                        <label for="kecamatan" class="form-label">Kecamatan</label>
                        <input type="text" class="form-control" id="kecamatan" name="kecamatan" placeholder="Masukan Kecamatan" />
                        {{-- <select class="form-control" id="kecamatan" name="kecamatan" disabled>
                            <option value="">Pilih Kecamatan</option>
                            <!-- Options will be populated dynamically based on selected kota/kabupaten -->
                        </select> --}}
                    </div>
                    <div class="mb-3 col-md-12">
                        <label for="kelurahan" class="form-label">Kelurahan</label>
                        <input type="text" class="form-control" id="kelurahan" name="kelurahan" placeholder="Masukan Kelurahan" />
                        {{-- <select class="form-control" id="kelurahan" name="kelurahan" disabled>
                            <option value="">Pilih Kelurahan</option>
                            <!-- Options will be populated dynamically based on selected kecamatan -->
                        </select> --}}
                    </div>
                    <div class="mb-3 col-md-12">
                        <label for="deskripsi" class="form-label">Deskripsi</label>
                        <textarea class="form-control" id="deskripsi" name="deskripsi" placeholder="Deskripsi"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Tambah</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
