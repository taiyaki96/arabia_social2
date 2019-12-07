<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Media Work</title>
    <link rel="stylesheet" href="style.css">
<!-- Bootstrap読み込み（スタイリングのため） -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <style>
        li{
          list-style:none;
        }
        a{
            color:#727171;
        }
        .card-group{
            margin-top:120px;
            margin-bottom:40px;
        }
        .card:hover {
            opacity: 0.6;
            transition-duration: 0.3s;
         }

    </style>
</head>
<body>
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
<div class="card-group">
  <div class="card">
    <a href="https://bakallege.com/interview/tabibaka/">
    <img class="card-img-top" src="images/interview.png" alt="Card image cap">
    <div class="card-body">
      <h4 class="card-title">インタビューを受ける</h4>
      <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
      <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
    </div>
    </a>
  </div>
  
  <div class="card">
    <a href="https://tabippo.net/author/sakaguchitaiki/">
    <img class="card-img-top" src="images/writwe-article.png" alt="Card image cap">
    <div class="card-body">
      <h4 class="card-title">ライター活動</h4>
      <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
      <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
    </div>
    </a>
  </div>
  <div class="card">
    <a href="https://tabippo.net/2000-contents/">
    <img class="card-img-top" src="images/book.jpg" alt="Card image cap">
    <div class="card-body">
      <h4 class="card-title">書籍掲載デビュー</h4>
      <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.</p>
      <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
    </div>
    </a>
  </div>
</div>
<div class="card-group">
  <div class="card">
    <a href="https://tabi-daigaku.jp/lessons/930">
    <img class="card-img-top" src="images/lecture1.JPG" alt="lecture">
    <div class="card-body">
      <h4 class="card-title">講演会活動</h4>
      <p class="card-text">エジプト・サウジアラビア留学やイランでの海外インターンなどの経験を、講演会で発信しています。</p>
      <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
    </div>
    </a>
  </div>
  
  <div class="card">
    <a href="https://nerima.keizai.biz/headline/1233/">
    <img class="card-img-top" src="images/contact.png" alt="Card image cap">
    <div class="card-body">
      <h4 class="card-title">成人式に登壇</h4>
      <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
      <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
    </div>
    </a>
  </div>

  <div class="card">
    <a href="https://pas-pol.jp/2017/06/paspol-loft/">
    <img class="card-img-top" src="images/free-paper.JPG" alt="Card image cap">
    <div class="card-body">
      <h4 class="card-title">フリーペーパー製作</h4>
      <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.</p>
      <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
    </div>
    </a>
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