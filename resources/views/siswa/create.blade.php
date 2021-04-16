@extends('master')
<br>
<br>
<div class="container">
    <div class="card-body">
        <a href="{{ route('siswa.index') }}" class="btn btn-info">Kembali</a>
        <h3 class="text-center">Form Tambah Kelas</h3>
        <form action="{{ route('siswa.store') }}" class="form-control mt-2" method="POST">
            @csrf
            @method('POST')
                    <label for="">NISN</label>
                    <input type="number" name="nisn"  class="form-control" required>
                        <br>
                        <label for="">NIS</label>
                        <input type="number" name="nis" class="form-control" required>
                            <br>
                            <label for="">Nama</label>
                            <input type="text" name="nama"  class="form-control" required>
                                <br>
                                <label for="">Kelas</label>
                                <select name="id_kelas" id="id_kelas" class="form-control" required>
                                    @foreach ($kelas as $k)                                        
                                    <option value="{{ $k->id }}">{{ $k->nama_kelas }}</option>
                                    @endforeach
                                </select>
                                    <br>
                                    <label for="">Alamat</label>
                                    {{-- <input type="text" name="alamat"  class="form-control" required> --}}
                                    <textarea name="alamat" id="" cols="20" rows="5" class="form-control" required></textarea>
                                        <br>
                                        <label for="">No.Telp</label>
                                        <input type="number" name="no_telp"  class="form-control" required>
                                            <br>
                                            <label for="">SPP</label>
                                            <select name="id_spp" id="id_spp" class="form-control" required>
                                                @foreach ($spps as $s)
                                                <option value="{{ $s->id }}">{{ $s->tahun }}</option>
                                                @endforeach
                                            </select>
                                                <br>
                        <center>
                    <button type="submit" class="btn btn-primary mt-2">Simpan</button>
                        </center>
        </form>
    </div>
</div>