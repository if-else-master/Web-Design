<?php
session_start();
$db = new PDO("mysql:host=127.0.0.1;dbname=db04;charest=utf8", "admin", "1234", null);


if(empty($_SESSION['user'])) $_SESSION['user'] = "guest";


if (!empty($_GET['do'])) switch ($_GET['do']) {
    case 'login':
        if ($_POST['ans'] != $_SESSION['rand'])
        echo '<script>alert("驗證碼錯誤!");location.href="index.php";</script>';
        elseif ($_POST['user'] == "admin" && $_POST['pwd'] == "1234") {
            $_SESSION['user'] = "admin";
            echo '<script>alert("歡迎管理者!");location.href="admin.php";</script>';
        }else{
            $sql = "SELECT * FROM `msg` WHERE user='".$_POST['user']."' AND mail='".$_POST['pwd']."'";
            $rows = $db->query($sql)->fetchAll();


            if ($rows) {
                $_SESSION['user'] = $_POST['user'];
                $_SESSION['mail'] = $_POST['pwd'];
                echo '<script>alert("歡迎'.$_POST['user'].'!");location.href="admin.php";</script>';
            }

            else echo '<script>alert("查無此號!");location.href="index.php";</script>';
        }
        break;
        case 'logout':
            unset ($_SESSION['user']);
            echo '<script>alert("登出成功!");location.href="index.php";</script>';
            break;
}
?>