@extends('layout.main')

@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Saya</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 80%;
            margin: auto;
            overflow: hidden;
        }
        .profile-header {
            text-align: center;
            padding: 20px;
            background: #333;
            color: #fff;
        }
        .profile-header img {
            border-radius: 50%;
            width: 150px;
            height: 150px;
        }
        .profile-header h1 {
            margin: 0;
            padding: 10px;
        }
        .profile-header p {
            margin: 0;
            padding: 10px;
            font-size: 1.2em;
        }
        .profile-content {
            display: flex;
            flex-wrap: wrap;
            padding: 20px;
        }
        .profile-content .section {
            flex: 1;
            padding: 20px;
            margin: 10px;
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        .section h2 {
            text-align: center;
            color: #333;
        }
        .section ul {
            list-style: none;
            padding: 0;
        }
        .section ul li {
            padding: 10px 0;
            position: relative;
        }
        .section ul li i {
            margin-right: 10px;
            color: #333;
        }
        .section ul li .edit-btn {
            position: absolute;
            right: 10px;
            cursor: pointer;
            color: #007BFF;
        }
        .section ul li input {
            border: none;
            background: #f4f4f4;
            width: calc(100% - 40px);
            display: none;
        }
    </style>
</head>
<body>
    <div class="profile-header">
        <img src="foto_profil.jpg" alt="Foto Profil">
        <h1 id="namaLengkap">Nama Lengkap <i class="fas fa-edit edit-btn" onclick="editField('namaLengkap')"></i></h1>
        <p id="email"><i class="fas fa-envelope"></i> email@example.com <i class="fas fa-edit edit-btn" onclick="editField('email')"></i></p>
        <p id="tempatBekerja"><i class="fas fa-briefcase"></i> Tempat Bekerja <i class="fas fa-edit edit-btn" onclick="editField('tempatBekerja')"></i></p>
        <p id="tempatKuliah"><i class="fas fa-university"></i> Tempat Kuliah <i class="fas fa-edit edit-btn" onclick="editField('tempatKuliah')"></i></p>
    </div>

    <div class="container">
        <div class="profile-content">
            <div class="section">
                <h2><i class="fas fa-graduation-cap"></i> Riwayat Pendidikan</h2>
                <ul>
                    <li id="pendidikan1"><i class="fas fa-school"></i> Nama Sekolah - Tahun <i class="fas fa-edit edit-btn" onclick="editField('pendidikan1')"></i></li>
                    <li id="pendidikan2"><i class="fas fa-university"></i> Nama Universitas - Tahun <i class="fas fa-edit edit-btn" onclick="editField('pendidikan2')"></i></li>
                </ul>
            </div>

            <div class="section">
                <h2><i class="fas fa-briefcase"></i> Pengalaman Kerja</h2>
                <ul>
                    <li id="kerja1"><i class="fas fa-building"></i> Nama Perusahaan - Posisi - Tahun <i class="fas fa-edit edit-btn" onclick="editField('kerja1')"></i></li>
                    <li id="kerja2"><i class="fas fa-building"></i> Nama Perusahaan - Posisi - Tahun <i class="fas fa-edit edit-btn" onclick="editField('kerja2')"></i></li>
                </ul>
            </div>

            <div class="section">
                <h2><i class="fas fa-tools"></i> Keahlian</h2>
                <ul>
                    <li id="keahlian1"><i class="fas fa-code"></i> Keahlian 1 <i class="fas fa-edit edit-btn" onclick="editField('keahlian1')"></i></li>
                    <li id="keahlian2"><i class="fas fa-database"></i> Keahlian 2 <i class="fas fa-edit edit-btn" onclick="editField('keahlian2')"></i></li>
                    <li id="keahlian3"><i class="fas fa-network-wired"></i> Keahlian 3 <i class="fas fa-edit edit-btn" onclick="editField('keahlian3')"></i></li>
                </ul>
            </div>
        </div>
    </div>

    <script>
        function editField(id) {
            var element = document.getElementById(id);
            var input = document.createElement('input');
            input.type = 'text';
            input.value = element.innerText;
            input.onblur = function() {
                element.innerText = this.value;
                element.appendChild(editIcon);
            };
            element.innerText = '';
            element.appendChild(input);
            input.focus();
            var editIcon = document.createElement('i');
            editIcon.className = 'fas fa-edit edit-btn';
            editIcon.onclick = function() { editField(id); };
            element.appendChild(editIcon);
        }
    </script>
</body>
</html>


@endsection

