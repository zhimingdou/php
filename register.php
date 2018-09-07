// register.php
<?php

header("Access-Control-Allow-Origin: *");

session_start();

if(isset($_POST["submit"]) && $_POST["submit"] == "马上注册") {
    $tel = $_POST["tel"];
    $password = $_POST["password"];
    $password_conf = $_POST["confirm"];
    $hometown = $_POST["hometown"];
    $tasty = $_POST["tasty"];
    $type_of_cooking = $_POST["type_of_cooking"];

    if($tel == "" || $password == "" || $password == "" || $password_conf == "" || $hometown == "" || $tasty == "" || $type_of_cooking == "") {  //用户信息不完整

        $json_arr = array('success' => 0);
    }
    else {
        if($password == $password_conf) {
            include "connect_mysql.php";
            //require_once('connect_mysql.php');

            $sql = "select tel from user where tel = '$_POST[tel]'"; //SQL语句
            $result = mysqli_query($link, $sql);    //执行SQL语句
            $num = mysqli_num_rows($result); //统计执行结果影响的行数
            if($num) {   //如果已经存在该用户

                $json_arr = array('success' => -1);
            }
            else {   //不存在当前注册用户名称

                $sql_insert = "insert into user (user_tel, password, hometown, tasty, type_of_cooking)
                      values('$_POST[tel]', '$_POST[password]', '$_POST[hometown]','$_POST[tasty]', '$_POST[type_of_cooking]')";
                $res_insert = mysqli_query($link, $sql_insert);
                //$num_insert = mysql_num_rows($res_insert);
                if($res_insert) {   //注册成功
                    $json_arr = array('success' => 1);
                }
                else { //系统忙碌,请稍后重试
                    $json_arr = array('success' => -3);
                }
            }
        }
        else {  //密码不一致
            $json_arr = array('success' => -2);
        }
    }
    $register_json = json_encode($json_arr, TRUE);
    echo $register_json;
}
?>