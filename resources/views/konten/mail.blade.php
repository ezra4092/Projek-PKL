<!DOCTYPE html>
<html>
<head>
    <title>Pengingat Sertifikat</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
    </style>
</head>
<body>
    <h1>Halo {{ $sertifikat->user->nama }},</h1>
    <p>Ini adalah pengingat bahwa sertifikat ISO Anda akan kedaluwarsa pada {{ $sertifikat->tgl_kadaluwarsa }}.</p>

    <h2>Detail Sertifikat</h2>
    <table>
        <tr>
            <th>ID Sertifikat</th>
            <th>Nama Sertifikat</th>
            <th>Jenis Sertifikat</th>
            <th>Tanggal Kedaluwarsa</th>
        </tr>
        <tr>
            <td>{{ $sertifikat->idsertif }}</td>
            <td>{{ $sertifikat->nama_sertif }}</td>
            <td>{{ $sertifikat->jenis }}</td>
            <td>{{ \Carbon\Carbon::parse($sertifikat->tgl_kadaluwarsa)->format('d M Y') }}</td>
        </tr>
    </table>

    <p>Harap periksa sertifikat Anda dan lakukan tindakan yang diperlukan.</p>
    <p>Terima kasih!</p>
</body>
</html>
