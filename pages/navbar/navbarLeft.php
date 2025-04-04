
      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item nav-profile">
            <div class="nav-link">
              <div class="user-wrapper">
                <div class="profile-image">
                  <img src="<?php echo $_SESSION["pic"];?>" alt="profile image">
                </div>
                <div class="text-wrapper">
                  <p class="profile-name text-white"><?php echo $_SESSION['name'];?></p>
                  <div>
                    <small class="designation text-muted"><?php echo $_SESSION['status'];?></small>
                    <span class="status-indicator online"></span>
                  </div>
                </div>
              </div>
              <a onclick="location.href='lottonumber'" class="btn btn-success btn-block text-white">คีย์ล็อตเตอรี่
                <i class="mdi mdi-plus"></i>
              </a>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index">
              <i class="menu-icon mdi mdi-television text-white"></i>
              <span class="menu-title text-white">แดชบอร์ด</span>
            </a>
          </li>
          <?php 
            if($_SESSION['status'] == 'Admin'){
          ?>
          <li class="nav-item">
            <a class="nav-link" href="qrcodescanlotto">
              <i class="menu-icon mdi mdi-qrcode text-white"></i>
              <span class="menu-title text-white">สแกนคิวอาร์โค้ด</span>
            </a>
          </li>
          <?php 
          }
          ?>
          <?php 
            if($_SESSION['status'] == 'Admin'){
          ?>
          <li class="nav-item">
            <a class="nav-link" href="lottocomplete">
              <i class="menu-icon mdi mdi-folder-multiple text-white"></i>
              <span class="menu-title text-white">จัดเก็บเลขลอตเตอรี่</span>
            </a>
          </li>
          <?php 
          }
          ?>
          <?php 
            if($_SESSION['status'] == 'Admin'){
          ?>
          <li class="nav-item">
            <a class="nav-link" href="lottosearch.php">
              <i class="menu-icon mdi mdi-account-search text-white"></i>
              <span class="menu-title text-white">ค้นหาล็อตเตอรี่</span>
            </a>
          </li>
          <?php 
            }
          ?>
          <!-- <li class="nav-item">
            <a class="nav-link" href="lottodel">
              <i class="menu-icon mdi mdi-delete-variant text-white"></i>
              <span class="menu-title text-white">ลบล็อตเตอรี่</span>
            </a>
          </li> -->
          <li class="nav-item">
            <a class="nav-link" href="logout">
              <i class="menu-icon mdi mdi-logout text-white"></i>
              <span class="menu-title text-white">ออกจากระบบ</span>
            </a>
          </li>
          <!-- <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
              <i class="menu-icon mdi mdi-content-copy"></i>
              <span class="menu-title">Basic UI Elements</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item">
                  <a class="nav-link" href="pages/ui-features/buttons.html">Buttons</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="pages/ui-features/typography.html">Typography</a>
                </li>
              </ul>
            </div>
          </li> -->
          <!-- <li class="nav-item">
            <a class="nav-link" href="pages/forms/basic_elements.html">
              <i class="menu-icon mdi mdi-backup-restore"></i>
              <span class="menu-title">Form elements</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="pages/charts/chartjs.html">
              <i class="menu-icon mdi mdi-chart-line"></i>
              <span class="menu-title">Charts</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="pages/tables/basic-table.html">
              <i class="menu-icon mdi mdi-table"></i>
              <span class="menu-title">Tables</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="pages/icons/font-awesome.html">
              <i class="menu-icon mdi mdi-sticker"></i>
              <span class="menu-title">Icons</span>
            </a>
          </li> -->

        </ul>
      </nav>