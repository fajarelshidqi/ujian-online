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
    Monitoring Ujian
    <small></small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="<?= base_url('home') ?>"><i class="fa fa-home"></i> Home</a></li>
    <li><a href="#"></a> Monitoring Ujian</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box box-success" style="overflow-x: scroll;">
        <div class="box-header">
            <h4 class="box-title">Pilih Mata Kuliah</h4>
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
                    <div class="col-sm-1">
                        <button type="submit" class="btn btn-block btn-primary btn-flat" title="Pilih"> Pilih</button>
                    </div>
                </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">

            </div>
            <!-- /.box-footer -->
        </form>

      </div>
    </div>
  </div>
</section><!-- /.content -->

<?php
$this->load->view('admin/js');
?>
<!--tambahkan custom js disini-->

<script type="text/javascript">
  $('.select2').select2();
</script>

<?php
$this->load->view('admin/foot');
?>