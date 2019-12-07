<?php
session_start();
require('dbconnect.php');

//一時間ログインしていない場合自動でログアウト
if(isset($_SESSION['id'])&& $_SESSION['time']+3600 > time()){
  $_SESSION['time']=time();

  //ログインしているユーザーのデータをDBから取得
  $members=$db->prepare('SELECT*FROM members WHERE id=?');
  $members->execute(array($_SESSION['id']));
  $member=$members->fetch();
}else{
  //ログインしていない場合自動でログイン画面へ
  header('Location:login.php');
  exit();
}

//投稿ボタンがクリックされた時
if(!empty($_POST)){
  if($_POST['message']!==''){
    $message=$db->prepare('INSERT INTO posts SET member_id=?,message=?,reply_message_id=?,created=NOW()');
    $message->execute(array(
      $member['id'],
      $_POST['message'],
      $_POST['reply_post_id']
    ));

    //投稿後にページ自分自身を呼び出す(ページ再読み込みによるメッセージの重複防止)
    header('Location:board.php');
    exit();
  }
}
//ページネーション処理
$page=$_REQUEST['page'];
if($page==''){
  $page=1;
}
$page=max($page,1);

$counts=$db->query('SELECT COUNT(*) AS cnt FROM posts');
$cnt=$counts->fetch();
$maxPage=ceil($cnt['cnt']/10);
$page=min($page, $maxPage);

$start=($page-1)*10;

$posts=$db->prepare('SELECT m.name, m.picture, p.*FROM members m,posts p WHERE m.id=p.member_id ORDER BY p.created DESC LIMIT ?,10');
$posts->bindParam(1,$start,PDO::PARAM_INT);
$posts->execute();

//Reがクリックされた場合(返信処理)
if(isset($_REQUEST['res'])){
  $response=$db->prepare('SELECT m.name, m.picture, p.*FROM members m,posts p WHERE m.id=p.member_id AND p.id=?');
  $response->execute(array($_REQUEST['res']));

  $table=$response->fetch();
  $message='【@'.$table['name'].'】'.$table['message'];
}

?>

<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>旅の掲示板</title>

  <link rel="stylesheet" href="style.css" />
  <!-- Bootstrap読み込み（スタイリングのため） -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </head>
  <style>
li{
  list-style: none;
}
</style>
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
    <h1>旅の掲示板</h1>
    <form action="" method="post">
      <dl>
        <dt class="message-bd"><?php print(htmlspecialchars($member['name'],ENT_QUOTES)); ?>さん、旅のエピソードをシェアしましょう！</dt>
        <dd>
          <textarea class="form-control" name="message" cols="50" rows="5"><?php print(htmlspecialchars($message,ENT_QUOTES)); ?></textarea>
          <input type="hidden" name="reply_post_id" value="<?php print(htmlspecialchars($_REQUEST['res'],ENT_QUOTES)); ?>" />
        </dd>
      </dl>
      <div>
        <p>
          <input type="submit" value="投稿する" />
        </p>
      </div>
    </form>

  <?php foreach($posts as $post):  ?> 
    <div class="msg">
    <img src="member_picture/<?php print(htmlspecialchars($post['picture'],ENT_QUOTES)); ?>" width="48" height="48" alt="<?php print(htmlspecialchars($post['name'],ENT_QUOTES)); ?>" />
    <p><?php print(htmlspecialchars($post['message'],ENT_QUOTES)); ?><span class="name">（<?php print(htmlspecialchars($post['name'],ENT_QUOTES)); ?>）</span><a href="board.php?res=<?php print(htmlspecialchars($post['id'],ENT_QUOTES)); ?>">返信</a></p>
    <p class="day"><a href="view.php?id=<?php print(htmlspecialchars($post['id'])); ?>"><?php print(htmlspecialchars($post['created'],ENT_QUOTES)); ?></a>

    <?php if($post['reply_message_id']>0): ?>
        <a href="view.php?id=<?php print(htmlspecialchars($post['reply_message_id'])); ?>">
        返信元のメッセージ</a>
    <?php endif; ?>

    <!-- 投稿者のみが削除できる -->
    <?php if($_SESSION['id']==$post['member_id']):  ?>
        [<a href="delete.php?id=<?php print(htmlspecialchars($post['id'])); ?>"
        style="color: #F33;">削除</a>]
    <?php endif; ?>
    </p>
    </div>
  <?php endforeach; ?>

<ul class="paging">
<?php if($page>1): ?>
  <li><a href="board.php?page=<?php print($page-1); ?>">前のページへ</a></li>
<?php else: ?>
  <li>前のページへ</li>
<?php endif; ?>

<?php if($page < $maxPage): ?>
  <li><a href="board.php?page=<?php print($page+1); ?>">次のページへ</a></li>
<?php else: ?>
  <li>次のページへ</li>
<?php endif; ?>
</ul>
  </div>

 </div>    <!--row -->
</div>     <!--container-->
</div>     <!--jumbotron-->

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


