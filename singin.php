<?php
session_start();
$_SESSION['frmAction'] = md5('itoffside.com' . rand(1, 999999));
?>
<html>

<head>
    <meta charset="UTF-8">
    <title>เข้าสู่ระบบสมาชิก</title>
</head>

<body>
    <form name="signin" action="signin-action.php" method="POST">
        <table border="0">
            <thead>
                <tr>
                    <th></th>
                    <th>เข้าสู่ระบบ</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td style="text-align: right; width: 200px;">Username :</td>
                    <td><input type="text" name="username" value="" size="25" /></td>
                </tr>
                <tr>
                    <td style="text-align: right;">Password :</td>
                    <td><input type="password" name="password" value="" size="20" /></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" value="ตกลง" name="submit" /></td>
                </tr>
            </tbody>
        </table>
        <input type="hidden" name="frmAction" value="<?php echo $_SESSION['frmAction']; ?>" />
    </form>
</body>

</html>