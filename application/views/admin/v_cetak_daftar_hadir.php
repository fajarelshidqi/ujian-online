<html>

<head>
    <title> Kartu Peserta </title>
    <style type="text/css">
        .header {
            text.align: center;
        }
    </style>
</head>

<body>
    <p align="center"><span> UJIAN ONLINE APPLICATION <br> <b>SEKOLAH TINGGI MANAJEMEN XYZ</b> <br> JL. Perjuangan No. 3 Jagakarsa Jakarta Selatan</span></p>
    <hr>
    <font face="Arial" size="4">
        <p align="center"> <u> <b> DAFTAR HADIR PESERTA </b></u>
    </font><br>
    <table style="border-collapse: collpase; widht:100%">
        <tr>
            <?php
            $no = 1;
            foreach ($peserta as $d) { ?>
                <td>Nama Mahasiswa</td>
                <td>:</th>
                <td><?php echo $d->nama_mahasiswa; ?></td>
        </tr>
        <tr>
            <td>NIM</td>
            <td>:</td>
            <td><?php echo $d->nim; ?></td>
        </tr>
        <tr>
            <td>Kelas</td>
            <td>:</td>
            <td><?php echo $d->nama_kelas; ?></td>
        </tr>
    </table><br>
    <div class="col-sm-12">
        <table border="1" cellpadding="10px" cellspacing="0px">
            <thead align="center">
                <tr>
                    <th>No</th>
                    <th>MK</th>
                    <th>Tanggal Ujian</th>
                    <th>Jam Ujian</th>
                    <th>Durasi Ujian</th>
                </tr>
            </thead>
            <tbody>

                <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $d->nama_matakuliah; ?></td>
                    <td><?php echo date('d-m-Y', strtotime($d->tanggal_ujian)); ?></td>
                    <td><?php echo $d->jam_ujian; ?></td>
                    <td><?php echo $d->durasi; ?> Menit</td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
</body>

</html>