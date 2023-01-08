@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1 class="m-0 text-dark">ROOM</h1>
@stop

@section('content')

<div class="row">
    <div class="col-3">
        <div class="card card-default">
            <div class="card-header">{{__('Tambah Kamar')}}</div>
            <div class="card-body">
                <table id="table-data" class="table table-bordered">
                    <thead>
                        <form method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="kelas">Nama Kelas</label>
                                 <input type="text"class="form-control" name="kelas" id="kelas" required/>
                            </div>
                            <div class="form-group">
                                <label for="harga">Harga</label>
                                 <input type="text"class="form-control" name="harga" id="harga" required/>
                                 <input type="hidden"class="form-control" name="status" id="status" value="Kosong"/>
                            </div>
                            <div class="form-group">
                                <label for="fasilitas">Fasilitas</label>
                                <input type="text"class="form-control h-auto" name="fasilitas" id="fasilitas" required/>
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
            <div class="card-header">{{__('List Kamar')}}</div>
                <div class="card-body">
                    <table id="table-data" class="table table-bordered text-center">
                        <thead>
                            <tr class="text-center">
                                <th>No. Kamar</th>
                                <th>Nama Kelas</th>
                                <th>Status</th>
                                <th>Harga</th>
                                <th>Picture</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
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
                <h5 class="modal-title" id="exampleModalLabel">Edit Data Kamar</h5> 
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"> 
                    <span aria-hidden="true">&times; </span> 
                </button> 
            </div> 
            <div class="modal-body"> 
                <form method="post" enctype="multipart/form-data"> 
                    @csrf
                    @method ('PATCH')
                    <div class="row"> 
                        <div class="col"> 
                        @csrf
                            <div class="form-group">
                                <label for="kelas">Nama Kelas</label>
                                 <input type="text"class="form-control" name="kelas" id="edit-kelas" required/>
                            </div>
                            <div class="form-group">
                                <label for="status">Status</label>
                                 <input type="text"class="form-control" name="status" id="edit-status" required/>
                            </div>
                            <div class="form-group">
                                <label for="harga">Harga</label>
                                <input type="text"class="form-control" name="harga" id="edit-harga" required/>
                            </div>
                            <div class="form-group">
                                <label for="fasilitas">Fasilitas</label>
                                <input type="text"class="form-control h-auto" name="fasilitas" id="edit-fasilitas" required/>
                            </div>
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