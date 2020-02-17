<?php
 
session_start();
if (isset($_SESSION['checkSign']) == 'itoffside' AND isset($_SESSION['active'])==2) {
if (isset($_SESSION['frmAction']) == isset($_POST['frmAction'])) {
 
/*
* include file
*/
include 'config.php';
 
/*
* set var
*/
$username = mysqli_real_escape_string($conn, trim($_POST['username']));
$password = mysqli_real_escape_string($conn, trim(md5($_POST['password'])));
$firstname = mysqli_real_escape_string($conn, trim($_POST['firstname']));
$lastname = mysqli_real_escape_string($conn, trim($_POST['lastname']));
$sex = mysqli_real_escape_string($conn, trim($_POST['sex']));
$phone = mysqli_real_escape_string($conn, trim($_POST['phone']));
$email = mysqli_real_escape_string($conn, trim($_POST['email']));
$active = trim($_POST['active']);
$create_date = date('Y-m-d H:i:s');
$modified_date = date('Y-m-d H:i:s');
 
/*
* unset var
*/
unset($_SESSION['frmAction']);
 
/*
* logical programming&Database
*/
$meSQL = "INSERT INTO member ";
$meSQL .= "(username,password,firstname,lastname,sex,phone,email,active,create_date,modified_date) VALUES ";
$meSQL .= "('{$username}','{$password}','{$firstname}','{$lastname}','{$sex}','{$phone}','{$email}','{$active}',";
$meSQL .= "'{$create_date}','{$modified_date}') ";
$meQuery = mysqli_query($conn, $meSQL);
if ($meQuery == TRUE) {
echo "<meta charset=\"UTF-8\">";
echo "บันทึกข้อมูลสำเร็จ";
echo "<br/>";
echo "<a href='manager_user.php'>ไปหน้าจัดการข้อมูล</a>";
} else {
echo "<meta charset=\"UTF-8\">";
echo "มีปัญหาการบันทึกข้อมูล กรุณากลับไปบันทึกใหม่";
echo "<br/>";
echo "<a href='manager_user.php'>กลับไปหน้าเดิม</a>";
}
mysqli_close($conn);
} else {
echo "<meta charset=\"UTF-8\">";
echo "มีข้อผิดพลาดระหว่าง Session!";
echo "<br/>";
echo "<a href='manager_user.php'>กลับไปหน้าเดิม</a>";
}
} else {
echo "<meta charset=\"UTF-8\">";
echo "คุณไม่ได้เข้าสู่ระบบ กรุณาเข้าสู่ระบบก่อน!";
echo "<br/>";
echo "<a href='signin.php'>คลิกเพื่อเข้าสู่ระบบ</a>";
}
?>