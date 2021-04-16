@extends('master')
<br>
<br>
<div class="container">
    <div class="card-body">
        <a href="{{ route('petugas.index') }}" class="btn btn-info">Kembali</a>
        <h3 class="text-center">Form Tambah Kelas</h3>
        <form action="{{ route('petugas.store') }}" class="form-control mt-2" method="POST">
            @csrf
            @method('POST')
                    <label for="">Username</label>
                    <input type="text" name="username"  class="form-control" required>
                        <br>
                        <label for="">Password</label>
                        <input type="password" name="password" class="form-control" required>
                            <br>
                            <label for="">Nama Petugas</label>
                            <input type="text" name="nama_petugas" class="form-control" required>
                            {{-- <br>
                            <label for="">Level</label>
                            <input type="text" name="level" class="form-control"> --}}
                        <center>
                    <button type="submit" class="btn btn-primary mt-2">Simpan</button>
                        </center>
        </form>
    </div>
</div>