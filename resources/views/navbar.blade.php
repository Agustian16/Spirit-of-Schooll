


     <link rel="stylesheet" href="{{asset('assets/bootstrap.min.css')}}"> 
     <script src="{{asset('assets/bootstrap.min.js')}}"></script> 
{{-- Navbar --}}

<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #e3f2fd;"">
    <a class="navbar-brand" href="{{ route('siswa.index') }}">Pembayaran SPP WIGAR</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        @if(auth()->user()->level=='admin')
        <li class="nav-item">
            <a class="nav-link" href="{{ route('siswa.index') }}">SISWA</a>
          </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('kelas.index') }}">KELAS</a>
          </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('spp.index') }}">SPP</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('petugas.index') }}">PETUGAS</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('pembayaran.index') }}">PEMBAYARAN</a>
          </li>
          
          <li class="nav-item">
            <a class="nav-link" href="{{ route('history.index') }}">HISTORY TRANSAKSI</a>
          </li>
          @elseif (auth()->user()->level=='petugas')
          <li class="nav-item">
            <a class="nav-link" href="{{ route('pembayaran.index') }}">PEMBAYARAN</a>
          </li>
          
          <li class="nav-item">
            <a class="nav-link" href="{{ route('history.index') }}">HISTORY TRANSAKSI</a>
          </li>

          @elseif (auth()->user()->level=='siswa')
          <li class="nav-item">
            <a class="nav-link" href="{{ route('history.index') }}">HISTORY TRANSAKSI</a>
          </li>
          @endif

        </ul>
        <a href="{{ route('logout') }}" class="btn btn-outline-success my-2 my-sm-0 mr-4">Keluar</a>
    </div>
  </nav>
{{-- End of Navbar --}}