<head>
  <meta charset="utf-8" />
  <meta name="viewport"
    content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

  <title>DBT Database System-ระบบฐานข้อมูลครุภัณฑ์</title>

  <meta name="description" content="" />

  <!-- Favicon -->
  <link rel="icon" type="image/x-icon" href="/eq/public/images/logo.png" />

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link
    href="https://fonts.googleapis.com/css2?family=Sarabun:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800&display=swap"
    rel="stylesheet">


  <!-- Icons. Uncomment required icon fonts -->
  <link href="/eq/public/assets/vendor/fonts/boxicons.css" rel="stylesheet" type="text/css" />

  <!-- Core CSS -->
  <link rel="stylesheet" href="/eq/public/assets/vendor/css/core.css" class="template-customizer-core-css" />
  <link rel="stylesheet" href="/eq/public/assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
  <link href="/eq/public/assets/css/demo.css" rel="stylesheet" type="text/css" />

  <!-- Vendors CSS -->
  <link rel="stylesheet" href="/eq/public/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

  <link rel="stylesheet" href="/eq/public/assets/vendor/libs/apex-charts/apex-charts.css" />

  <!-- Page CSS -->

  <!-- Helpers -->
  <script src="/eq/public/assets/vendor/js/helpers.js"></script>

  <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
  <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
  <script src="/eq/public/assets/js/config.js"></script>

  <?php
  session_start();
  $status = $_SESSION['status'];

  if ($status != 982) {


    header('Location: /eq/public/login.php');

  }

  ?>







</head>