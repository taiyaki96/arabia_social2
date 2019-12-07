<?php
    //例外処理
    try{
        $db=new PDO('mysql:dbname=heroku_46f5c812c2ae5f7;host=us-cdbr-iron-east-05.cleardb.net;charset=utf8','b748bc5df82266','3d652233');
    }catch(PDOException $e){
        print('DB接続エラー:'.$e->getMessage());
    }

