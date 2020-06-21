        <div class="col-md-3 left_col menu_fixed" style="overflow: visible;">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
<!--               <a href="<?=base_url('admin/index/')?>" class="site_title">
                <img src="<?=base_url()?>/assets/images/logo-title.jpeg"/>                
              </a>   -->            
              <a href="<?=base_url('admin/index/')?>" class="site_title">
                <img class="mCS_img_loaded" src="<?=base_url()?>/assets/images/logo-md.jpeg"/> <span>WETA</span>                
              </a>
              <!-- <i class="fa fa-paw"></i> <span>WETA</span> -->
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile">
              <div class="profile_pic">
                <img src="<?=base_url()?>/assets/upload_foto/<?=$this->session->userdata('kode_user')?>.jpg" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Selamat Datang,</span>
                <h2><?=$this->session->userdata('nama')?></h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
              <h3>&nbsp;</h3>
                <ul class="nav side-menu">
                  <li>
                    <a href="<?=base_url('admin/index/')?>"><i class="fa fa-home"></i> Beranda</a>                
                  </li>
                  <li><a><i class="fa fa-user"></i> Anggota <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?=base_url('admin/index/data/anggota')?>">Data Anggota</a></li>
                      <li><a href="<?=base_url('admin/index/add/anggota')?>">Tambah Anggota</a></li>
                    </ul>
                  </li>
                  <?php if($this->session->userdata('level') == '1'){ ?>
                    <li><a><i class="fa fa-user"></i> User <span class="fa fa-chevron-down"></span></a>
                      <ul class="nav child_menu">
                        <li><a href="<?=base_url('admin/index/data/user')?>">Data User</a></li>
                        <li><a href="<?=base_url('admin/index/add/user')?>">Tambah User</a></li>
                      </ul>
                    </li>
                  <?php } ?>
                  <li><a><i class="fa fa-upload"></i> Pinjaman <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?=base_url('admin/index/data_peminjam')?>">Data Pinjaman</a></li>
                      <li><a href="<?=base_url('admin/index/buat_pinjaman')?>">Tambah Pinjaman</a></li>
                      <li><a href="<?=base_url('admin/index/bayar_angsuran')?>">Pembayaran Angsuran</a></li>
                      <li><a href="<?=base_url('admin/index/tutup_angsuran')?>">Pelunasan Angsuran</a></li>
                      <li><a href="<?=base_url('admin/index/perpanjang_angsuran')?>">Perpanjangan Angsuran</a></li>
                    </ul>
                  </li>
                  <li>
                    <a href="<?=base_url('admin/index/list_jaminan')?>"><i class="fa fa-home"></i> Data Jaminan</a>                
                  </li>                  
                  <li><a><i class="fa fa-download"></i> Tabungan <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?=base_url('admin/index/tabungan')?>">Data Tabungan</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-money"></i> Biaya <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?=base_url('admin/index/data_biaya')?>">Data Biaya</a></li>
                      <!-- <li><a href="#">Tambah Biaya</a></li> -->
                      <!-- <li><a href="#">Ubah Biaya</a></li> -->
                      <!-- <li><a href="#">Hapus Biaya</a></li> -->
                    </ul>
                  </li>
                  <li><a><i class="fa fa-bar-chart"></i> Laporan <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?=base_url('admin/index/laporan_pinjaman')?>">Laporan Pinjaman</a></li>
                      <li><a href="<?=base_url('admin/index/laporan_angsuran')?>">Laporan Angsuran</a></li>
                      <li><a href="<?=base_url('admin/index/laporan_tabungan')?>">Laporan Tabungan</a></li>
                      <li><a href="<?=base_url('admin/index/laporan_jurnal')?>">Laporan Jurnal</a></li>
                      <li><a href="<?=base_url('admin/index/buku_besar')?>">Laporan Buku Besar</a></li>
                    </ul>
                  </li>
                </ul>
              </div>
            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="NONE">
                <span class="glyphicon glyphicon-none" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="NONE">
                <span class="glyphicon glyphicon-none" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Logout" href="<?=base_url('admin/index/logout')?>">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>