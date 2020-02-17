<?php
session_start();
if (isset($_SESSION['checkSign']) == 'itoffside' and isset($_SESSION['active']) == 2) {
    /*
* include file
*/
    include 'config.php';

    /*
* set var
*/
    $_SESSION['frmAction'] = md5('itoffside.com' . rand(1, 9999));

    /*
* logical programming&Database
*/
?>
    <html>

    <head>
        <meta charset="UTF-8">
        <title>เพิ่มผู้ใช้งานใหม่</title>
    </head>

    <body>
        <h3>เพิ่มผู้ใช้งาน</h3>
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
        <hr />
        <h4>ข้อมูลส่วนตัว</h4>
        <form name="manager_user-add-action" action="manager_user-add-action.php" method="POST">
            <table border="1" cellpadding="5">
                <tr>
                    <td style="text-align: right;width: 200px; font-weight: bold">ชื่อผู้ใช้งาน</td>
                    <td><input type="text" name="username" value="" size="40" /></td>
                </tr>
                <tr>
                    <td style="text-align: right;width: 200px; font-weight: bold">รหัสผ่าน</td>
                    <td><input type="password" name="password" value="" size="40" ? /></td>
                </tr>
                <tr>
                    <td style="text-align: right;width: 200px; font-weight: bold">ชื่อจริง</td>
                    <td><input type="text" name="firstname" value="" size="40" /></td>
                </tr>
                <tr>
                    <td style="text-align: right;width: 200px; font-weight: bold">นามสกุลจริง</td>
                    <td><input type="text" name="lastname" value="" size="40" /></td>
                </tr>
                <tr>
                    <td style="text-align: right;width: 200px; font-weight: bold">เพศ</td>
                    <td>
                        <input type="radio" name="sex" value="1" />ชาย |
                        <input type="radio" name="sex" value="2" />หญิง
                    </td>
                </tr>
                <tr>
                    <td style="text-align: right;width: 200px; font-weight: bold">เบอร์โทรศัพท์</td>
                    <td><input type="text" name="phone" value="" size="40" /></td>
                </tr>
                <tr>
                    <td style="text-align: right;width: 200px; font-weight: bold">อีเมล์</td>
                    <td><input type="text" name="email" value="" size="40" /></td>
                </tr>
                <tr>
                    <td style="text-align: right;width: 200px; font-weight: bold">ระดับผู้ใช้งาน</td>
                    <td>
                        <input type="radio" name="active" value="1" />ผู้ใช้ทั่วไป |
                        <input type="radio" name="active" value="2" />ผู้ดูแลระบบ
                    </td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td><input type="submit" name="submit" value="บันทึกข้อมูล" /></td>
                </tr>
            </table>
            <input type="hidden" name="frmAction" value="<?php echo $_SESSION['frmAction']; ?>" />
        </form>
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