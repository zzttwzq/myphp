<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>重置博客第三版数据</title>
</head>
<body>

  <script type="text/javascript">

    if(confirm("请确保数据是否备份，在执行！！！！！是否执行此操作？")){

    }else{

      alert("hahah");
    }
  </script>

  <?php
    include_once "classes/dataBaseControlManager.php";

    $manager = new dbManager("PROGMAN");
    //-----------删除数据库
    {
      // echo "<br>";
      // echo ">>>>>>>>>>>>>>>>>>>>>>>>>";
      // echo "删除数据库";
      // echo "<br>";
      // $manager->deleteDatabase("PROGMAN");
      // echo "<br>";

      // echo "<br>";
      // echo ">>>>>>>>>>>>>>>>>>>>>>>>>";
      // echo "创建数据库";
      // echo "<br>";
      // $manager->createDataBase("PROGMAN");
      // echo "<br>";
    }

    //-----------初始化项目列表
    {
      // // 创建新的表
      // $arrayName = array(
      //   'id' => "int NOT NULL AUTO_INCREMENT PRIMARY KEY",
      //   'title' => "varchar(50)",
      //   'tag' => "varchar(30)",
      //   'lastItem' => "varchar(100)",
      //   'createTime' => "datetime",
      //   'linkLearnID' => "int",
      //   'listArray' => "varchar(1000)",
      //   'img' => "varchar(100)"
      // );
      // echo "<br>";
      // echo ">>>>>>>>>>>>>>>>>>>>>>>>>";
      // echo "创建数据表";
      // echo "<br>";
      // echo $manager->createTable("PROJECT",$arrayName);
      // echo "<br>";

      // 添加数据
      $arrayName = array(
      'title' => "varchar(50)",
      'tag' => "varchar(30)",
      'lastItem' => "varchar(100)",
      'createTime' => "2018-4-20 15:36:22",
      'linkLearnID' => 10,
      'listArray' => "varchar(1000)",
      // 'img' => "https://zzttwzq.top/progman/imgs/logo.png"
    );
      echo "<br>";
      echo ">>>>>>>>>>>>>>>>>>>>>>>>>";
      echo "插入数据";
      echo "<br>";
      echo $manager->addData("PROJECT",$arrayName);
      echo "<br>";
    }

    //-----------初始化登录表
    // {
    //   // 创建新的表
    //   $arrayName = array('id' => "int NOT NULL AUTO_INCREMENT PRIMARY KEY",
    //   'name' => "varchar(15)",
    //   'username' => "varchar(15) unique",
    //   'password' => "varchar(15)",
    //   'age' => "int",
    //   'mobile' => "varchar(11)",
    //   'cent' => "int",
    //   'token' => "varchar(40)",
    //   'lastlogin' => "varchar(20)",
    //   'level' => "int",
    //   'usrimg' => "varchar(50)",);
    //   $manager->createTable("LOGIN",$arrayName);
    //   echo "<br>";
    //
    //   // 添加数据
    //   $arrayName = array('username' => "wu",
    //   'name' => "吴志强",
    //   'password' => "111",
    //   'age' => 27,
    //   'mobile' => "13023628319",
    //   'cent' => 100,
    //   'token' => "qwertyuiopasdfghjklzxcvbnmkl",
    //   'lastlogin' => "2017-9-14 7:41",
    //   'level' => 1,
    //   'usrimg' => 'http://120.78.131.83/progman/imgs/logo.jpg');
    //   echo $manager->addData("LOGIN",$arrayName);
    //   echo "<br>";
    // }
    //
    // //-----------初始化博客表
    // {
    //   // 创建新的表
    //   $arrayName = array('id' => "int NOT NULL AUTO_INCREMENT PRIMARY KEY",
    //   'title' => "varchar(30)",
    //   'brief' => "varchar(100)",
    //   'text' => "varchar(20000)",
    //   'datetime' => "datetime",
    //   'share' => "int",
    //   'comment' => "int",
    //   'star' => "int",
    //   'tag' => "varchar(30)",
    //   'category' => "varchar(10)",
    //   'usrid' => "int",);
    //   $manager->createTable("TASK",$arrayName);
    //   echo "<br>";
    //
    //   // 添加数据
    //   $arrayName = array(
    //   'title' => "angularjs从入门到出门",
    //   'brief' => "angular概览",
    //   'text' => "啥也没有",
    //   'datetime' => "2017-11-27 15:45",
    //   'share' => "100",
    //   'comment' => "99",
    //   'star' => "10",
    //   'tag' => "angular",
    //   'category' => "iOS",
    //   'usrid' => "1",);
    //   echo $manager->addData("TASK",$arrayName);
    //   echo "<br>";
    //
    //   // 添加数据
    //   $arrayName = array(
    //   'title' => "ios开发",
    //   'brief' => "angular概览",
    //   'text' => "啥也没有",
    //   'datetime' => "2017-11-27 15:45",
    //   'share' => "100",
    //   'comment' => "99",
    //   'star' => "10",
    //   'tag' => "angular",
    //   'category' => "iOS",
    //   'usrid' => "1",);
    //   $manager->addData("TASK",$arrayName);
    //   echo "<br>";
    //
    //   // 添加数据
    //   $arrayName = array(
    //   'title' => "angularjs从入门到出门",
    //   'brief' => "angular概览",
    //   'text' => "啥也没有",
    //   'datetime' => "2017-11-27 15:45",
    //   'share' => "100",
    //   'comment' => "99",
    //   'star' => "10",
    //   'tag' => "angular",
    //   'category' => "iOS",
    //   'usrid' => "1",);
    //   $manager->addData("TASK",$arrayName);
    //   echo "<br>";
    // }
    //
    // //-----------初始化日程表
    // {
    //   // 创建新的表
    //   $arrayName = array('id' => "int NOT NULL AUTO_INCREMENT PRIMARY KEY",'datetime' => "varchar(8) unique",'score' => "int",);
    //   $manager->createTable("DATE",$arrayName);
    //   echo "<br>";
    //
    //   // 添加数据
    //   $arrayName = array('datetime' => "2017125",'score' => "5",);
    //   $manager->addData("DATE",$arrayName);
    //   echo "<br>";
    // }
   ?>
