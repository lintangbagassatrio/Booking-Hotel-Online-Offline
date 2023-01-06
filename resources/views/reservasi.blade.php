@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1 class="m-0 text-dark">Reservation</h1>
@stop

@section('content')

<div class="container-fluid">
    <div class="card card-default">
        <div class="card-body">
        <button class="btn btn-primary" data-toggle="modal" data-target="#tambahBukuModal">
                <i class="fa fa-plus"> Tambah Booking</i>
            </button>
            <hr>
            <table id="table-data" class="table table-bordered text-center">
                <thead>
                    <tr class="text-center">
                        <th>No</th>
                        <th>Res. ID</th>
                        <th>User ID</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>No. Kamar</th>
                        <th>Nama Kamar</th>
                        <th>Harga Kamar</th>
                        <th>Tanggal Masuk</th>
                        <th>Tanggal Keluar</th>
                        <th>Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    @php $no=1; @endphp
                    @foreach($reservasi as $reservasi)
                    <tr>
                        <td>{{$no++}}</td>
                        <td>{{$reservasi->users_id}}</td>
                        <td>{{$reservasi->name}}</td>
                        <td>{{$reservasi->email}}</td>
                        <td>{{$reservasi->kamars_id}}</td>
                        <td>{{$reservasi->kelas}}</td>
                        <td>{{$reservasi->jumlahkamar}}</td>
                        <td>{{$reservasi->jumlahorang}}</td>
                        <td>{{$reservasi->datein}}</td>
                        <td>{{$reservasi->dateout}}</td>
                        <td> 
                            <button type="button" class="btn btn-danger" onclick="deleteConfirmation('{{$reservasi->id}}' , '{{$reservasi->kelas}}' )">
                                Hapus
                            </button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-body">
            <table id="table-data" class="table table-bordered">
                <thead>
                    <div class="modal fade" id="tambahBukuModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header"> 
                                    <h5 class="modal-title" id="exampleModalLabel">Tambah Reservation</h5> 
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"> 
                                        <span aria-hidden="true">&times; </span> 
                                    </button> 
                                </div> 
                                <div class="modal-body"> 
                                    <form method="post"  enctype="multipart/form-data"> 
                                        @csrf
                                        @method ('PATCH')
                                        <div class="row"> 
                                            <div class="col"> 
                                            @csrf
                                                <div class="form-group">
                                                    <label for="users_id">Pilih User</label>
                                                    <input type="text"class="form-control" name="users_id" id="tambah-users_id" required/>
                                                </div>
                                                <div class="form-group">
                                                    <label for="name">Nama</label>
                                                    <input type="text"class="form-control" name="name" id="tambah-name" required/>
                                                </div>
                                                <div class="form-group">
                                                    <label for="kamar_is">Pilih Kamar</label>
                                                    <input type="text"class="form-control" name="kamar_is" id="tambah-kamar_id" required/>
                                                </div>
                                                <div class="row">
                                                    <div class="form-group col-6">
                                                        <label for="jumlahkamar">Jumlah Kamar</label>
                                                        <input type="text"class="form-control h-auto" name="jumlahkamar" id="tambah-jumlahkamar" required/>
                                                    </div>
                                                    <div class="form-group col-6">
                                                        <label for="jumlahorang">Jumlah Orang</label>
                                                        <input type="text"class="form-control h-auto" name="jumlahorang" id="tambah-jumlahorang" required/>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="form-group col-6">
                                                        <label for="datein">Tanggal Masuk</label>
                                                        <input type="date"class="form-control h-auto" name="datein" id="tambah-datein" required/>
                                                    </div>
                                                    <div class="form-group col-6">
                                                        <label for="dateout">Tanggal Keluar</label>
                                                        <input type="date"class="form-control h-auto" name="dateout" id="tambah-dateout" required/>
                                                    </div>
                                                </div>
                                            </div> 
                                        </div> 
                                    </div> 
                                    <div class="modal-footer"> 
                                        <input type="hidden" name="id" id="edit-id"/> 
                                        <input type="hidden" name="old_cover" id="edit-old-cover"/> 
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button> 
                                        <button type="submit" class="btn btn-success">Update</button> 
                                    </form> 
                                </div> 
                            </div>
                        </div>
                    </div>
                </thead>
            </table>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="card card-default">
    <div class="card-header">{{__('CHECK OUT')}}</div>
        <div class="card-body">
            <table id="table-data" class="table table-bordered text-center">
                <thead>
                    <tr class="text-center">
                        <th>Reservasi ID</th>
                        <th>User ID</th>
                        <th>Nama</th>
                        <th>Kelas</th>
                        <th>No. Kamar</th>
                        <th>Durasi</th>
                        <th>Opsi</th>
                    </tr>
                </thead>
                <tbody>
                <tr>
                        <td>Angga</td>
                        <td>Angga</td>
                        <td>Angga</td>
                        <td>Angga</td>
                        <td>Angga</td>
                        <td>Angga</td>
                        <td>
                            <div class="btn-group" role="group" aria-label="Basic example"> 
                                <button type="button" class="btn btn-danger" >
                                    Check Out / Hapus
                                </button>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

@stop
