<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" >
</head>
<body>
    <h1 class="text-center">Data Kamars</h1>
    <p class="text-center">Laporan Data Kamars Tahun 2022</p>
    <br>
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
</body>
</html>