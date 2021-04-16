@include('master')
@include('navbar')


<div class="container">
    <div class="card-block text-center">
        <h3 class="mt-3">Data Transaksi SPP SMK WIKRAMA 1 GARUT</h3>
        <br>
        <a href="{{ route('export_excel') }}" class="btn btn-success ml-4">Export Excel</a>
            <a href="{{ route('pembayaran.create') }}" class="btn btn-primary ml-4" id="tambah">Tambah</a>
            <table id="table-id" class="table table-bordered table-hover mt-3">
    <thead>
        <tr>
            <th>No.</th>
            <th>Petugas</th>
            <th>NISN</th>
            <th>Tanggal Bayar</th>
            <th>Bulan Bayar</th>
            <th>Tahun Bayar</th>
            <th>SPP</th>
            <th>Jumlah Bayar</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
@php
  $i = 1;  
  @endphp
        @foreach ($pembayarans as $s )
        <tr>
            <td>{{ $i++ }}</td>

            <td>{{ $s->username }}</td>

            <td>{{ $s->nisn }} - {{ $s->nama }}</td>
            <td>{{ $s->tgl_bayar }}</td>
            <td>{{ $s->bulan_bayar }}</td>
            <td>{{ $s->tahun_bayar }}</td>
            <td>{{ $s->tahun}}</td>
            <td>Rp.{{ $s->jumlah_bayar }}</td>
            <td>    
                <form action="{{ route('pembayaran.destroy', $s->id) }}" method="POST">
                    {{-- <a href="{{ route('pembayaran.edit',$s->id) }}"class="btn btn-warning">Edit</a> --}}
                    <a href="{{ route('pembayaran.show',$s->id) }}"class="btn btn-primary">Cetak</a>
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