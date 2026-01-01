<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
  <div class="app-brand demo">
    <a href="/eq/public/index.php" class="app-brand-link">
      <img src="/eq/public/images/logo.png" width="50" height="50" alt="" /> <span
        class="app-brand-text menu-text fw-bolder ms-2"><strong>DBT DATABASE</strong></span>
    </a>

    <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
      <i class="bx bx-chevron-left bx-sm align-middle"></i>
    </a>
  </div>

  <div class="menu-inner-shadow"></div>

  <ul class="menu-inner py-1">
    <!-- Dashboard -->
    <li class="menu-item">
      <a href="/eq/public/index.php" class="menu-link">
        <i class="menu-icon tf-icons bx bx-home-circle"></i>
        <div data-i18n="Analytics">Dashboard</div>
      </a>
    </li>

    <!-- Layouts -->
    <font>
      <li class="menu-header small text-uppercase"><span class="menu-header-text">เมนูหลัก</span></li>
      <!-- Cards -->
      <li class="menu-item">
        <a href="/eq/public/equipment/normal/eqnomal.php" class="menu-link">
          <i class="menu-icon tf-icons bx bx-collection"></i>
          <div data-i18n="eqnomal.php">ข้อมูลครุภัณฑ์ตามเกณฑ์</div>
        </a>
      </li>
      <!-- User interface -->
      <li class="menu-item">
        <a href="/eq/public/equipment/low/eqlow.php" class="menu-link">
          <i class="menu-icon tf-icons bx bx-collection"></i>
          <div data-i18n="eqlow.php">ข้อมูลครุภัณฑ์ต่ำกว่าเกณฑ์</div>
        </a>
      </li>

      <!-- Extended components -->


      <!-- Forms & Tables -->
      <li class="menu-header small text-uppercase"><span class="menu-header-text">จัดการ</span></li>
      <!-- Forms -->

      <!-- Tables -->
      <li class="menu-item">
        <a href="/eq/public/management/type/type.php" class="menu-link">
          <i class="menu-icon tf-icons bx bx-table"></i>
          <div data-i18n="Tables">จัดการประเภทพัสดุ</div>
        </a>
      </li>

      <li class="menu-item">
        <a href="/eq/public/management/money/money.php" class="menu-link">
          <i class="menu-icon tf-icons bx bx-table"></i>
          <div data-i18n="Tables">จัดการแหล่งเงิน</div>
        </a>
      </li>

      <li class="menu-item">
        <a href="/eq/public/management/transfer/transfer.php" class="menu-link">
          <i class="menu-icon tf-icons bx bx-table"></i>
          <div data-i18n="Tables">จัดการการรับโอน</div>
        </a>
      </li>

      <li class="menu-item">
        <a href="/eq/public/management/condition/condition.php" class="menu-link">
          <i class="menu-icon tf-icons bx bx-table"></i>
          <div data-i18n="Tables">จัดการสภาพครุภัณฑ์</div>
        </a>
      </li>

      <li class="menu-item">
        <a href="/eq/public/management/room/room.php" class="menu-link">
          <i class="menu-icon tf-icons bx bx-table"></i>
          <div data-i18n="Tables">จัดการห้องที่ใช้งาน</div>
        </a>
      </li>

      <li class="menu-item">
        <a href="/eq/public/management/responsible/responsible.php" class="menu-link">
          <i class="menu-icon tf-icons bx bx-table"></i>
          <div data-i18n="Tables">จัดการผู้รับผิดชอบ</div>
        </a>
      </li>
    </font>

  </ul>
</aside>