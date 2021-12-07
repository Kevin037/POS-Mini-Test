@extends('user.main')
@section('judul')
<title>POS Mini - Penjualan Produk</title>
@endsection
@section('isi')
<div class="frame">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Laporan Penjualan Produk</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
            
          <div class="col-12"> <!-- /.card -->
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
                      <th>Harga jual</th>
                      <th>Stok</th>
                      <th>Detail</th>
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
                      <td>@currency($produk->harga_jual)</td>
                      <td> {{$produk->stok}}</td>
                      
                      <td>
                        <a href="/detail_penjualan_perproduk{{ $produk->id }}" class="btn mr-2 mb-2 btn-info"><i class="fa fa-search "></i></a>
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
@endsection
@section('fot-dinamis')
@include('sweetalert::alert')
@endsection