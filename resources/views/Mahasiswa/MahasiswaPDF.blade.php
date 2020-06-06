<!DOCTYPE html>
<html>

<head>
    <style>
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td,
        th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }
    </style>
</head>

<body>

    <h2>Data Mahasiswa</h2>

    <table>
        <tr>
            <th>Nama</th>
            <th>Alamat</th>
            <th>No_HP</th>
        </tr>
        @foreach($mahasiswa as $mhs)
        <tr>
            <td>{{$mhs->nama}}</td>
            <td>{{$mhs->alamat}}</td>
            <td>{{$mhs->no_hp}}</td>
        </tr>
        @endforeach
    </table>

</body>

</html>