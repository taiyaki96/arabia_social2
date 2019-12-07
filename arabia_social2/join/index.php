<?php
session_start();
require('../dbconnect.php');

	//$_POSTが空ではない時にこのエラーチェックを走らせる=フォームを送信した時だけエラーチェックする
if(!empty($_POST)){

	if($_POST['name']===''){
		$error['name']='blank';
	}
	if($_POST['email']===''){
		$error['email']='blank';
	}
	//パスワードの長さ指定
	if(strlen($_POST['password']) < 4){
		$error['password']='length';
	}
	if($_POST['password']===''){
		$error['password']='blank';
	}
	//セキュリティのため画像のみをアップロードできるようにする
	$fileName=$_FILES['image']['name'];
	if(!empty($fileName)){
		//「-3」として拡張子を得る
		$ext=substr($fileName, -3);
		if($ext !='jpg' && $ext !='gif' && $ext !='png'){
			$error['image']='type';
		}
	}
	//アカウントの重複チェック
	if(empty($error)){
		$member=$db->prepare('SELECT COUNT(*) AS cnt FROM members WHERE email=?');
		$member->execute(array($_POST['email']));
		$record=$member->fetch();
		if($record['cnt'] > 0){
			$error['email']='duplicate';
		}
	}


	//$errorの配列がカラかどうか
	if(empty($error)){
		//ファイル名に日付を入れることで、同じ名前による重複した画像保存を防ぐ
		$image=date('YmdHis').$_FILES['image']['name'];
		move_uploaded_file($_FILES['image']['tmp_name'],'../member_picture/'.$image);
		$_SESSION['join']=$_POST;
		//「$image」にファイル名保存
		$_SESSION['join']['image']=$image;
		header('Location:check.php');
		exit();
	}
}
//書き直しがクリックされた時の処理(セッションが正しく設定されている場合のみ)
if($_REQUEST['action']=='rewrite'&& isset($_SESSION['join'])){
	$_POST=$_SESSION['join'];
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>会員登録</title>

	<link rel="stylesheet" href="../style.css" />
	<!-- Bootstrap読み込み（スタイリングのため） -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>
<body>
<style>
	li{
		list-style:none;
	}
</style>
<div class='fixed-top'>
    <nav class="navbar navbar-expand-lg navbar-light bg-light ">
  <a class="navbar-brand" href="../index.php">Arabia Social</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="true" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item divider">
        <a class="nav-link" href="../media_work.php">管理人のメディア活動</a>
      </li>
      <li class="nav-item divider">
        <a class="nav-link " href="../board.php">旅の掲示板</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../gallery.php">フォトギャラリー</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../contact.php">お問い合わせ</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../login.php">ログイン</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../logout.php">ログアウト</a>
      </li>
    </ul>
  </div>
</nav>
</div> <!--fixed-top -->

<div class="space"></div>
<div class="container">
   <p>次のフォームに必要事項をご記入ください。</p>
  <form action="" method="post" enctype="multipart/form-data">
  <div class="form-group">
  <label for="Input">名前（ニックネーム可）<span class="required">必須</span></label>
  <input type="text" name="name" class="form-control" id="Input" value="<?php print(htmlspecialchars($_POST['name'],ENT_QUOTES)); ?>">
  <?php if($error['name']==='blank'): ?>
		<p class="error">名前を入力してください</p>
  <?php endif; ?>
	</div>

  <div class="form-group">
    <label for="exampleInputEmail1">Eメールアドレス<span class="required">必須</span></label>
    <input type="email" name="email" class="form-control" id="exampleInputEmail1" value="<?php print(htmlspecialchars($_POST['email'],ENT_QUOTES)); ?>">
    <small class="text-muted">あなたのメールは他の誰とも共有しません。</small>
    <?php if($error['email']==='blank'): ?>
		<p class="error">メールアドレスを入力してください。</p>
	<?php endif; ?>
	<?php if($error['email']==='duplicate'): ?>
		<p class="error">指定されたメールアドレスはすでに登録されています</p>
	<?php endif; ?>
  </div>


  <div class="form-group">
    <label for="exampleInputPassword1">パスワード<span class="required">必須</span></label>
	<input type="password" name="password" class="form-control" id="exampleInputPassword1" value="<?php print(htmlspecialchars($_POST['password'],ENT_QUOTES)); ?>">
	<?php if($error['password']==='length'): ?>
			<p class="error">4文字以上で入力してください</p>
	<?php endif; ?>
	<?php if($error['password']==='blank'): ?>
			<p class="error">パスワードを入力してください。</p>
	<?php endif; ?>
  </div>

  <input type="file" name="image" size="35" value="test"  />
	<?php if($error['image']==='type'): ?>
	<p class="error">「.jpg」「.gif」「.png」の画像を指定してください</p>
	<?php endif; ?>
	<?php if(!empty($error)); ?>
	<p class="error">画像をもう一度指定してください</p>
  <div><input type="submit" value="入力内容を確認する" /></div>
</form>

</div>



<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
 <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/js/bootstrap.min.js" integrity="sha384-o+RDsa0aLu++PJvFqy8fFScvbHFLtbvScb8AjopnFD+iEQ7wo/CG0xlczd+2O/em" crossorigin="anonymous"></script>
</body>
</html>
