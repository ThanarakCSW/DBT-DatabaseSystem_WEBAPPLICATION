<nav class="layout-navbar container-fluid navbar navbar-expand-fluid navbar-detached align-items-center bg-navbar-theme" id="layout-navbar">
    <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
        <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
            <i class="bx bx-menu bx-sm"></i>
        </a>
    </div>

    <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
        <font><strong>DBT Database System - ระบบฐานข้อมูลครุภัณฑ์</strong></font>

        <ul class="navbar-nav flex-row align-items-center ms-auto">
            <!-- Place this tag where you want the button to render. -->

<!-- size font -->
<li class="nav-item navbar-dropdown dropdown">
    <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
        <div class="avatar avatar">
            <img src="images/aA.png" alt class="w-px-40 h-px-40" />
        </div>
    </a>
    <ul class="dropdown-menu dropdown-menu-end">
        <li>
            <a class="dropdown-item" href="javascript:void(0);" onclick="changeFontSize('decrease'); event.stopPropagation();">ลดขนาดตัวอักษร (-)</a>
        </li>
        <li>
            <a class="dropdown-item" href="javascript:void(0);" onclick="changeFontSize('increase'); event.stopPropagation();">เพิ่มขนาดตัวอักษร (+)</a>
        </li>
		<li>
            <a class="dropdown-item" href="javascript:void(0);" onclick="changeFontSize('reset'); event.stopPropagation();">ขนาดเริ่มต้น</a>
        </li>
        <li>
            <div class="dropdown-divider"></div>
        </li>
    </ul>
</li>
<!-- /size font -->
 &nbsp;  &nbsp; 

			
			<li class="nav-item navbar-dropdown dropdown-user dropdown">
                <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                    <div class="avatar avatar-online">
                        <img src="images/logo.png" alt class="w-px-40 h-auto rounded-circle" />
                    </div>
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li>
                        <a class="dropdown-item" href="#">
                            <div class="d-flex">
                                <div class="flex-shrink-0 me-3">
                                    <div class="avatar avatar-online">
                                        <img src="images/logo.png" alt class="w-px-40 h-auto rounded-circle" />
                                    </div>
                                </div>
                                <div class="flex-grow-1">
                                    <?php 
                                    $name = $_SESSION['name'];
                                    $username = $_SESSION['username'];
                                    ?>
                                    <span class="fw-semibold d-block"><?php echo $name; ?></span>
                                    <small class="text-muted"><?php echo $username; ?></small>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <div class="dropdown-divider"></div>
                    </li>
                    <li>
                        <a class="dropdown-item" href="logout.php">
                            <i class="bx bx-power-off me-2"></i>
                            <span class="align-middle">Log Out</span>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</nav>

<!-- ปุ่มสำหรับขยายหรือย่อขนาดตัวอักษร -->

<!-- CSS สำหรับการปรับขนาดตัวอักษร -->



<style>
        /* ปรับขนาดฟอนต์ให้กับทุกอย่าง */
       

        /* กำหนดขนาดฟอนต์ให้กับ input, label, และ button */
        input, label, button, select, textarea {
            font-size: inherit !important; /* ใช้ขนาดฟอนต์ที่กำหนดไว้ใน body */
        }
    </style>

<!-- JavaScript สำหรับการปรับขนาดตัวอักษร -->
   <script>
    // เช็คขนาดตัวอักษรจาก LocalStorage และตั้งค่า
    let currentFontSize = localStorage.getItem('fontSize') 
        ? parseInt(localStorage.getItem('fontSize')) 
        : 16;

    // ตั้งค่าขนาดตัวอักษรให้กับ body
    document.body.style.fontSize = currentFontSize + 'px';

    // ฟังก์ชันสำหรับการปรับขนาดตัวอักษร
    function changeFontSize(action) {
        if (action === 'increase') {
            currentFontSize += 2; // เพิ่มขนาดตัวอักษร
        } else if (action === 'decrease') {
            currentFontSize = Math.max(10, currentFontSize - 2); // ลดขนาดตัวอักษร แต่ไม่ให้ต่ำกว่า 10px
        } else if (action === 'reset') {
            currentFontSize = 16; // รีเซ็ตขนาดตัวอักษรเป็นค่าดั้งเดิม
        }
        
        // อัพเดตขนาดตัวอักษรใน body
        document.body.style.fontSize = currentFontSize + 'px';
        
        // เก็บค่าขนาดตัวอักษรใน LocalStorage
        localStorage.setItem('fontSize', currentFontSize);
    }
</script>



