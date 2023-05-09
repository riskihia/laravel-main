<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="/css/bootstrap.min.css" rel="stylesheet">
  <title>Data Matakuliah</title>
</head>
<body>

<div class="container mt-3">
  <div class="row">
    <div class="col-12">

    <div class="py-4">
      <h2>Tabel Matakuliah</h2>
    </div>

    <table class="table table-striped">
      <thead>
        <tr>
          <th>ID</th>
          <th>Kode Matakuliah</th>
          <th>Nama Matakuliah</th>
          <th>Jumlah SKS</th>
          <th>Nama Dosen</th>
        </tr>
      </thead>
      <tbody>
        @forelse ($matakuliahs as $matakuliah)
        <tr>
          <th>{{$matakuliah->id}}</th>
          <td>{{$matakuliah->kode_matakuliah}}</td>
          <td>{{$matakuliah->nama_matakuliah}}</td>
          <td>{{$matakuliah->jumlah_sks}}</td>
          <td>{{$matakuliah->nama_dosen}}</td>
        </tr>
        @empty
          <td colspan="6" class="text-center">Tidak ada data...</td>
        @endforelse
      </tbody>
    </table>
    </div>
  </div>
</div>

</body>
</html>
