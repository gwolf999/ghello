<?php
if(!empty($_POST['name']))
{
    $name=trim($_POST['name']);
    $pass=$_POST['pass'];
    if($name=='wanjia'and $pass=='123456'){
        echo '姓名:'.$name.'  口令:'.$_POST['pass'].'  年龄:'.$_POST['age'];
    }elseif($name=='wanjia'){
        echo '用户名正确，但密码不对';
    }
    elseif($name=='嘉美'){
        echo 'welcome '.$name.'!';
    }elseif($name=='花名册'){
    //echo 'welcome '.$name.'!';
//下面屏蔽了的这个运行错误，估计是，嵌套格式书写错误？没时间细细研究了。或者是g0602c.php解析程序要修改。
/*$jsonmenu=<<<gwolf
        {
        [ {"name":"张珊","password":"123456","age":"25"},
          {"name":"巫昂","password":"123456","age":"25"},
          {"name":"哈达","password":"123456","age":"25"}
          ]
        }
gwolf;*/
$jsonmenu=<<<gwolf

        [ {"name":"张珊","password":"123456","age":"25"},
          {"name":"巫昂","password":"123456","age":"25"},
          {"name":"哈达","password":"123456","age":"25"}
          ]

gwolf;
        echo $jsonmenu;
    }
}else{
    echo "这是用来调测AJAX的信息";
}

die();
?>