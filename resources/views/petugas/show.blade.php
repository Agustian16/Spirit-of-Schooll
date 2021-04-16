@include('master')

<div class="container">
    <div class="card-body">
        <a href="{{ route('petugas.index') }}" class="btn btn-info">Kembali</a>
        <h3 class="text-center">Detail petugas</h3>

<form class="form-control mt-2">
    @foreach ($petugas as $p )
    <h3>Username :</h3>
    <input type="text" name="nama_kelas" value="{{ $p->username }}" class="form-control" disabled>
    <br>
    <h3>Password :</h3>
    <input type="text" name="kompetensi_keahlian" value="{{ $p->password }}" class="form-control" disabled>
    <br>
    <h3>Nama Petugas :</h3>
    <input type="text" name="kompetensi_keahlian" value="{{ $p->nama_petugas }}" class="form-control" disabled>
    <br>
    <h3>Level :</h3>
    <input type="text" name="level" value="{{ $p->level }}" class="form-control" disabled>
    
    @endforeach        
</form>
</div>
</div>