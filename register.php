<?php
//验证码
$string='1234567890qwertyuiopasdfghjklzxcvbnmQWERTYUIOPASDFGHJKLZXCVBNM';//创建一个字符串，包含所有数字和大小写
//从字符串中随机取出一个，并且给该值取一个随机颜色，一共取四个（一般是四个，可以随便改）
$code='<span style="color:rgb('.mt_rand(0,255).','.mt_rand(0,255).','.mt_rand(0,255).') ">'.$string{mt_rand(0,strlen($string)-1)}.'</span>';
$code.='<span style="color:rgb('.mt_rand(0,255).','.mt_rand(0,255).','.mt_rand(0,255).') ">'.$string{mt_rand(0,strlen($string)-1)}.'</span>';
$code.='<span style="color:rgb('.mt_rand(0,255).','.mt_rand(0,255).','.mt_rand(0,255).') ">'.$string{mt_rand(0,strlen($string)-1)}.'</span>';
$code.='<span style="color:rgb('.mt_rand(0,255).','.mt_rand(0,255).','.mt_rand(0,255).') ">'.$string{mt_rand(0,strlen($string)-1)}.'</span>';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <title></title>
    <meta charset="utf-8" />
    <title>用户注册</title>

    <style>
        
        body, h1, h2, h3, h4, h5, h6, hr, p, blockquote, dl, dt, dd, ul, ol, li, pre, form, fieldset, legend, button, input, textarea, th, td { margin:0; padding:0; }
        body, button, input, select, textarea { font:12px/1.5tahoma, arial, \5b8b\4f53; }
        h1, h2, h3, h4, h5, h6{ font-size:100%; }
        address, cite, dfn, em, var { font-style:normal; }
        code, kbd, pre, samp { font-family:couriernew, courier, monospace; }
        small{ font-size:12px; }
        ul, ol { list-style:none; }
        a { text-decoration:none; }
        a:hover { text-decoration:underline; }
        sup { vertical-align:text-top; }
        sub{ vertical-align:text-bottom; }
        legend { color:#000; }
        fieldset, img { border:0; }
        button, input, select, textarea { font-size:100%; }
        table { border-collapse:collapse; border-spacing:0; }


        body{
            margin: 0;
            padding: 0;
            background:url(img/1.jpg);
            background-size:cover; 

        }
        .form_contian{
            margin: 0 auto;
            width: 800px;
            height: 1000px;
            
            opacity: .5;
            position: relative;
        }
        .from{
            width: 300px;
            height: 350px;
            background-color: rgb(255, 255, 255);
            /* border: 1px solid #dbe0de; */
            top: 30%;
            left: 50%;
            position: absolute;
            margin-top: -75px;
            margin-left: -150px;
            z-index: 1;
            border-radius: 6%;

        }
        .form_reg{
            text-align: center;
            height: 150px;
            margin: 20px auto;
        }
        input{
            padding: 5px;
            margin: 5px;
            width:180px;
            border-radius: 5px;
        }

    </style>
</head>
<body>
    <div class="form_contian">
        <form class="from">
            <div class="form_reg">
                <h3>register</h3>
                <div>
                    <input type="text" name="username" placeholder="请输入用户名" required="required">
                </div>
                <div>
                    <input type="password" name="password"  required="required" title="" placeholder="请输入密码">
                </div>
                <div>
                <input type="password" name="repassword"  required="required" title="" placeholder="重复输入密码">
                
                </div>
                <div>
                    <input type="text" name="email" placeholder="请输入邮箱" required="required">
                </div>

                <div>
                     <input type="text" name="verify" placeholder="请输入验证码"required="required">
                </div>
                <div><span><?php echo $code; ?></span></div>
                <div>
                    <input type="submit" value="注册">
                </div>
            </div>
                
        </form>
    </div>

</body>
</html>


/*
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
}*/
















<p>
<?php echo $code; ?>
</p>