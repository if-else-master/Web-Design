<?php
session_start();
$db = new PDO("mysql:host=127.0.0.1;dbname=db04;charset=utf8", "admin", "1234", null);


if (empty($_SESSION['user'])) $_SESSION['user'] = "guest";


if (!empty($_GET['do'])) switch ($_GET['do']) {
  case 'login':
    if ($_POST['ans'] != $_SESSION['rand'])
    echo '<script>alert("驗證碼錯誤!");location="index.php";</script>';
    elseif ($_POST['user'] == "admin" && $_POST['pwd'] == "1234"){
      $_SESSION['user'] = "admin";
      echo '<script>alert("歡迎管理者!");location="admin.php";</script>';
    }else{
      $sql = "SELECT * FROM `msg` WHERE user='".$_POST['user']."' AND mail='".$_POST['pwd']."'";
      $rows = $db->query($sql)->fetchAll();


      if ($rows){
        $_SESSION['user'] = $_POST['user'];
        $_SESSION['mail'] = $_POST['pwd'];
        echo '<script>alert("歡迎'.$_POST['user'].'!");location="admin.php";</script>';
      }

      else echo '<script>alert("查無此號!");location="index.php";</script>';
    }
    break;
    case 'logout':
      unset($_SESSION['user']);
      echo '<script>alert("登出成功!");location="index.php";</script>';
      break;
    case 'msgadd':
      $sql = "INSERT INTO `msg`(`id`, `user`, `info`, `mail`, `tel`, `date`, `del`) VALUES (null,'".$_POST['user']."','".$_POST['info']."','".$_POST['mail']."','".$_POST['tel']."',NOW(),0)";
      $db->query($sql)->fetchAll();
      echo '<script>alert("留言成功!");location="index.php";</script>';
      break;
    case 'msgmdy':
      $sql = "UPDATE `msg` SET `user`='".$_POST['user']."',`info`='".$_POST['info']."',`mail`='".$_POST['mail']."',`tel`='".$_POST['tel']."',`date`=NOW(),`del`=0 WHERE id=".$_POST['id']."";
      $db->query($sql)->fetchAll();
      echo '<script>alert("修改成功!");location="admin.php";</script>';
      break;
    case 'msgdel':
      $sql = "UPDATE `msg` SET `del`=1 WHERE id=".$_GET['id']."";
      $db->query($sql)->fetchAll();
      echo '<script>alert("刪除成功!");location="admin.php";</script>';
      break;
    case 'pkadd':
      $newname = time() ."_". $_FILES['img']['name'];
      copy($_FILES['img']['tmp_name'], "img/" . $newname);
      $sql = "INSERT INTO `pk`(`id`, `user`, `info`, `mail`, `tel`, `date`, `del`) VALUES (null,'".$_POST['user']."','".$newname."','".$_POST['mail']."','".$_POST['tel']."',NOW(),0)";
      $db->query($sql)->fetchAll();
      echo '<script>alert("參賽成功!");location="index.php#pklist";</script>';
      break;
}
?>