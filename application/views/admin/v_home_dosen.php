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
        Home
        <small></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    </ol>
</section>

<!-- Main content -->
<section class="content">

    <div class="callout callout-warning">
        <h4>Selamat Datang, <?= $this->session->userdata('nama');?> </h4>
        <p>Ini adalah Ruang Dosen pada Aplikasi Ujian Online, yang memiliki platform dan bahasa user-friendly untuk membuat dan mengelola pelaksanakan ujian online.</p>
    </div>

    <div class="box box-success box-solid">
        <div class="box-header with-border">
            <h3 class="box-title">Petunjuk Penggunaan</h3>
        </div><!-- /.box-header -->
        <div class="box-body">
            <dl>
                <dt>Data Soal PG</dt>
                <dd>
                    Pada Tab Data Soal PG (Pilihan Ganda) terdapat 2 tab yaitu :
                    <ol>
                        <li>Tambah Soal PG</li>
                        Fungsi ini di tujukan untuk menambah data soal, dengan memilih terlebih dahulu mata kuliah sebelum mengisi soal.
                        <li>Daftar Soal PG</li>
                        Fungsi ini untuk melihat semua soal yang telah dibuat pada tab Tambah Soal PG. <br> 
                        Fungsi ini juga dapat mengedit data soal yang mengalami perubahan dengan cara meng-klik bagian tombol berwarna hijau dengan gambar pencil menulis. <br>
                        Selain mengedit di tab ini juga dapat menghapus soal dengan cara meng-klik bagian tombol berwarna merah bergambar tong sampah.
                    </ol>
                </dd>
                <dt>Data Soal Essay</dt>
                <dd>
                    Pada Tab Data Soal Essay terdapat 3 tab yaitu :
                    <ol>
                        <li>Tambah Soal Essay</li>
                        Fungsi ini di tujukan untuk menambah data soal, dengan memilih terlebih dahulu mata kuliah sebelum mengisi soal.
                        <li>Daftar Soal Essay</li>
                        Fungsi ini untuk melihat semua soal yang telah dibuat pada tab Tambah Soal Essay. <br> 
                        Fungsi ini juga dapat mengedit data soal yang mengalami perubahan dengan cara meng-klik bagian tombol berwarna hijau dengan gambar pencil menulis. <br>
                        Selain mengedit di tab ini juga dapat menghapus soal dengan cara meng-klik bagian tombol berwarna merah bergambar tong sampah.
                        <li>Periksa Soal Essay</li>
                        Fungsi ini di gunakan untuk memeriksa hasil ujian essay sekaligus memberikan nilai pada setiap jawaban yang telah di jawab oleh para peserta ujian.
                    </ol>
                </dd>
            </dl>
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

	$('.alert-message').alert().delay(3000).slideUp('slow');

</script>


<?php
$this->load->view('admin/foot');
?>

