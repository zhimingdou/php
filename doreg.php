<?php
     header("Content-type: text/html; charset=utf-8");

     //接收发送过来的请求和数据
    $username=$_POST['username'];
    $password=$_POST['password'];
    $repassword=$_POST['repassword'];
    $email=$_POST['email'];
    $verify=$_POST['verify'];
    $verify1=$_POST['verify1'];
    // echo $username,'-',$password,'-',$repassword,'-',$email,'-',$verify,'-',$verify1;

    if (strlen($username)>5) {
        if ($password ===$repassword) {                 //验证密码是否填写一致
            if (strpos($email,'@')) {                   //验证邮箱，strpos函数判断该字符串内是否有该字符
                if ($verify===strip_tags($verify1)) {   //验证验证码是否正确，由于发过来的验证码带有样式，所以用strip_tags去掉样式再比对
                    echo '恭喜你，注册成功';
                }else{
                    echo '验证码错误';
                }
            }else{
                echo '邮箱不合法';
            }
        }else {
            echo '两次密码不一致';
        }
    }else {
        echo '用户名不能少于6个字符';
    }
    
?>