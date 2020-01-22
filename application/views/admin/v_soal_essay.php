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
        Tambah Soal Essay
        <small></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?=base_url('home')?>"><i class="fa fa-home"></i> Home</a></li>
        <li><a href="#"></a> Data Soal Ujian</li>
        <li><a href="#"></a> Tambah Soal Essay</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <!-- Tampilan untuk alert -->
            <?= $this->session->flashdata('message'); ?>
            <!-- TUTUP Tampilan untuk alert -->
            <div class="box box-success" style="overflow-x: scroll;">
                <div class="box-header">
                    <div class="box-title">Pilih Mata Kuliah</div>
                </div><!-- /.box-header -->
                <form action="<?=base_url('essay/insert');?>" method="post">
                <div class="box-body">
                    <div  class="form-horizontal">
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Nama Mata Kuliah</label>
                            <div class="col-sm-10">
                                <select class="select2 form-control" name="nama_matakuliah" required="">
                                    <option selected="selected" disabled="" value="">- Pilih Mata Kuliah -</option>
                                    <?php foreach($soal as $a) { ?>
                                      <option value="<?=$a->id_matakuliah?>"><?= $a->kode_matakuliah;?> | <?= $a->nama_matakuliah;?></option>
                                  <?php } ?>
                                </select>
                                <p class="help-block"><b>Info :</b> Pilih terlebih dahulu Mata Kuliah yang akan digunakan sebelum menambah soal essay</p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Soal Essay</label>
                            <div class="col-sm-10">
                                <textarea class="textarea" placeholder="ketik soal ujian" name="essay" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label"></label>
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary btn-flat" title="Simpan Data Soal Essay"><span class="fa fa-save"></span> Simpan</button>
                            </div>
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
        <!-- /.col-->
    </div>
    <!-- ./row -->
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

