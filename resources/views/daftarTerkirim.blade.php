@extends('layouts.app')

@section('content')
<div class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/home">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Laporan Terkirim</li>
        </ol>
    </nav>
    <h4 class="mb-3">Daftar Laporan Terkirim</h4>
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif

    @if(\Session::has('success'))
        <div class="alert alert-success">
            <p>{{\Session::get('success')}}</p>
        </div>
    @endif
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nama Laporan</th>
                <th scope="col">Instansi Penerima</th>
                <th scope="col">Alamat</th>
                <th scope="col">Action</th>
                <th scope="col">Status</th>
            </tr>
        </thead>
        <tbody>
            @php $i=1 @endphp
            @foreach($data['laporans'] as $laporan)
            @if($laporan->isTerkirim == 1)
                <tr>
                    <td>{{ $i++ }}</td>
                    <td>{{ $laporan->nama_laporan }}</td>
                    <td>{{ $laporan->instansi_penerima }}</td>
                    <td>{{ $laporan->alamat_instansi }}</td>
                    <td>
                        <a href="{{route('konfirmasi-pengiriman.show', $laporan->id)}}" class="btn btn-primary">Detail</a>
                        @if($laporan->getTindakLanjutRelation == null)
                            <a href="{{route('tindak-lanjut.createtindaklanjut',$laporan->id)}}" class="btn btn-danger">Tindak Lanjut</a>
                        @else
                            <a href="{{route('tindak-lanjut.show', $laporan->id)}}" class="btn btn-success">Detail Tindak Lanjut</a>
                        @endif
                    </td>
                    <td>
                        @foreach ($data['tindakLanjuts'] as $item)
                            @if ($laporan->id == $item->laporan_id)
                                @if ($item->isDone == 1)
                                    <p>Selesai</p>
                                @else
                                    <p>Belum Selesai</p>
                                @endif
                            @endif
                        @endforeach
                    </td>
                </tr>
            @endif
            @endforeach
        </tbody>
    </table>
</div>
@endsection