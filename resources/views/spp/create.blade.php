@extends('master')
<br>
<br>
<div class="container">
    <div class="card-body">
        <a href="{{ route('spp.index') }}" class="btn btn-info">Kembali</a>
        <h3 class="text-center">Form Tambah SPP</h3>
        <form action="{{ route('spp.store') }}" class="form-control mt-2" method="POST">
            @csrf
            @method('POST')
                    <label for="">TAHUN</label>
                    {{-- <input type="number" name="tahun"  class="form-control" required min="4"> --}}
                    <select name="tahun" id="" class="form-control" required>
                        <option value="2018">2018</option>
                        <option value="2018">2019</option>
                        <option value="2018">2020</option>
                        <option value="2018">2021</option>
                    </select>
                        <br>
                        <label for="">NOMINAL</label>
                        <input type="number" name="nominal" class="form-control" minlength="4" maxlength="9" min="4" required>
                            <br>
                        <center>
                    <button type="submit" class="btn btn-primary mt-2">Simpan</button>
                        </center>
        </form>
    </div>
</div>