<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            /* Untuk memusatkan tabel */
            margin: 0;
            padding: 20px;
        }

        table {
            border-collapse: collapse;
            width: 50%;
            /* Membatasi lebar tabel menjadi 50% dari lebar layar */
            margin: 20px auto;
            /* Memusatkan tabel secara horizontal */
            table-layout: auto;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
            vertical-align: top;
        }

        th {
            background-color: #f4f4f4;
            width: 30%;
            /* Membatasi lebar kolom nama */
        }

        td {
            max-width: 70%;
            /* Membatasi lebar kolom nilai */
            word-wrap: break-word;
            /* Membungkus teks panjang */
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:hover {
            background-color: #f1f1f1;
        }
    </style>
</head>

<body>
    <p>Hallo, <strong>{{ $nama }}</strong></p>
    <p>Kamu Melakukan Tambah Data</p>
    <table>
        <tr>
            <th>Nama</th>
            <td>{{ $data->nama }}</td>
        </tr>
        <tr>
            <th>Pekerjaan</th>
            <td>{{ $data->pekerjaan }}</td>
        </tr>
        <tr>
            <th>Alamat</th>
            <td>{{ $data->alamat }}</td>
        </tr>
    </table>
</body>

</html>