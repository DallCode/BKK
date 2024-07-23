<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Karier Sebelas</title>
  <!-- plugins:css -->  
  <link rel="stylesheet" href="{{ asset('assets/template/vendors/feather/feather.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/template/vendors/mdi/css/materialdesignicons.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/template/vendors/ti-icons/css/themify-icons.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/template/vendors/typicons/typicons.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/template/vendors/simple-line-icons/css/simple-line-icons.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/template/vendors/css/vendor.bundle.base.css') }}">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="{{asset ('assets/template/css/vertical-layout-light/style.css')}}">
  <!-- endinject -->
  <link rel="shortcut icon" href="{{asset ('assets/template/images/lowgo.png')}}" />   
</head>

<body>
  <div class="container-scroller">
    <!-- partial:../../partials/_navbar.html -->
    @include('partial.navbar')
    
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:../../partials/_settings-panel.html -->
     
      
      <!-- partial -->
      <!-- partial:../../partials/_sidebar.html -->
     @include('partial.sidebar')
      <!-- partial -->
      <div class="main-panel">  

           @yield('content')
            
        <!-- content-wrapper ends -->
        <!-- partial:../../partials/_footer.html -->
        <div>
            <footer class="footer ">
              <div class="d-sm-flex justify-content-center justify-content-sm-between">
                <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Premium <a href="https://www.bootstrapdash.com/" target="_blank">Bootstrap admin template</a> from BootstrapDash.</span>
                <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Copyright © 2021. All rights reserved.</span>
              </div>
            </footer>
        </div>
        <!-- partial -->
      </div>  
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="{{ asset('assets/template/vendors/js/vendor.bundle.base.js')}}"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="{{ asset('assets/template/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js')}}"></script>
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="{{ asset('assets/template/js/off-canvas.js')}}"></script>
  <script src="{{ asset('assets/template/js/hoverable-collapse.js')}}"></script>
  <script src="{{ asset('assets/template/js/template.js')}}"></script>
  <script src="{{ asset('assets/template/js/settings.js')}}"></script>
  <script src="{{ asset('assets/template/js/todolist.js')}}"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <!-- End custom js for this page-->
</body>

</html>
