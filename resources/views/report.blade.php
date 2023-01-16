@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1 class="m-0 text-dark">Report</h1>
@stop

@section('content')

<div class="container-fluid">
    <div class="card card-default">
    <div class="card-body">
        <div class="card-header">{{__('REPORT RESERVASI')}}
            <hr>
                <a href="#" target="_blank" class="btn btn-secondary">
                <i class="fa fa-print"></i>
                Cetak PDF
            </a>
            <div class="btn-group" role="group" aria-label="Basic Example">
                <a href="#" target="_blank" class="btn btn-info">
                    Export
                </a>
                <a href="" class="btn btn-warning">Import</a>
            </div>
            <hr>
            <table id="table-data" class="table table-bordered text-center">
                <thead>
                    <tr class="text-center">
                        <th>No</th>
                        <th>Res. ID</th>    
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Nama Kamar</th>
                        <th>Harga Kamar</th>
                        <th>Jumlah Kamar</th>
                        <th>Jumlah Orang</th>
                        <th>Tanggal Masuk</th>
                        <th>Tanggal Keluar</th>
                        <th>Bukti Pembayaran</th>
                    </tr>
                </thead>
                <tbody>
                    @php $no=1; @endphp
                    @foreach($reservasi as $reservasi)
                        <tr>
                            <td>{{$no++}}</td>
                            <td>{{$reservasi->id}}</td>
                            <td>{{$reservasi->relationToUser->name}}</td>
                            <td>{{$reservasi->relationToUser->email}}</td>
                            <td>{{$reservasi->relationToKamar->kelas}}</td>
                            <td>{{$reservasi->relationToKamar->harga}}</td>
                            <td>{{$reservasi->jumlahkamar}}</td>
                            <td>{{$reservasi->jumlahorang}}</td>
                            <td>{{$reservasi->datein}}</td>
                            <td>{{$reservasi->dateout}}</td>
                            <td>
                                @if($reservasi->picture !== null)
                                    <img src="{{asset('storage/picture_kamar/'.$kamar->picture)}}" width="100px">
                                @else
                                    [Tidak Ada]
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        </div>
    </div> 
</div>

<div class="container-fluid">
    <div class="card card-default">
    <div class="card-body">
        <div class="card-header">{{__('REPORT USER')}}
            <hr>
                <a href="{{route('admin.print.users')}}" target="_blank" class="btn btn-secondary">
                <i class="fa fa-print"></i>
                Cetak PDF
            </a>
            <div class="btn-group" role="group" aria-label="Basic Example">
                <a href="#" target="_blank" class="btn btn-info">
                    Export
                </a>
                <a href="" class="btn btn-warning">Import</a>
            </div>
            <hr>
        <table id="table-data" class="table table-bordered text-center">
                        <thead>
                            <tr class="text-center">
                                <th>No. User</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Telepon</th>
                                <th>Alamat</th>
                                <th>Picture</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $no=1; @endphp
                            @foreach($users as $user)
                            <tr>
                                <td>{{$no++}}</td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->phone}}</td>
                                <td>{{$user->address}}</td>
                                <td>
                                    @if($user->picture !== null)
                                        <img src="{{asset('storage/picture_user/'.$user->picture)}}" width="100px">
                                    @else
                                            [Gambar Tidak Tersedia]
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
    </div> 
    </div> 
    </div> 
</div>

<div class="container-fluid">
    <div class="card card-default">
    <div class="card-body">
        <div class="card-header">{{__('REPORT KAMAR')}}
            <hr>
                <a href="{{route('admin.print.kamars')}}" target="_blank" class="btn btn-secondary">
                <i class="fa fa-print"></i>
                Cetak PDF
            </a>
            <div class="btn-group" role="group" aria-label="Basic Example">
                <a href="#" target="_blank" class="btn btn-info">
                    Export
                </a>
                <a href="" class="btn btn-warning">Import</a>
            </div>
            <hr>
        <table id="table-data" class="table table-bordered text-center">
                        <thead>
                            <tr class="text-center">
                                <th>No. Kamar</th>
                                <th>Nama Kelas</th>
                                <th>Status</th>
                                <th>Harga</th>
                                <th>Fasilitas</th>
                                <th>Picture</th>
                            </tr>
                        </thead>
                        <tbody>
                        @php $no=1; @endphp
                            @foreach($kamar as $kamar)
                            <tr>
                                <td>{{$no++}}</td>
                                <td>{{$kamar->kelas}}</td>
                                <td>{{$kamar->status}}</td>
                                <td>{{$kamar->harga}}</td>
                                <td>{{$kamar->fasilitas}}</td>
                                <td>
                                    @if($kamar->picture !== null)
                                        <img src="{{asset('storage/picture_kamar/'.$kamar->picture)}}" width="100px">
                                    @else
                                            [Gambar Tidak Tersedia]
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
        </div>
    </div> 
</div>


@stop
