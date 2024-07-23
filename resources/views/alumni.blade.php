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
              <th>
                <a href="https://www.instagram.com/afdhaallll_/"><p class="mdi mdi-instagram">Afdhaallll_</p></a>
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
              <th>
                <a href="https://www.instagram.com/davaa.ardiansyah/"><p class="mdi mdi-instagram">davaa.ardiasnyah</p></a>
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
              <th>
                <a href="https://www.instagram.com/juliuuss_69/"><p class="mdi mdi-instagram">juliuuss_69</p></a>
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
              <th>
                <a href="https://www.instagram.com/rsydathaaa//"><p class="mdi mdi-instagram">rsydathaaa</p></a>
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
              <th>
                <a href="https://www.instagram.com/fhalllllllllll/"><p class="mdi mdi-instagram">fhalllllllllll</p></a>
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
              <th>
                <a href="https://www.instagram.com/_syffaa.bilaa/"><p class="mdi mdi-instagram">_syffaa.bilaa</p></a>
              </th>
            </tr>
                      
           
          </tbody>
        </table>
      </div>
    </div>
</div>

@endsection