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
        Utilitas
        <small></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#"> Utilitas</a></li>
    </ol>
</section>

<!-- Main content -->
<section class="content">

    <?= $this->session->flashdata('message'); ?>

    <div class="nav-tabs-custom">
        <ul class="nav nav-tabs">
          <li class="active"><a href="#tab_1" data-toggle="tab">Backup Database</a></li>
          <li><a href="#tab_2" data-toggle="tab">Reset Database</a></li>
          <li><a href="#tab_3" data-toggle="tab">Restore Database</a></li>
        </ul>
        <div class="tab-content">
          <div class="tab-pane active" id="tab_1">
            <br>
            Klik tombol di bawah ini, apabila ingin mem-<b>Backup Database</b>.<br>
            Jika Pelaksanaan Ujian telah selesai di laksanakan. Maka, diwajibkan untuk <b>Admin</b> mem-<b>Backup Database</b> pada fungsi tombol dibawah ini.
            <br><br>
            <div class="form-group">              
                <a href="<?=base_url('utilitas/db')?>" class="btn btn-primary btn-flat" download><i class="fa fa-download"></i> Backup Database Aplikasi Ujian Online</a>
            </div>
          </div>
          <!-- /.tab-pane -->
          <div class="tab-pane" id="tab_2">
            <br>
            <b>Perhatian !</b><br>
            Tombol ini digunakan untuk me-<b>Reset Database</b>.<br>
            Sebelum menggunakan fungsi ini, diwajibkan untuk menggunakan fungsi <b>Backup Database</b> agar data-data anda aman untuk digunakan kembali.
            <br><br>
            <div class="form-group">
                <a href="<?=base_url('utilitas/resetdb')?>" class="btn btn-danger btn-flat" onclick="return confirm('Apakah anda yakin akan me-Reset Database ini ?')"><i class="fa fa-undo"></i> Reset Database Aplikasi Ujian Online</a>  
            </div>
          </div>
          <!-- /.tab-pane -->
          <div class="tab-pane" id="tab_3">
            <br>
            <p>Fungsi ini untuk mengembalikan data yang sudah di backup sebelumnya.<br>
            Oleh karnena itu jika menggunakan fungsi ini data yang lama akan tertimpa dengan data yang akan di kembalikan (<b>Restore</b>). Alangkah baiknya anda <b>Backup</b> terlebih dahulu jika ada data lama.</p>
            <br>
            Untuk menggunakan fungsi ini, file <b>zip</b> yang telah anda download di <b>Backup Database</b> di extract terlebih dahulu kemudian anda upload file tersebut.
            <br><br>
            <!-- form start -->
            <form action="<?=base_url('utilitas/restore')?>" method="post" enctype="multipart/form-data" class="form-horizontal" >

                <div class="form-group">
                  <label class="col-sm-2 control-label">File Database</label>
                  <div class="col-sm-10">
                    <input type="file" class="form-control" name="file" id="datafile">
                  </div>
                </div>
                
                <div class="form-group">
                  <label class="col-sm-2 control-label"></label>
                  <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary btn-flat"> Submit Restore Database</button>
                  </div>
                </div>

            </form>          
          </div>
          <!-- /.tab-pane -->
        </div>
        <!-- /.tab-content -->
    </div>

</section><!-- /.content -->
  
<?php 
$this->load->view('admin/js');
?>

<!--tambahkan custom js disini-->

<?php
$this->load->view('admin/foot');
?>

