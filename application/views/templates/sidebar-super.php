<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('admin'); ?>">
        <div class="sidebar-brand-icon">
            <img src="<?= base_url('assets/img/profile/uap.png'); ?>" height="40px" width="40px">
        </div>
        <div class="sidebar-brand-text mx-3">Prodi Informatika</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Super Administrator
    </div>

    <!-- Nav Item - Dashboard -->
    <?php if ($title == "Dashboard") : ?>
        <li class="nav-item active">
        <?php else : ?>
        <li class="nav-item">
        <?php endif; ?>
        <a class="nav-link" href="<?= base_url('super'); ?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
        </li>

        <!-- Nav Item - Dashboard -->
        <?php if ($title == "Data Admin") : ?>
            <li class="nav-item active">
            <?php else : ?>
            <li class="nav-item">
            <?php endif; ?>
            <a class="nav-link" href="<?= base_url('super/adminpage'); ?>">
                <i class="fas fa-fw fa-users-cog"></i>
                <span>Data Admin</span></a>
            </li>

            <!-- Nav Item - Dashboard -->
            <?php if ($title == "Data Dosen") : ?>
                <li class="nav-item active">
                <?php else : ?>
                <li class="nav-item">
                <?php endif; ?>
                <a class="nav-link" href="<?= base_url('super/dosen'); ?>">
                    <i class="fas fa-fw fa-user-tie"></i>
                    <span>Data Dosen</span></a>
                </li>

                <?php if ($title == "Pengumuman") : ?>
                    <li class="nav-item active">
                    <?php else : ?>
                    <li class="nav-item">
                    <?php endif; ?>
                    <a class="nav-link" href="<?= base_url('super/pengumuman'); ?>">
                        <i class="fas fa-fw fa-scroll"></i>
                        <span>Pengumuman</span></a>
                    </li>

                    <?php if ($title == "Pengarsipan") : ?>
                        <li class="nav-item active">
                        <?php else : ?>
                        <li class="nav-item">
                        <?php endif; ?>
                        <a class="nav-link" href="<?= base_url('super/arsip'); ?>">
                            <i class="fas fa-fw fa-folder"></i>
                            <span>Pengarsipan</span></a>
                        </li>

                        <!-- Divider -->
                        <hr class="sidebar-divider my-0">

                        <?php if ($title == "Edit Profile") : ?>
                            <li class="nav-item active">
                            <?php else : ?>
                            <li class="nav-item">
                            <?php endif; ?>
                            <a class="nav-link" href="<?= base_url('super/editprofile'); ?>">
                                <i class="fas fa-fw fa-user-edit"></i>
                                <span>Edit Profile</span></a>
                            </li>

                            <?php if ($title == "Change Password") : ?>
                                <li class="nav-item active">
                                <?php else : ?>
                                <li class="nav-item">
                                <?php endif; ?>
                                <a class="nav-link" href="<?= base_url('super/changepassword'); ?>">
                                    <i class="fas fa-fw fa-key"></i>
                                    <span>Change Password</span></a>
                                </li>

                                <!-- Divider -->
                                <hr class="sidebar-divider">

                                <!-- Nav Item - Charts -->
                                <li class="nav-item">
                                    <a class="nav-link" href="<?= base_url('auth/logout'); ?>">
                                        <i class="fas fa-fw fa-sign-out-alt"></i>
                                        <span>Logout</span></a>
                                </li>

                                <!-- Divider -->
                                <hr class="sidebar-divider d-none d-md-block">

                                <!-- Sidebar Toggler (Sidebar) -->
                                <div class="text-center d-none d-md-inline">
                                    <button class="rounded-circle border-0" id="sidebarToggle"></button>
                                </div>

</ul>
<!-- End of Sidebar -->