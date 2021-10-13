<?php
include("api.php");
if ($_SESSION['user'] == "guest")  echo '<script>alert("無訪問權限!");location="index.php";</script>'; 
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="plugin/bootstrap.min.css">
    <link rel="stylesheet" href="plugin/style2.css">
    <script src="plugin/jquery.min.js"></script>
    <script src="plugin/bootstrap.min.js"></script>
</head>

<body>
    <header class="row-fluid">
        <div class="span4">電競比賽</div>
        <div class="span8"></div>
    </header>

    <nav class="navbar navbar-inverse">
        <div class="navbar-inner">
            <div class="container">
                <ul class="nav">
                   

                    <li><a href="api.php?do=logout">後臺登出</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <section class="ad">
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Asperiores excepturi veritatis quae, maxime ducimus
            voluptatum quaerat fuga deleniti nemo illo alias. Quas asperiores repellat, alias quibusdam adipisci
            nesciunt accusamus temporibus.</p>
    </section>

    <div id="mag"></div>
    <section class="container">
        <h2>玩家留言板</h2>
        
        <?php
        if ($_SESSION['user']=="admin"){
            $sql = "SELECT * FROM `msg`";
        }else{
            $sql = "SELECT * FROM `msg` WHERE user='".$_SESSION['user']."' AND mail='".$_SESSION['mail']."'";
        }
        $rows = $db->query($sql)->fetchAll();
        foreach ($rows as $row){
            if($row['del']){
                ?>
        <div class="thumbnail row-fluid del">
            <div class="span2">#<?= $row['id']?></div>
            <div class="span10">本篇已被刪除</div>
        </div>
        <?php
            }else{
                ?>
        <div class="thumbnail row-fluid">
            <div class="span4">
                <img src="img/1598327956_1598171665_rr.jpg" class="img-circle" width="100" height="100">
                <h4>Name：<span class="name"><?= $row['user']?></span></h4>
                <h5>#<span class="sn"><?= $row['id']?></span></h5>
            </div>
            <div class="span8">
                <p>玩家留言：<br><span class="info"><?= $row['info']?></span></p>
                <div class="bottom">
                    <span class="badge badge-info">
                        TEL：
                        <span class="tel"><?= $row['tel']?></span>
                    </span>
                    <span class="badge badge-info">
                        MAIL：
                        <span class="mail"><?= $row['mail']?></span>
                    </span>
                    <span class="badge badge-info">
                        UPDATE：
                        <span><?= $row['date']?></span>
                    </span>

                    <a href="#msgmdy" class="btn btn-warning" data-toggle="modal" onclick="setval(this)">編輯</a>
                    <a href="api.php?do=msgdel&id=<?= $row['id']?>" class="btn btn-danger">刪除</a>
                </div>
            </div>
        </div>
        <?php
            }
        }
        ?>

        
        
    </section>

   
    <footer>
        
        
        <form id="msgmdy" class="modal hide fade form-horizontal" action="api.php?do=msgmdy" method="post">
            <div class="modal-header">
                <h3>修改留言</h3>
                <input type="hidden" name="id">
            </div>
            <div class="modal-body">
                <div class="control-group">
                    <label class="control-label">玩家名稱</label>
                    <input type="text" name="user" required>
                </div>
                <div class="control-group">
                    <label class="control-label">留言內容</label>
                    <textarea name="info" required></textarea>
                </div>
                <div class="control-group">
                    <label class="control-label">Email</label>
                    <input type="email" name="mail" required>
                </div>
                <div class="control-group">
                    <label class="control-label">連絡電話</label>
                    <input type="tel" name="tel" pattern="[0-9\-]{9,12}" required>
                </div>
            </div>
            <div class="modal-footer">
                <div class="btn" data-dismiss="modal">取消</div>
                <input class="btn-primary" type="submit" value="送出">
            </div>
        </form>
        <script>
           function setval(e){
               let bigroot = $(e).parents(".row-fluid");
               let name = bigroot.find(".name").text();
               let info = bigroot.find(".info").text();
               let mail = bigroot.find(".mail").text();
               let tel = bigroot.find(".tel").text();
               let id = bigroot.find(".sn").text();

               $("#msgmdy").find("input[name=user]").val(name);
               $("#msgmdy").find("textarea[name=info]").text(info);
               $("#msgmdy").find("input[name=mail]").val(mail);
               $("#msgmdy").find("input[name=tel]").val(tel);
               $("#msgmdy").find("input[name=id]").val(id);
           }
       </script>
        
    </footer>
</body>

</html>