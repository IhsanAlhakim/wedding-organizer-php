<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title><?= $title ?></title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="<?= base_url('assets/admin/') ?>vendors/feather/feather.css">
  <link rel="stylesheet" href="<?= base_url('assets/admin/') ?>vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="<?= base_url('assets/admin/') ?>vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="<?= base_url('assets/admin/') ?>vendors/datatables.net-bs4/dataTables.bootstrap4.css">
  <link rel="stylesheet" href="<?= base_url('assets/admin/') ?>vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" type="text/css" href="<?= base_url('assets/admin/') ?>js/select.dataTables.min.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="<?= base_url('assets/admin/') ?>css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="<?= base_url('assets/admin/') ?>images/favicon.png" />

  <!-- include summernote css/js -->
  <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
</head>

<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand brand-logo mr-5" href="<?= base_url('admin/Dashboard'); ?>">
          <h4 class="text-primary fw-bold mb-0">Wedding<span class="text-dark">JeWePe</span> </h4>
        </a>
        <a class="navbar-brand brand-logo-mini" href="index.html">
          <h5 class="text-primary fw-bold mb-0">W<span class="text-dark">JWP</span> </h5>
        </a>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
          <span class="icon-menu"></span>
        </button>
        <ul class="navbar-nav navbar-nav-right">
          <li class="nav-item nav-profile dropdown">
            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
              <img src="<?= base_url('assets/admin/') ?>images/faces/face28.jpg" alt="profile" />
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
              <a href="<?= base_url('admin/Settings'); ?>" class="dropdown-item">
                <i class="ti-settings text-primary"></i>
                Settings
              </a>
              <a href="<?= base_url('Login/logout'); ?>" class="dropdown-item">
                <i class="ti-power-off text-primary"></i>
                Logout
              </a>
            </div>
          </li>
        </ul>

      </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_settings-panel.html -->
      <!-- partial -->
      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url('admin/Dashboard'); ?>">
              <i class="icon-grid menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url('admin/Katalog'); ?>">
              <i class="icon-paper menu-icon"></i>
              <span class="menu-title">Manajemen Katalog</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url('admin/Pesanan'); ?>">
              <i class="icon-paper menu-icon"></i>
              <span class="menu-title">Manajemen Pesanan</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url('admin/Laporan'); ?>">
              <i class="icon-bar-graph menu-icon"></i>
              <span class="menu-title">Manajemen Laporan</span>
            </a>
          </li>
        </ul>
      </nav>
      <!-- partial -->
      <div class="main-panel">

        <!-- Menampilkan halaman yang bukan template -->
        <?php $this->load->view($page); ?>

        <!-- partial:partials/_footer.html -->
        <footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © <?= date('Y') ?>.
              <?= $settings->website_name ?>.
              All rights reserved.</span>
          </div>
        </footer>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  <!-- plugins:js -->
  <script src="<?= base_url('assets/admin/') ?>vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="<?= base_url('assets/admin/') ?>vendors/chart.js/Chart.min.js"></script>
  <script src="<?= base_url('assets/admin/') ?>vendors/datatables.net/jquery.dataTables.js"></script>
  <script src="<?= base_url('assets/admin/') ?>vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
  <script src="<?= base_url('assets/admin/') ?>js/dataTables.select.min.js"></script>

  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="<?= base_url('assets/admin/') ?>js/off-canvas.js"></script>
  <script src="<?= base_url('assets/admin/') ?>js/hoverable-collapse.js"></script>
  <script src="<?= base_url('assets/admin/') ?>js/template.js"></script>
  <script src="<?= base_url('assets/admin/') ?>js/settings.js"></script>
  <script src="<?= base_url('assets/admin/') ?>js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="<?= base_url('assets/admin/') ?>js/dashboard.js"></script>
  <script src="<?= base_url('assets/admin/') ?>js/Chart.roundedBarCharts.js"></script>
  <!-- End custom js for this page-->

  <!-- Menambahkan Text Editor WYSIWYG summernote -->
  <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
  <script>
    $('#editor').summernote({
      height: 200,
      toolbar: [
        // [groupName, [list of button]]
        ['style', ['bold', 'italic', 'underline', 'clear']],
        ['font', ['strikethrough', 'superscript', 'subscript']],
        ['fontname', ['fontname']],
        ['fontsize', ['fontsize']],
        ['color', ['color']],
        ['para', ['ul', 'ol', 'paragraph']],
        ['height', ['height']]
      ]
    });
  </script>
</body>

</html>