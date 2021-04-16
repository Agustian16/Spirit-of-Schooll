@include('master')

<div class="container">
    <div class="card-body">
        <a href="{{ route('kelas.index') }}" class="btn btn-info">Kembali</a>
        <h3 class="text-center">Detail Kelas</h3>

<form class="form-control mt-2">
    @foreach ($kelas as $kelas )
    <h3>Nama Kelas :</h3>
    <input type="text" name="nama_kelas" value="{{ $kelas->nama_kelas }}" class="form-control" disabled>
    <br>
    <h3>Kompetensi Keahlian :</h3>
    <input type="text" name="kompetensi_keahlian" value="{{ $kelas->kompetensi_keahlian }}" class="form-control" disabled>
    
    @endforeach        
</form>
</div>
</div>