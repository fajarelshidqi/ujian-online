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
    Tambah Peserta Ujian
    <small></small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="<?= base_url('home') ?>"><i class="fa fa-home"></i> Home</a></li>
    <li><a href="#"></a> Data Peserta Ujian</li>
    <li><a href="#"></a> Tambah Peserta Ujian</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-md-12">
    <?= $this->session->flashdata('message'); ?>
    </div>
    <div class="col-md-12">
      <div class="box box-success" style="overflow-x: scroll;">
        <div class="box-header with-border">
          <h3 class="box-title">Daftar Peserta Ujian Per-Mahasiswa</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form class="form-horizontal" action="<?= base_url('peserta/insert_permhs'); ?>" method="post">
          <div class="box-body">
            <div class="form-group">
              <label class="col-sm-2 control-label">Nama Peserta</label>

              <div class="col-sm-10">
                <select class="select2 form-control" name="peserta" required>
                  <option selected="selected" disabled="" value="">- Pilih Peserta Ujian -</option>
                  <?php foreach ($mhs as $a) { ?>
                    <option value="<?= $a->id_mahasiswa ?>"><?= $a->nim; ?> | <?= $a->nama_mahasiswa; ?></option>
                  <?php } ?>
                </select>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">Ujian Mata Kuliah</label>

              <div class="col-sm-10">
                <select class="select2 form-control" name="mk" required>
                  <option selected="selected" disabled="" value="">- Pilih Mata Kuliah Ujian -</option>
                  <?php foreach ($mk as $a) { ?>
                    <option value="<?= $a->id_matakuliah ?>"><?= $a->kode_matakuliah; ?> | <?= $a->nama_matakuliah; ?></option>
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
                  <input type="text" class="form-control pull-right" id="datepicker" name="tanggal" placeholder="2019-12-30" autocomplete="off" required="">
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
                  <input type="text" class="form-control" id="timepicker" name="jam" required="">
                </div>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Jenis Ujian</label>
              <div class="col-sm-10">
                <select class="form-control" name="jenis_ujian" required>
                    <option selected="selected" disabled="" value="">- Pilih Jenis Ujian -</option>
                    <?php foreach ($jenis_ujian as $a) { ?>
                      <option value="<?= $a->id_jenis_ujian ?>"><?= $a->jenis_ujian; ?></option>
                    <?php } ?>
                </select>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Durasi Pilihan Ganda</label>
              <div class="col-sm-10">
                <input type="number" class="form-control" name="durasi_pg" placeholder="Masukan Durasi Ujian dengan angka dalam hitungan menit" required>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">Durasi Essay</label>
              <div class="col-sm-10">
                <input type="number" class="form-control" name="durasi_essay" placeholder="Masukan Durasi Ujian dengan angka dalam hitungan menit" required>
              </div>
            </div>
            
            <div class="form-group">
              <label class="col-sm-2 control-label"></label>
              <div class="col-sm-10">
                <button type="submit" class="btn btn-primary btn-flat" title="Daftarkan Peserta"><span class="fa fa-save"></span> Submit</button>
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