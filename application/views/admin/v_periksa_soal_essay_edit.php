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
        Koreksi Soal Essay
        <small></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?= base_url('home') ?>"><i class="fa fa-home"></i> Home</a></li>
        <li><a href="#"></a> Data Soal Ujian</li>
        <li><a href="#"></a> Periksa Soal Essay</li>
        <li><a href="#"></a> Koreksi Soal Essay</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <!-- Tampilan untuk alert -->

            <!-- TUTUP Tampilan untuk alert -->
            <div class="box box-success" style="overflow-x: scroll;">
                <form action="<?= base_url('periksa_essay/update'); ?>" method="post">
                    <div class="box-header">
                        <div class="box-title">Koreksi Soal Essay</div>
                    </div><!-- /.box-header -->
                    <?php foreach ($essay as $s) { ?>
                    <div class="box-body">
                        <div class="form-horizontal">
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Nama Peserta</label>
                                <div class="col-sm-10">
                                    <input type="hidden" class="form-control" value="<?= $s->id_peserta;?>" name="id_peserta">
                                    <input type="hidden" class="form-control" value="<?= $s->id_jawaban_essay;?>" name="id">
                                    <input type="text" class="form-control" value="<?= $s->nim;?> | <?= $s->nama_mahasiswa;?>" disabled>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Mata Kuliah</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" value="<?= $s->nama_matakuliah;?>" disabled>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Soal Essay</label>
                                <div class="col-sm-10">
                                    <textarea class="textarea" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" disabled><?= $s->soal_essay;?></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Jawaban</label>
                                <div class="col-sm-10">
                                    <textarea style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" disabled><?= $s->jawaban_essay;?></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Nilai</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control" name="skor" value="<?= $s->skor_essay;?>" min="1" max="5">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label"></label>
                                <div class="col-sm-10">
                                    <button type="button" class="btn btn-default btn-flat" onclick="return history.go(-1)" title="Kembali ke halaman sebelumnya"><span class="fa fa-arrow-left"></span> Kembali</button>
                                    <button type="submit" class="btn btn-primary btn-flat" title="Simpan Data Soal Essay"><span class="fa fa-save"></span> Simpan</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                    <!-- /.box-footer -->
                    <div class="box-footer">
                        
                    </div>
                </form>
            </div>
           
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
        $('#data-tables').dataTable();
    });
    $('.select2').select2();
    $('.alert-message').alert().delay(3000).slideUp('slow');
</script>
<?php
$this->load->view('admin/foot');
?>