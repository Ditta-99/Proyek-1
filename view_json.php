<style> 

    /* gaya untuk tabel */
    table {
        width: 80%;
        border-collapse: collapse;
        margin: 10px auto;
    }

    /* gaya untuk judul tabel */
    th {
        background-color: blue;   /* warna latar belakang biru untuk judul */
        color: white;
        padding: 10px;
        text-align: center;
    }

    /* gaya untuk data tabel */
    td {
        padding: 8px;
        text-align: center;
        border-bottom: 1px solid #ddd;     /*garis bawah pada setiap baris */
    }

    /* warna selang-seling pada baris data */
    tr:nth-child(odd) {
        background-color: aliceblue;   /*warna abu-abu terang untuk baris ganjil */
    }

    tr:nth-child(even) {
        background-color: white;  /* warna putih untuk baris genap */
    }

    /* gaya untuk tabel ketika disorot */
    tr:hover {
        background-color: #ddd;   /* warna latar belakang saat baris disorot */
    }
</style>

<?php
define('FILE_JSON', 'peserta.json');

function cekFileJson() {
    if (!file_exists(FILE_JSON)) {
        file_put_contents(FILE_JSON, json_encode([]));
    }
    $json = file_get_contents(FILE_JSON);
    return json_decode($json, true);
}

$data_peserta = cekFileJson();
$total_data = count($data_peserta);

if ($total_data == 0) {
    echo "<p>Belum ada data peserta yang disimpan.</p>";
} else {
    echo "<table border='1'>
             <tr>
                 <th>No</th>
                 <th>Nama</th>
                 <th>Email</th>
                 <th>Hp</th>
                 <th>Alamat</th>
             </tr>";

    for ($i = 0; $i < $total_data; $i++) {
        $peserta = $data_peserta[$i];

        // menampilkan No
        echo "<tr><td>" . ($i + 1) . "</td>";

        // menampilkan Username
        echo "<td>" . htmlspecialchars($peserta['nama']) . "</td>";

        // menampilkan Password
        echo "<td>" . htmlspecialchars($peserta['email']) . "</td>";

         // menampilkan Username
        echo "<td>" . htmlspecialchars($peserta['hp']) . "</td>";

        // menampilkan Password
        echo "<td>" . htmlspecialchars($peserta['alamat']) . "</td>";

        echo "</tr>";
    }
    echo "</table>";

    echo "<left><button onclick='window.location.href=\"indexPeserta.html\";'>Kembali</button></left>";
}
?>