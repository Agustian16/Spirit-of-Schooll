@include('master')

<div class="container">
    <div class="card-body">
        <a href="{{ route('siswa.index') }}" class="btn btn-info">Kembali</a>
        <h3 class="text-center">Detail Siswa</h3>

<form class="form-control mt-2">
    @foreach ($siswas as $kelas )
    <h3>NISN :</h3>
    <input type="text" name="nama_kelas" value="{{ $kelas->nisn }}" class="form-control" disabled>
    <br>
    <h3>NIS :</h3>
    <input type="text" name="nis" value="{{ $kelas->nis}}" class="form-control" disabled>
    <br>
    <h3>Nama :</h3>
    <input type="text" name="nama" value="{{ $kelas->nama}}" class="form-control" disabled>
    <br>
    <h3>Kelas :</h3>
    <input type="text" name="id_kelas" value="{{ $kelas->nama_kelas}} - {{ $kelas->kompetensi_keahlian}}" class="form-control" disabled>
    <br>
    <h3>Alamat :</h3>
    <input type="text" name="alamat" value="{{ $kelas->alamat}}" class="form-control" disabled>
    <br>
    <h3>No.Telp :</h3>
    <input type="text" name="no_telp" value="{{ $kelas->no_telp}}" class="form-control" disabled>
    <br>
    <h3>SPP :</h3>
    <input type="text" name="id_spp" value="{{ $kelas->tahun}}" class="form-control" disabled>
    
    @endforeach        
</form>
</div>
</div>