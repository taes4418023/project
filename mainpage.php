<?php
session_start();
if (isset($_SESSION['checkSign']) == 'itoffside') {
?>
    <html>

    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>

    <body>
        <h3>หน้าแรกระบบจัดการสมาชิก</h3>
        <ul>
            <li><a href="mainpage.php">หน้าแรก</a></li>
            <?php
            if ($_SESSION['active'] == 2) {
            ?>
                <li><a href="manager_user.php">จัดการผู้ใช้งาน</a></li>
            <?php } ?>
            <li><a href="update_profile.php">แก้ไขข้อมูลส่วนตัว</a></li>
            <li><a href="signout.php">ออกจากระบบ</a></li>
        </ul>
    </body>

    </html>
<?php
} else {
    echo "<meta charset=\"UTF-8\">";
    echo "คุณไม่ได้เข้าสู่ระบบ กรุณาเข้าสู่ระบบก่อน!";
    echo "<br/>";
    echo "<a href='signin.php'>คลิกเพื่อเข้าสู่ระบบ</a>";
}
?>