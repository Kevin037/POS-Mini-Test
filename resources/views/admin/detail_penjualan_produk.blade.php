@extends('admin.main')
@section('judul')
<title>Admin | Detail Penjualan Produk</title>
@endsection
@section('sidebar')
<!-- Sidebar Menu -->
<!-- Sidebar Menu -->
<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
      <!-- Add icons to the links using the .nav-icon class
           with font-awesome or any other icon font library -->
      <!-- <li class="nav-header">MASTER</li> -->
      <li class="nav-item">
        <a href="/home-admin" class="nav-link">
          <i class="nav-icon fas fa-th"></i>
          <p>
            Dashboard
          </p>
        </a>
      </li>
      <li class="nav-item">
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
            <a href="/supplier" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Supplier</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Pelanggan</p>
            </a>
          </li>
        </ul>
      </li>
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
      <!-- <li class="nav-header">LAPORAN</li> -->
      <li class="nav-item menu-open">
        <a href="#" class="nav-link active">
          <i class="nav-icon fas fa-chart-bar"></i>
          <p>
            Laporan
            <i class="right fas fa-angle-left"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item menu-open">
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
                <a href="/laporan_penjualan_perproduk" class="nav-link active">
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
        <a href="#" class="nav-link">
          <i class="nav-icon fas fa-user"></i>
          <p>
            Pengaturan User
            <i class="right fas fa-angle-left"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="/user" class="nav-link">
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
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Detail Penjualan Produk</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/home-admin">Home</a></li>
              <li class="breadcrumb-item active">Transaksi</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
            
          <div class="col-12">
            <!-- /.card -->
            <div class="card">
                <div class="card-header">
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <table id="example2" class="table table-bordered table-hover">
                    <thead>
                    <tr>
                      <th>Tgl transaksi</th>
                      <th>Kode</th>
                      <th>Produk</th>
                      <th>Jumlah</th>
                      <th>Profit</th>
                      <th>Pelanggan</th>
                    </tr>
                    </thead>
                    <tbody>
                        @php
                        $no=1;
                    @endphp
                    @foreach($penjualan as $penjualan)
                    <tr>
                      <td>{{$penjualan->tgl_penjualan}}</td>
                      <td>{{ $penjualan->kode_penjualan }}</td>
                      <td>{{$penjualan->nama_produk}}</td>
                      <td>{{$penjualan->jumlah_penjualan}}</td>
                      <td>@currency($penjualan->nominal_penjualan)</td>
                      <td>{{ $penjualan->nama_pelanggan }}</td>
                    </tr>
                    @php $no++ @endphp
                      @endforeach
                    </tbody>
                  </table>
                </div>
                <!-- /.card-body -->
              </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

@endsection


@section('fot_dinamis')
@include('sweetalert::alert')
</body>
</html>
@endsection

