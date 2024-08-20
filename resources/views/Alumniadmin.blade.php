@extends('layout.main')

@section ('js')
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

@endsection

@section('content')



<div class="col-lg-12 grid-margin stretch-card">
    <div class="card-body">
        <h4 class="card-title">Data Alumni</h4>
        <div class="search-container">
            <input type="text" id="search-input" placeholder="Cari Nama, NIK">
            <button type="submit" id="search-button"><i class="mdi mdi-account-search"></i></button>
        <div class="category-container">
          <select id="jurusan-select">
              <option value="">Pilih Jurusan</option>
              <option value="RPL">RPL</option>
              <option value="AKL">AK</option>
              <!-- Tambahkan opsi lainnya sesuai kebutuhan -->
          </select>

          <select id="tahun-select">
              <option value="">Pilih Tahun Lulusan</option>
              <option value="2020">2022</option>
              <option value="2021">2023</option>
              <option value="2022">2024</option>
              <option value="2023">2025</option>
              <!-- Tambahkan opsi lainnya sesuai kebutuhan -->
          </select>

          <button id="search-button">Cari</button>

    </div>
</div>

@if ($message = session('alert'))
    <div class="alert alert-{{ session('alert_type') }}">
        {{ $message }}
    </div>
@endif

<form action="{{ route('import') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="file">Choose Excel File</label>
        <input type="file" name="file" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-primary">Upload</button>
</form>


<div class="table-responsive pt-3">
  <table class="table table-light table-striped table-bordered" id="alumniTable">
    <thead>
          <tr>
              <th>NIK</th>
              <th>Nama Lengkap</th>
              <th>Jurusan</th>
              <th>Tahun Lulus</th>
              <th>Aksi</th>
          </tr>
    </thead>
    <tbody id="alumni-table">
        @foreach ($alumni as $all)
            <tr>
                <td class="py-1">
                  {{$all->nik}}
                </td>
                <td>
                  {{$all->nama}}
                </td>
                <td>
                  {{$all->jurusan}}
                </td>
                <td>
                  {{$all->tahun_lulus}}
                </td>
                <td>
                  <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal-{{ $all->nik }}">Detail</button>
                    <div class="modal fade" id="exampleModal-{{ $all->nik }}" tabindex="-1" aria-labelledby="exampleModalLabel-{{ $all->nik }}" aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel-{{ $all->nik}}">Detail Alumni</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <!-- Modal body content here -->
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-4 d-flex justify-content-center">
                                            <!-- Avatar image -->
                                            <img src="{{ $all->foto }}" class="img-fluid rounded-circle" alt="Avatar" style="width: 150px; height: 150px;">
                                        </div>
                                        <div class="col-md-8">
                                            <div class="card mb-3">
                                                <div class="card-body">
                                                    <h6 class="card-title">Informasi Alumni</h6>
                                                    <ul class="list-unstyled">
                                                        <li><strong>NIK:</strong> {{ $all->nik }}</li>
                                                        <li><strong>Nama:</strong> {{ $all->nama }}</li>
                                                        <li><strong>Jurusan:</strong> {{ $all->jurusan }}</li>
                                                        <li><strong>Tahun Lulus:</strong> {{ $all->tahun_lulus }}</li>
                                                        <li><strong>Foto:</strong> {{ $all->avatar }}</li>
                                                    </ul>
                                                </div>
                                            </div>

                                            <div class="accordion" id="accordionExample-{{ $all->nik }}">
                                                <!-- Accordion items can be added here -->
                                                <div class="accordion-item">
                                                    <h2 class="accordion-header" id="headingOne-{{ $all->nik }}">
                                                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne-{{ $all->nik }}" aria-expanded="true" aria-controls="collapseOne-{{ $all->nik }}">
                                                            Additional Information
                                                        </button>
                                                    </h2>
                                                    <div id="collapseOne-{{ $all->nik}}" class="accordion-collapse collapse show" aria-labelledby="headingOne-{{ $all->nik }}" data-bs-parent="#accordionExample-{{ $all->nik }}">
                                                        <div class="accordion-body">
                                                            <!-- Add additional information here -->
                                                            {{ $all->deskripsi }}
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- You can add more accordion items here if needed -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                    <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editModal-{{ $all->nik }}">Edit</button>
                    <div class="modal fade" id="editModal-{{ $all->nik }}" tabindex="-1" aria-labelledby="editModalLabel-{{ $all->nik }}" aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="editModalLabel-{{ $all->nik }}">Edit Alumni</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                        <div class="modal-body">
                            <form action="{{ route('alumni.update', $all->nik) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-4 d-flex justify-content-center">
                                            <!-- Avatar image -->
                                            <img src="{{ $all->foto }}" class="img-fluid rounded-circle mb-3" alt="Avatar" style="width: 150px; height: 150px;">
                                            <div class="mb-3">
                                                <label for="avatar" class="form-label">Update Avatar</label>
                                                <input class="form-control" type="file" id="avatar" name="avatar">
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="card mb-3">
                                                <div class="card-body">
                                                    <h6 class="card-title">Informasi Alumni</h6>
                                                    <div class="mb-3">
                                                        <label for="nik" class="form-label">NIK</label>
                                                        <input type="text" class="form-control" id="nik" name="nik" value="{{ $all->nik }}">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="nama" class="form-label">Nama</label>
                                                        <input type="text" class="form-control" id="nama" name="nama" value="{{ $all->nama }}">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="jurusan" class="form-label">Jurusan</label>
                                                        <input type="text" class="form-control" id="jurusan" name="jurusan" value="{{ $all->jurusan }}">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="tahun_lulus" class="form-label">Tahun Lulus</label>
                                                        <input type="text" class="form-control" id="tahun_lulus" name="tahun_lulus" value="{{ $all->tahun_lulus }}">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="accordion" id="accordionExample-{{ $all->nik }}">
                                                <div class="accordion-item">
                                                    <h2 class="accordion-header" id="headingOne-{{ $all->nik }}">
                                                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne-{{ $all->nik }}" aria-expanded="true" aria-controls="collapseOne-{{ $all->nik }}">
                                                            Additional Information
                                                        </button>
                                                    </h2>
                                                    <div id="collapseOne-{{ $all->nik }}" class="accordion-collapse collapse show" aria-labelledby="headingOne-{{ $all->nik }}" data-bs-parent="#accordionExample-{{ $all->nik }}">
                                                        <div class="accordion-body">
                                                            <!-- Add additional information fields here -->
                                                            <div class="mb-3">
                                                                <label for="additional_info" class="form-label">Additional Information</label>
                                                                <textarea class="form-control" id="additional_info" name="additional_info">{{ $all->deskripsi }}</textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- You can add more accordion items here if needed -->
                                            </div>
                                        </div>
                                    </div>
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

<div class="d-flex justify-content-left">
  {{ $alumni->links('vendor.pagination.bootstrap-5') }}
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const searchInput = document.getElementById('search-input');
        const searchButton = document.getElementById('search-button');
        const table = document.getElementById('alumni-table');
        const rows = table.getElementsByTagName('tr');
        const jurusanSelect = document.getElementById('jurusan-select');
        const tahunSelect = document.getElementById('tahun-select');

        function performSearch() {
            const searchTerm = searchInput.value.toLowerCase();
            const selectedJurusan = jurusanSelect.value.toLowerCase();
            const selectedTahun = tahunSelect.value.toLowerCase();

            for (let i = 0; i < rows.length; i++) {
                const nisCell = rows[i].getElementsByTagName('td')[0];
                const nameCell = rows[i].getElementsByTagName('td')[1];
                const jurusanCell = rows[i].getElementsByTagName('td')[2];
                const tahunCell = rows[i].getElementsByTagName('td')[3];

                if (nisCell && nameCell && jurusanCell && tahunCell) {
                    const nis = nisCell.textContent.toLowerCase();
                    const name = nameCell.textContent.toLowerCase();
                    const jurusan = jurusanCell.textContent.toLowerCase();
                    const tahun = tahunCell.textContent.toLowerCase();

                    const matchesSearch = nis.includes(searchTerm) || name.includes(searchTerm);
                    const matchesJurusan = selectedJurusan === "" || jurusan.includes(selectedJurusan);
                    const matchesTahun = selectedTahun === "" || tahun.includes(selectedTahun);

                    if (matchesSearch && matchesJurusan && matchesTahun) {
                        rows[i].style.display = '';
                    } else {
                        rows[i].style.display = 'none';
                    }
                }
            }
        }

        searchInput.addEventListener('keyup', performSearch);
        searchButton.addEventListener('click', function(e) {
            e.preventDefault();
            performSearch();
        });
        jurusanSelect.addEventListener('change', performSearch);
        tahunSelect.addEventListener('change', performSearch);
    });
</script>

@endsection
