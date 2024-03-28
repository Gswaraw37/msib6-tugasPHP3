<?php
$nm = 'Genta Swara';
$kel = 'Kelompok 3';

$a1 = ['nama'=>'Ahmad Budi', 'nim'=>20011001, 'nilai'=>85];
$a2 = ['nama'=>'Siti Fatimah', 'nim'=>20011020, 'nilai'=>53];
$a3 = ['nama'=>'Andi Wijaya', 'nim'=>20011103, 'nilai'=>92];
$a4 = ['nama'=>'Dewi Susanti', 'nim'=>20011014, 'nilai'=>20];
$a5 = ['nama'=>'Fajar Pratama', 'nim'=>20011205, 'nilai'=>88];
$a6 = ['nama'=>'Rina Utami', 'nim'=>20011046, 'nilai'=>50];
$a7 = ['nama'=>'Irfan Santoso', 'nim'=>20011037, 'nilai'=>90];
$a8 = ['nama'=>'Maya Putri', 'nim'=>20011048, 'nilai'=>70];
$a9 = ['nama'=>'Dian Prasetyo', 'nim'=>20011069, 'nilai'=>45];
$a10 = ['nama'=>'Nia Rahman', 'nim'=>20011010, 'nilai'=>87];

$ar_mhs = [$a1,$a2,$a3,$a4,$a5,$a6,$a7,$a8,$a9,$a10];

$ar_judul = ['No', 'Nama Mahasiswa', 'NIM', 'Nilai', 'Keterangan', 'Grade', 'Predikat'];

$nilai = array_column($ar_mhs, 'nilai');
$nilai_tertinggi = max($nilai);
$nilai_terendah = min($nilai);
$jumlah_mhs = count($ar_mhs);
$jumlah_nilai = array_sum($nilai);
$nilai_rata2 = $jumlah_nilai / $jumlah_mhs;

$footer = [
    'Nilai Tertinggi' => $nilai_tertinggi,
    'Nilai Terendah' => $nilai_terendah,
    'Nilai Rata-rata' => $nilai_rata2,
    'Jumlah Mahasiswa' => $jumlah_mhs,
    'Jumlah Keseluruhan Nilai' => $jumlah_nilai,
]
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tugas3 PHP - Genta Swarawisesa Erliarto Putra</title>
</head>
<body>
    <h1 align='center'>Daftar Nilai Mahasiswa</h1>
    <table border=1 cellspacing='1' cellpadding='10' width="100%">
        <thead>
            <tr bgcolor="cyan">
                <?php
                    foreach ($ar_judul as $judul) {
                ?>
                    <th><?= $judul ?></th>
                <?php
                    }
                ?>
            </tr>
        </thead>
        <tbody align="center">
            <?php
                $no = 1;
                foreach ($ar_mhs as $mhs) {
                    $warna = ($no % 2 == 0) ? 'pink' : 'snow';
                    $ket = ($mhs['nilai'] >= 65) ? 'Lulus' : 'Gagal';

                    if ($mhs['nilai'] >= 85 && $mhs['nilai'] <= 100) {
                        $grade = 'A';
                    } elseif ($mhs['nilai'] >= 75 && $mhs['nilai'] < 85) {
                        $grade = 'B';
                    } elseif ($mhs['nilai'] >= 55 && $mhs['nilai'] < 75) {
                        $grade = 'C';
                    } elseif ($mhs['nilai'] >= 25 && $mhs['nilai'] < 55) {
                        $grade = 'D';
                    } else {
                        $grade = 'E';
                    }
                    
                    switch ($grade) {
                        case 'A':
                            $predikat = 'Memuaskan';
                            break;
                        case 'B':
                            $predikat = 'Bagus';
                            break;
                        case 'C':
                            $predikat = 'Cukup';
                            break;
                        case 'D':
                            $predikat = 'Kurang';
                            break;
                        default:
                            $predikat = 'Buruk';
                            break;
                    }
            ?>
                <tr bgcolor="<?= $warna ?>">
                    <td><?= $no++; ?></td>
                    <td><?= $mhs['nama']; ?></td>
                    <td><?= $mhs['nim']; ?></td>
                    <td><?= $mhs['nilai']; ?></td>
                    <td><?= $ket; ?></td>
                    <td><?= $grade; ?></td>
                    <td><b><?= $predikat; ?></b></td>
                </tr>
            <?php
                }
            ?>
        </tbody>
        <tfoot bgcolor="paleturquoise">
            <?php
                foreach ($footer as $data => $hasil) {
            ?>
            <tr>
                <td colspan="3" align="right"><?= $data ?></td>
                <td colspan="5" align="center"><?= $hasil ?></td>
            </tr>
            <?php
                }
            ?>
        </tfoot>
    </table>
    <center>
        <p>
            <span>Design By: <?= $nm ?> - <?= $kel ?> &copy; 2024 Studi Independen PT. Nurul Fikri Cipta Inovasi</span>
        </p>
    </center>
</body>
</html>