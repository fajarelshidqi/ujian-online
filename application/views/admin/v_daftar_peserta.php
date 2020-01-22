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
        Daftar Peserta Ujian
        <small></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?= base_url('home') ?>"><i class="fa fa-home"></i> Home</a></li>
        <li><a href="#"></a> Data Peserta Ujian</li>
        <li><a href="#"></a> Daftar Peserta Ujian</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">

            <?= $this->session->flashdata('message'); ?>

            <!-- Default box -->
            <div class="box box-success">

                <div class="box-header">
                    <button type="button" class="btn btn-primary btn-flat" data-toggle="modal" data-target="#modal-cetak-kartu-ujian">
                        <i class="fa fa-print"></i> Cetak Kartu Peserta
                    </button>
                </div>

                <div class="box-body" style="overflow-x: scroll;">
                    <table id="data" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th width="1%">No</th>
                                <th>Nama Mahasiswa</th>
                                <th>Kelas</th>
                                <th>Nama MK</th>
                                <th>Jenis Ujian</th>
                                <th>Waktu Ujian</th>
                                <th>Durasi PG & Essay</th>
                                <th width="7%">Action</th>
                                <th>Ujian PG</th>
                                <th>Ujian Essay</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($peserta as $d) { ?>
                                <tr>
                                    <td><?php echo $no++; ?></td>
                                    <td><?php echo $d->nama_mahasiswa; ?></td>
                                    <td><?php echo $d->nama_kelas; ?></td>
                                    <td><?php echo $d->nama_matakuliah; ?></td>
                                    <td><?php echo $d->jenis_ujian; ?></td>
                                    <td><?php echo date('d-m-Y', strtotime($d->tanggal_ujian)); ?> | <?php echo $d->jam_ujian; ?></td>
                                    <td><?php echo $d->durasi_pg; ?> & <?php echo $d->durasi_essay; ?> Menit</td>
                                    <td>
                                        <?php if ($d->nilai == null && $d->bobot_essay == null) { ?>
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-warning btn-flat btn-xs">Action</button>
                                                <button type="button" class="btn btn-warning btn-xs btn-flat dropdown-toggle" data-toggle="dropdown">
                                                    <span class="caret"></span>
                                                    <span class="sr-only">Toggle Dropdown</span>
                                                </button>
                                                <ul class="dropdown-menu" role="menu">
                                                    <li><a href="<?= base_url() . 'daftar_peserta/edit/' . $d->id_peserta; ?>">Edit Data Peserta</a></li>
                                                    <li><a href="<?= base_url() . 'daftar_peserta/hapus/' . $d->id_peserta; ?>" onclick="return confirm('Apakah yakin data peserta ini di hapus?')">Hapus Data Peserta</a></li>
                                                </ul>
                                            </div>
                                        <?php } else {
                                            echo '-';
                                        }
                                         ?>
                                        
                                    </td>
                                    <td>
                                        <?php if ($d->status_pg == "1") {
                                                echo "<span class='btn btn-xs btn-default'> Belum Ujian </span>";
                                            } else if ($d->status_pg == "2") {
                                                echo "<span class='btn btn-xs btn-success'> Selesai Ujian </span>";
                                            }
                                            ?>
                                    </td>
                                    <td>
                                        <?php if ($d->status_essay == "1") {
                                                echo "<span class='btn btn-xs btn-default'> Belum Ujian </span>";
                                            } else if ($d->status_essay == "2") {
                                                echo "<span class='btn btn-xs btn-success'> Selesai Ujian </span>";
                                            }
                                            ?>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- /.col-->

            <!-- MODAL CETAK KARTU UJIAN -->
            <div class="modal fade" id="modal-cetak-kartu-ujian" style="display: none;">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span></button>
                            <h4 class="modal-title">Filter Cetak Kartu Ujian</h4>
                        </div>
                        <form method="get" action="<?php echo base_url('daftar_peserta/cetak_kartu_peserta'); ?>" target="_blank">
                            <div class="modal-body">
                                <div class="form-group">
                                    <label class="font-weight-bold">Nama Kelas</label>
                                    <select class="form-control select2" name="idkls" style="width: 100%;">
                                        <option selected="selected" disabled="">- Pilih Kelas -</option>
                                        <?php foreach ($kelas as $a) { ?>
                                            <option value="<?= $a->id_kelas ?>"><?= $a->nama_kelas; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Nama Mahasiswa</label>
                                    <select class="select2 form-control" name="idmhs" style="width: 100%;">
                                        <option selected="selected" disabled="">- Pilih Nama Mahasiswa -</option>
                                        <?php foreach ($mhs as $m) { ?>
                                            <option value="<?= $m->id_mahasiswa ?>"><?= $m->nim; ?> | <?= $m->nama_mahasiswa; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">TUTUP</button>
                                <button type="submit" class="btn btn-primary" target="_blank">SUBMIT</button>
                            </div>
                        </form>
                        <!-- /.tutup form dengan modal  -->
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
            <!-- /.TUTUP MODAL CETAK KARTU UJIAN -->

            <!-- MODAL CETAK DAFTAR HADIR -->
        </div>
        <!-- ./row -->
</section><!-- /.content -->

<?php
$this->load->view('admin/js');
?>
<!--tambahkan custom js disini-->
<script type="text/javascript">
    $(document).ready(function() {
        $('#data').DataTable({
            buttons: ['copy', 'csv', 'excel', 'pdf', 'print']
        });
    });

    $('.select2').select2();

    $('.alert-message').alert().delay(3000).slideUp('slow');
</script>
<?php
$this->load->view('admin/foot');
?>