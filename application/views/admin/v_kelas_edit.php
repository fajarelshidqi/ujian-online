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
    Data Kelas
    <small></small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="<?= base_url('home') ?>"><i class="fa fa-home"></i> Home</a></li>
    <li><a href="#"></a> Data Master</li>
    <li><a href="#"></a> Data Kelas</li>
    <li><a href="#"></a> Update Data Kelas</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box box-success" style="overflow-x: scroll;">
        <div class="box-header with-border">
          <h3 class="box-title">Update Data Kelas</h3>
        </div>
        <!-- /.box-header -->
        <?php foreach ($kelas as $a) { ?>
          <!-- form start -->
          <form action="<?= base_url('kelas/update'); ?>" method="post" class="form-horizontal">
            <div class="box-body">
              <div class="form-group">
                <label class="col-sm-2 control-label">Nama Kelas</label>
                <input type="hidden" name="id" value="<?= $a->id_kelas; ?>">
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="nama" value="<?= $a->nama_kelas; ?>" required>
                </div>
              </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
              <a href="<?= base_url('kelas') ?>" class="btn btn-default pull-left">Batal</a>
              <button type="submit" class="btn btn-success pull-right" title="Simpan Data Kelas terbaru">Simpan</button>
            </div>
            <!-- /.box-footer -->
          </form>
        <?php } ?>
      </div>
    </div>
  </div>

</section><!-- /.content -->

<?php
$this->load->view('admin/js');
?>
<!--tambahkan custom js disini-->

<script type="text/javascript">
  $(document).ready(function() {
    $('#data').dataTable();
  });

  $('.alert-message').alert().delay(3000).slideUp('slow');
</script>

<?php
$this->load->view('admin/foot');
?>