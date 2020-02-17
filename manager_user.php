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
    $meSQL = "SELECT * FROM member WHERE id != '{$_SESSION['id']}' ";
    $meQuery = mysqli_query($conn, $meSQL);
    $meCount = mysqli_num_rows($meQuery);
?>
    <html>

    <head>
        <meta charset="UTF-8">
        <title>จัดการผู้ใช้งาน</title>
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
        <hr />
        <h4>จัดการผู้ใช้งาน</h4>
        <a href="manager_user-add.php">
            <<<<---เพิ่มผู้ใช้งานใหม่--->>>>
        </a>
        <hr />
        <?php
        if ($meCount > 0) {
        ?>
            <h4>รายชื่อผู้ใช้งาน</h4>
            <table border="1" cellpadding="5">
                <thead>
                    <tr>
                        <th>รหัสผู้ใช้</th>
                        <th>ชื่อเข้าใช้</th>
                        <th>ชื่อ - นามสกุล</th>
                        <th>เพศ</th>
                        <th>เบอร์โทร</th>
                        <th>อีเมล์</th>
                        <th>วันที่สร้าง</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($meResult = mysqli_fetch_assoc($meQuery)) {
                        if ($meResult['sex'] == 1) {
                            $sex = 'ชาย';
                        } else {
                            $sex = 'หญิง';
                        }
                    ?>
                        <tr>
                            <td><?php echo $meResult['id']; ?></td>
                            <td><?php echo $meResult['username']; ?></td>
                            <td><?php echo $meResult['firstname']; ?> <?php echo $meResult['lastname']; ?></td>
                            <td><?php echo $sex ?></td>
                            <td><?php echo $meResult['phone']; ?></td>
                            <td><?php echo $meResult['email']; ?></td>
                            <td><?php echo $meResult['create_date']; ?></td>
                            <td><a href="manager_user-delete.php?id=<?php echo $meResult['id']; ?>">ลบผู้ใช้</a></td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        <?php
        } else {
            echo "<h3>ไม่มีข้อมูลผู้ใช้งาน</h3>";
        }
        ?>
    </body>

    </html>
<?php
    mysqli_close($conn);
} else {
    echo "<meta charset=\"UTF-8\">";
    echo "คุณไม่ได้เข้าสู่ระบบ กรุณาเข้าสู่ระบบก่อน!";
    echo "<br/>";
    echo "<a href='signin.php'>คลิกเพื่อเข้าสู่ระบบ</a>";
}
?>