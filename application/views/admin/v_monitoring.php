<?php
$this->load->view('admin/head');
?>
<!--tambahkan custom css disini-->
<style type="text/css">
    table {
        font-family: verdana, arial, sans-serif;
        font-size: 11px;
        color: #333333;
        border-width: 1px;
        border-color: #8b95ff;
        border-collapse: collapse;
    }
    table th {
        border-width: 1px;
        padding: 8px;
        border-style: solid;
        border-color: #ffffff;
        background-color: #5d6ed4;
        color: #ffffff;
    }
    table tr:hover td {
        cursor: pointer;
    
    }
    table td {
        border-width: 1px;
        padding: 8px;
        border-style: solid;
        border-color: #8b95ff;
        background-color: #ffffff;
    }
</style>
<?php
$this->load->view('admin/topbar');
$this->load->view('admin/sidebar');
?>
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Monitoring Ujian
    <small></small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="<?= base_url('home') ?>"><i class="fa fa-home"></i> Home</a></li>
    <li><a href="#"></a> Monitoring Ujian</li>
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
        </div>
        <!-- /.box-header -->

        <div class="box-body">
          <table id="data" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th width="1%">No</th>
                <th>NIM</th>
                <th>Nama Mahasiswa</th>
                <th>Mata Kuliah</th>
                <th>Status Ujian Pilihan Ganda</th>
                <th>Status Ujian Essay</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $no = 1;
              foreach ($pengawas as $m) { ?>
                <tr>
                  <td><?php echo $no++; ?></td>
                  <td><?php echo $m->nim; ?></td>
                  <td><?php echo $m->nama_mahasiswa; ?></td>
                  <td><?php echo $m->nama_matakuliah; ?></td>
                  <td>
                      <?php if ($m->status_ujian_pg == 1) {
                        echo "<span class='btn btn-xs btn-warning'> sedang mengerjakan </span>";
                      } else if ($m->status_ujian_pg == 2) {
                        echo "<span class='btn btn-xs btn-success'> selesai dikerjakan </span>";
                      } else {
                        echo "<span class='btn btn-xs btn-default'> belum dikerjakan </span>";
                      }
                       ?>
                      
                  </td>
                  <td>
                      <?php if ($m->status_ujian_essay == 1) {
                        echo "<span class='btn btn-xs btn-warning'> sedang mengerjakan </span>";
                      } else if ($m->status_ujian_essay == 2) {
                        echo "<span class='btn btn-xs btn-success'> selesai dikerjakan </span>";
                      } else {
                        echo "<span class='btn btn-xs btn-default'> belum dikerjakan </span>";
                      }
                       ?>
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
<!-- <div class="modal fade" id="modal-default">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title">Masukan Semua Data Dosen</h4>
      </div> -->
      <!-- /.form dengan modal -->
      <!-- <form method="post" action="//<?php //echo base_url() . 'dosen/dosen_aksi'; ?>">
        <div class="modal-body">
          <div class="form-group">
            <label class="font-weight-bold">Nama Dosen</label>
            <input type="text" class="form-control" name="nama" placeholder="Masukkan Nama Dosen" required="">
          </div>
          <div class="form-group">
            <label class="font-weight-bold">NIK (Nomor Induk Kepegawaian)</label>
            <input type="text" class="form-control" name="nik" placeholder="Masukkan NIK Dosen" required="">
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
      </form> -->
      <!-- /.tutup form dengan modal  -->
    <!-- </div> -->
    <!-- /.modal-content -->
  <!-- </div> -->
  <!-- /.modal-dialog -->
<!-- </div> -->
<!-- /.modal -->

<?php
$this->load->view('admin/js');
?>
<!--tambahkan custom js disini-->

<script type="text/javascript">
  $(document).ready(function() {
    $('#data').dataTable();
  });

  setTimeout(function(){
     window.location.reload(1);
  }, 5000);
</script>

<?php
$this->load->view('admin/foot');
?>