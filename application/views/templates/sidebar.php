<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-success sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="http://localhost/frinsa3/tabelvarblok/input">
        <div class="sidebar-brand-icon">
            <img src="../assets/img/logo_frinsa.png" style="height:50px">
        </div>
        <div class="sidebar-brand-text mx-3" style="font-size:20px">Frinsa</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Laporan -->
    <li class="nav-item">
        <a class="nav-link" href="http://localhost/frinsa3/home/home">
            <i class="fas fa-home"></i>
            <span>Beranda</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading - Input Data -->
    <div class="sidebar-heading">
        INPUT DATA
    </div>

    <!-- Nav Item - Barang Masuk -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseinput" aria-expanded="true" aria-controls="collapseinput">
            <i class="fas fa-spinner"></i>
            <span>Barang Olahan</span>
        </a>
        <div id="collapseinput" class="collapse" aria-labelledby="headinginput" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="http://localhost/frinsa3/inputbarangmasuk/input">Barang Masuk</a>
                <a class="collapse-item" href="http://localhost/frinsa3/inputlantaijemur/input">Barang Jemur</a>
                <a class="collapse-item" href="http://localhost/frinsa3/inputbarangkering/input">Barang Kering</a>
                <a class="collapse-item" href="http://localhost/frinsa3/inputhuller/input">Huller</a>
                <a class="collapse-item" href="http://localhost/frinsa3/inputsutongrading/input">Suton+Grading</a>
                <a class="collapse-item" href="http://localhost/frinsa3/inputcshp/input">CS+HP</a>
            </div>
    </li>

    <!-- Nav Item - Gudang -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseGudang" aria-expanded="true" aria-controls="collapseGudang">
            <i class="fas fa-dolly-flatbed"></i>
            <span>Barang Gudang</span>
        </a>
        <div id="collapseGudang" class="collapse" aria-labelledby="headingGudang" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="http://localhost/frinsa3/inputgudang/input">Green Bean</a>
                <a class="collapse-item" href="http://localhost/frinsa3/inputready/input">Ready</a>
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading - EDIT & STOK -->
    <div class="sidebar-heading">
        EDIT & STOK
    </div>

    <!-- Nav Item - Edit Barang Proses -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseproses" aria-expanded="true" aria-controls="collapseproses">
            <i class="fas fa-spinner"></i>
            <span>Barang Olahan</span>
        </a>
        <div id="collapseproses" class="collapse" aria-labelledby="headingproses" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="<?= base_url('inputbarangmasuk/index_edit'); ?>">Barang Masuk</a>
                <a class="collapse-item" href="<?= base_url('inputlantaijemur/index_edit'); ?>">Barang Jemur</a>
                <a class="collapse-item" href="<?= base_url('inputbarangkering/index_edit'); ?>">Barang Kering</a>
                <a class="collapse-item" href="<?= base_url('inputhuller/index_edit'); ?>">Barang Huller</a>
                <a class="collapse-item" href="<?= base_url('inputsutongrading/index_edit'); ?>">Barang Suton+Grading</a>
                <a class="collapse-item" href="<?= base_url('inputcshp/index_edit'); ?>">Barang CS+HP</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Edit Barang Gudang -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseeditGudang" aria-expanded="true" aria-controls="collapseeditGudang">
            <i class="fas fa-dolly-flatbed"></i>
            <span>Barang Gudang</span>
        </a>
        <div id="collapseeditGudang" class="collapse" aria-labelledby="headingeditGudang" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="<?= base_url('inputgudang/index_edit'); ?>">Green Bean</a>
                <a class="collapse-item" href="<?= base_url('inputready/index_edit'); ?>">Ready</a>
            </div>
        </div>
    </li>



    <!-- QUERY MENU -->
    <?php
    $userlevel  = $this->session->userdata('id_userrole');
    $querymenu  = " SELECT `menu`, `user_menu`.`id_menu` 
    FROM `user_akses_menu`
    INNER JOIN `user_menu` ON `user_menu`.`id_menu`=`user_akses_menu`.`id_menu`
    WHERE `id_userrole`='$userlevel' ";
    $menu       = $this->db->query($querymenu)->result();
    ?>

    <!-- LOOPING MENU -->
    <?php foreach ($menu as $m) { ?>
        <!-- Divider -->
        <hr class="sidebar-divider">

        <div class="sidebar-heading">
            <?php echo $m->menu; ?>
        </div>

        <!-- SUB MENU -->
        <?php 
        $id_menu        = $m->id_menu;
        $querysubmenu   = " SELECT `sub_menu`, `icon`, `url`
        FROM `user_sub_menu`
        INNER JOIN `user_menu` ON `user_menu`.`id_menu`=`user_sub_menu`.`id_menu`
        WHERE `user_sub_menu`.`id_menu`='$id_menu' ";
        $submenu        = $this->db->query($querysubmenu)->result();
        ?>

        <?php foreach ($submenu as $sm) { ?>
            <!-- Nav Item -->
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url($sm->url) ?>">
                    <i class="<?php echo $sm->icon; ?>"></i>
                    <span><?php echo $sm->sub_menu; ?></span>
                </a>
            </li>
        <?php } ?>
    <?php } ?>


    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->