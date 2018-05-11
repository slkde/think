<?php
header("Content-type:text/html;charset=utf8");
session_start();
//$_SESSION['pass'] =  0 ;
$url = "http://".$_SERVER['HTTP_HOST']."/log.php";

$level = 1 ;
if(@$_GET['level']){
$level = $_GET['level'] ;
}

if($_POST && $_POST['pass']){
    if($_POST['pass'] == 'yxecg'){
        $_SESSION['pass'] = "1";
        header("Location: $url");
    }else{
        echo "<p style='color:red'>密码错误</p>";
    }

}


//读取当前目录的所有文件文件夹
function  fileArray($dir){

    $handler = opendir($dir);
    while (($filename = readdir($handler)) !== false)
    {//务必使用!==，防止目录下出现类似文件名“0”等情况
        if ($filename != "." && $filename != "..")
        {
            $files[] = $filename ;
        }
    }
    closedir($handler);


    return $files;
}
?>

<html>
<head>
<meta charset="utf-8">
</head>

    <body>

    <?php  if(@$_SESSION['pass'] != 1){?>

        <form action="log.php" method="post">
            密码：<input name="pass" >
            <input type="submit" value="登陆">
        </form>

    <?php }else{

        if($level == 1)
        {
            $dir="./Log";
            $files = fileArray($dir);
            //打印所有文件名
            foreach ($files as $value) {
            echo "<a href ='log.php?level=2&filename=".$value."' target='_blank'> $value</a>"."<br/>";
            }

        }

        if($level == 2){
            $dir="./Log/".$_GET['filename'];
            $files = fileArray($dir);
            //打印所有文件名
            foreach ($files as $value) {
                echo "<a href ='log.php?level=3&filename=".$_GET['filename']."&logname=".$value."' target='_blank'> $value</a>"."<br/>";
            }
        }

        if($level == 3){

            $dir="./Log/".$_GET['filename']."/".$_GET['logname'];
            
            if ($_GET['filename'] == 'user') {
                $dir="./Log/".$_GET['filename']."/".$_GET['logname'];
                $files = fileArray($dir);
                //打印所有文件名
                foreach ($files as $value) {
                    echo "<a href ='log.php?level=4&filename=".$_GET['filename']."&logname=".$_GET['logname']."&logtxt=".$value."' target='_blank'> $value</a>"."<br/>";
                }
                die;
            }
            $content = file_get_contents($dir);
            $content = str_replace("\r\n","<br/>",$content);
            echo $content;

        }

        if($level == 4){
            $dir="./Log/".$_GET['filename']."/".$_GET['logname']."/".$_GET['logtxt'];
            $content = file_get_contents($dir);
            $content = str_replace("\r\n","<br/>",$content);
            echo $content;

        }

    } ?>

    </body>

</html>