@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1 class="m-0 text-dark">Report</h1>
@stop

@section('content')

<!-- Kamar -->
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
                <a href="{{route('admin.report.exportkamar')}}" target="_blank" class="btn btn-info">
                    Export
                </a>
                <button class="btn btn-warning" type="button" data-toggle="modal" data-target="#importDataKamar">Import</button>
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
<div class="modal fade" id="importDataKamar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="moda-title">Import Data</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="{{ route('admin.report.importkamar') }}" enctype="multipart/form-data">
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