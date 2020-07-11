<?php
//ambil data user login
$id_user    = $this->session->userdata('id_user');

$user_aktif = $this->user_model->detail($id_user);
?>

<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
  <!-- Left navbar links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
    </li>
  </ul>

  <!-- Right navbar links -->
  <ul class="navbar-nav ml-auto">
    <!-- Dropdown User -->
    <li class="nav-item dropdown user-menu">
      <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
        <img src="<?php echo base_url() ?>assets/admin/dist/img/user2-160x160.jpg" class="user-image img-circle elevation-2" alt="User Image">
        <span class="d-none d-md-inline"><?php echo $user_aktif->nama ?></span>
      </a>
      <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
        <!-- User image -->
        <li class="user-header bg-primary">
          <img src="<?php echo base_url() ?>assets/admin/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">

          <p>
            <?php echo $user_aktif->nama ?>
            <small><?php echo $user_aktif->level ?></small>
            <!-- <small>Member updated: <?php echo date('D M Y', strtotime($user_aktif->tanggal)) ?></small>  -->
          </p>
        </li>

        <!-- Menu Footer-->
        <li class="user-footer">
          <a href="<?php echo base_url('admin/profile') ?>" class="btn btn-success btn-flat">
            <i class="fa fa-user"></i> Profile</a>
          <a href="<?php echo base_url('login/logout') ?>" class="btn btn-success btn-flat float-right">
            <i class="fa fa-sign-out-alt"></i> Sign out</a>
        </li>
      </ul>
    </li>
  </ul>
</nav>
<!-- /.navbar -->