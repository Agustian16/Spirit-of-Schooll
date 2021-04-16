@include('master')

<br>
<br>
{{-- <a href="{{ route('pembayaran.index') }}" class="btn btn-info" id="tambah">Kembali</a> --}}
<style>
    h1{
        position: relative;
        left: 300px;
        top: -150px;
        color: rgb(83, 24, 248);
        font-weight: bold;
        transform: rotate(-40deg);
        text-decoration: underline;
    }
</style>
<div class="container">
    <div class="card-body" onclick="window.print()">
{{-- <div class="card col-md-6 mt-10 mx-auto" >
    <div class="card-header"> --}}
        
        <form class="form-control mt-2">
            @foreach ($pembayarans as $pembayaran)
            <div class="card-body">
        <h3 class="text-center">Struk Pembayaran SPP</h3>
        <hr>
        <h1>Sudah Bayar</h1>
            <b>NISN : </b>{{ $pembayaran->nisn }} <br>
            <b>Nama Siswa : </b>{{ $pembayaran->nama }} <br>
            <b>Tanggal Bayar : </b>{{ $pembayaran->tgl_bayar }} <br>
            <b>Bulan Dibayar : </b>{{ $pembayaran->bulan_bayar }} <br>
            <b>Tahun Dibayar : </b>{{ $pembayaran->tahun_bayar }} <br>
            <b>Nominal : </b>{{ $pembayaran->nominal }} <br>
            <b>Jumlah Bayar : </b>{{ $pembayaran->jumlah_bayar}} <br>
    </div>
    @endforeach      
</form>
</div>
</div>