@extends('layout.main')

@section('content')

<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@mdi/font/css/materialdesignicons.min.css">
</head>

    <body>
        <div class="main-panel">
            <div class="content-wrapper">
                <!-- Dashboard Header -->
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h2 class="font-weight-bold">Dashboard Admin</h2>
                </div>

                <!-- Dashboard Cards -->
                <div class="row">
                    <div class="col-md-6">
                        <div class="card text-center">
                            <div class="card-body">
                                <i class="mdi mdi-account-multiple-outline card-icon text-primary mb-2"></i>
                                <h5 class="card-title">Alumni Yang Bekerja</h5>
                                <p></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card text-center">
                            <div class="card-body">
                                <i class="mdi mdi-briefcase-outline card-icon text-primary mb-2"></i>
                                <h5 class="card-title">Alumni Yang Belum Bekerja</h5>
                                <p></p>
                            </div>
                        </div>
                    </div>

                <!-- Graph Section -->
                <div class="card mt-4">
                    <div class="card-body">
                        <h5 class="card-title">Semua Pengguna Yang Baru Bergabung di Tahun 2024</h5>
                        <div class="chart-container">
                            <canvas id="chartContainer"></canvas>
                        </div>
                    </div>
                </div>

                <div class="row mt-4">
                    <div class="col-md-4">
                        <div class="card shortcut-card bg-success text-white">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h5>Alumni</h5>
                                    <p>{{$jumlahAlumni}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card shortcut-card bg-warning text-white">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h5>Perusahaan</h5>
                                    <p>{{$jumlahPerusahaan}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card shortcut-card bg-danger text-white">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h5>Semua User</h5>
                                    <p>{{$jumlahUsers}}</p>
                                </div>
                            </div>
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
