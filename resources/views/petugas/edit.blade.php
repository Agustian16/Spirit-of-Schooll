@include('master')

<div class="container">
    <div class="card-body">
        <a href="{{ route('kelas.index') }}" class="btn btn-info">Kembali</a>
        <h3 class="text-center">Form Edit Kelas</h3>

<form action="{{ route('petugas.update',$petugas->id) }}" method="POST" class="form-control mt-2">
    @csrf
    @method('PUT')
                <h3>Username :</h3>
            <input type="text" name="username" value="{{ $petugas->username }}" class="form-control">
            <br>
                <h3>Password :</h3>
             <input type="text" name="password" value="{{ $petugas->password }}" class="form-control">
             <br>
                <h3>Nama Petugas :</h3>
             <input type="text" name="nama_petugas" value="{{ $petugas->nama_petugas }}" class="form-control">
             <br>
                <h3>Level :</h3>
             <input type="text" name="level" value="{{ $petugas->level }}" class="form-control">
                <br>
                <br>
                <center>
                <button type="submit" class="btn btn-primary">Update Kelas</button>
            </center>
</form>
    </div>
</div>