<html>

<head>
    <title> Kartu Peserta </title>
</head>

<body>
    <?php
    foreach ($peserta as $d) { ?>
        
        <img src="image/akbid.png" style="width: 65px; height: auto; position: absolute;">
        
        <table style="width: 100%;">
            <tr>
                <td align="center">
                    <span> YAYASAN KERIS SAMUDERA KORPS MARINIR <br> <b>AKADEMI KEBIDANAN KERIS HUSADA JAKARTA</b> <br> JL. Yos Sudarso Komplek Marinir, Cilandak, Jakarta Selatan</span>
                    <hr>                    
                </td>
            </tr>
        </table>
        
        <font face="Arial" size="4">
            <p align="center"> <u> <b> KARTU PESERTA UJIAN </b></u>
        </font><br>
        
        <table style="border-collapse: collpase;" width="100%">
            <tr>

                <td width="20%">NAMA</td>
                <td width="3%">:</th>
                <td><?php echo $d->nama_mahasiswa; ?></td>
            </tr>
            <tr>
                <td>NIM</td>
                <td>:</td>
                <td><?php echo $d->nim; ?></td>
            </tr>
            <tr>
                <td>KELAS</td>
                <td>:</td>
                <td><?php echo $d->nama_kelas; ?></td>
            </tr>
        </table><br>
        <div class="col-sm-12" style="page-break-after:always;">
            <table border="1" cellpadding="5px" cellspacing="0px" style="font-size:11;" width="100%">
                <thead align="center" style="background-color:#D3D3D3">
                    <tr>
                        <th rowspan="2">No</th>
                        <th width="20%" rowspan="2">MATA KULIAH</th>
                        <th colspan="4">UJIAN</th>
                        <th rowspan="2" colspan="2">TANDA TANGAN PENGAWAS</th>
                    </tr>
                    <tr>
                        <th>TANGGAL</th>
                        <th>JAM</th>
                        <th>DURASI</th>
                        <th width="13%">JENIS</th>
                    </tr>
                </thead>
                <tbody >
                    <?php $nom = 1;
                        foreach ($mk as $nm) { ?>
                        <?php if ($d->nama_mahasiswa == $nm->nama_mahasiswa) { ?>
                            <tr>
                                <td align="center"><?php echo $nom++; ?></td>
                                <td align="center"><?php echo $nm->nama_matakuliah; ?></td>
                                <td align="center"><?php echo date('d-m-Y', strtotime($nm->tanggal_ujian)); ?></td>
                                <td align="center"><?php echo $nm->jam_ujian; ?></td>
                                <td align="center"><?php echo $nm->durasi_pg; ?> & <?php echo $nm->durasi_essay; ?></td>
                                <td align="center"><?php echo $nm->jenis_ujian; ?></td>
                                <td>1</td>
                                <td>2</td>
                            </tr>      
                            <?php }  ?>
                        <?php } ?>                  
                </tbody>
            </table>
            <br><br>
            <div align="center" style="font-size: 14px;" >
                <?php
                date_default_timezone_set('Asia/Jakarta');
                $jam = Date("H:i:s");
                $date = Date("d F Y");
                echo "Kartu Peserta ini dicetak pada tanggal $date - Jam $jam";
                ?>
            </div>                    
        </div>        
    <?php } ?>
</body>

</html>