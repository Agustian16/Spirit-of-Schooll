@extends('master')
@section('content')
<br>
<br>
<div class="container">
    <div class="card-body">
        <a href="{{ route('pembayaran.index') }}" class="btn btn-info">Kembali</a>
        <h3 class="text-center">Form | Transaksi</h3>
        <form action="{{ route('pembayaran.store') }}" class="form-control mt-2" method="POST">
            @csrf
            @method('POST')
                    {{-- <label for="">NAMA Petugas</label> --}}
                    <input type="hidden" name="id_petugas" value="{{Auth::user()->id}}" readonly placeholder="{{Auth::user()->nama}}" 
                    class="form-control"> 
                        <br>
                        <label for="">NISN</label>
                                <select name="nisn" id="nisn" class="form-control" onchange="dataSiswa()">
                                    @foreach ($siswas as $s )
                                    <option class="form-control" value="{{ $s->nisn }}">{{ $s->nisn }} - {{ $s->nama }}</option>
                                    @endforeach
                                    
                                </select>
                            
                            <br>
                                <br>
                            <label for="">Nominal / Terakhir Bayar  :</label>
                            <input type="text" disabled id="ket" class="form-control">
                        <br>
                                <label for="">Jumlah Bayar</label>
                            <input type="number" name="jumlah_bayar"  class="form-control" placeholder="Rp....." required>
                            <br>
                        <center>
                    <button type="submit" class="btn btn-primary mt-2">Simpan</button>
                        </center>
        </form>
    </div>
</div>
@endsection


{{-- <script>
    function dataSiswa(){
         var nisn = $('#nisn').val();
         console.log(nisn);

         $.ajax({
             url:"{{ url('pembayaran/get-data/') }}"+ '/' + nisn,
             type:'GET',
             success: function(data){
                 console.log(data);
                 $('#ket').val("Rp." + data['harga'] +  " " + data['bulan']+'/'+data['tahun']);
             },
             error: function (data){
                $('#ket').val("belum pernah bayar spp");
             }
         });
     }
</script>

<script>
    $(document).ready(function() {
        $("body").on("contextmenu", function(e) {
            return false;
          });
      });
  </script> --}}








