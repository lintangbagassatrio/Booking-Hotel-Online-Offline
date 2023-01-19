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
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Nama Kamar</th>
                        <th>Harga Kamar</th>
                        <th>Jumlah Kamar</th>
                        <th>Jumlah Orang</th>
                        <th>Tanggal Masuk</th>
                        <th>Tanggal Keluar</th>
                        <th>Bukti Pembayaran</th>
                        <th>Opsi</th>
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
                                    <img src="{{asset('storage/picture_reservasi/'.$reservasi->picture)}}" width="100px">
                                @else
                                    [Tidak Ada]
                                @endif
                            </td>
                            <td>
                                <button type="button" id="btn-edit-reservasi" class="btn btn-success" data-toggle="modal" data-target="#edit" data-id="{{ $reservasi->id }}">
                                    Upload
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
                            <div class="form-group" id="image-area"></div> 
                                <div class="form-group"> 
                                    <label for="edit-picture">Tambah Bukti Pembayaran</label> 
                                    <input type="file" class="form-control h-auto" name="picture" id="edit-picture"/> 
                                </div> 
                            </div> 
                        <div class="form-group"> 
                            <input type="text" class="form-control" name="users_id" id="edit-users_id" hidden/>
                            <input type="text" class="form-control" name="kamars_id" id="edit-kamars_id" hidden/>
                            <input type="text" class="form-control" name="jumlahkamar" id="edit-jumlahkamar" hidden/>
                            <input type="text" class="form-control" name="jumlahorang" id="edit-jumlahorang" hidden/>
                            <input type="text" class="form-control" name="datein" id="edit-datein" hidden/>
                            <input type="text" class="form-control" name="dateout" id="edit-dateout" hidden/>
                        </div> 
                    </div>
                </div> 
                <div class="modal-footer"> 
                    <input type="hidden" name="id" id="edit-id"/> 
                    <input type="hidden" name="old_cover" id="edit-old-cover"/> 
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button> 
                    <button type="submit" class="btn btn-success">Upload</button> 
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
                        <th>Opsi</th>
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
                                    [Tidak Ada]
                                @endif
                            </td>
                            <td>
                                <button type="button" class="btn btn-danger" onclick="deleteConfirmation2('{{$checkout->id}}' , '{{$checkout->relationToUser->name}}' )">
                                    CO/DEL
                                </button>
                            </td>
                        </tr>
                    @endforeach
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

        $(function(){ 
            $(document).on('click','#btn-edit-reservasi', function(){ 
                let id = $(this).data('id'); 
                $('#image-area').empty(); 
                $('#old_id').val(id);
                
                $.ajax({ 
                    type: "get", 
                    url: "{{url('/admin/ajaxadmin/dataReservasi')}}/"+id, 
                    dataType: 'json', 
                    success: function(res){   
                        $('#edit-id').val(res.id); 
                        $('#edit-users_id').val(res.users_id); 
                        $('#edit-kamars_id').val(res.kamars_id);
                        $('#edit-jumlahkamar').val(res.jumlahkamar); 
                        $('#edit-jumlahorang').val(res.jumlahorang); 
                        $('#edit-datein').val(res.datein); 
                        $('#edit-dateout').val(res.dateout); 
                        $('#edit-old-picture').val(res.picture); 
                        if (res.picture !== null) { 
                            $('#image-area').append("<img src='"+baseurl+"/storage/picture_reservasi/"+res.picture+"' width='200px'/>" );
                        } else { 
                            $('#image-area').append('[Gambar tidak tersedia]'); 
                        }
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
        function deleteConfirmation2(id,name) { 
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
                        url: "checkout/delete/" + id, 
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
