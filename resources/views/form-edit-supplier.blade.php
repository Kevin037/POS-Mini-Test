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
            <h1>Perubahan Data Supplier</h1>
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
                        <h5 class="modal-title" id="exampleModalLongTitle">Ubah Data Supplier</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                    <?php
        
                    ?>
                    @foreach ($supplier_id as $supplier_id)
                        
                    
                    <form action="/ubahsupplier{{ $supplier_id->id }}" method="POST" class="needs-validation" enctype="multipart/form-data" novalidate>
                    @csrf
                                                    <div class="position-relative form-group"><label>Nama Supplier</label><input name="nama_supplier" type="text" value="{{ $supplier_id->nama_supplier }}" class="form-control"  required>
                                                    <div class="invalid-feedback">
                                                            Masukkan nama supplier !
                                                        </div>
                                                    </div>
                                                    <div class="position-relative form-group"><label>No Hp Supplier</label><input name="no_hp_supplier" type="number" value="{{ $supplier_id->no_hp_supplier }}" class="form-control"  required>
                                                        <div class="invalid-feedback">
                                                                Masukkan no.hp supplier !
                                                            </div>
                                                        </div>
                                                        <div class="position-relative form-group"><label>Alamat Supplier</label><input name="alamat_supplier" type="text" value="{{ $supplier_id->alamat_supplier }}" class="form-control"  required>
                                                            <div class="invalid-feedback">
                                                                    Masukkan alamat supplier !
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