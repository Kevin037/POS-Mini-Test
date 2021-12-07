@extends('user.main')
@section('judul')
<title>Pos Mini - Pemesanan</title>
@endsection
@section('isi')
<section class="form">
    @foreach ($produk as $produk)
    <form class="needs-validation" method="POST" action="/tambahpenjualan" novalidate>
        @csrf
        <div class="row">
            <div class="col-md-7">
                <div class="form-row">
                    <div class="form-group col-md-7">
                       <label for="inputPassword4">Produk</label>
                       <input type="text" class="form-control" value="{{ $produk->nama_produk }}   [{{ $produk->kode_produk }}]" id="inputPassword4" placeholder="(nama produk)">
                       <input type="hidden" id="produk_id" value="{{ $produk->id }}" name="produk_id" >
                         </div>
                     <div class="form-group col-md-5">
                       <label for="inputPassword4">Jumlah</label>
                       <input type="text" class="form-control" name="jumlah_penjualan" id="jumlah_penjualan" placeholder="(jumlah)" required>
                       <div class="invalid-feedback">
                        Masukkan jumlah produk!
                    </div>
                     </div>
                     <div class="form-group col-md-5">
                       <label for="inputState">Nama Pelanggan</label>
                       <select id="inputState" class="form-control" name="pelanggan_id" required>
                         <option selected>-Pilih Pelanggan-</option>
                         @foreach ($pelanggan as $pelanggan => $value)
                        <option value="{{ $pelanggan }}">{{ $value }}</option>
                        @endforeach
                        <div class="invalid-feedback">
                            Pilih pelanggan!
                        </div>
                       </select>
                     </div>
                       <div class="form-group col-md-7">
                           <label for="inputPassword4">Alamat pelanggan</label>
                           <input type="text" class="form-control alamat" id="alamat_form" placeholder="(alamat)" readonly>
                       </div>
                       <div class="form-group col-12">
                           <label for="inputPassword4">Total</label>
                           <input type="hidden" value="{{ $produk->harga_jual }}" class="harga_produk">
                           <input type="hidden" value="{{ $produk->harga_beli }}" class="harga_beli">
                           <input type="text" class="form-control nominal_penjualan" id="inputPassword4" name="nominal_penjualan" placeholder="Rp" readonly>
                       </div>
                       <div class="form-group col-12">
                           <label for="inputPassword4">Uang diterima</label>
                           <input type="text" class="form-control" id="uang_diterima" name="uang_diterima" placeholder="Rp" required>
                           <div class="invalid-feedback">
                            Masukkan jumlah uang diterima !
                        </div>
                       </div>
                       <div class="form-group col-12">
                           <label for="inputPassword4">Uang kembali</label>
                           <input type="text" class="form-control" id="uang_kembali" name="uang_kembali" placeholder="Rp" required readonly>
                           <div class="invalid-feedback">
                            Masukkan jumlah uang kembali !
                        </div>
                       </div>
                   </div>
                   
            </div>
            <div class="col-md-5">
                <img src="{{ url('img/produk/'.$produk->gambar_produk) }}" alt="" class="img-responsive" width="100%">
               </div>
        </div>
        <button type="submit" class="btn btn-success btn-block">Pesan sekarang</button>
      </form>
      @endforeach
</section>
  @endsection
@section('fot-dinamis')
<script type="text/javascript">
    $(document).ready(function() {
        $('select[name="pelanggan_id"]').on('change', function() {
            
            var pelanggan_id = $(this).val();
            if(pelanggan_id) {
                $.ajax({
                    url: '/tampilalamat'+pelanggan_id,
                    type: "GET",
                    dataType: "json",
                    success:function(data) {
                        console.log(data);
                            $.each(data, function(key, value) {
                            // const value2 = formatRupiah(value);
                            $('#alamat_form').val(value);	
                            });
                    }
                });
            }
        });
        $('#jumlah_penjualan').keyup(function(){
            var harga_item=parseInt($('.harga_produk').val());
            var jumlah=parseInt($('#jumlah_penjualan').val());
            
            var total=jumlah*harga_item;
            $('.nominal_penjualan').val(total);

            });
        $('#uang_diterima').keyup(function(){
        var total=parseInt($('.nominal_penjualan').val());
        var bayar=parseInt($('#uang_diterima').val());
        
        var total=bayar-total;
        $('#uang_kembali').val(total);

        });
    });

</script>
@include('sweetalert::alert')
@endsection