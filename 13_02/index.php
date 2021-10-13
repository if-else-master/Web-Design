<?php
include("api.php");
$_SESSION['rand'] = rand(1000,9999)
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
                    <li><a href="#">回首頁</a></li>
                    <li><a href="#msg">玩家留言板</a></li>
                    <li><a href="#pklist">最新消息與賽制公告</a></li>
                    <li><a href="#pkadd" data-toggle="modal">玩家參賽</a></li>
                    <li><a href="#login" data-toggle="modal">後臺登入</a></li>

                    <!-- <li><a href="api.php?do=logout">後臺登出</a></li> -->
                </ul>
            </div>
        </div>
    </nav>

    <section class="ad">
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Asperiores excepturi veritatis quae, maxime ducimus
            voluptatum quaerat fuga deleniti nemo illo alias. Quas asperiores repellat, alias quibusdam adipisci
            nesciunt accusamus temporibus.</p>
    </section>

    <div id="msg"></div>
    <section class="container">
        <h2>玩家留言板</h2>
        <a href="#msgadd" class="btn btn-info" data-toggle="modal" style="float: right;">新增留言</a>
        <div style="clear: both;"></div>

        <?php
        
            $sql = "SELECT * FROM `msg`";
        
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

                    
                </div>
            </div>
        </div>
        <?php
            }
        }
        ?>
    </section>

    <div id="pklist"></div>
    <section class="container">
        <h2>最新消息與賽制公告</h2>
        <table class="table">
            <thead>
                <tr>
                    <th width="40%">玩家</th>
                    <th width="20%">匹配</th>
                    <th width="40%">玩家</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * FROM `pk`";

                $rows = $db->query($sql)->fetchAll();
                $num = ceil(count($rows) / 2);
                for ($i=1; $i <= $num ; $i++) { 
                    $row = array_shift($rows);
                    echo '<tr>
                    <td>
                        <div class="jpg" style="background: url(img/'.$row['info'].');">'.$row['user'].'</div>
                    </td>
                    <td>VS</td>';
                    $row = array_shift($rows);

                    if ($row) echo'
                    <td>
                        <div class="jpg" style="background: url(img/'.$row['info'].');">'.$row['user'].'</div>
                    </td>
                </tr>';
               else echo'
                    <td>
                        <div class="jpg" style="background: url(img/wait.jpg);">等待匹配中...</div>
                    </td>
                </tr>';
                }
                ?>
                
            </tbody>
        </table>
    </section>
    <footer>
        <form id="login" class="modal hide fade form-horizontal" action="api.php?do=login" method="post">
            <div class="modal-header">
                <h3>後臺登入</h3>
            </div>
            <div class="modal-body">
                <div class="control-group">
                    <label class="control-label">帳號<br>(玩家名稱)</label>
                    <input type="text" name="user" required>
                </div>
                <div class="control-group">
                    <label class="control-label">密碼<br>(玩家請輸入Mail)</label>
                    <input type="password" name="pwd" required>
                </div>
                <div class="control-group">
                    <label class="control-label">驗證碼<br><svg xmlns="http://www.w3.org/2000/svg"
                            xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="圖層_1" x="0px" y="0px"
                            width="100.25px" height="50.75px" viewBox="0 0 180.25 78.75"
                            enable-background="new 0 0 180.25 78.75" xml:space="preserve">
                            <line fill="none" x1="9.866" y1="84.25" x2="217.598" y2="-11.074" />
                            <radialGradient id="SVGID_1_" cx="90.125" cy="39.375" r="69.5446"
                                gradientUnits="userSpaceOnUse">
                                <stop offset="0.4115" style="stop-color:#000000;stop-opacity:0.6512" />
                                <stop offset="0.5744" style="stop-color:#000000;stop-opacity:0" />
                                <stop offset="0.8519" style="stop-color:#000000;stop-opacity:0.4159" />
                            </radialGradient>
                            <rect x="0" fill="url(#SVGID_1_)" stroke="#C9CACA" stroke-miterlimit="10" width="180.25"
                                height="78.75" />
                            <text transform="matrix(1 0 0 1 61.333 50.6738)" fill="#B5B5B6" stroke="#898989"
                                stroke-miterlimit="10" font-family="'Arial-ItalicMT'" font-size="24"><?= $_SESSION['rand'] ?></text>
                        </svg></label>

                    <input type="text" name="ans" required>
                </div>
            </div>
            <div class="modal-footer">
                <div class="btn" data-dismiss="modal">取消</div>
                <input class=" btn btn-primary" type="submit" value="送出">
            </div>
        </form>
        <form id="msgadd" class="modal hide fade form-horizontal" action="api.php?do=msgadd" method="post">
            <div class="modal-header">
                <h3>新增留言</h3>
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
            function setval(e) {
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
        <form id="pkadd" class="modal hide fade form-horizontal" action="api.php?do=pkadd" method="post"
            enctype="multipart/form-data">
            <div class="modal-header">
                <h3>玩家參賽</h3>
            </div>
            <div class="modal-body">
                <div class="control-group">
                    <label class="control-label">玩家姓名</label>
                    <input type="text" name="user" required>
                </div>
                <div class="control-group">
                    <label class="control-label">玩家頭像</label>
                    <input type="file" name="img" required>
                </div>
                <div class="control-group">
                    <label class="control-label">Email</label>
                    <input type="email" name="mail" required>
                </div>
                <div class="control-group">
                    <label class="control-label">連絡電話</label>
                    <input type="tel" name="tel" pattern="[0-9\-]{9.12}" required>
                </div>
            </div>
            <div class="modal-footer">
                <div class="btn" data-dismiss="modal">取消</div>
                <input class="btn btn-primary" type="submit" value="送出">
            </div>
        </form>
    </footer>
</body>

</html>