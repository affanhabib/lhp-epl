@extends('layouts.app')

@section('content')
<div class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/home">Home</a></li>
            <li class="breadcrumb-item"><a href="/daftar-pengiriman-laporan">Pengiriman Laporan</a></li>
            <li class="breadcrumb-item active" aria-current="page">Tambah Pengiriman Laporan</li>
        </ol>
    </nav>
    <h4 class="mb-3">Tambah Pengiriman Laporan</h4>
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
    <form action="{{route('daftar-pengiriman-laporan.store')}}" method="POST">
        @csrf
        <div class="form-group">
            <label for="">Nama Laporan</label>
            <input type="text" class="form-control" id="namaLaporan" name="namaLaporan">
        </div>
        <div class="form-group">
            <label for="">Instansi Penerima</label>
            <input type="text" class="form-control" id="instansiPenerima" name="instansiPenerima">
        </div>
        <div class="form-group">
            <label for="">Alamat Instansi Penerima</label>
            <input type="text" class="form-control" id="alamatInstansi" name="alamatInstansi">
        </div>
        <div class="form-group">
            <label for="">Keterangan</label>
            <textarea class="form-control" id="keterangan" name="keterangan" rows='3'></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Tambah Laporan</button>
    </form>
</div>
@endsection