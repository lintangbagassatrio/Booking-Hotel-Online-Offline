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
                                    <img src="{{asset('storage/picture_kamar/'.$kamar->picture)}}" width="100px">
                                @else
                                    [Tidak Ada]
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
</body>
</html>