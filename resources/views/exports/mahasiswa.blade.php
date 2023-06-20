<!DOCTYPE html>
<html>

<head>
    <title>Mahasiswa Report</title>
    <style>
        @page {
            size: A4;
            margin: 0;
        }

        body {
            font-family: Arial, sans-serif;
        }

        h1 {
            text-align: center;
            color: black;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            border: 1px solid black;
            padding: 8px;
        }

        th {
            background-color: #2986cc;
        }
    </style>
</head>

<body>
    <h1>Data Mahasiswa</h1>
    <table>
        <thead>
            <tr>
                <th>No.</th>
                <th>Nama</th>
                <th>NIM</th>
                <th>Jenis Kelamin</th>
                <th>Tempat Lahir</th>
                <th>Tanggal Lahir</th>
                <th>Alamat</th>
                <th>Jurusan</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($mahasiswa as $index => $data)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $data->nama }}</td>
                <td>{{ $data->nim }}</td>
                <td>{{ $data->jenis_kelamin ? 'Laki Laki' : 'Perempuan' }}</td>
                <td>{{ $data->tempat_lahir }}</td>
                <td>{{ date('d-M-Y', strtotime($data->tanggal_lahir)) }}</td>
                <td>{{ $data->alamat }}</td>
                <td>{{ $data->jurusan->jurusan }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>