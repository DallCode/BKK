@extends('layout.main')

@section('content')

<div class="col-lg-12 grid-margin stretch-card">          
    <div class="card-body">
      <h4 class="card-title">Data Alumni</h4>
      <div class="search-container">
        <input type="text" id="search-input" placeholder="Cari Nama, NISN">
        <button type="submit" id="search-button"><i class="mdi mdi-account-search"></i></button>
        <div class="category-container">
          <select id="jurusan-select">
              <option value="">Pilih Jurusan</option>
              <option value="RPL">RPL</option>
              <option value="DKV">DKV</option>
              <option value="MPLB">MPLB</option>
              <option value="AKL">AKL</option>
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
    
    
      <div class="table-responsive pt-3">
        <table class="table table-light table-striped">
          <thead>
            <tr>
              <th>
                NISN
              </th>
              <th>
                Nama Lengkap
              </th>
              <th>
                Jenis Kelamin
              </th>
              <th>
                Jurusan
              </th>
              <th>
                Tahun Lulus
              </th>
              <th>
                Media Sosial
              </th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>
                2206510454
              </td>
              <td>
                Muhammad Afdhal Adzikri
              </td>
              <td>
                Laki-Laki
              </td>
              <td>
                RPL
              </td>
              <th>
                <p class="">2025</p>
              </th>
  
            </tr> 
            <tr>
              <td>
                2206510431
              </td>
              <td>
                Dava Ardiansyah Hidayat
              </td>
              <td>
                Laki-Laki
              </td>
              <td>
                RPL
              </td>
              <th>
                <p class="">2025</p>
              </th>
              
            </tr>
            <tr>
              <td>
                2206510437
              </td>
              <td>
                Gultom Julius
              </td>
              <td>
                Laki-Laki
              </td>
              <td>
                RPL
              </td>
              <th>
                <p class="">2025</p>
              </th>
             
            </tr> 
            <tr>
              <td>
                2206510468
              </td>
              <td>
                Rasyad Atha Zahran
              </td>
              <td>
                Laki-Laki
              </td>
              <td>
                RPL
              </td>
              <th>
                <p class="">2025</p>
              </th>
              
            </tr> 
            <tr>
              <td>
                2206510434
              </td>
              <td>
                Fahal Malik
              </td>
              <td>
                Laki-Laki
              </td>
              <td>
                RPL
              </td>
              <th>
                <p class="">2025</p>
              </th>
              
            </tr>
            <tr>
              <td>
                2206510434
              </td>
              <td>
                Syifa Syabilla
              </td>
              <td>
                Perempuan
              </td>
              <td>
                AKL
              </td>
              <th>
                <p class="">2025</p>
              </th>
              
            </tr>
                      
           
          </tbody>
        </table>
      </div>
    </div>
</div>
    
            {{-- <!-- Footer -->
            <footer class="footer mt-4">
                <div class="d-sm-flex justify-content-center justify-content-sm-between">
                    <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Premium <a href="https://www.bootstrapdash.com/" target="_blank">Bootstrap admin template</a> from BootstrapDash.</span>
                    <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Copyright © 2021. All rights reserved.</span>
                </div>
            </footer>
        </div> --}}
    
        <!-- Bootstrap JS and dependencies -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    </body>
    </html>

@endsection