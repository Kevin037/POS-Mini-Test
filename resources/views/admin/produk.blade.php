@extends('admin.main')
@section('judul')
<title>Admin | Produk</title>
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
            <a href="#" class="nav-link active">
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
            <h1>Daftar Produk</h1>
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
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <table id="example2" class="table table-bordered table-hover">
                    <thead>
                        
                    <tr>
                      <th>No</th>
                      <th>Kode barang</th>
                      <th>Nama</th>
                      <th>Harga beli</th>
                      <th>Harga jual</th>
                      <th>Stok</th>
                      <th>Tindakan</th>
                    </tr>
                    </thead>
                    <tbody>
                        @php
                        $no=1;
                    @endphp
                    @foreach($produk as $produk)
                    <tr>
                      <td>{{ $no }}</td>
                      <td>{{$produk->kode_produk}}</td>
                      <td>{{$produk->nama_produk}}</td>
                      <td>{{$produk->harga_beli}}</td>
                      <td>{{$produk->harga_jual}}</td>
                      <td> {{$produk->stok}}</td>
                      
                      <td>
                        <a type="button" data-toggle="modal" data-target="#detail_produk{{ $produk->id }}" class="btn mr-2 mb-2 btn-info"><i class="fa fa-search "></i></a>
                        <a href="/form-edit-produk{{ $produk->id }}" class="btn mr-2 mb-2 btn-warning"><i class="fa fa-edit ">Ubah</i></a>
                        <a href="/hapusproduk{{ $produk->id }}" class="btn mr-2 mb-2 btn-danger hapus_produk" data-id="{{ $produk->id }}" data-nama="{{ $produk->nama_produk }}"><i class="fa fa-delete ">Hapus</i></a>
                    </td>
                      
                    <div class="modal fade" id="detail_produk{{ $produk->id }}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                      <div class="modal-dialog modal-lg">
                          <div class="modal-content">
                              <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLongTitle">{{ $produk->nama_produk }}({{  $produk->nama_kategori }})</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                  </button>
                              </div>
                              <div class="modal-body">
                              <center><img src="{{ url('img/produk/'.$produk->gambar_produk) }}" alt="" class="img-responsive" width="80%"><br>
                              {{ $produk->deskripsi_produk }}
                              </center>

                              {{-- {{ $produk->gambar_produk }} --}}
                          </div>
                          </div>
                      </div>
                  </div>

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
                <h5 class="modal-title" id="exampleModalLongTitle">Produk baru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <?php

            ?>
			<form id="fileUploadForm2" action="/tambahproduk" method="POST" class="needs-validation" enctype="multipart/form-data" novalidate>
            @csrf
                                            <div class="position-relative form-group"><label>Nama produk</label><input name="nama_produk" type="text" class="form-control"  required>
											<div class="invalid-feedback">
                                                    Masukkan nama produk !
                                                </div>
											</div>
                                            <div class="position-relative form-group"><label>Harga beli</label><input name="harga_beli" type="number"  class="form-control"  required>
                                                <div class="invalid-feedback">
                                                        Masukkan harga beli !
                                                    </div>
                                                </div>
                                              <div class="position-relative form-group"><label>Harga jual</label><input name="harga_jual" type="number"  class="form-control"  required>
                                                <div class="invalid-feedback">
                                                        Masukkan harga jual !
                                                    </div>
                                                </div>
                                            <div class="form-group"><label>Kategori</label>
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
                                            <div class="position-relative form-group"><label>Stok</label><input name="stok" type="number" class="form-control"  required>
                                                <div class="invalid-feedback">
                                                        Masukkan stok produk !
                                                    </div>
                                                </div>
                                            <div class="position-relative form-group"><label>Deskripsi</label><input name="deskripsi_produk" type="text" class="form-control"  required>
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
                                                <input type="file" class="form-control" name="bill" title="jpg,jpeg,png(max.900kb)" id="bukti_pembayaran" aria-describedby="inputGroupFileAddon04" aria-label="Upload" required>
                                                <div class="invalid-feedback">
                                                        Masukkan gambar produk !
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                  <div class="progress">
                                                      <div class="progress-bar progress-bar-striped progress-bar-animated bg-danger" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%"></div>
                                                  </div>
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
  $(".hapus_produk").click(function(){
     var id_produk = $(this).attr('data-id');
     var nama_produk =  $(this).attr('data-nama');
     Swal.fire({
     title: 'Yakin?',
     text: "Hapus Produk "+nama_produk+" dari daftar",
     imageWidth: 170,
     imageHeight: 230,
     showCancelButton: true,
     confirmButtonColor: '#3085d6',
     cancelButtonColor: '#d33',
     confirmButtonText: 'Ya, hapus'
     }).then((result) => {
     if (result.isConfirmed) {
       window.location = "/hapusproduk"+id_produk+""
     }
     })
       });
 </script>
<script>
  $(function () {
    $('.select2').select2()
  });
</script>
<script>
  $(function () {
      $(document).ready(function () {
          $('#fileUploadForm2').ajaxForm({
              beforeSend: function () {
                  var percentage = '0';
              },
              uploadProgress: function (event, position, total, percentComplete) {
                  var percentage = percentComplete;
                  $('.progress .progress-bar').css("width", percentage+'%', function() {
                    return $(this).attr("aria-valuenow", percentage) + "%";
                  })
              },
              success: function (xhr) {
                window.location = "/produk";
                Swal.fire({
                position: 'top-end',
                icon: 'success',
                title: 'Data produk berhasil ditambahkan',
                showConfirmButton: false,
                timer: 5000
                
              })
              }
          });
      });
  });
</script>
@include('sweetalert::alert')
</body>
</html>
@endsection

