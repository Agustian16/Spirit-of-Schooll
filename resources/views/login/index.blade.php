@extends('master')
<br>
<br>
<div class="container">
    <div class="card-body">
        <h1 class="text-center">PEMBAYARAN SPP SMK WIKRAMA 1 GARUT</h1>
        <br>
        <h3>Silahkan Login</h3>

        <style>
            h3{
                text-decoration: underline;
            }
        </style>
        <div class="card">
            <div class="card-body">
        <form action="{{ route('postlogin') }}" method="post" autocomplete="on">
            @csrf
                        <label for="">Username</label>
                    <input type="text" name="username"  class="form-control" required placeholder="masukan Username" autofocus>
                        <br>
                        <label for="">Password</label>
                    <input type="password" name="password"  class="form-control" required placeholder="masukan Password">
                        <center>
                    <button type="submit" class="btn btn-primary mt-4 btn-block">Login</button>
                        </center>
        </form>
    </div>
</div>
    </div>
</div>
