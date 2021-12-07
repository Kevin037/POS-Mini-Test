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
            <h1>Laporan Pembelian</h1>
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
                <button type="button" class="btn btn-primary mb-3"  data-toggle="modal" data-target="#form_kategori">+ Tambah</button>
            
            <!-- /.card -->
            <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Data Pembelian</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <table id="example2" class="table table-bordered table-hover">
                    <thead>
                    <tr>
                      <th>Tgl transaksi</th>
                      <th>Produk</th>
                      <th>Jumlah</th>
                      <th>Total biaya</th>
                      <th>Supplier</th>
                    </tr>
                    </thead>
                    <tbody>
                        @php
                        $no=1;
                    @endphp
                    @foreach($pembelian as $pembelian)
                    <tr>
                      <td>{{$pembelian->tgl_pembelian}}</td>
                      <td>{{$pembelian->nama_produk}}</td>
                      <td>{{$pembelian->jumlah_pembelian}}</td>
                      <td>{{$pembelian->nominal_pembelian}}</td>
                      <td>{{ $pembelian->nama_supplier }}</td>
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
<div class="modal fade" id="form_kategori" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Pembelian baru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <?php
            ?>
			<form action="/tambahpembelian" method="POST" class="needs-validation" enctype="multipart/form-data" novalidate>
            @csrf
            <div class="position-relative form-group"><label>Kategori</label>
                <select class="form-control js-select2" name="kategori" required>
                    <option value="">-Pilih Produk-</option>
                    @foreach ($kategori as $kategori => $value)
                    <option value="{{ $kategori }}">{{ $value }}</option>
                    @endforeach
                  </select>
                </div>
            <div class="position-relative form-group"><label>Produk</label>
                <select class="form-control js-select2" name="produk_id" required>
                    <option value="">-Pilih Produk-</option>
                    {{-- @foreach ($produk as $produk => $value)
                    <option value="{{ $produk }}">{{ $value }}</option>
                    @endforeach --}}
                  </select>
                </div>
                <div class="position-relative form-group"><label>Harga (Rp)</label><input name="harga" id="harga" type="text" class="form-control"  required>
                     </div>
                <div class="position-relative form-group"><label>Jumlah</label><input name="jumlah_pembelian" id="jumlah" type="number" class="form-control"  required>
                    <div class="invalid-feedback">
                            Masukkan jumlah pembelian !
                        </div>
                    </div>
                <div class="position-relative form-group"><label>Total biaya</label><input name="nominal_pembelian" id="total"  type="number"  class="form-control"  required>
                </div>
                <div class="position-relative form-group"><label>Supplier</label>
                    <select class="form-control js-select2" name="supplier_id" required>
                        <option value="">-Pilih Produk-</option>
                        @foreach ($supplier as $supplier => $value)
                        <option value="{{ $supplier }}">{{ $value }}</option>
                        @endforeach
                      </select>
                    </div>
                <center><button type="submit" class="btn btn-primary mb-3">Simpan</button></center>
			</form>
        </div>
        </div>
    </div>
</div>
@endsection

@section('fot_dinamis')
<script>
                                    // Example starter JavaScript for disabling form submissions if there are invalid fields
                                    (function() {
                                        'use strict';
                                        window.addEventListener('load', function() {
                                            // Fetch all the forms we want to apply custom Bootstrap validation styles to
                                            var forms = document.getElementsByClassName('needs-validation');
                                            // Loop over them and prevent submission
                                            var validation = Array.prototype.filter.call(forms, function(form) {
                                                form.addEventListener('submit', function(event) {
                                                    if (form.checkValidity() === false) {
                                                        event.preventDefault();
                                                        event.stopPropagation();
                                                    }
                                                    form.classList.add('was-validated');
                                                }, false);
                                            });
                                        }, false);
                                    })();
                                </script>
                                <script>

                                </script>
<script type="text/javascript">
    $(document).ready(function() {
        $('select[name="kategori"]').on('change', function() {
            var kategori = $(this).val();
            if(kategori) {
                $.ajax({
                    url: '/kategoripilih'+kategori,
                    type: "GET",
                    dataType: "json",
                    success:function(data) {
                        console.log(data);
                         $('select[name="produk_id"]').empty();
                         $('select[name="produk_id"]').append('<option value="">--Pilih Item--</option>');
                         $.each(data, function(key, value) {
                             $('select[name="produk_id"]').append('<option value="'+ key +'">'+ value +'</option>');
                         });
                    }
                });
            }else{
                $('select[name="produk_id"]').empty();
            }
        });
    });
</script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('select[name="produk_id"]').on('change', function() {
                
                var produk_id = $(this).val();
                if(produk_id) {
                    $.ajax({
                        url: '/tampilharga'+produk_id,
                        type: "GET",
                        dataType: "json",
                        success:function(data) {
                            console.log(data);
                                $.each(data, function(key, value) {
                                // const value2 = formatRupiah(value);
                                $('#harga').val(value);	
                                });
                        }
                    });
                }else{
                    // $('select[name="id_item"]').empty();
                }
            });
            $('#jumlah').keyup(function(){
                var harga_item=parseInt($('#harga').val());
                var jumlah=parseInt($('#jumlah').val());
                
                var total=jumlah*harga_item;
                $('#total').val(total);
                });
        });

       
    </script>
    <script>
        $('.datepicker').datepicker({
            uiLibrary: 'bootstrap4'
        });
    </script>
        <script>
            $(function() {
                $('.js-select2').select2();
        });
        </script>
        
    @endsection