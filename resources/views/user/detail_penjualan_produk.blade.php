@extends('user.main')
@section('judul')
<title>Home - TentorQ</title>
@endsection
@section('isi')
<div class="frame">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Detail Penjualan Produk</h1>
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
@section('fot-dinamis')
@include('sweetalert::alert')
@endsection