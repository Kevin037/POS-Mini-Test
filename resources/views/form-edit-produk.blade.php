@extends('admin.main')
@section('isi')
<div class="wrapper">
  <!-- Navbar -->
 <!-- Preloader -->
 <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="../admin/dist/img/logo.png" alt="AdminLTELogo" width="10%">
  </div>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Perubahan Data Produk</h1>
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
            <div class="card">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Ubah Data Produk</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                    <?php
        
                    ?>
                    @foreach ($produk_id as $produk_id)
                        
                    
                    <form action="/ubahproduk{{ $produk_id->id }}" method="POST" class="needs-validation" enctype="multipart/form-data" novalidate>
                    @csrf
                    <div class="position-relative form-group"><label>Nama produk</label><input name="nama_produk" value="{{ $produk_id->nama_produk }}" type="text" class="form-control"  required>
                        <div class="invalid-feedback">
                                Masukkan nama produk !
                            </div>
                        </div>
                        <div class="position-relative form-group"><label>Harga</label><input name="harga_produk" value="{{ $produk_id->harga_produk }}" type="number"  class="form-control"  required>
                            <div class="invalid-feedback">
                                    Masukkan harga produk !
                                </div>
                            </div>
                        <div class="position-relative form-group"><label>Kategori</label>
                            <select class="form-control" name="kategori_id" required>
                                <option value="">-Pilih Kategori-</option>
                                @foreach ($kategori as $kategori => $value)
                                <option value="{{ $kategori }}">{{ $value }}</option>
                                @endforeach
                              </select>
                            <div class="invalid-feedback">
                                    Masukkan kategori produk !
                                </div>
                            </div>
                        <div class="position-relative form-group"><label>Stok</label><input name="stok" value="{{ $produk_id->stok }}" type="number" class="form-control"  required>
                            <div class="invalid-feedback">
                                    Masukkan stok produk !
                                </div>
                            </div>
                        <div class="position-relative form-group"><label>Deskripsi</label><input name="deskripsi_produk" value="{{ $produk_id->deskripsi_produk }}" type="text" class="form-control"  required>
                            <div class="invalid-feedback">
                                    Masukkan deskripsi produk !
                                </div>
                            </div>
                        <div class="position-relative form-group">
                            @if ($errors->any())
                            <div class="alert alert-danger">
                              <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                              </ul>
                            </div>
                        @endif
                            <label>Gambar (max.900kb)</label>
                            <input type="file" class="form-control" name="bill" title="jpg,jpeg,png(max.900kb)" value="{{ $produk_id->gambar_produk }}" id="bukti_pembayaran" aria-describedby="inputGroupFileAddon04" aria-label="Upload" required>
                            <div class="invalid-feedback">
                                    Masukkan gambar produk !
                                </div>
                            </div>
                    
                        <center><button type="submit" class="btn btn-primary mb-3">Simpan</button></center>
                    </form>
                    @endforeach
                </div>
                </div>
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
  <!-- /.content-wrapper -->
  
  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.1.0
    </div>
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
  </footer>
  <script>
    $(document).ready(function(){
      $(".perbesar").fancybox();
    });
  </script>
  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
@endsection