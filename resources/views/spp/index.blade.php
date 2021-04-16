@include('master')
@include('navbar')


@php
  $i = 1;  
  @endphp
<div class="container">
    <div class="card-block text-center">
        <h3 class="mt-3">Data SPP SMK WIKRAMA 1 GARUT</h3>
            <a href="{{ route('spp.create') }}" class="btn btn-primary" id="tambah">Tambah</a>
            <table id="table-id" class="table table-bordered table-hover mt-3">
    <thead>
        <tr>
            <th>No.</th>
            <th>Tahun</th>
            <th>Nominal</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($spps as $s )
        <tr>
            <td>{{ $i++ }}</td>
            <td>{{ $s->tahun }}</td>
            <td>Rp.{{ $s->nominal }}</td>
            <td>    
                <form action="{{ route('spp.destroy', $s->id) }}" method="POST">
                    <a href="{{ route('spp.edit',$s->id) }}"class="btn btn-warning">Edit</a>
                    <a href="{{ route('spp.show',$s->id) }}"class="btn btn-primary">Show</a>
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