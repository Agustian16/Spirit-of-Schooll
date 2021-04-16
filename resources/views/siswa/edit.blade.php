@include('master')

<div class="container">
    <div class="card-body">
        <a href="{{ route('siswa.index') }}" class="btn btn-info">Kembali</a>
        <h3 class="text-center">Form Edit Kelas</h3>

<form action="{{ route('siswa.update',$siswas->nisn) }}" method="POST" class="form-control mt-2">
    @csrf
    @method('PUT')
                <h3>NISN :</h3>
            <input type="number" name="nisn" value="{{ $siswas->nisn }}" class="form-control" readonly>
            <br>
                <h3>NIS :</h3>
             <input type="number" name="nis" value="{{ $siswas->nis }}" class="form-control" readonly>
                <br>
                <h3>Nama :</h3>
            <input type="text" name="nama" value="{{ $siswas->nama }}" class="form-control">
            <br>
            <h3>Kelas :</h3>
            {{-- <input type="text" name="id_kelas" value="{{ $siswas->id_kelas }}" class="form-control"> --}}
            <select name="id_kelas" id="" class="form-control">
                @foreach ($kelas as $s )
                <option class="form-control" value="{{ $s->id }}">{{ $s->nama_kelas }}</option>
                @endforeach
            </select>
            <br>
            <h3>Alamat :</h3>
            <input type="text" name="alamat" value="{{ $siswas->alamat }}" class="form-control">
            <br>
            <h3>No.Telp :</h3>
            <input type="number" name="no_telp" value="{{ $siswas->no_telp }}" class="form-control">
            <br>
            <h3>SPP :</h3>
            {{-- <input type="text" name="id_spp" value="{{ $siswas->id_spp }}" class="form-control"> --}}
            <select name="id_spp" id="" class="form-control">
                @foreach ($spps as $s )
                <option class="form-control" value="{{ $s->id }}">{{ $s->tahun }}</option>
                @endforeach
            </select>
            <br>

                <br>
                <center>
                <button type="submit" class="btn btn-primary">Update Siswa</button>
            </center>
</form>
    </div>
</div>