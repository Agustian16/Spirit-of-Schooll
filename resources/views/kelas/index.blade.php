@include('master')
@include('navbar')


@php
  $i = 1;  
  @endphp
<div class="container">
    <div class="card-block text-center">
        <h3 class="mt-3">Data Kelas SMK WIKRAMA 1 GARUT</h3>
            <a href="{{ route('kelas.create') }}" class="btn btn-primary" id="tambah">Tambah</a>
            <table id="table-id" class="table table-bordered table-hover mt-3">
    <thead>
        <tr>
            <th>No.</th>
            <th>Kelas</th>
            <th>Kompetensi Keahlian</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($kelas as $s )
        <tr>
            <td>{{ $i++ }}</td>
            <td>{{ $s->nama_kelas }}</td>
            <td>{{ $s->kompetensi_keahlian }}</td>
            <td>    
                <form action="{{ route('kelas.destroy', $s->id) }}" method="POST">
                    <a href="{{ route('kelas.edit',$s->id) }}"class="btn btn-warning">Edit</a>
                    <a href="{{ route('kelas.show',$s->id) }}"class="btn btn-primary">Show</a>
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