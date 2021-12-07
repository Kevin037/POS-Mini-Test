@extends('admin.main')
@section('judul')
<title>Admin | Home</title>
@endsection
@section('sidebar')

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
        <!-- <li class="nav-header">MASTER</li> -->
        <li class="nav-item active">
          <a href="/home-admin" class="nav-link">
            <i class="nav-icon fas fa-th"></i>
            <p>
              Dashboard
            </p>
          </a>
        </li>
        <li class="nav-item menu-open">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-tools"></i>
            <p>
              Master
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="/kategori" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Kategori</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="/produk" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Produk</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="supplier" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Supplier</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="/pelanggan" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Pelanggan</p>
              </a>
            </li>
          </ul>
        </li>
        <!-- <li class="nav-header">LAPORAN</li> -->
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-money-check"></i>
            <p>
              Transaksi
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="/pembelian" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Pembelian</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-chart-bar"></i>
            <p>
              Laporan
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>
                  Penjualan
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="/laporan_penjualan" class="nav-link">
                    <i class="far fa-dot-circle nav-icon"></i>
                    <p>Total Penjualan</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="/laporan_penjualan_perproduk" class="nav-link">
                    <i class="far fa-dot-circle nav-icon"></i>
                    <p>Penjualan Per produk</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>
                  Pembelian
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="/laporan_pembelian" class="nav-link">
                    <i class="far fa-dot-circle nav-icon"></i>
                    <p>Total Pembelian</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="/laporan_pembelian_perproduk" class="nav-link">
                    <i class="far fa-dot-circle nav-icon"></i>
                    <p>Pembelian Per produk</p>
                  </a>
                </li>
              </ul>
            </li>
          </ul>
        </li>
        <!-- <li class="nav-header">USER</li> -->
        <li class="nav-item">
          <a href="/user" class="nav-link">
            <i class="nav-icon fas fa-user"></i>
            <p>
              Pengaturan User
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="./index.html" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Data User</p>
              </a>
            </li>
          </ul>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>
@endsection


@section('isi')
    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard Admin</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{ $produk }}</h3>

                <p>Produk</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="/pesanan_belum_bayar" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>{{ $produk }}</h3>

                <p>Supplier</p>
              </div>
              <div class="icon">
                <i class="ion ion-archive"></i>
              </div>
              <a href="/verifikasi_pembayaran" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>{{ $supplier }}</h3>

                <p>Pelanggan</p>
              </div>
              <div class="icon">
                <i class="ion ion-location"></i>
              </div>
              <a href="/pesanan_belum_dikirim" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-6 col-6">
            <!-- small box -->
            <div class="small-box bg-primary">
              <div class="inner">
                <h3>{{ $pelanggan }}</h3>

                <p>Pembelian</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="pesanan_belum_diterima" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-6 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>{{ $pembelian }}</h3>

                <p>Penjualan</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="/pesanan-admin" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
        </div>
        <!-- /.row -->
        <!-- Main row -->
        
        <div class="card card-default">
          <div class="card-header">
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            
            <!-- /.row -->
            <!-- /.row -->
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
@endsection


@section('fot_dinamis')
<script>
  $(function () {
    $('.select2').select2()
  });
</script>
</body>
</html>
@endsection

