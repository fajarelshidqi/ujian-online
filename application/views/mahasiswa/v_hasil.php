<?php 
$this->load->view('mahasiswa/head');
?>

<!--tambahkan custom css disini-->

<?php
$this->load->view('mahasiswa/topbar');
$this->load->view('mahasiswa/sidebar');
?>

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Hasil Ujian
        <small></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?=base_url('home')?>"><i class="fa fa-home"></i> Home</a></li>
        <li><a href="#"></a> Hasil Ujian</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="callout callout-info">
                <h4><?php echo $this->session->userdata('nama');?> - <?php echo $this->session->userdata('nim');?> </h4>
                <p>Ini adalah Ruang Aplikasi Ujian Online, yang memiliki platform dan bahasa user-friendly untuk melaksanakan ujian online. Apabila anda kesulitan dalam melakukan Ujian Online harap hubungi Administrator.</p>
            </div>

            <!-- Default box -->
            <div class="box box-success" style="overflow-x: scroll;">
                <div class="box box-header" >
                    
                </div>
              <div class="box-body">
                <table id="data" class="table table-bordered table-striped">                    
                    <thead>
                        <tr>
                            <th width="1%">No</th>
                            <th>Nama MK</th>                            
                            <th>Tanggal Ujian</th>                            
                            <th>Jam Ujian</th>                            
                            <th>Jawaban Benar</th>                            
                            <th>Jawaban Salah</th>                            
                            <th>Nilai</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no=1;
                        foreach($hasil as $d) { ?>
                            <tr>
                                <td><?php echo $no++; ?></td>                              
                                <td><?php echo $d->nama_matakuliah; ?></td>                                
                                <td><?php echo date('d-m-Y',strtotime($d->tanggal_ujian)); ?></td>                               
                                <td><?php echo date('H:i:s',strtotime($d->jam_ujian)); ?></td>                                
                                <td>
                                    <?php
                                    if($d->benar == ''){
                                        echo "<span class='btn btn-xs btn-warning'>Belum Ujian</span>";
                                    }else {
                                        echo $d->benar;
                                    }
                                    ?>
                                </td>                                
                                <td>
                                    <?php
                                    if($d->salah == ''){
                                        echo "<span class='btn btn-xs btn-warning'>Belum Ujian</span>";
                                    }else {
                                        echo $d->salah;
                                    }
                                    ?>
                                </td>
                                <td>
                                    <?php
                                    if($d->nilai == ''){
                                        echo "<span class='btn btn-xs btn-warning'>Belum Ujian</span>";
                                    }else {
                                        echo $d->nilai;
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
</div>
<!-- ./row -->
</section><!-- /.content -->

<?php 
$this->load->view('mahasiswa/js');
?>

<!--tambahkan custom js disini-->

<script type="text/javascript">

	$(function(){
		$('#data').dataTable();
	});

	$('.alert-message').alert().delay(3000).slideUp('slow');

</script>

<?php
$this->load->view('mahasiswa/foot');
?>

