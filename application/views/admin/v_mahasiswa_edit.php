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
    Update Data Mahasiswa
    <small></small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="<?=base_url('home')?>"><i class="fa fa-home"></i> Home</a></li>
    <li><a href="#"></a> Data Master</li>
    <li><a href="#"></a> Data Mahasiswa</li>
    <li><a href="#"></a> Update Data Mahasiswa</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box box-success" style="overflow-x: scroll;">
        <div class="box-header with-border">
          <h3 class="box-title">Update Data Mahasiswa</h3>
        </div>
        <!-- /.box-header -->
        <?php foreach($mahasiswa as $a) { ?>
          <!-- form start -->
          <form action="<?=base_url('mahasiswa/update');?>" method="post" class="form-horizontal">
            <div class="box-body">
              <div class="form-group">
                <label class="col-sm-2 control-label">Nama Mahasiswa</label>
                <input type="hidden" name="id" value="<?= $a->id_mahasiswa;?>">
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="nama" value="<?= $a->nama_mahasiswa;?>" required>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">NIM (Nomor Induk Mahasiswa)</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="nim" value="<?= $a->nim;?>" required>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Nama Kelas</label>
                <div class="col-sm-10">
                  <select class="select2 form-control" name="kelas" required="">                    
                    <?php foreach($kelas as $k) { ?>
                      <option value="<?=$k->id_kelas?>" <?php if($a->nama_kelas==$k->nama_kelas){echo "selected='selected'";} ?>><?= $k->nama_kelas;?></option>
                    <?php } ?>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Username</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="username" value="<?= $a->username;?>" required>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Password</label>
                <div class="col-sm-10">
                  <input type="password" class="form-control" name="password" value="<?= $a->password;?>" required>
                </div>
              </div>
              
              <div class="form-group">
                <label class="col-sm-2 control-label"></label>
                <div class="col-sm-10">
                  <a href="<?=base_url('mahasiswa')?>" class="btn btn-default btn-flat"><span class="fa fa-arrow-left"></span> Batal</a>
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

  $('.select2').select2();

  $('.alert-message').alert().delay(3000).slideUp('slow');


</script>

<?php
$this->load->view('admin/foot');
?>