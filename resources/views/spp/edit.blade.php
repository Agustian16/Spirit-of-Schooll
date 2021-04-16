@include('master')

<div class="container">
    <div class="card-body">
        <a href="{{ route('spp.index') }}" class="btn btn-info">Kembali</a>
        <h3 class="text-center">Form Edit SPP</h3>

<form action="{{ route('spp.update',$spps->id) }}" method="POST" class="form-control mt-2">
    @csrf
    @method('PUT')
                <h3>Tahun :</h3>
            <input type="number" name="tahun" value="{{ $spps->tahun}}" class="form-control" min="4">
            <br>
                <h3>Nominal :</h3>
             <input type="number" name="nominal" value="{{ $spps->nominal }}" class="form-control" min="6">
                <br>
                <br>
                <center>
                <button type="submit" class="btn btn-primary">Update Kelas</button>
            </center>
</form>
    </div>
</div>