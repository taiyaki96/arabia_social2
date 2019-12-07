
<!DOCTYPE HTML>
<html lang="ja">
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Arabian Social</title>
<link rel="stylesheet" href="style.css">
<!-- Bootstrap読み込み（スタイリングのため） -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>
<body>
<style>
li{
  list-style: none;
}
</style>

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

<div class="top-page">
    <div class="top-content">
     <h2>Welcome to Arabian World<br>Enjoy your trip</h2>
    </div>
</div>

<div class="first-page">
    <div class="first-sentense">
        <P class="sentense-1 lead-text">中東と聞いて何を思い浮かべるだろう。<br>広大で灼熱の砂漠をゆくキャラバン。<br>イスラム教が根付く聖地の数々。</P>
        <p class="sentense-2 lead-text">でも中東の魅力はそれだけに留まらない。</p>
        <p class="sentense-3 lead-text">中東とはどんな世界なのか。<br>そこに生きる人々の姿や文化。<br>日本とは全く異なる世界を見てみよう。</p>
    </div>
</div>


<div class="container">
    <div class="row">
      <div class="col-lg-4">
        <div class="card">
          <img class="card-img-top" src="images/lecture1.JPG" alt="ライトコースのイメージ画像">
          <div class="card-body">
            <h4 class="card-title">管理者のメディア活動</h4>
            <p class="card-text">メディアインタビューや執筆活動等を通し、中東について発信</p>
            <a href="media_work.php" class="btn btn-primary">詳しく</a>
          </div>
        </div>
      </div>
      <div class="col-lg-4">
        <div class="card">
          <img class="card-img-top" src="images/shara-travel.png" alt="スタンダードコースのイメージ画像">
          <div class="card-body">
            <h4 class="card-title">旅の掲示板</h4>
            <p class="card-text">アラブを旅して気づいたこと、おすすめなどをシェアしてみましょう！</p>
            <a href="board.php" class="btn btn-primary">詳しく</a>
          </div>
        </div>
      </div>
      <div class="col-lg-4">
        <div class="card">
          <img class="card-img-top" src="images/gallery.png" alt="プロフェッショナルコースのイメージ画像">
          <div class="card-body">
            <h4 class="card-title">フォトギャラリー</h4>
            <p class="card-text">宗教と日常が一体化した中東の文化風景を覗いてみましょう</p>
            <a href="gallery.php" class="btn btn-primary">詳しく</a>
          </div>
        </div>
      </div>
    </div>
  </div>



</div>
</div>
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