<!DOCTYPE html>

<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  @yield('judul')
	
  <!-- Bootstrap Core CSS -->
    <link href="user/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="user/edustage/css/bootstrap.css" />
    <link rel="stylesheet" href="user/edustage/css/style.css" />
    <link href="user/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="user/css/index.css" rel="stylesheet" type="text/css">
    <link href="user/vendor/simple-line-icons/css/simple-line-icons.css" rel="stylesheet">
    <link href="user/css/stylish-portfolio.min.css" rel="stylesheet">
    <link href="user/css/new.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('admin/dist/css/adminlte.min.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@9.17.2/dist/sweetalert2.min.css"/>

</head>
<body id="page-top">
  
    <!-- Navigation -->
    <a class="menu-toggle rounded" href="#">
      <i class="fas fa-bars"></i>
    </a>
    <nav id="sidebar-wrapper">
      <ul class="sidebar-nav">
        <li class="sidebar-brand">
          <a class="js-scroll-trigger" href="/home-user"><h2>POINT OF SALES</h2></a>
        </li>
        {{-- <li class="sidebar-nav-item">
          <a class="js-scroll-trigger" href="/kasir">Kasir</a>
        </li> --}}
        <li class="sidebar-nav-item">
          <a class="js-scroll-trigger" href="/home-user">Beranda</a>
        </li>
        <li class="sidebar-nav-item">
          <a class="js-scroll-trigger" href="/laporan_penjualan">Data Penjualan</a>
        </li>
        <li class="sidebar-nav-item">
          <a class="js-scroll-trigger" href="/laporan_penjualan_perproduk">Data Penjualan per produk</a>
        </li>
        <li class="sidebar-nav-item">
          <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
          <a class="js-scroll-trigge" href="{{ route('logout') }}"
          onclick="event.preventDefault();
          document.getElementById('logout-form').submit();">Keluar</a>
        </li>
      </ul>
    </nav>
    <div class="box face">
      <marquee><?php
       date_default_timezone_set('Asia/Jakarta');
  $tanggal= mktime(date("m"),date("d"),date("Y"));
  echo "<b>".date('l, d-m-Y')."</b> ";
  $jam=date("H:i:s");
  echo "| Pukul : <b>". $jam." "."</b>";
  $a = date ("H");
  if (($a>=6) && ($a<=11)){
  echo "<b>, Selamat Pagi.</b>";
  }
  else if(($a>11) && ($a<=15))
  {
  echo ", Selamat Siang.";}
  else if (($a>15) && ($a<=18)){
  echo ", Selamat Sore.";}
  else { echo ", <b> Selamat Malam </b>";}
  ?> 
     <h6 id="date_time"></h6></marquee> </div>