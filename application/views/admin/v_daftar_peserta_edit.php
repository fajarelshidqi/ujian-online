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
    Update Peserta Ujian
    <small></small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="<?= base_url('home') ?>"><i class="fa fa-home"></i> Home</a></li>
    <li><a href="#"></a> Data Peserta Ujian</li>
    <li><a href="#"></a> Update Peserta Ujian</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-md-12">
    </div>
    <?php foreach ($peserta as $p) { ?>
      <div class="col-md-12">
        <div class="box box-success">
          <div class="box-header with-border">
            <h3 class="box-title">Update Peserta Ujian Mahasiswa</h3>
          </div>
          <!-- /.box-header -->
          <!-- form start -->
          <form class="form-horizontal" action="<?= base_url('daftar_peserta/update'); ?>" method="post">
            <div class="box-body">
              <div class="form-group">
                <label class="col-sm-2 control-label">Nama Peserta</label>
                <input type="hidden" name="id" value="<?= $p->id_peserta ?>">
                <div class="col-sm-10">
                  <select class="select2 form-control" name="peserta" required>
                    <option selected="selected" disabled="">- Pilih Peserta Ujian -</option>
                    <?php foreach ($mhs as $a) { ?>
                      <option value="<?= $a->id_mahasiswa ?>" <?php if ($a->nama_mahasiswa == $p->nama_mahasiswa) {echo "selected='selected'";} ?>><?= $a->nim; ?> | <?= $a->nama_mahasiswa; ?></option>
                    <?php } ?>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Ujian Mata Kuliah</label>

                <div class="col-sm-10">
                  <select class="select2 form-control" name="mk" required value="">
                    <option selected="selected" disabled="">- Pilih Mata Kuliah Ujian -</option>
                    <?php foreach ($mk as $a) { ?>
                      <option value="<?= $a->id_matakuliah ?>" <?php if ($p->nama_matakuliah == $a->nama_matakuliah) { echo "selected='selected'";} ?>><?= $a->kode_matakuliah; ?> | <?= $a->nama_matakuliah; ?></option>
                    <?php } ?>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Tanggal Ujian</label>

                <div class="col-sm-10">
                  <div class="input-group date">
                    <div class="input-group-addon">
                      <i class="fa fa-calendar"></i>
                    </div>
                    <input type="text" class="form-control pull-right" id="datepicker" name="tanggal" value="<?= $p->tanggal_ujian ?>">
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Jam Ujian</label>

                <div class="col-sm-10">
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-clock-o"></i>
                    </div>
                    <input type="text" class="form-control" id="timepicker" name="jam" value="<?= $p->jam_ujian ?>">
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Jenis Ujian</label>

                <div class="col-sm-10">
                  <select class="select2 form-control" name="jenis" required value="">
                    <option selected="selected" disabled="">- Pilih Jenis Ujian -</option>
                    <?php foreach ($jenis_ujian as $a) { ?>
                      <option value="<?= $a->id_jenis_ujian ?>" <?php if ($p->jenis_ujian == $a->jenis_ujian) { echo "selected='selected'";} ?>><?= $a->jenis_ujian; ?>                        
                      </option>
                    <?php } ?>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Durasi Pilihan Ganda</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="durasi_pg" value="<?= $p->durasi_pg ?>" required>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Durasi Essay</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="durasi_essay" value="<?= $p->durasi_essay ?>" required>
                </div>
              </div>
              
              <div class="form-group">
                <label class="col-sm-2 control-label"></label>
                <div class="col-sm-10">
                  <button type="button" class="btn btn-default btn-flat" onclick="return history.go(-1)" title="Kembali ke halaman sebelumnya"><span class="fa fa-arrow-left"></span> Kembali</button>
                  <button type="submit" class="btn btn-primary btn-flat" title="Update Peserta"><span class="fa fa-save"></span> Submit</button>
                </div>
              </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
              
            </div>
            <!-- /.box-footer -->
          <?php } ?>
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
  $('#datepicker').datepicker({
    autoclose: true,
    todayHighlight: true,
    orientation: "bottom auto",
    format: 'yyyy-mm-dd'
  });
  $('#date').datepicker({
    autoclose: true,
    format: 'yyyy-mm-dd'
  });
  $('#timepicker').timepicker({
    showInputs: false,
    showMeridian: false
  });
  $('#time').timepicker({
    showInputs: false,
    showMeridian: false
  });

  $('.select2').select2();

  $('.alert-dismissible').alert().delay(3000).slideUp('slow');
</script>


<?php
$this->load->view('admin/foot');
?>