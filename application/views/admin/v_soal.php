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
        Tambah Soal Pilihan Ganda
        <small></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?= base_url('home') ?>"><i class="fa fa-home"></i> Home</a></li>
        <li><a href="#"></a> Data Soal Ujian</li>
        <li><a href="#"></a> Tambah Soal Pilihan Ganda</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            
            <?= $this->session->flashdata('message'); ?>

            <div class="box box-success" style="overflow-x: scroll;">
                <div class="box-header">
                    <div class="box-title">Pilih Mata Kuliah</div>
                </div><!-- /.box-header -->
                <form action="<?= base_url('soal/insert'); ?>" method="post">
                    <div class="box-body">
                        <div class="form-horizontal">
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Nama Mata Kuliah</label>
                                <div class="col-sm-10">
                                    <select class="select2 form-control" name="nama_matakuliah" required="">
                                        <option selected="selected" disabled="" value="">- Pilih Mata Kuliah -</option>
                                        <?php foreach ($soal as $a) { ?>
                                            <option value="<?= $a->id_matakuliah ?>"><?= $a->kode_matakuliah; ?> | <?= $a->nama_matakuliah; ?></option>
                                        <?php } ?>
                                    </select>
                                    <p class="help-block"><b>Info :</b> Pilih terlebih dahulu Mata Kuliah yang akan digunakan sebelum menambah soal pilihan ganda</p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Tulis Soal Ujian</label>
                                <div class="col-sm-10">
                                    <textarea  class="soal" name="soal" required></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Jawaban A</label>
                                <div class="col-sm-10">
                                    <textarea rows="2" style="width: 100%" name="a" required></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Jawaban B</label>
                                <div class="col-sm-10">
                                    <textarea rows="2" style="width: 100%" name="b" required></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Jawaban C</label>
                                <div class="col-sm-10">
                                    <textarea rows="2" style="width: 100%" name="c" required></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Jawaban D</label>
                                <div class="col-sm-10">
                                    <textarea rows="2" style="width: 100%" name="d" required></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Jawaban E</label>
                                <div class="col-sm-10">
                                    <textarea rows="2" style="width: 100%" name="e" required></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Kunci Jawaban</label>
                                <div class="col-sm-10">
                                    <select class="form-control" name="kunci" required>
                                        <option selected="selected" disabled="" value="">- Pilih Kunci Jawaban -</option>
                                        <option>A</option>
                                        <option>B</option>
                                        <option>C</option>
                                        <option>D</option>
                                        <option>E</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label"></label>
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-primary btn-flat" title="Tambah Data Soal Ujian"><span class="fa fa-save"></span> Simpan</button>
                                </div>
                            </div>
                        </div>
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