  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?= base_url('image/avatar.png') ?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $this->session->userdata('nama'); ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>

      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>

        <!-- Menu Home -->
        <li <?= $this->uri->segment(1) == 'home' ? 'class="active"' : '' ?>>
          <a href="<?php echo base_url('home'); ?>"><i class="fa fa-home"></i>
            <span>Home</span>
          </a>
        </li>
        <!-- Tutup Menu Home -->
      <?php if ($this->session->userdata('status') == 'admin_login') { ?>
        <!-- Menu Data Master dan Submenu Data mhs, Dosen, MK -->
        <li class="treeview <?= $this->uri->segment(1) == 'kelas' || $this->uri->segment(1) == 'mahasiswa' || $this->uri->segment(1) == 'dosen' || $this->uri->segment(1) == 'matakuliah' || $this->uri->segment(1) == 'jenis_ujian' || $this->uri->segment(1) == 'pengawas' ? 'active' : '' ?>">
          <a href="#">
            <i class="fa fa-pie-chart"></i>
            <span>Data Master</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li <?= $this->uri->segment(1) == 'kelas' ? 'class="active"' : '' ?>>
              <a href="<?php echo base_url('kelas'); ?>"><i class="fa fa-circle-o"></i> Data Kelas</a>
            </li>
            <li <?= $this->uri->segment(1) == 'mahasiswa' ? 'class="active"' : '' ?>>
              <a href="<?php echo base_url('mahasiswa'); ?>"><i class="fa fa-circle-o"></i> Data Mahasiswa</a>
            </li>
            <li <?= $this->uri->segment(1) == 'dosen' ? 'class="active"' : '' ?>>
              <a href="<?php echo base_url('dosen'); ?>"><i class="fa fa-circle-o"></i> Data Dosen</a>
            </li>
            <li <?= $this->uri->segment(1) == 'matakuliah' ? 'class="active"' : '' ?>>
              <a href="<?php echo base_url('matakuliah'); ?>"><i class="fa fa-circle-o"></i> Data Mata Kuliah</a>
            </li>
            <li <?= $this->uri->segment(1) == 'jenis_ujian' ? 'class="active"' : '' ?>>
              <a href="<?php echo base_url('jenis_ujian'); ?>"><i class="fa fa-circle-o"></i> Data Jenis Ujian</a>
            </li>
            <li <?= $this->uri->segment(1) == 'pengawas' ? 'class="active"' : '' ?>>
              <a href="<?php echo base_url('pengawas'); ?>"><i class="fa fa-circle-o"></i> Data Pengawas</a>
            </li>
          </ul>
        </li>
        <!-- Tutup Menu Data Master dan Submenu Data mhs, Dosen, MK -->

        <!-- Menu Data Soal PG -->
        <li class="treeview <?= $this->uri->segment(1) == 'soal' || $this->uri->segment(1) == 'daftar_soal' ? 'active' : '' ?>">
          <a href="#">
            <i class="fa fa-file-text"></i>
            <span>Data Soal PG</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li <?= $this->uri->segment(1) == 'soal' ? 'class="active"' : '' ?>>
              <a href="<?php echo base_url('soal'); ?>"><i class="fa fa-circle-o"></i> Tambah Soal PG</a>
            </li>
            <li <?= $this->uri->segment(1) == 'daftar_soal' ? 'class="active"' : '' ?>>
              <a href="<?php echo base_url('daftar_soal'); ?>"><i class="fa fa-circle-o"></i> Daftar Soal PG</a>
            </li>
          </ul>
        </li>
        <!-- Tutup Data Soal PG -->

        <!-- Menu Data Soal Essay -->
        <li class="treeview <?= $this->uri->segment(1) == 'essay' || $this->uri->segment(1) == 'daftar_soal_essay' || $this->uri->segment(1) == 'periksa_essay' ? 'active' : '' ?>">
          <a href="#">
            <i class="fa fa-edit"></i>
            <span>Data Soal Essay</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li <?= $this->uri->segment(1) == 'essay' ? 'class="active"' : '' ?>>
              <a href="<?php echo base_url('essay'); ?>"><i class="fa fa-circle-o"></i> Tambah Soal Essay</a>
            </li>
            <li <?= $this->uri->segment(1) == 'daftar_soal_essay' ? 'class="active"' : '' ?>>
              <a href="<?php echo base_url('daftar_soal_essay'); ?>"><i class="fa fa-circle-o"></i> Daftar Soal Essay</a>
            </li>
            
          </ul>
        </li>
        <!-- Tutup Data Soal Ujian -->


        <!-- Menu Data Peserta Ujian -->
        <li class="treeview <?= $this->uri->segment(1) == 'peserta' || $this->uri->segment(1) == 'daftar_peserta' || $this->uri->segment(1) == 'tambah_perkelas' ? 'active' : '' ?>">
          <a href="#">
            <i class="fa fa-users"></i>
            <span>Data Peserta Ujian</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li <?= $this->uri->segment(1) == 'peserta' ? 'class="active"' : '' ?>>
              <a href="<?php echo base_url('peserta'); ?>"><i class="fa fa-circle-o"></i> Tambah Peserta Ujian</a>
            </li>
            <li <?= $this->uri->segment(1) == 'tambah_perkelas' ? 'class="active"' : '' ?>>
              <a href="<?php echo base_url('tambah_perkelas'); ?>"><i class="fa fa-circle-o"></i> Tambah Peserta Perkelas</a>
            </li>
            <li <?= $this->uri->segment(1) == 'daftar_peserta' ? 'class="active"' : '' ?>>
              <a href="<?php echo base_url('daftar_peserta'); ?>"><i class="fa fa-circle-o"></i> Daftar Peserta Ujian</a>
            </li>
          </ul>
        </li>
        <!-- Tutup Data Peserta Ujian -->
        <li <?= $this->uri->segment(1) == 'monitoring' ? 'class="active"' : '' ?>>
          <a href="<?php echo base_url('monitoring'); ?>"><i class="fa fa-laptop"></i>
            <span>Monitoring Ujian</span>
          </a>
        </li>
        <!-- Menu Data Hasil Ujian -->
        <li class="treeview <?= $this->uri->segment(1) == 'hasil_pg' || $this->uri->segment(1) == 'hasil_essay' ? 'active' : '' ?>">
          <a href="#">
            <i class="fa fa-folder"></i>
            <span>Data Hasil Ujian</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li <?= $this->uri->segment(1) == 'hasil_pg' ? 'class="active"' : '' ?>>
              <a href="<?php echo base_url('hasil_pg'); ?>"><i class="fa fa-circle-o"></i> Hasil Ujian PG</a>
            </li>
            <li <?= $this->uri->segment(1) == 'hasil_essay' ? 'class="active"' : '' ?>>
              <a href="<?php echo base_url('hasil_essay'); ?>"><i class="fa fa-circle-o"></i> Hasil Ujian Essay</a>
            </li>
          </ul>
        </li>
        <!-- Tutup Data Peserta Ujian -->

        <!-- Menu utilitas -->
        <li <?= $this->uri->segment(1) == 'utilitas' ? 'class="active"' : '' ?>>
          <a href="<?php echo base_url('utilitas'); ?>"><i class="fa fa-gears"></i>
            <span>Utilities</span>
          </a>
        </li>
        <!-- Tutp Import Data -->
        

      <?php } else if ($this->session->userdata('status') == 'dosen_login') { ?>

        <!-- Menu Data Soal PG -->
        <li class="treeview <?= $this->uri->segment(1) == 'soal' || $this->uri->segment(1) == 'daftar_soal' ? 'active' : '' ?>">
          <a href="#">
            <i class="fa fa-file-text"></i>
            <span>Data Soal PG</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li <?= $this->uri->segment(1) == 'soal' ? 'class="active"' : '' ?>>
              <a href="<?php echo base_url('soal'); ?>"><i class="fa fa-circle-o"></i> Tambah Soal PG</a>
            </li>
            <li <?= $this->uri->segment(1) == 'daftar_soal' ? 'class="active"' : '' ?>>
              <a href="<?php echo base_url('daftar_soal'); ?>"><i class="fa fa-circle-o"></i> Daftar Soal PG</a>
            </li>
          </ul>
        </li>
        <!-- Tutup Data Soal PG -->

        <!-- Menu Data Soal Essay -->
        <li class="treeview <?= $this->uri->segment(1) == 'essay' || $this->uri->segment(1) == 'daftar_soal_essay' || $this->uri->segment(1) == 'periksa_essay' ? 'active' : '' ?>">
          <a href="#">
            <i class="fa fa-edit"></i>
            <span>Data Soal Essay</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li <?= $this->uri->segment(1) == 'essay' ? 'class="active"' : '' ?>>
              <a href="<?php echo base_url('essay'); ?>"><i class="fa fa-circle-o"></i> Tambah Soal Essay</a>
            </li>
            <li <?= $this->uri->segment(1) == 'daftar_soal_essay' ? 'class="active"' : '' ?>>
              <a href="<?php echo base_url('daftar_soal_essay'); ?>"><i class="fa fa-circle-o"></i> Daftar Soal Essay</a>
            </li>
            <li <?= $this->uri->segment(1) == 'periksa_essay' ? 'class="active"' : '' ?>>
              <a href="<?php echo base_url('periksa_essay'); ?>"><i class="fa fa-circle-o"></i> Periksa Soal Essay</a>
            </li>
          </ul>
        </li>
        <!-- Tutup Data Soal Ujian -->

      <?php } else if ($this->session->userdata('status') == 'pengawas_login') { ?>

        <li <?= $this->uri->segment(1) == 'monitoring' ? 'class="active"' : '' ?>>
          <a href="<?php echo base_url('monitoring'); ?>"><i class="fa fa-laptop"></i>
            <span>Monitoring Ujian</span>
          </a>
        </li>

      <?php } ?>



        <li class="header">AKUN</li>

        <!-- Menu Data Peserta Ujian -->
        <li <?= $this->uri->segment(1) == 'password' ? 'class="active"' : '' ?>>
          <a href="<?php echo base_url('password'); ?>"><i class="fa fa-lock"></i>
            <span>Ganti Password</span>
          </a>
        </li>
        <!-- Tutup Data Peserta Ujian -->

        <!-- Menu Data Peserta Ujian -->
        <li>
          <a href="<?php echo base_url('logout'); ?>"><i class="fa fa-power-off"></i>
            <span>Keluar Akun</span>
          </a>
        </li>
        <!-- Tutup Data Peserta Ujian -->

      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">