<?php
if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    // POSTでのアクセスでない場合
    $name = '';
    $email = '';
    $subject = '';
    $message = '';
    $err_msg = '';
    $complete_msg = '';
} else {
    // フォームがサブミットされた場合（POST処理）
    // 入力された値を取得する
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];
    // エラーメッセージ・完了メッセージの用意
    $err_msg = '';
    $complete_msg = '';
    // 空チェック
    if ($name == '' || $email == '' || $subject == '' || $message == '') {
        $err_msg = '全ての項目を入力してください。';
    }
    // エラーなし（全ての項目が入力されている）
    if ($err_msg == '') {
        $to = 'taiyaki.fever0822@gmail.com'; // 管理者のメールアドレスなど送信先を指定
        $headers = "From: " . $email . "\r\n";
        // 本文の最後に名前を追加
        $message .= "\r\n\r\n" . $name;
        // メール送信
        mb_send_mail($to, $subject, $message, $headers);
        // 完了メッセージ
        $complete_msg = 'お問い合わせありがとうございます！';
        // 全てクリア
        $name = '';
        $email = '';
        $subject = '';
        $message = '';
    }
}
?>
<!DOCTYPE html>
<html lang="jp">
<head>
    <meta charset="utf-8">
    <title>お問い合わせフォーム</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="style.css">
<!-- Bootstrap読み込み（スタイリングのため） -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <style>
        li{         
            list-style: none;
        }

        
        body {
            background: #f3f3f3;
        }
        .container {
            font-family: "Noto Sans JP";
            margin-top: 60px;
        }
        h1 {
            margin-bottom: 50px;
            text-align: center;
        }
        button {
            margin-top: 30px;
        }
    </style>
</head>
<body>
<div class="jumbotron">
<div class='fixed-top'>
    <nav class="navbar navbar-expand-lg navbar-light bg-light ">
  <a class="navbar-brand" href="index.php">Arabia Social</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="true" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item divider">
        <a class="nav-link" href="media_work.php">管理人のメディア活動</a>
      </li>
      <li class="nav-item divider">
        <a class="nav-link " href="board.php">旅の掲示板</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="gallery.php">フォトギャラリー</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="contact.php">お問い合わせ</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="login.php">ログイン</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="logout.php">ログアウト</a>
      </li>
    </ul>
  </div>
</nav>
</div> <!--fixed-top -->

<div class="container">
    <div class="row">
        <div class="col-lg-10 col-xs-10">
            <h1 class="contact-h1">Contact</h1>

            <?php if ($err_msg != ''): ?>
                <div class="alert alert-danger">
                    <?php echo $err_msg; ?>
                </div>
            <?php endif; ?>

            <?php if ($complete_msg != ''): ?>
                <div class="alert alert-success">
                    <?php echo $complete_msg; ?>
                </div>
            <?php endif; ?>

            <form method="post">
                <div class="form-group">
                    <input type="text" class="form-control" name="name" placeholder="お名前" value="<?php echo $name; ?>">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="email" placeholder="メールアドレス" value="<?php echo $email; ?>">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="subject" placeholder="件名" value="<?php echo $subject; ?>">
                </div>
                <div class="form-group">
                    <textarea class="form-control" name="message" rows="5" placeholder="お問い合わせ内容"><?php echo $message; ?></textarea>
                </div>
                <button type="submit" class="btn btn-success btn-block">送信</button>
            </form>
        </div>
    </div>
</div>
</div>  <!-- jumbotron -->

<footer class="d-flex justify-content-between flex-wrap p-4">
  <div class="text-white">
      <small>&copy;Arabian Social</small>
   </div>
</footer>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/js/bootstrap.min.js" integrity="sha384-o+RDsa0aLu++PJvFqy8fFScvbHFLtbvScb8AjopnFD+iEQ7wo/CG0xlczd+2O/em" crossorigin="anonymous"></script>
</body>
</html>