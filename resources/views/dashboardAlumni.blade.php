@extends('layout.main')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lowongan Pekerjaan</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="main-panel">
        <div class="content-wrapper">
            <h2 class="mb-4 text-center" style="color: #333;">Info Lowongan Pekerjaan</h2>
            <div class="row" id="job-listings">
                <!-- Job listings will be dynamically inserted here -->
            </div>
        </div>


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js"></script>
    <script>
        const jobListings = [
            {
                title: "Marketing Manager",
                company: "PT Marriot House",
                location: "Surabaya, Indonesia",
                type: "Fulltime",
                salary: "10,5jt - 13,5jt",
                experience: "2 tahun",
                logo: "https://logo.clearbit.com/marriott.com"
            },
            {
                title: "Software Engineer",
                company: "PT Telkom",
                location: "Bandung, Indonesia",
                type: "Fulltime",
                salary: "6,8jt - 9,8jt",
                experience: "1 tahun",
                logo: "https://logo.clearbit.com/telkom.co.id"
            },
            {
                title: "Software Engineer",
                company: "PT Chlorine",
                location: "Bandung, Indonesia",
                type: "Fulltime",
                salary: "9,8jt - 12,8jt",
                experience: "1,5 tahun",
                logo: "https://logo.clearbit.com/shopee.co.id"
            },
            {
                title: "Marketing Manager",
                company: "PT Alfamart",
                location: "Yogyakarta, Indonesia",
                type: "Fulltime",
                salary: "4,8jt - 7,8jt",
                experience: "5 bulan",
                logo: "https://logo.clearbit.com/alfamart.co.id"
            }
        ];

        function createJobCard(job) {
            return `
                <div class="col-md-6 mb-4">
                    <div class="card job-card h-100 shadow-sm">
                        <div class="card-body">
                            <div class="d-flex align-items-center mb-3">
                                <img src="${job.logo}" alt="${job.company} logo" class="company-logo mr-3">
                                <h5 class="card-title mb-0">${job.title}</h5>
                            </div>
                            <h6 class="company-name">${job.company}</h6>
                            <p class="card-text">
                                <i class="fas fa-map-marker-alt"></i> ${job.location}<br>
                                <i class="fas fa-briefcase"></i> ${job.type}<br>
                                <i class="fas fa-money-bill-wave"></i> ${job.salary}<br>
                                <i class="fas fa-user-clock"></i> Pengalaman ${job.experience}
                            </p>
                            <button class="btn btn-primary apply-btn" data-job="${job.title}" data-company="${job.company}">
                                Lamar Sekarang
                            </button>
                        </div>
                    </div>
                </div>
            `;
        }

        $(document).ready(function() {
            const jobListingsContainer = $('#job-listings');
            jobListings.forEach(job => {
                jobListingsContainer.append(createJobCard(job));
            });

            $('.apply-btn').on('click', function() {
                const jobTitle = $(this).data('job');
                const company = $(this).data('company');
                alert(`Anda akan melamar untuk posisi ${jobTitle} di ${company}. Silakan lanjutkan ke halaman aplikasi.`);
            });
        });
    </script>

    <style>
        .job-card {
            transition: transform 0.3s ease-in-out;
        }
        .job-card:hover {
            transform: translateY(-5px);
        }
        .company-logo {
            width: 50px;
            height: 50px;
            object-fit: contain;
        }
        .company-name {
            color: #666;
            font-size: 0.9rem;
        }
        .apply-btn {
            transition: background-color 0.3s ease;
        }
        .apply-btn:hover {
            background-color: #0056b3;
        }
        .card-text i {
            width: 20px;
            color: #007bff;
            margin-right: 5px;
        }
        .content-wrapper {
            padding: 20px; /* Add padding if needed */
            margin-top: 30px; /* Add margin to push it down */
        }
    </style>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
@endsection
