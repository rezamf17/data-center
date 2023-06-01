<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Dashboard</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url('plugins/fontawesome-free/css/all.min.css'); ?>">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="<?php echo base_url('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css'); ?>">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo base_url('plugins/icheck-bootstrap/icheck-bootstrap.min.css'); ?>">
  <!-- JQVMap -->
  <link rel="stylesheet" href="<?php echo base_url('plugins/jqvmap/jqvmap.min.css'); ?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url('dist/css/adminlte.min.css'); ?>">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?php echo base_url('plugins/overlayScrollbars/css/OverlayScrollbars.min.css'); ?>">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?php echo base_url('plugins/daterangepicker/daterangepicker.css'); ?>">
  <!-- summernote -->
  <link rel="stylesheet" href="<?php echo base_url('plugins/summernote/summernote-bs4.min.css'); ?>">
  <link href="<?php echo base_url('tailwind/output.css'); ?>" rel="stylesheet">
    <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo base_url('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css'); ?>">
  <link rel="stylesheet" href="<?php echo base_url('plugins/datatables-responsive/css/responsive.bootstrap4.min.css'); ?>">
  <link rel="stylesheet" href="<?php echo base_url('plugins/datatables-buttons/css/buttons.bootstrap4.min.css'); ?>">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="<?php echo base_url('dist/img/AdminLTELogo.png'); ?>" alt="AdminLTELogo" height="60" width="60">
  </div>

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item dropdown">
          <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
          <?php echo session()->get('name'); ?>
          </a>

          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="#"
            onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">
            <!-- {{ __('Logout') }} -->
            Logout
          </a>

          <form id="logout-form" action="<?php echo base_url(); ?>doLogout" method="POST" class="d-none">
            <!-- <button type="submit">Logout</button> -->
          </form>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/" class="brand-link">
      <img src="<?php echo base_url('dist/img/AdminLTELogo.png'); ?>" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?php echo base_url('dist/img/user-icon.jpg'); ?>" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?php echo session()->get('name'); ?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="<?= base_url('dashboard') ?>" class="nav-link">
              <i class="fas fa-circle nav-icon"></i>
              <p>Dashboard</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url('kelola-data-proyek') ?>" class="nav-link">
              <i class="fas fa-circle nav-icon"></i>
              <p>Kelola Data Proyek</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url('akun-pegawai') ?>" class="nav-link">
              <i class="fas fa-circle nav-icon"></i>
              <p>Kelola Akun Pegawai</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url('register-proyek') ?>" class="nav-link">
              <i class="fas fa-circle nav-icon"></i>
              <p>Register Proyek</p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
