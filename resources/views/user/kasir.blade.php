@extends('user.main')
@section('judul')
<title>Home - TentorQ</title>
@endsection
@section('isi')
<section class="container-fluid">
<table class="table table-striped" width="75%" id="tabel1">
    @method('PUT')
<thead> 
<tr>
    <th>No</th>
    <th>Nama produk</th>
    <th>Jumlah</th>
    <th>Harga</th>
</tr>
</thead>
<tbody>
<tr>
    <td></td>
    <td contenteditable="true" class="nama"></td>
    <td contenteditable="true" class="jumlah"></td>
    <td contenteditable="true" class="harga"></td>
    <td><button class="btn-sm btn-danger" id="hapus">-</button></td>
</tr>
</tbody>
</table>
<button class="btn btn-success" id="tambah">+</button>
<button class="btn btn-primary" id="simpan">Simpan pesanan</button><br>
</section>
</body>
</html>
@endsection
@section('fot-dinamis')
<script>
    $(document).ready(function(){
        let baris = 1

        $(document).on('click','#tambah',function(){
            baris = baris+1
            var html = "<tr id= 'baris'" +baris+ ">"
                html += " <td>"+baris+" </td>"
                html += " <td contenteditable='true' class='nama'> </td>"
                html += " <td contenteditable='true' class='jumlah'> </td>"
                html += " <td contenteditable='true' class='harga'> </td>"
                html += " <td> <button class='btn btn-danger' data-row='baris'" +baris+ " id='hapus'>-</button</td>"
                html += " <tr/>"

            $('#tabel1').append(html)
        })

    });

    $(document).on('click', '#hapus', function(){
        let hapus = $(this).data('row')
        $('#' + hapus ).remove()

    });

    $(document).on('click', '#simpan', function(){
    let nama=[]
    let jumlah=[]
    let harga=[]

    $('.nama').each(function(){
        nama.push($(this).text())
    })
    $('.jumlah').each(function(){
        jumlah.push($(this).text())
    })
    $('.harga').each(function(){
        harga.push($(this).text())
    })


    $.ajax({
        url : '/tambahpenjualan',
        type: "GET",
        data:{
            nama : nama,
            jumlah : jumlah,
            harga : harga,
            "_token" : "{{ csrf_token()}}"
        },success: function(res){
            window.location.href = "/home-user";
        },error: function (xhr){
            console.error(xhr);
        }
    })
    
    })

</script>    
@endsection
