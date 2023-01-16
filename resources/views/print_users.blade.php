<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" >
</head>
<body>
    <h1 class="text-center">Data User</h1>
    <p class="text-center">Laporan Data User Tahun 2022</p>
    <br>
    <table id="table-data" class="table table-bordered text-center">
                        <thead>
                            <tr class="text-center">
                                <th>No. User</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Telepon</th>
                                <th>Alamat</th>
                                <th>Foto</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $no=1; @endphp
                            @foreach($user as $user)
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
</body>
</html>