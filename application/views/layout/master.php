<!DOCTYPE html>
<html lang="bn">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Dashboard – ID Studio</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/flatpickr@4.6.13/dist/flatpickr.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
  <link href="<?php echo base_url(); ?>backend/assets/css/style.css" rel="stylesheet">
</head>
<body data-active="dashboard">

      <?php include(APPPATH . 'views/layout/sidebar.php'); ?>
    <div class="sidebar-overlay" id="sidebarOverlay"></div>

  <div class="main-wrapper">
    <header class="topbar" id="topbar">
      <button class="toggle-btn" id="toggleSidebar" aria-label="Toggle menu"><i class="bi bi-text-indent-left"></i></button>
      <div class="search-box">
        <input type="text" placeholder="To search for...">
        <i class="bi bi-search"></i>
      </div>
      <button class="quick-add hide-xs" title="Quick add"><i class="bi bi-plus"></i></button>

      <div class="actions">
        <div class="live-clock hide-xs" title="Current time">
          <i class="bi bi-clock"></i>
          <div><strong id="clockTime">--:--:--</strong><small id="clockDate"></small></div>
        </div>
        <button class="icon-btn plain hide-xs"><i class="bi bi-share"></i></button>
        <button class="icon-btn plain hide-xs"><i class="bi bi-check2"></i></button>

        <!-- Profile -->
        <div class="dropdown">
          <button class="profile-toggle" data-bs-toggle="dropdown" data-bs-offset="0,6" aria-expanded="false" aria-label="Profile">
            <img class="avatar" src="img/avatar.svg" alt="Rajni Superadmin">
          </button>
          <ul class="dropdown-menu dropdown-menu-end profile-menu">
            <li class="profile-head">
              <img src="img/avatar.svg" alt="">
              <div><strong>Rajni Superadmin</strong><small>Super Admin</small></div>
            </li>
            <li><a class="dropdown-item" href="#"><i class="bi bi-person"></i> My Profile</a></li>
            <li><a class="dropdown-item" href="#"><i class="bi bi-clock-history"></i> My timesheets</a></li>
            <li><a class="dropdown-item" href="#"><i class="bi bi-pencil-square"></i> Edit Profile</a></li>
            <li class="dropdown-submenu">
              <a class="dropdown-item" href="#" data-submenu><i class="bi bi-translate"></i> Language <i class="bi bi-chevron-left arrow"></i></a>
              <ul class="sub list-unstyled">
                <li><a class="dropdown-item checked" href="#">English</a></li>
                <li><a class="dropdown-item" href="#">বাংলা</a></li>
                <li><a class="dropdown-item" href="#">हिन्दी</a></li>
                <li><a class="dropdown-item" href="#">Español</a></li>
              </ul>
            </li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item logout" href="login.html"><i class="bi bi-box-arrow-right"></i> To go out</a></li>
          </ul>
        </div>

        <button class="icon-btn hide-xs"><i class="bi bi-clock"></i></button>
        <button class="icon-btn"><i class="bi bi-bell"></i><span class="dot"></span></button>
      </div>
    </header>

    <main class="content">
    <?php
             if(isset($content)){
               echo $content;
             }
             
             ?>
    </main>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/flatpickr@4.6.13/dist/flatpickr.min.js"></script>
  <script src="<?php echo base_url(); ?>backend/assets/js/app.js"></script>
</body>
</html>
