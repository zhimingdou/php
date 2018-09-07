//login.php
<?php
header("Content-type:text/html;charset=utf-8");
header("Access-Control-Allow-Origin: *");   //跨域

session_start();

if(isset($_POST["button"]) && $_POST["button"] == "登录") {
    $tel = $_POST["tel"];   //用户电话号码
    $password = $_POST["password"]; //用户密码

    //include ("connect_mysql.php");
    require_once('connect_mysql.php');

    //判断用户是否存在
    $sql = "SELECT * FROM user WHERE user_tel = '$_POST[tel]';";

    $result = mysqli_query($link, $sql);    //执行sql语句,返回查询后的结果集
    $rows = mysqli_num_rows($result); //返回结果集中行的数量

    if ($rows == 0) {     //用户不存在
        $json_arr = array('success' => -1);
    }
    else {
        $sql = "SELECT password FROM user WHERE password = '$_POST[password]' AND user_tel = '$_POST[tel]'";
        $result = mysqli_query($link, $sql);
        $rows = mysqli_num_rows($result);

        if ($rows == 1) { //密码正确
            $json_arr = array('success' => 1);

            $_SESSION["is_login"] = "true";
            $_SESSION["tel"] = $tel;
            $_SESSION["password"] = $password;
        }
        else {  //密码错误
            $json_arr = array('success' => -2);
        }
    }
    $login_json = json_encode($json_arr, TRUE); //转化为json数据
    echo $login_json;//发送json数据
}