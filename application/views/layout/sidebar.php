 <aside class="sidebar" id="sidebar">
      <div class="brand">
        <i class="bi bi-person-vcard-fill logo"></i><span class="brand-text">ID Studio</span>
        <button class="sidebar-close" id="closeSidebar" aria-label="Close menu"><i class="bi bi-x-lg"></i></button>
      </div>
      <ul class="menu">
     <li>
                    <a class="menu-link <?php echo ($active == 'dashboard') ? 'active' : ''; ?>" href="<?= base_url(); ?>dashboard"
                        ><i class="icon bi bi-house-fill"></i><span class="label">Dashboard</span></a
                    >
                </li>
       <?php 
                    $id_card_setup = ['field_settings', 'field_groups','applications','subject_group', 'academic_years'];
                    $is_active = in_array($active, $id_card_setup);
                ?>
                 <li >
                    <a class="menu-link <?php echo $is_active ? 'active' : ''; ?> " data-bs-toggle="collapse" href="#sub-id_card_setup" aria-expanded="<?php echo $is_active ? 'true' : 'false'; ?>">
                        <i class="icon bi bi-person-vcard"></i><span class="label">ID Card Setup</span
                        ><i class="bi bi-chevron-left chev"></i>
                    </a>
                    <ul class="submenu collapse <?php echo $is_active ? 'show' : ''; ?>" id="sub-id_card_setup">
                        <!-- <li><a href="<?= base_url(); ?>cardManagement/fieldSettings" class="<?php echo ($active == 'field_settings') ? 'active' : ''; ?>">Field Settings</a></li> -->
                        <li><a href="<?= base_url(); ?>cardManagement/fieldgroups" class="<?php echo ($active == 'field_groups') ? 'active' : ''; ?>">Field Groups </a></li>
                        <li><a href="roles.html">Field Assignment</a></li>
                        <li><a href="<?= base_url(); ?>cardManagement/applications" class="<?php echo ($active == 'applications') ? 'active' : ''; ?>">Applications</a></li>
                        <li><a href="roles.html">Master Fields</a></li>
                        <li><a href="roles.html">Module Types</a></li>
                    </ul>
                </li>
        <li><a class="menu-link" href="badge-maker.html"><i class="icon bi bi-person-vcard"></i><span class="label">Badge Maker</span></a></li>
        <li><a class="menu-link" href="designs.html"><i class="icon bi bi-collection"></i><span class="label">My Designs</span></a></li>
        <li><a class="menu-link" href="templates.html"><i class="icon bi bi-grid-1x2"></i><span class="label">Templates</span></a></li>
        <li>
          <a class="menu-link" data-bs-toggle="collapse" href="#sub-cardmgmt" aria-expanded="false">
            <i class="icon bi bi-credit-card-2-front"></i><span class="label">Card Management</span><i class="bi bi-chevron-left chev"></i>
          </a>
          <ul class="submenu collapse" id="sub-cardmgmt">
            <li><a href="card-create.html">Create Card</a></li>
            <li><a href="cards.html">Card List</a></li>
          </ul>
        </li>
        <li><a class="menu-link" href="customers.html"><i class="icon bi bi-person-lines-fill"></i><span class="label">Customers</span></a></li>
        <li><a class="menu-link" href="cardholders.html"><i class="icon bi bi-people"></i><span class="label">Cardholders</span></a></li>
        <li><a class="menu-link" href="bulk-import.html"><i class="icon bi bi-file-earmark-arrow-up"></i><span class="label">Bulk Import</span></a></li>
        <li><a class="menu-link" href="orders.html"><i class="icon bi bi-bag-check"></i><span class="label">Orders</span></a></li>
        <li><a class="menu-link" href="accessories.html"><i class="icon bi bi-shop"></i><span class="label">Accessories</span></a></li>
        <li>
          <a class="menu-link" data-bs-toggle="collapse" href="#sub-staff" aria-expanded="false">
            <i class="icon bi bi-people-fill"></i><span class="label">Staff</span><i class="bi bi-chevron-left chev"></i>
          </a>
          <ul class="submenu collapse" id="sub-staff">
            <li><a href="staff.html">Staff List</a></li>
            <li><a href="roles.html">Roles &amp; Permissions</a></li>
          </ul>
        </li>
        <li><a class="menu-link" href="settings.html"><i class="icon bi bi-gear-fill"></i><span class="label">Settings</span></a></li>
        <li><a class="menu-link" href="#"><i class="icon bi bi-life-preserver"></i><span class="label">Help</span></a></li>
      </ul>
      <div class="sidebar-footer">
        <div class="foot-text"><strong>ID Studio</strong><small>Pro plan</small></div>
        <div class="storage-bar"><span></span></div>
      </div>
    </aside>