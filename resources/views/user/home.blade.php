@extends('user.main')
@section('judul')
<title>POS Mini - Halaman Utama</title>
@endsection
@section('isi')
<section class="filter-atas">
  <div>
    <form action="/filterproduk" method="GET" class="needs-validation" enctype="multipart/form-data" novalidate>
    @csrf
  <div class="row">
    <div class="col-md-3">
      <div class="form-group">
        <select class="form-control" name="kategori_id" required>
            <option value="">-Pilih Kategori-</option>
            @foreach ($kategori as $kategori => $value)
            <option value="{{ $kategori }}">{{ $value }}</option>
            @endforeach
          </select>
        <div class="invalid-feedback">
                Pilih kategori !
            </div>
        </div>
    </div>
    <div class="col-md-3"><button type="submit" class="btn btn-primary mb-3">Filter</button></form>
    </div>
    <div class="col-md-6">
      <form style="margin-left: -39%" action="/home-user" method="GET">
        @csrf
      <button type="submit" class="btn btn-light mb-3">Tampilkan semua</button>
      </form>
    </div>
    
  </div>
  
  </div>
</section>
<section class="container-fluid">
    <div class="listproduk">
        <div class="row">
          @foreach ($produk as $produk)
          <div class="col-6 col-md-3  per-produk">
            <div class="part">
              <div class="item_produk">
                <div class="overlay-produk">
                  <img src="{{ url('img/produk/'.$produk->gambar_produk) }}" alt="Avatar" class="gambar1" width="100%">
                </div>
              </div>
              <b><a href="#" class="teks" >{{ $produk->nama_produk }}</a></b>
              <div style="margin-top: 5px;display:flex;flex-direction:row">
                <div>
                  <div>
                    <center>  <h5 style="margin-left:10px;color:rgb(20, 20, 20)">@currency($produk->harga_beli)</h5>
                    <p class="desk">{{ $produk->deskripsi_produk }}</p>
                      <form action="/form-pemesanan{{ $produk->id }}" method="GET">
                        @csrf
                      <button class="button_jenis"><span>Beli</span></button>
                      </form>
                    </center>
                  </div>
                </div>  
              </div>
            </div>
          </div> 
          
          @endforeach
          
          </div>
          
      </div>
</section>
</body>
</html>
@endsection
@section('fot-dinamis')
@include('sweetalert::alert')
@endsection
