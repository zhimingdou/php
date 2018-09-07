//alter_password.php
<?php

header("Content-type:text/html;charset=utf-8");
header("Access-Control-Allow-Origin: *");

session_start();

if (isset($_POST["submit"]) && $_POST["submit"] == "修改密码") {
    //include "connect_mysql.php";
    require_once('connect_mysql.php');

    $tel = $_POST['tel'];
    $old_password = $_POST['old_password'];

    $sql = "SELECT password, user_tel FROM user WHERE password = '$old_password' AND user_tel = '$tel';";
    $result = mysqli_query($link, $sql);
    $row = mysqli_num_rows($result);

    if ($row == 1) {
        $new_password = $_POST['new_password'];
        $new_password_conf = $_POST['new_password_conf'];

        if ($new_password == $new_password_conf) {
            $sql = "UPDATE user SET password = '$new_password' WHERE user_tel = '$tel';";
            $result = mysqli_query($link, $sql);

            if ($result) {  //密码修改成功
                $arr = array('success' => 1);
            }
        }
    }
    else {  //  密码修改失败
        $arr['success'] = 0;
    }
    $json_arr = json_encode($arr, TRUE);
    echo $json_arr;
}