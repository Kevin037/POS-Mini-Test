@extends('admin.main')
@section('judul')
<title>Admin | Supplier</title>
@endsection
@section('sidebar')
<!-- Sidebar Menu -->
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
        <a href="#" class="nav-link active">
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
            <a href="#" class="nav-link active">
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
          <h1>Daftar Supplier</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/home-admin">Home</a></li>
            <li class="breadcrumb-item active">Inventaris</li>
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
          <button type="button" class="btn btn-primary mb-3"  data-toggle="modal" data-target="#form_kategori">+ Tambah</button>
          <!-- /.card -->
          <div class="card">
              <div class="card-header">
                <div class="card-tools">
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Id Supplier</th>
                      <th>Nama Supplier</th>
                      <th>No.hp</th>
                      <th>Alamat</th>
                      <th>Tindakan</th>
                    </tr>
                  </thead>
                  <tbody>
                      @php
                      $no=1;
                  @endphp
                  @foreach($supplier as $supplier)
                    <tr>
                      <td>{{ $no }}</td>
                      <td>{{ $supplier->kode_supplier }}</td>
                      <td>{{ $supplier->nama_supplier}}</td>
                      <td>{{ $supplier->no_hp_supplier }}</td>
                      <td>{{ $supplier->alamat_supplier }}</td>
                      <td>
                          <a href="/form-edit-supplier{{ $supplier->id }}" class="btn mr-2 mb-2 btn-warning"><i class="fa fa-edit ">Ubah</i></a>
                          <a href="/hapussupplier{{ $supplier->id }}" class="btn mr-2 mb-2 btn-danger hapus_supplier" data-id="{{ $supplier->id }}" data-nama="{{ $supplier->nama_supplier }}"><i class="fa fa-delete ">Hapus</i></a>
                      </td>
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
<div class="modal fade" id="form_kategori" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLongTitle">Supplier baru</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <div class="modal-body">
          <?php

          ?>
          
    <form action="/tambahsupplier" method="POST" class="needs-validation" enctype="multipart/form-data" novalidate>
          @csrf
                                          <div class="position-relative form-group"><label>Nama Supplier</label><input name="nama_supplier" type="text" class="form-control"  required>
                    <div class="invalid-feedback">
                                                  Masukkan nama supplier !
                                              </div>
                    </div>
                                          <div class="position-relative form-group"><label>No Hp Supplier</label><input name="no_hp_supplier" type="number"  class="form-control"  required>
                                              <div class="invalid-feedback">
                                                      Masukkan no.hp supplier !
                                                  </div>
                                              </div>
                                              <div class="position-relative form-group"><label>Alamat Supplier</label><input name="alamat_supplier" type="text" class="form-control"  required>
                                                  <div class="invalid-feedback">
                                                          Masukkan alamat supplier !
                                                      </div>
                                                  </div>
                                      
          </div>
              <center><button type="submit" class="btn btn-primary mb-3">Simpan</button></center>
    </form>
      </div>
  </div>
</div>
@endsection


@section('fot_dinamis')
<script>
  $(".hapus_supplier").click(function(){
     var id_supplier = $(this).attr('data-id');
     var nama_supplier =  $(this).attr('data-nama');
     Swal.fire({
     title: 'Yakin?',
     text: "Hapus Supplier "+nama_supplier+" dari daftar",
     imageWidth: 170,
     imageHeight: 230,
     showCancelButton: true,
     confirmButtonColor: '#3085d6',
     cancelButtonColor: '#d33',
     confirmButtonText: 'Ya, hapus'
     }).then((result) => {
     if (result.isConfirmed) {
       window.location = "/hapussupplier"+id_supplier+""
     }
     })
       });
 </script>
@include('sweetalert::alert')
</body>
</html>
@endsection

