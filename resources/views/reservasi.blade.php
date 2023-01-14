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
                        <th>Jumlah Kamar</th>
                        <th>Jumlah Orang</th>
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
                            <td>{{$reservasi->id}}</td>
                            <td>{{$reservasi->relationToUser->id}}</td>
                            <td>{{$reservasi->relationToUser->name}}</td>
                            <td>{{$reservasi->relationToUser->email}}</td>
                            <td>{{$reservasi->relationToKamar->id}}</td>
                            <td>{{$reservasi->relationToKamar->kelas}}</td>
                            <td>{{$reservasi->relationToKamar->harga}}</td>
                            <td>{{$reservasi->jumlahkamar}}</td>
                            <td>{{$reservasi->jumlahorang}}</td>
                            <td>{{$reservasi->datein}}</td>
                            <td>{{$reservasi->dateout}}</td>
                            <td>
                                <button type="button" id="btn-edit-reservasi" class="btn btn-success" data-toggle="modal" data-target="#edit" data-id="{{ $reservasi->id }}">
                                    Edit
                                </button> 
                                <button type="button" class="btn btn-danger" onclick="deleteConfirmation('{{$reservasi->id}}' , '{{$reservasi->relationToUser->name}}' )">
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
                                    <form method="post" action="{{ route('admin.reservasi.submit')}}" enctype="multipart/form-data"> 
                                        @csrf
                                        <div class="form-group">
                                            <label for="users_id">Pilih User</label>
                                            <select name="users_id" class="form-control" id="selectuser">
                                                @foreach($users as $key => $value)
                                                    <option value="{{ $value-> id}}" id="getname" >{{ $value-> name}}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="kamars_id">Pilih Kelas</label>
                                            <select name="kamars_id" class="form-control" id="selectkamar">
                                                @foreach($kamar as $key => $value)
                                                    <option value="{{ $value-> id}}" id="getname" >{{ $value-> kelas}}</option>
                                                @endforeach
                                            </select>
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
                                        <div class="modal-footer"> 
                                            <input type="hidden" name="id" id="edit-id"/> 
                                            <input type="hidden" name="old_cover" id="edit-old-cover"/> 
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button> 
                                            <button type="submit" class="btn btn-success">Tambah</button> 
                                        </div> 
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

<div class="modal fade" id="edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"> 
    <div class="modal-dialog modal-lg"> 
        <div class="modal-content"> 
            <div class="modal-header"> 
                <h5 class="modal-title" id="exampleModalLabel">Edit Data Reservasi</h5> 
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"> 
                    <span aria-hidden="true">&times; </span> 
                </button> 
            </div> 
            <div class="modal-body"> 
                <form method="post" action="{{ route('admin.reservasi.update') }}" enctype="multipart/form-data"> 
                    @csrf
                    @method ('PATCH')
                    <div class="row"> 
                        <div class="col"> 
                        @csrf
                            <div class="row">
                                <div class="form-group col-6">                                        
                                    <label for="users_id">Id User</label>
                                    <input type="text"class="form-control h-auto" name="users_id" id="edit-users_id" readonly/>
                                </div>
                                <div class="form-group col-6">
                                    <label for="kamars_id">Pilih Kelas</label>
                                    <select name="kamars_id" class="form-control" id="kamars_id">
                                        @foreach($kamar as $key => $value)
                                            <option value="{{ $value-> id}}" id="getname" >{{ $value-> kelas}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-6">                                        
                                    <label for="jumlahkamar">Jumlah Kamar</label>
                                    <input type="text"class="form-control h-auto" name="jumlahkamar" id="edit-jumlahkamar" required/>
                                </div>
                                <div class="form-group col-6">
                                    <label for="jumlahorang">Jumlah Orang</label>
                                     <input type="text"class="form-control h-auto" name="jumlahorang" id="edit-jumlahorang" required/>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-6">
                                    <label for="datein">Tanggal Masuk</label>
                                    <input type="date"class="form-control h-auto" name="datein" id="edit-datein" required/>
                                </div>
                                <div class="form-group col-6">
                                    <label for="dateout">Tanggal Keluar</label>
                                    <input type="date"class="form-control h-auto" name="dateout" id="edit-dateout" required/>
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

@section('js')
    <script>    
        // $(document).ready(function () {
        //         $("#selectuser").change(function () {
        //             var selectedVal = $("#selectuser option:selected").val();
        //             $('#name_user').val(selectedVal);
        //         });
        //     });

        // MENGAMBIL VALUE DARI KUNJUNGAN
        $(function(){
            $(document).on('click','#btn-edit-reservasi', function(){
                let id = $(this).data('id');
                $.ajax({
                    type: "GET",
                    url: "{{url('/admin/ajaxadmin/dataReservasi')}}/" + id,
                    datatype: 'json',
                    success: function(res){
                        $('#edit-users_id').val(res.users_id);
                        $('#edit-kamars_id').val(res.kamars_id);
                        $('#edit-jumlahkamar').val(res.jumlahkamar);
                        $('#edit-jumlahorang').val(res.jumlahorang);
                        $('#edit-datein').val(res.datein);
                        $('#edit-dateout').val(res.dateout);
                    },
                });
            });
        });

        function deleteConfirmation(id,name) { 
            swal.fire({ 
                title: "Hapus?", 
                type: 'warning', 
                text: "Apakah ands yakin akan menghapus data dengan Nama " +name+"?!", 
                showCancelButton: !0,
                confirmButtonText: "Ya, lakukan!", 
                cancelButtonText: "Tidak, batalkan!", 
                 
            }).then (function (e) { 
                if (e.value === true) {
                    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content'); 
                    $.ajax({ 
                        type: 'POST', 
                        url: "reservasi/delete/" + id, 
                        data: {_token: CSRF_TOKEN}, 
                        dataType: 'JSON', 
                        success: function (results) { 
                            if (results.success === true) { 
                                swal.fire("Done!", results.message, "success"); 
                                setTimeout(function(){ 
                                    location.reload(); 
                                },1000);
                            } else { 
                                 swal.fire("Error!", results.message, "error");
                            }
                        }
                    }); 
                } else { 
                    e.dismiss; 
                } 
            }, function (dismiss) {
                 return false; 
            })
        } 
    </script>
@stop
