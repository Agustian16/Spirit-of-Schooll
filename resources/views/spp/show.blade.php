@include('master')

<div class="container">
    <div class="card-body">
        <a href="{{ route('spp.index') }}" class="btn btn-info">Kembali</a>
        <h3 class="text-center">Detail SPP</h3>

        {{-- <div class="card-body">
            @if(auth()->user()->is_admin == 1)
            <a href="{{url('admin/routes')}}">Admin</a>
            @else
            <div class=”panel-heading”>Normal User</div>
            @endif
        </div> --}}

<form class="form-control mt-2">
    @foreach ($spps as $kelas )
    <h3>Nama Kelas :</h3>
    <input type="text" name="tahun" value="{{ $kelas->tahun }}" class="form-control" disabled>
    <br>
    <h3>Kompetensi Keahlian :</h3>
    <input type="text" name="nominal" value="{{ $kelas->nominal }}" class="form-control" disabled>
    
    @endforeach        
</form>
</div>
</div>