@extends('master')
<br>
<br>
<div class="container">
    <div class="card-body">
        <a href="{{ route('kelas.index') }}" class="btn btn-info">Kembali</a>
        <h3 class="text-center">Form Tambah Kelas</h3>
        <form action="{{ route('kelas.store') }}" class="form-control mt-2" method="POST">
            @csrf
            @method('POST')
                    <label for="">NAMA KELAS</label>
                    <input type="text" name="nama_kelas"  class="form-control" required>
                        <br>
                        <label for="">KOMPETENSI KEAHLIAN</label>
                        <input type="text" name="kompetensi_keahlian" class="form-control" required>
                            <br>
                        <center>
                    <button type="submit" class="btn btn-primary mt-2">Simpan</button>
                        </center>
        </form>
    </div>
</div>