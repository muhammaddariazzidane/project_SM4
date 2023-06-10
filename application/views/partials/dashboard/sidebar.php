 <!-- Sidebar Start -->
 <aside class="left-sidebar">
   <!-- Sidebar scroll-->
   <div>
     <div class="brand-logo d-flex align-items-center justify-content-between">
       <h3 class="text-nowrap logo-img fw-semibold">
         <span>Desa Tambaksari</span>
       </h3>
       <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
         <i class="ti ti-x fs-8"></i>
       </div>
     </div>
     <!-- Sidebar navigation-->
     <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
       <ul id="sidebarnav">
         <li class="nav-small-cap">
           <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
           <span class="hide-menu">Dashboard</span>
         </li>

         <li class="sidebar-item">
           <a class="sidebar-link " href="<?= base_url('dashboard') ?>" aria-expanded="false">
             <span>
               <i class="ti ti-layout-dashboard"></i>
             </span>
             <span class="hide-menu">Data Penerima BLT</span>
           </a>
         </li>
         <li class="sidebar-item">
           <a class="sidebar-link " href="<?= base_url('dashboard/warga') ?>" aria-expanded="false">
             <span>
               <i class="fas fa-users fs-5"></i>
             </span>
             <span class="hide-menu">Data Warga</span>
           </a>
         </li>
         <?php if ($this->session->userdata('role_id') == 1) : ?>
           <li class="sidebar-item">
             <a class="sidebar-link " href="<?= base_url('dashboard/bantuan') ?>" aria-expanded="false">
               <span>
                 <i class="fas fa-wallet fs-5"></i>
               </span>
               <span class="hide-menu">Data Bantuan</span>
             </a>
           </li>
           <li class="sidebar-item">
             <a class="sidebar-link " href="<?= base_url('dashboard/data') ?>" aria-expanded="false">
               <span>
                 <i class="ti ti-users"></i>
               </span>
               <span class="hide-menu">Data User</span>
             </a>
           </li>
           <li class="nav-small-cap">
             <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
             <span class="hide-menu">Informasi</span>
           </li>
           <li class="sidebar-item">
             <a class="sidebar-link " href="<?= base_url('dashboard/kegiatan') ?>" aria-expanded="false">
               <span>
                 <i class="fas fa-tasks fs-5"></i>
               </span>
               <span class="hide-menu">Data Kegiatan</span>
             </a>
           </li>
           <li class="sidebar-item">
             <a class="sidebar-link " href="<?= base_url('dashboard/berita') ?>" aria-expanded="false">
               <span>
                 <i class="fas fa-newspaper fs-5"></i>
               </span>
               <span class="hide-menu">Data Berita</span>
             </a>
           </li>
           <li class="sidebar-item">
             <a class="sidebar-link " href="<?= base_url('dashboard/wisata') ?>" aria-expanded="false">
               <span>
                 <i class="fas fa-tree fs-5"></i>
               </span>
               <span class="hide-menu">Data Wisata</span>
             </a>
           </li>
         <?php endif ?>
         <?php if ($this->session->role_id == 1) : ?>
           <li class="nav-small-cap">
             <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
             <span class="hide-menu">Laporan</span>
           </li>
           <li class="sidebar-item">
             <a class="sidebar-link " href="<?= base_url('dashboard/laporan') ?>" aria-expanded="false">
               <span>
                 <i class="fas fa-archive fs-5"></i>
               </span>
               <span class="hide-menu">Laporan penerima BLT</span>
             </a>
           </li>
         <?php endif ?>
         <li class="nav-small-cap">
           <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
           <span class="hide-menu">AUTH</span>
         </li>
         <li class="sidebar-item">
           <a class="sidebar-link" style="color: red;" href="<?= base_url('auth/logout') ?>" aria-expanded="false">
             <span>
               <i class="ti ti-logout "></i>
             </span>
             <span class="hide-menu ">Logout</span>
           </a>
         </li>
       </ul>
     </nav>
     <!-- End Sidebar navigation -->
   </div>
   <!-- End Sidebar scroll-->
 </aside>
 <!--  Sidebar End -->