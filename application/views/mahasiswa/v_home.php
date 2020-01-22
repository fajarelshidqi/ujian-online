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
        Home
        <small></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    </ol>
</section>

<!-- Main content -->
<section class="content">

    <div class="callout callout-info">
        <h4>Selamat Datang, <?php echo $this->session->userdata('nama');?> </h4>
        <p>Ini adalah Ruang Aplikasi Ujian Online, yang memiliki platform dan bahasa user-friendly untuk melaksanakan ujian online. Apabila anda kesulitan dalam melakukan Ujian Online harap hubungi Administrator.</p>
    </div>

    <div class="box box-success box-solid">
        <div class="box-header with-border">
            <h3 class="box-title">Petunjuk Penggunaan Ujian Online</h3>
        </div><!-- /.box-header -->
        <div class="box-body">
            <dl>
                <dt></dt>
                <dd>
                    Di Ruang Ujian ini anda dapat melihat jadwal ujian dan melihat hasil ujian secara langsung. berikut penjelasan dari setiap <b>TAB</b>.
                    <ol><br>
                        <li><b>Jadwal Ujian</b></li>
                        di TAB Jadwal Ujian, terdapat jadwal ujian yang telah didaftarkan oleh administrator sebagai peserta ujian bahwa anda berhak melaksanakan ujian. Apbila di ruang tersebut tidak tersedia jadwal ujian silahkan hubungin administrator untuk mendapatkan informasi lebih lanjut
                        selanjutnya ketika anda sudah memiliki waktu ujian, silahkan anda klik tombol <b>Mulai</b> yang tersedia ketika waktu telah menunjukan mulainya waktu ujian.
                        <li><b>Data Hasil Ujian</b></li>
                        di TAB Data Hasil Ujian, anda dapat melihat secara langsung hasil ujian yang telah anda lakukan di Ruang Jadwal Ujian. selain itu anda juga dapat mendownload hasil ujian ini kedalam bentuk PDF. sebagai bentuk laporan bahwa anda telah mengikuti ujian tersebut. Simpan bukti tersebut agar dapat dipertanggung jawabkan ketika terjadi masalah.
                        <li><b>Ganti Password</b></li>
                        di TAB Ganti Password, anda dapat mengganti password sesuai keinginan anda setelah anda mendapatkan password default dari pihak administrator. ketika anda lupa password, anda dapat menghubungi pihak administrator agar mendapatkan password terbaru.
                    </ol>
                </dd>
            </dl>
        </div><!-- /.box-body -->
    </div>

</section><!-- /.content -->
  
<?php 
$this->load->view('mahasiswa/js');
?>

<!--tambahkan custom js disini-->

<script type="text/javascript">

	$(function(){
		$('#data-tables').dataTable();
	});

	$('.alert-message').alert().delay(3000).slideUp('slow');

</script>


<?php
$this->load->view('admin/foot');
?>

