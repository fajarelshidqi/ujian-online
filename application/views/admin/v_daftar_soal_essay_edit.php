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
        Update Soal Essay
        <small></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?= base_url('home') ?>"><i class="fa fa-home"></i> Home</a></li>
        <li><a href="#"></a> Data Soal Ujian</li>
        <li><a href="#"></a> Daftar Soal Ujian</li>
        <li><a href="#"></a> Update Soal Essay</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <!-- Tampilan untuk alert -->


            <?php foreach ($soal as $s) { ?>
                <!-- TUTUP Tampilan untuk alert -->
                <div class="box box-success" style="overflow-x: scroll;">
                    <form action="<?= base_url('daftar_soal_essay/update'); ?>" method="post">
                        <div class="box-header">
                            <div class="box-title">Pilih Mata Kuliah</div>
                        </div><!-- /.box-header -->
                        <div class="box-body">
                            <div class="form-horizontal">
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Nama Mata Kuliah</label>
                                    <input type="hidden" name="id" value="<?= $s->id_soal_essay ?>">
                                    <div class="col-sm-10">
                                        <select class="select2 form-control" name="nama_matakuliah" required="">
                                            <option selected="selected" disabled="">- Pilih Mata Kuliah -</option>
                                            <?php foreach ($kelas as $a) { ?>
                                                <option value="<?= $a->id_matakuliah ?>" <?php if ($s->nama_matakuliah == $a->nama_matakuliah) {
                                                        echo "selected='selected'";
                                                        } ?>><?= $a->kode_matakuliah; ?> | <?= $a->nama_matakuliah; ?></option>
                                            <?php } ?>
                                        </select>
                                        <p class="help-block"><b>Info :</b> Pilih Mata Kuliah sesuai soal yang akan diujikan</p>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Edit Soal Essay</label>
                                    <div class="col-sm-10">
                                        <textarea class="textarea" placeholder="ketik soal ujian" name="essay" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?= $s->soal_essay ?></textarea>
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
                        <!-- /.box-footer -->
                        <div class="box-footer">
                            
                        </div>
                    </form>
                </div>
            <?php } ?>
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