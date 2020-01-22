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
        Data Mata Kuliah
        <small></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?=base_url('admin')?>"><i class="fa fa-home"></i> Home</a></li>
        <li><a href="#"></a> Data Master</li>
        <li><a href="#"></a> Data Mata Kuliah</li>
        <li><a href="#"></a> Update Data Mata Kuliah</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
<div class="row">
    <div class="col-md-12">
        <div class="box box-success" style="overflow-x: scroll;">
            <div class="box-header with-border">
                <h3 class="box-title">Update Data Mata Kuliah</h3>
            </div>
            <!-- /.box-header -->
            <?php foreach($mk as $a) { ?>
            <!-- form start -->
            <form action="<?=base_url('matakuliah/update');?>" method="post" class="form-horizontal">
              <div class="box-body">
                <div class="form-group">
                  <label class="col-sm-2 control-label">Kode Mata Kuliah</label>
                  <input type="hidden" name="id" value="<?= $a->id_matakuliah;?>">
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="kode" value="<?= $a->kode_matakuliah;?>" required>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Nama Mata Kuliah</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="nama" value="<?= $a->nama_matakuliah;?>" required>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label"></label>
                  <div class="col-sm-10">
                    <a href="<?=base_url('matakuliah')?>" class="btn btn-default btn-flat"><span class="fa fa-arrow-left"></span> Batal</a>
                  <button type="submit" class="btn btn-primary btn-flat" title="Simpan Data Pengawas"><span class="fa fa-save"></span> Simpan</button>
                  </div>
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                
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