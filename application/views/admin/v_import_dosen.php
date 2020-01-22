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
        Import Data Dosen
        <small></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#"> Import Data</a></li>
        <li><a href="#"> Import Data Dosen</a></li>
    </ol>
</section>

<!-- Main content -->
<section class="content">

    <div class="callout callout-info">
        <h4>Halo, <?php echo $this->session->userdata('nama');?> </h4>
        <p>Halaman ini adalah halaman untuk mengimport data mahasiswa untuk memudahkan penginputan data mahasiswa yang begitu banyak, dengan ada nya fungsi ini dapat mempercepat kerja administrasi pada Sistem Ujian Online.</p>
        <p><b>Perhatian !!</b> <br>pilihlah kelas terlebih dahulu sesuai dengan kelas mahasiswa yang akan di inputkan dan data file import tersebut juga di haruskan sesuai kelas mahasiswa</p>
    </div>

    <div class="box box-success box-solid" style="overflow-x: scroll;">
        <div class="box-header with-border">
            <h3 class="box-title">Import Data Dosen</h3>
        </div><!-- /.box-header -->
        <div class="box-body">
            <form action="<?=base_url('import_dosen/upload')?>" method="post" enctype="multipart/form-data" class="form-horizontal">
              <div class="box-body">
                <div class="form-group">
                  <div class="col-sm-12">
                    <a href="<?=base_url('format/format-import-data-dosen.xls')?>" class="pull-right" download><i class="fa fa-download"></i> Download Format Import Data Dosen</a>                      
                  </div>
                </div>
                
                <div class="form-group">
                  <label class="col-sm-2 control-label">Masukan File Import </label>
                  <div class="col-sm-10">
                    <?= form_upload(array('id' => 'txtFileImport', 'name' => 'file', 'accept' => '.csv, application/vnd.ms-excel, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'))?>
                    <p class="help-block">File harus bertipe <b>.xls, .xlsx</b></p>
                  </div>
                </div>
              </div>

              <div class="box-footer">
                <button type="submit" name="submit" class="btn btn-success btn-block" value="upload"><i class="fa fa-upload"></i> IMPORT</button>
                <div class="form-group">
                </div>
              </div>
            </form>
        </div><!-- /.box-body -->
    </div>

</section><!-- /.content -->
  
<?php 
$this->load->view('admin/js');
?>

<!--tambahkan custom js disini-->

<?php
$this->load->view('admin/foot');
?>

