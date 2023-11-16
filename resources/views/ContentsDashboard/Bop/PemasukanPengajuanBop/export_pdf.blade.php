<!DOCTYPE html>
<html>
<head>
    <title>Laporan Biaya Kepegawaian</title>
</head>
<body>
    <h1>Laporan Biaya Kepegawaian</h1>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Unsur Biaya</th>
                <th>Tanggal</th>
                <th>Pengajuan</th>
                <th>Keterangan</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($bop as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->unsurbiaya }}</td>
                    <td>{{ $item->tanggal }}</td>
                    <td>{{ $item->pengajuan }}</td>
                    <td>{{ $item->keterangan }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
