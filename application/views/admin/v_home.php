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

    <div class="callout callout-danger">
        <h4>Selamat Datang, <?php echo $this->session->userdata('nama');?> </h4>
        <p>Ini adalah area Administratif Aplikasi Ujian Online, yang memiliki platform dan bahasa user-friendly untuk membuat, mengelola dan melaksanakan ujian online.</p>
    </div>

    <div class="box box-success box-solid">
        <div class="box-header with-border">
            <h3 class="box-title">Petunjuk Penggunaan</h3>
        </div><!-- /.box-header -->
        <div class="box-body">
            <dl>
                <dt>Data Master</dt>
                <dd>
                    Pada Tab Data Master digunakan untuk menambah, mengupdate dan menghapus <b>Data Kelas</b>, <b>Data Mahasiswa</b>, <b>Data Dosen</b>, <b>Data Mata Kuliah</b>, <b>Data Jenis Ujian</b> dan <b>Data Pengawas</b>. <br>
                    Bagi Mahasiswa, Dosen dan Pengawas jika mengalami kesulitan saat <b>Login</b>, anda juga dapat mengubah password di halaman tersebut dengan meng-klik tombol <b>Action</b> kemudian <b>Edit Data</b>.
                </dd><br>
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
                    </ol>
                </dd>
                <dt>Data Peserta Ujian</dt>
                <dd>
                    Pada Tab Data Peserta Ujian terdapat 3 tab yaitu :
                    <ol>
                        <li>Tambah Peserta Ujian</li>
                        Fungsi ini digunakan untuk menambahkan peserta ujian per-mahasiswa.
                        <li>Tambah Peserta Perkelas</li>
                        Fungsi ini digunakan untuk menambahkan peserta ujian dalam satu gelas (lebih dari 1 peserta) dengan waktu dan ujian yang sama.
                        <li>Daftar Peserta Ujian</li>
                        Fungsi ini untuk melihat semua Data Peserta yang telah dibuat pada tab Tambah Peserta Ujian dan Tambah Peserta Perkelas. <br> 
                        Fungsi ini juga dapat mengedit dan menghapus data Data Peserta yang mengalami perubahan dengan cara meng-klik bagian tombol Action kemudian edit data untuk merubah Data Peserta dan Hapus Data untuk menhapus Data Peserta.
                        Akan tetapi fungsi tersebut tidak akan berlaku apabila peserta sudah melaksanakan ujian.                   
                    </ol>
                </dd>
                <dt>Monitoring Ujian</dt>
                <dd>
                    Pada Tab Monitoring Ujian, Admin dan Pengawas Ujian dapat melihat proses ujian dilaksanakan. Apakah peserta ujian sedang mengerjakan atau sudah selesai mengerjakan.
                </dd><br>
                <dt>Data Hasil Ujian</dt>
                <dd>
                    Pada Tab Data Hasil Ujian terdapat 2 tab yaitu :
                    <ol>
                        <li>Hasil Ujian PG</li>
                        Fungsi ini untuk melihat hasil ujian pilihan ganda.
                        <li>Hasil Ujian Essay</li>
                        Fungsi ini untuk melihat hasil ujian essay yang sudah dikoreksi pada fungsi <b>Periksa Soal Essay</b>.
                    </ol>
                </dd>
                <dt>Utilitas</dt>
                <dd>
                    Pada Tab Data Hasil Ujian terdapat 3 tab yaitu :
                    <ol>
                        <li>Backup Database</li>
                        Fungsi ini digunakan untuk mem-Backup Database yang sudah dilaksanakan ujian.
                        <li>Reset Database</li>
                        Fungsi ini digunakan untuk menghapus semua data peserta ujian. Sebelum menggunakan fungsi ini baiknya anda mem-Backup terlebih dahulu pada tab <b>Backup Database</b>
                        <li>Restore Database</li>
                        Fungsi ini digunakan untuk mengembalikan data ujian sebelumnya yang telah di Backup pada fungsi <b>Backup Database</b>.
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

