<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('user'); ?>">
        <div class="sidebar-brand-icon">
            <img src="<?= base_url('assets/img/profile/uap.png'); ?>" height="40px" width="40px">
        </div>
        <div class="sidebar-brand-text mx-3">Prodi Informatika</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        User
    </div>

    <?php if ($title == "Dashboard") : ?>
        <li class="nav-item active">
        <?php else : ?>
        <li class="nav-item">
        <?php endif; ?>
        <a class="nav-link" href="<?= base_url('user'); ?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
        </li>

        <?php if ($title == "Pengumuman") : ?>
            <li class="nav-item active">
            <?php else : ?>
            <li class="nav-item">
            <?php endif; ?>
            <a class="nav-link" href="<?= base_url('user/pengumuman'); ?>">
                <i class="fas fa-fw fa-scroll"></i>
                <span>Pengumuman</span></a>
            </li>

            <?php if ($title == "Berita") : ?>
                <li class="nav-item active">
                <?php else : ?>
                <li class="nav-item">
                <?php endif; ?>
                <a class="nav-link" href="<?= base_url('user/arsip'); ?>">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Berita</span></a>
                </li>

                <?php if ($title == "Edit Profil") : ?>
                    <li class="nav-item active">
                    <?php else : ?>
                    <li class="nav-item">
                    <?php endif; ?>
                    <a class="nav-link" href="<?= base_url('user/edit'); ?>">
                        <i class="fas fa-fw fa-user-edit"></i>
                        <span>Edit Profil</span></a>
                    </li>

                    <?php if ($title == "Ganti Password") : ?>
                        <li class="nav-item active">
                        <?php else : ?>
                        <li class="nav-item">
                        <?php endif; ?>
                        <a class="nav-link" href="<?= base_url('user/changepassword'); ?>">
                            <i class="fas fa-fw fa-key"></i>
                            <span>Ganti Password</span></a>
                        </li>

                        <!-- Divider -->
                        <hr class="sidebar-divider">

                        <!-- Nav Item - Charts -->
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url('auth/logout'); ?>">
                                <i class="fas fa-fw fa-sign-out-alt"></i>
                                <span>Keluar</span></a>
                        </li>

                        <!-- Divider -->
                        <hr class="sidebar-divider d-none d-md-block">

                        <!-- Sidebar Toggler (Sidebar) -->
                        <div class="text-center d-none d-md-inline">
                            <button class="rounded-circle border-0" id="sidebarToggle"></button>
                        </div>

</ul>
<!-- End of Sidebar -->