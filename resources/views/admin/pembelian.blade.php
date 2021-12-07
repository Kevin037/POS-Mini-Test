@extends('admin.main')
@section('judul')
<title>Admin | Pembelian</title>
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
      <li class="nav-item menu-open">
        <a href="#" class="nav-link active">
          <i class="nav-icon fas fa-money-check"></i>
          <p>
            Transaksi
            <i class="right fas fa-angle-left"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="/pembelian" class="nav-link active">
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
@include('sweetalert::alert')
</body>
</html>
@endsection

