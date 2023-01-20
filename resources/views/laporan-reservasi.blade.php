@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1 class="m-0 text-dark">Report</h1>
@stop

@section('content')

<!-- Reservasi -->
<div class="container-fluid">
    <div class="card card-default">
    <div class="card-body">
        <div class="card-header">{{__('REPORT RESERVASI')}}
            <hr>
                <a href="{{route('admin.print.reservasis')}}" target="_blank" class="btn btn-secondary">
                <i class="fa fa-print"></i>
                Cetak PDF
            </a>
            <div class="btn-group" role="group" aria-label="Basic Example">
                <a href="{{route('admin.report.exportreservasi')}}" target="_blank" class="btn btn-info">
                    Export
                </a>
                <button class="btn btn-warning" type="button" data-toggle="modal" data-target="#importDataReservasi">Import</button>
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
                    @foreach($checkout as $checkout)
                        <tr>
                            <td>{{$no++}}</td>
                            <td>{{$checkout->id}}</td>
                            <td>{{$checkout->relationToUser->name}}</td>
                            <td>{{$checkout->relationToUser->email}}</td>
                            <td>{{$checkout->relationToKamar->kelas}}</td>
                            <td>{{$checkout->relationToKamar->harga}}</td>
                            <td>{{$checkout->jumlahkamar}}</td>
                            <td>{{$checkout->jumlahorang}}</td>
                            <td>{{$checkout->datein}}</td>
                            <td>{{$checkout->dateout}}</td>
                            <td>
                                @if($checkout->picture !== null)
                                    <img src="{{asset('storage/picture_checkout/'.$checkout->picture)}}" width="100px">
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
<div class="modal fade" id="importDataReservasi" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="moda-title">Import Data</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="{{ route('admin.report.importreservasi') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="cover">Upload File</label>
                        <input type="file" class="form-control" name="file"/>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary">Import Data</button>
                </form>
            </div>
        </div>
    </div>
</div>

@stop