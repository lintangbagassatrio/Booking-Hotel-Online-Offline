@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1 class="m-0 text-dark">USER</h1>
@stop

@section('content')

<div class="row">
    <div class="col-3">
        <div class="card card-default">
            <div class="card-header">{{__('Tambah User')}}</div>
            <div class="card-body">
                <table id="table-data" class="table table-bordered">
                    <thead>
                        <form method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="name">Nama</label>
                                 <input type="text"class="form-control" name="name" id="name" required/>
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                 <input type="text"class="form-control" name="email" id="email" required/>
                            </div>
                            <div class="form-group">
                                <label for="phone">No. Telepon</label>
                                <input type="text"class="form-control" name="phone" id="phone" required/>
                            </div>
                            <div class="form-group">
                                <label for="address">Alamat</label>
                                <input type="text"class="form-control h-auto" name="address" id="address" required/>
                            </div>
                            <div class="form-group">
                                <label for="picture">Picture</label>
                                <input type="file"class="form-control h-auto" name="picture" id="picture" required/>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Tambah</button>
                            </div>
                        </form>
                    </thead>
                </table>
            </div>
        </div>
    </div>

    <div class="col-9">
        <div class="card card-default">
            <div class="card-header">{{__('List User')}}</div>
                <div class="card-body">
                    <table id="table-data" class="table table-bordered text-center">
                        <thead>
                            <tr class="text-center">
                                <th>No. User</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Telepon</th>
                                <th>Alamat</th>
                                <th>Foto</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"> 
    <div class="modal-dialog modal-lg"> 
        <div class="modal-content"> 
            <div class="modal-header"> 
                <h5 class="modal-title" id="exampleModalLabel">Edit Data User</h5> 
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"> 
                    <span aria-hidden="true">&times; </span> 
                </button> 
            </div> 
            <div class="modal-body"> 
                <form method="post"  enctype="multipart/form-data"> 
                    @method ('PATCH')
                    @csrf
                    <div class="row"> 
                        <div class="col-md-6"> 
                            <div class="form-group">
                                <label for="name">Nama</label>
                                 <input type="text" class="form-control" name="name" id="edit-name" required/>
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                 <input type="text" class="form-control" name="email" id="edit-email" required/>
                            </div>
                            <div class="form-group">
                                <label for="phone">No. Telepon</label>
                                <input type="text" class="form-control" name="phone" id="edit-phone" required/>
                            </div>
                            <div class="form-group">
                                <label for="address">Alamat</label>
                                <input type="text" class="form-control h-auto" name="address" id="edit-address" required/>
                            </div>
                        </div> 
                        <div class="col-and-6"> 
                            <div class="form-group" id="image-area"></div> 
                            <div class="form-group"> 
                                <label for="edit-picture">Picture</label> 
                                <input type="file" class="form-control h-auto" name="picture" id="edit-picture"/> 
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

@stop