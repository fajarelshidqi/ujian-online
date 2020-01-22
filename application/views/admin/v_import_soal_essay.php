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
        Import Data Soal Essay
        <small></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#"> Import Data</a></li>
        <li><a href="#"> Import Data Soal Essay</a></li>
    </ol>
</section>

<!-- Main content -->
<section class="content">

    <div class="callout callout-info">
        <h4>Halo, <?php echo $this->session->userdata('nama');?> </h4>
        <p>Halaman ini adalah halaman untuk mengimport data mahasiswa untuk memudahkan penginputan data mahasiswa yang begitu banyak, dengan ada nya fungsi ini dapat mempercepat kerja administrasi pada Sistem Ujian Online.</p>
        <p><b>Perhatian !!</b> <br>pilihlah kelas terlebih dahulu sesuai dengan kelas mahasiswa yang akan di inputkan dan data mahasiswa yang akan diimport tersebut juga di haruskan sesuai kelas mahasiswa</p>
    </div>

    <div class="box box-success box-solid" style="overflow-x: scroll;">
        <div class="box-header with-border">
            <h3 class="box-title">Import Data Soal Ujian</h3>
        </div><!-- /.box-header -->
        <div class="box-body">
            <form action="<?=base_url('admin/import_mhs_aksi')?>" method="post" enctype="multipart/form-data" class="form-horizontal">
              <div class="box-body">
                <div class="form-group">
                  <div class="col-sm-12">
                    <a href="<?=base_url('format/format-soal-essay.xlsx')?>" class="pull-right" download><i class="fa fa-download"></i> Download Format Import Soal Essay</a>                      
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">Nama Mata Kuliah</label>
                  <div class="col-sm-10">
                    <select class="select2 form-control" name="mk" required="">
                      <option selected="selected" disabled="">- Pilih Mata Kuliah -</option>
                        <?php foreach($mk as $a) { ?>
                          <option value="<?=$a->id_matakuliah?>"><?= $a->kode_matakuliah;?> | <?= $a->nama_matakuliah;?></option>
                        <?php } ?>
                    </select>
                  </div>
                </div>
                
                <div class="form-group">
                  <label class="col-sm-2 control-label">Masukan File Import </label>
                  <div class="col-sm-10">
                    <input type="file" name="file" required accept=".xls, .xlsx">
                    <p class="help-block">File harus bertipe <b>.xls, .xlsx</b></p>
                  </div>
                </div>
              </div>

              <div class="box-footer">
                <button type="submit" class="btn btn-success btn-block"><i class="fa fa-upload"></i> IMPORT</button>
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

<script type="text/javascript">

	$(function(){
		$('#data-tables').dataTable();
	});
  $('.select2').select2();
	$('.alert-message').alert().delay(3000).slideUp('slow');

</script>

<?php
$this->load->view('admin/foot');
?>

