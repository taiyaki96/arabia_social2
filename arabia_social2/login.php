<?php
session_start();
require('dbconnect.php');

//cookieが入っているかチェック
if($_COOKIE['email']!==''){
  $email=$_COOKIE['email'];
}

if(!empty($_POST)){
  $email=$_POST['email'];

  if($_POST['email']!=='' && $_POST['password']!==''){
    $login=$db->prepare('SELECT*FROM members WHERE email=? AND password=?');
    $login->execute(array(
      $_POST['email'],
      sha1($_POST['password'])
    ));
    $member=$login->fetch();

    //パスワードや個人情報はセッション変数に保存しない
    if($member){
      $_SESSION['id']=$member['id'];
      $_SESSION['time']=time();

      if($_POST['save']==='on'){
        setCookie('email',$_POST['email'],time()+60*60*24*14);
      }

      //ログインされたらトップページへ
      header('Location:index.php');
      exit();
    }else{
      $error['login']='failed';
    }
  }else{
    $error['login']='blank';
  }
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="style.css">
<!-- Bootstrap読み込み（スタイリングのため） -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<title>ログインする</title>
</head>
<body>
<style>
  li{
    list-style:none;
  }
</style>
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

<div class="space"></div>
<div class="container">
<h1>ログインする</h1>
<div id="lead">
      <p>メールアドレスとパスワードを記入してログインしてください。</p>
      <p>入会手続きがまだの方はこちらからどうぞ。</p>
      <p>&raquo;<a href="join/">入会手続きをする</a></p>
    </div>
  <form action="" method="post">
  <div class="form-group">
    <label for="exampleInputEmail1">Eメールアドレス</label>
    <input type="email" name="email" class="form-control" id="exampleInputEmail1" value="<?php print(htmlspecialchars($email,ENT_QUOTES)); ?>">
    <small class="text-muted">あなたのメールは他の誰とも共有しません。</small>
    <?php if($error['login']==='blank'): ?>
        <p class="error">メールアドレスとパスワードを入力してください</p>
    <?php endif;  ?>
    <?php if($error['login']==='failed'): ?>
        <p class="error">ログインに失敗しました。正しく入力してください</p>
   <?php endif;  ?>
  </div>

  <div class="form-group">
    <label for="exampleInputPassword1">パスワード</label>
    <input type="password" name="password" class="form-control" id="exampleInputPassword1" value="<?php print(htmlspecialchars($_POST['password'],ENT_QUOTES)); ?>">
  </div>
  <div class="form-group form-check">
    <input type="checkbox" class="form-check-input" id="save" name="save" value="on">
    <label class="form-check-label" for="save">記憶する</label>
  </div>
  <button type="submit" class="btn btn-primary">ログインする</button>
</form>

</div>



<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/js/bootstrap.min.js" integrity="sha384-o+RDsa0aLu++PJvFqy8fFScvbHFLtbvScb8AjopnFD+iEQ7wo/CG0xlczd+2O/em" crossorigin="anonymous"></script>
</body>
</html>
