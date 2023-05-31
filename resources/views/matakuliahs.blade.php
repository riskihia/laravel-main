<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite('resources/css/app.css')
</head>
<body>
    <h1 class="text-3xl font-bold underline">
        Hello world!
    </h1>
    <div class="grid lg:grid-cols-4 gap-8 p-14">
        @forelse ($matakuliahs as $matakuliah)
        <div class="shadow-lg p-4 bg-violet-400 hover:bg-violet-300">
            <div>{{$matakuliah->id}}</div>
            <div>{{$matakuliah->kode_matakuliah}}</div>
            <div>{{$matakuliah->nama_matakuliah}}</div>
            <div>{{$matakuliah->jumlah_sks}}</div>
            <div>{{$matakuliah->dosen}}</div>
        </div>
        @empty
            <p>data tidak boleh kosong</p>
        @endforelse
    </div>
    {{ $matakuliahs->links() }}
</body>
</html>