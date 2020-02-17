<?php
 
session_start();
if (isset($_SESSION['checkSign']) == 'itoffside' AND isset($_SESSION['active'])==2) {
 
/*
* include file
*/
include 'config.php';
 
/*
* set var
*/
$id = mysqli_real_escape_string($conn, trim($_GET['id']));
 
/*
* unset var
*/
 
/*
* logical programming&Database
*/
$meSQL = "DELETE FROM member ";
$meSQL .= "WHERE id='{$id}' ";
$meQuery = mysqli_query($conn, $meSQL);
if ($meQuery == TRUE) {
echo "<meta charset=\"UTF-8\">";
echo "ลบข้อมูลสำเร็จ";
echo "<br/>";
echo "<a href='manager_user.php'>ไปหน้าจัดการข้อมูล</a>";
} else {
echo "<meta charset=\"UTF-8\">";
echo "มีปัญหาการลบข้อมูล กรุณากลับไปบันทึกใหม่";
echo "<br/>";
echo "<a href='manager_user.php'>กลับไปหน้าเดิม</a>";
}
mysqli_close($conn);
} else {
echo "<meta charset=\"UTF-8\">";
echo "คุณไม่ได้เข้าสู่ระบบ กรุณาเข้าสู่ระบบก่อน!";
echo "<br/>";
echo "<a href='signin.php'>คลิกเพื่อเข้าสู่ระบบ</a>";
}
?>