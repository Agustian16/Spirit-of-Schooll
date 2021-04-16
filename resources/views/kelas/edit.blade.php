@include('master')

<div class="container">
    <div class="card-body">
        <a href="{{ route('kelas.index') }}" class="btn btn-info">Kembali</a>
        <h3 class="text-center">Form Edit Kelas</h3>

<form action="{{ route('kelas.update',$kelas->id) }}" method="POST" class="form-control mt-2">
    @csrf
    @method('PUT')
                <h3>Nama Kelas :</h3>
            <input type="text" name="nama_kelas" value="{{ $kelas->nama_kelas }}" class="form-control">
            <br>
                <h3>Kompetensi Keahlian :</h3>
             <input type="text" name="kompetensi_keahlian" value="{{ $kelas->kompetensi_keahlian }}" class="form-control">
                <br>
                <br>
                <center>
                <button type="submit" class="btn btn-primary">Update Kelas</button>
            </center>
</form>
    </div>
</div>