<?php
$this->load->view('admin/head');
?>

<!--tambahkan custom css disini-->

<?php
$this->load->view('admin/topbar');
$this->load->view('admin/sidebar');
?>

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Periksa Soal Essay
        <small></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?= base_url('home') ?>"><i class="fa fa-home"></i> Home</a></li>
        <li><a href="#"></a> Data Soal Essay</li>
        <li><a href="#"></a> Periksa Soal Essay</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <?= $this->session->flashdata('message');?>
            <div class="box box-success" style="overflow-x: scroll;">
                <div class="box-header">
                    <h4 class="box-title">Filter Berdasarkan Mata Kuliah</h4>
                </div>
                <form action="" method="get" class="form-horizontal">
                    <div class="box-body">
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Nama Mata Kuliah</label>
                            <div class="col-sm-10">
                                <select class="select2 form-control" name="id" required="">
                                    <option selected="selected" disabled="">- Pilih Mata Kuliah -</option>
                                    <?php foreach ($kelas as $a) { ?>
                                        <option value="<?= $a->id_matakuliah ?>"><?= $a->kode_matakuliah; ?> | <?= $a->nama_matakuliah; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label"></label>
                            <div class="col-sm-10">
                                <a href="<?= base_url('periksa_essay'); ?>" class="btn btn-default btn-flat"><span class="fa fa-refresh"></span> Refresh</a>
                                <button type="submit" class="btn btn-primary btn-flat" title="Filter Data Soal Ujian"><span class="fa fa-filter"></span> Filter</button>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        
                    </div>
                    <!-- /.box-footer -->
                </form>
            </div>
            <!-- Default box -->
            <div class="box box-success" style="overflow-x: scroll;">
                <div class="box-body">
                    <table id="data" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th width="1%">No</th>
                                <th width="12%">Nama Mahasiswa</th>
                                <th width="7%">NIM</th>
                                <th width="10%">Mata Kuliah</th>
                                <th width="20%">Soal Essay</th>
                                <th width="20%">Jawaban Essay</th>
                                <th>Di koreksi oleh</th>
                                <th width="5%">NILAI</th>
                                <th width="5%"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($periksa as $d) { ?>
                                <tr>
                                    <td><?php echo $no++; ?></td>
                                    <td><?php echo $d->nama_mahasiswa; ?></td>
                                    <td><?php echo $d->nim; ?></td>
                                    <td><?php echo $d->nama_matakuliah; ?></td>
                                    <td><?php echo $d->soal_essay; ?></td>
                                    <td>
                                        <?php if ($d->jawaban_essay != NULL) {
                                            echo $d->jawaban_essay;
                                        } else {
                                            echo '-';
                                        }
                                          ?> 
                                        
                                    </td>
                                    <td>
                                        <?php if ($d->nama_dosen != NULL) {
                                            echo $d->nama_dosen;
                                        } else {
                                            echo '-';
                                        }
                                          ?>  
                                    </td>
                                    <td><?php echo $d->skor_essay; ?></td>
                                    <td>
                                        <?php if ($d->jawaban_essay == NULL ) {
                                            echo "Tidak Menjawab";
                                        
                                         } elseif ($d->skor_essay == 0) { 
                                            echo "<a href= '" . 'periksa_essay/koreksi/' . "$d->id_jawaban_essay' class='btn btn-xs btn-success' title='Beri Nilai'><span class='glyphicon glyphicon-edit' title='Edit Soal Essay'></span> Koreksi</a>";

                                         } else {
                                            echo "Sudah diperiksa";  
                                         }
                                         ?>

                                    </td>
                                </tr>
                            <?php } ?>

                        </tbody>
                    </table>
                </div>
                <br><br><br><br>
            </div>
            <!-- /.col-->
        </div>
        <!-- ./row -->
</section><!-- /.content -->

<?php
$this->load->view('admin/js');
?>
<!--tambahkan custom js disini-->
<script type="text/javascript">
    $(function() {
        $('#data').dataTable();
    });
    $('.select2').select2();
    $('.alert-message').alert().delay(3000).slideUp('slow');
    $('.alert-dismissible').alert().delay(3000).slideUp('slow');
</script>
<?php
$this->load->view('admin/foot');
?>