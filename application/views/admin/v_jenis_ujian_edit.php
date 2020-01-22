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
    Update Data Jenis Ujian
    <small></small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="<?=base_url('home')?>"><i class="fa fa-home"></i> Home</a></li>
    <li><a href="#"></a> Data Master</li>
    <li><a href="#"></a> Data Jenis Ujian</li>
    <li><a href="#"></a> Update Data Jenis Ujian</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box box-success" style="overflow-x: scroll;">
        <div class="box-header with-border">
          <h3 class="box-title">Update Data Jenis Ujian</h3>
        </div>
        <!-- /.box-header -->
        <?php foreach($jenis_ujian as $a) { ?>
          <!-- form start -->
          <form action="<?=base_url('jenis_ujian/update');?>" method="post" class="form-horizontal">
            <div class="box-body">

              <div class="form-group">
                <label class="col-sm-2 control-label">Jenis Ujian</label>
                <input type="hidden" name="id" value="<?= $a->id_jenis_ujian;?>">
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="nama" value="<?= $a->jenis_ujian;?>" required>
                </div>
              </div>
              
              <div class="form-group">
                <label class="col-sm-2 control-label"></label>
                <div class="col-sm-10">
                  <a href="<?=base_url('jenis_ujian')?>" class="btn btn-default btn-flat"><span class="fa fa-arrow-left"></span> Batal</a>
                  <button type="submit" class="btn btn-primary btn-flat" title="Simpan Data"><span class="fa fa-save"></span> Simpan</button>
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

</script>
<?php
$this->load->view('admin/foot');
?>