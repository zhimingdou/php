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
    
    <script src="./lib/vue.js"></script>
    <script src="./lib/router.js"></script>

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
            background:url(./img/1.jpg);
            background-size:cover; 
            

        }
        .form_contian{
            margin: 0 auto;
            width: 800px;
            height: 1000px;
            opacity: .5;
            position: relative;
        }
        .app{
            width: 300px;
            height: 400px;
            position: relative;
            margin: auto;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            margin-top: 20%;
           
        }
        .nav{
            width: 300px;
            height: 40px;
            text-align: center;
            line-height:40px;
        
        }
        .from{
            width: 300px;
            height: 350px;
            margin: 0;
            padding: 0;
            background-color: rgb(255, 255, 255);
            border: 1px solid #dbe0de; 
            position: absolute;
            border-radius: 6%;
        }
        .nav a{
            padding: 0;
            margin: 0;
            text-decoration: none;
            display: inline-block;
            width: 130px;
            height: 40px;
            border-radius: 6% 6% 0 0;
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
        /* .router-link-active{
            font-size: 20px;
              text-align: center; */
            /* background-color: aliceblue;
          
        } */
        

    </style>
</head>
<body>
    <div class="form_contian">
            <div class="app">
                <div class="nav">
                    <router-link to="/login">登录</router-link>
                    <router-link to="/register">注册</router-link>
                    <router-view><router-view>
                </div> 
            </div>
        
    </div>
    

</body>
</html>
<script>
    var register = {
        template:`<form action="./doreg.php" method="post" class="from">
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
                        <input type="hidden" name='verify1' value='<?php echo $code; ?>' >
                        <div>
                            <input type="submit" value="注册">
                        </div>
                    </div>         
                </form>`
    };
    var login = {
        template:`<form class="from">
                    <div class="form_reg">
                        <h3>login</h3>
                        <div>
                            <input type="text" name="username" placeholder="请输入用户名" required="required">
                        </div>
                        <div>
                            <input type="password" name="password"  required="required" title="" placeholder="请输入密码">
                        </div>
                        <div>
                            <input type="text" name="verify" placeholder="请输入验证码"required="required">
                        </div>
                        <div><span><?php echo $code; ?></span></div>
                        <div>
                            <input type="submit" value="登录">
                            <input type="submit" value="忘记密码">
                        </div>
                    </div>           
                </form>`
    };

  
    var routerobj = new VueRouter({
        routes:[ 
            { path: '/',redirect:'/login'},
            {path:'/login',component:login},
            {path:'/register',component:register}
        ]
    })
    
    new Vue({
        el:'.app',
        router:routerobj
    })
</script>