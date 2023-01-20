@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1 class="m-0 text-dark">Report</h1>
@stop

@section('content')

<!-- User -->
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
                <a href="{{route('admin.report.exportuser')}}" target="_blank" class="btn btn-info">
                    Export
                </a>
                <button class="btn btn-warning" type="button" data-toggle="modal" data-target="#importDataUser">Import</button>
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
<div class="modal fade" id="importDataUser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="moda-title">Import Data</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="{{ route('admin.report.importuser') }}" enctype="multipart/form-data">
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