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
    Data Dosen
    <small></small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="<?= base_url('home') ?>"><i class="fa fa-home"></i> Home</a></li>
    <li><a href="#"></a> Data Master</li>
    <li><a href="#"></a> Data Dosen</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-md-12">
      <?= $this->session->flashdata('message'); ?>
      <!-- Default box -->
      <div class="box box-success" style="overflow-x: scroll;">
        <div class="box-header">
          <h3 class="box-title"></h3>
          <button type="button" class="btn btn-primary btn-flat" data-toggle="modal" data-target="#modal-default"> <span class="fa fa-plus"></span> Data Dosen</button>
        </div>
        <!-- /.box-header -->

        <div class="box-body">
          <table id="data" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th width="1%">No</th>
                <th>NIK</th>
                <th>Nama Dosen</th>
                <th>Username</th>
                <th width="12%"></th>
              </tr>
            </thead>
            <tbody>
              <?php
              $no = 1;
              foreach ($dosen as $m) { ?>
                <tr>
                  <td><?php echo $no++; ?></td>
                  <td><?php echo $m->id_dosen; ?></td>
                  <td><?php echo $m->nama_dosen; ?></td>
                  <td><?php echo $m->username; ?></td>
                  <td>
                    <div class="btn-group">
                      <button type="button" class="btn btn-warning btn-flat btn-xs">Action</button>
                      <button type="button" class="btn btn-warning btn-xs btn-flat dropdown-toggle" data-toggle="dropdown">
                        <span class="caret"></span>
                        <span class="sr-only">Toggle Dropdown</span>
                      </button>
                      <ul class="dropdown-menu" role="menu">
                        <li><a href="<?= base_url('dosen/edit/') . $m->id_dosen; ?>">Edit Data</a></li>
                        <li><a href="<?= base_url('dosen/hapus/') . $m->id_dosen; ?>" onclick="return confirm('Apakah yakin data peserta ini di hapus?')">Hapus Data</a></li>
                      </ul>
                    </div>
                  </td>
                </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</section><!-- /.content -->

<!-- /. modal  -->
<div class="modal fade" id="modal-default">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title">Masukan Semua Data Dosen</h4>
      </div>
      <!-- /.form dengan modal -->
      <form method="post" action="<?php echo base_url() . 'dosen/dosen_aksi'; ?>">
        <div class="modal-body">
          <div class="form-group">
            <label class="font-weight-bold">Nama Dosen</label>
            <input type="text" class="form-control" name="nama" placeholder="Masukkan Nama Dosen" required="">
          </div>
          <div class="form-group">
            <label class="font-weight-bold">NIK (Nomor Induk Kepegawaian)</label>
            <input type="number" class="form-control" name="nik" placeholder="Masukkan NIK Dosen" required="">
          </div>
          <div class="form-group">
            <label class="font-weight-bold">Username</label>
            <input type="text" class="form-control" name="username" placeholder="Masukkan Username" required="">
          </div>
          <div class="form-group">
            <label class="font-weight-bold">Password</label>
            <input type="password" class="form-control" name="password" placeholder="Masukkan Password" required="">
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-success btn-flat">SUBMIT</button>
        </div>
      </form>
      <!-- /.tutup form dengan modal  -->
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

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