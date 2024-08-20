@extends('layout.main')

@section('content')

<h4 class="card-title">Akun Pengguna</h4>

<div class="container mt-5">
<table class="table table-striped nowrap" id="lokerTable">
    <thead>
        <tr>
            <th>Username</th>
            <th>Role</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($users as $us)
        <tr>
            <td>{{ $us->username }}</td>
            <td>{{ $us->role }}</td>
            <td>
                <!-- Button to trigger the modal -->
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#aktivitasPenggunaModal{{ $us->id }}">
                    Pemantauan
                </button>

                <!-- Modal -->
                <div class="modal fade" id="aktivitasPenggunaModal{{ $us->id }}" tabindex="-1" aria-labelledby="aktivitasPenggunaModalLabel{{ $us->id }}" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="aktivitasPenggunaModalLabel{{ $us->id }}">Aktivitas Pengguna: {{ $us->username }}</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th scope="col">Waktu</th>
                                                <th scope="col">Keterangan</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <!-- Contoh baris aktivitas, ganti dengan data aktual -->
                                            <tr>
                                                <td>2024-08-20 14:30</td>
                                                <td>Pengguna login ke sistem.</td>
                                            </tr>
                                            <tr>
                                                <td>2024-08-20 14:45</td>
                                                <td>Pengguna mengubah data profil.</td>
                                            </tr>
                                            <!-- Tambahkan baris aktivitas lain di sini -->
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
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
    {{ $users->links('vendor.pagination.bootstrap-5') }}
  </div>

</div>

@endsection
