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
        Daftar Soal Ujian
        <small></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?= base_url('home') ?>"><i class="fa fa-home"></i> Home</a></li>
        <li><a href="#"></a> Data Soal Ujian</li>
        <li><a href="#"></a> Daftar Soal Ujian</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-success" style="overflow-x: scroll;">
                <div class="box-header">
                    <h4 class="box-title">Filter Berdasarkan Mata Kuliah</h4>
                </div>
                <form action="" method="get" class="form-horizontal">
                    <div class="box-body">
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Nama Mata Kuliah</label>
                            <div class="col-sm-10">
                                <select class="select2 form-control" name="id" required="">
                                    <option selected="selected" disabled="">- Pilih Mata Kuliah -</option>
                                    <?php foreach ($kelas as $a) { ?>
                                        <option value="<?= $a->id_matakuliah ?>"><?= $a->kode_matakuliah; ?> | <?= $a->nama_matakuliah; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label"></label>
                            <div class="col-sm-10">
                                <a href="<?= base_url('daftar_soal'); ?>" class="btn btn-default btn-flat"><span class="fa fa-refresh"></span> Refresh</a>
                                <button type="submit" class="btn btn-primary btn-flat" title="Filter Data Soal Ujian"><span class="fa fa-filter"></span> Filter</button>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">

                    </div>
                    <!-- /.box-footer -->
                </form>

            </div>
            <?= $this->session->flashdata('message'); ?>
            <!-- Default box -->
            <div class="box box-success" style="overflow-x: scroll;">
                <div class="box-body">
                    <table id="data" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th width="1%">No</th>
                                <th width="10%">KODE MK</th>
                                <th width="20%">MATA KULIAH</th>
                                <th>SOAL UJIAN</th>
                                <th width="13%">KUNCI JAWABAN</th>
                                <th width="8%">AKSI</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($daftar_soal as $d) { ?>
                                <tr>
                                    <td><?php echo $no++; ?></td>
                                    <td><?php echo $d->kode_matakuliah; ?></td>
                                    <td><?php echo $d->nama_matakuliah; ?></td>
                                    <td>
                                        <?php echo $d->pertanyaan; ?>

                                        <ol type="A">
                                            <li>
                                                <?php if ('A'== $d->kunci_jawaban) {
                                                    echo "<b>";
                                                    echo $d->a;
                                                    echo "</b>";
                                                } else {
                                                    echo $d->a;
                                                }
                                                 ?>                                                                
                                            </li>
                                            <li>
                                                <?php if ('B'== $d->kunci_jawaban) {
                                                    echo "<b>";
                                                    echo $d->b;
                                                    echo "</b>";
                                                } else {
                                                    echo $d->b;
                                                }
                                                 ?>    
                                            </li>
                                            <li>
                                                <?php if ('C'== $d->kunci_jawaban) {
                                                    echo "<b>";
                                                    echo $d->c;
                                                    echo "</b>";
                                                } else {
                                                    echo $d->c;
                                                }
                                                 ?>    
                                            </li>
                                            <li>
                                                <?php if ('D'== $d->kunci_jawaban) {
                                                    echo "<b>";
                                                    echo $d->d;
                                                    echo "</b>";
                                                } else {
                                                    echo $d->d;
                                                }
                                                 ?>    
                                            </li>
                                            <li>
                                                <?php if ('E'== $d->kunci_jawaban) {
                                                    echo "<b>";
                                                    echo $d->e;
                                                    echo "</b>";
                                                } else {
                                                    echo $d->e;
                                                }
                                                 ?>    
                                            </li>
                                        </ol>
                                    </td>
                                    <td><b><?php echo $d->kunci_jawaban; ?></b></td>
                                    <td>
                                        <a href="<?= base_url() . 'daftar_soal/edit/' . $d->id_soal_ujian; ?>" class="btn btn-xs btn-success"><span class="glyphicon glyphicon-edit" title="Ubah"></span></a> |
                                        <a href="<?= base_url() . 'daftar_soal/hapus/' . $d->id_soal_ujian; ?>" class="btn btn-xs btn-danger"><span class="glyphicon glyphicon-trash" onclick="return confirm('Apakah yakin data soal ini akan di hapus?')" title="Hapus"></span></a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
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
        $('#data').dataTable();
    });
    $('.select2').select2();
    $('.alert-message').alert().delay(3000).slideUp('slow');
    $('.alert-dismissible').alert().delay(3000).slideUp('slow');
</script>
<?php
$this->load->view('admin/foot');
?>