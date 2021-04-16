@include('master')
@include('navbar')


@php
  $i = 1;  
  @endphp
<div class="container">
    <div class="card-block text-center">
        <h3 class="mt-3">Data Siswa SMK WIKRAMA 1 GARUT</h3>
            <a href="{{ route('siswa.create') }}" class="btn btn-primary" id="tambah">Tambah</a>
            <table id="table-id" class="table table-bordered table-hover mt-3">
    <thead>
        <tr class="col">
            <th>No.</th>
            <th>NISN</th>
            <th>NIS</th>
            <th>Nama</th>
            <th>Kelas</th>
            <th>Alamat</th>
            <th>No.Telp</th>
            <th>SPP</th>
            <th class="text-center">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($siswas as $s )
        <tr>
            <td>{{ $i++ }}</td>
            <td>{{ $s->nisn }}</td>
            <td>{{ $s->nis }}</td>
            <td>{{ $s->nama }}</td>
            <td>{{ $s->nama_kelas }} - {{ $s->kompetensi_keahlian }}</td>
            <td>{{ $s->alamat }}</td>
            <td>{{ $s->no_telp }}</td>
            <td>{{ $s->tahun }}</td>
            <td class="col text-center">    
                <form action="{{ route('siswa.destroy', $s->nisn) }}" method="POST">
                    <a href="{{ route('siswa.edit',$s->nisn) }}"class="btn btn-warning">Edit</a>
                    <a href="{{ route('siswa.show',$s->nisn) }}"class="btn btn-primary">Show</a>
                    @csrf
                    @method('DELETE')
                <button type="submit" onclick="return confirm('Anda yakin ingin menghapus data ini?..')" class="btn btn-danger">Hapus</button>
            </form>
            </td>
        </tr>
        @endforeach
    </tbody>

</table>
    </div>
</div>