@extends('layout.main')

@section('content')

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Import Data Alumni</title>

    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .container {
            max-width: 600px;
            margin: 50px auto;
            text-align: center;
        }
        .upload-box {
            border: 2px dashed #007bff;
            padding: 40px;
            background-color: #f0f8ff;
            position: relative;
        }
        .upload-box:hover {
            background-color: #e0f0ff;
        }
        .upload-box p {
            margin: 0;
            font-size: 16px;
            color: #333;
        }
        .upload-box input[type="file"] {
            display: none;
        }
        .upload-box label {
            display: block;
            cursor: pointer;
            color: #007bff;
            text-decoration: underline;
            margin-top: 20px;
        }
        .upload-icon {
            font-size: 50px;
            color: #007bff;
            margin-bottom: 20px;
        }
    </style>
    
</head>
<body>
    @if ($message = Session::get('success'))
            <div class="alert alert-success">
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
    <div class="container">
        <h1>Import Data Alumni</h1>
        <div class="upload-box">
            <div class="upload-icon">⬆️</div>
            <p>Drag & Drop To Upload File</p>
            <p>Or</p>
            <label for="file-upload">Browse File</label>
            <input type="file" id="file-upload">
        </div>
    </div>      
    
       

    </body>
    </html>

@endsection