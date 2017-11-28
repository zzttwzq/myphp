<?php

require 'classes/dataBaseControlManager.php';


  $manager = new dbManager("");

  $manager->deleteDatabase("PROGMAN");
  echo "<br>";

  $manager->createDataBase("PROGMAN");
  echo "<br>";

  //-----------初始化登录表
  // 创建新的表
  $arrayName = array('id' => "int NOT NULL AUTO_INCREMENT PRIMARY KEY",
  'name' => "varchar(15)",
  'username' => "varchar(15) unique",
  'password' => "varchar(15)",
  'age' => "int",
  'mobile' => "varchar(11)",
  'cent' => "int",
  'token' => "varchar(40)",
  'lastlogin' => "varchar(20)",
  'level' => "int",);
  $manager->createTable("LOGIN",$arrayName);
  echo "<br>";

  // 添加数据
  $arrayName = array('username' => "4",
  'name' => "吴志强1",
  'password' => "111111",
  'age' => 27,
  'mobile' => "13023628319",
  'cent' => 100,
  'token' => "qwertyuiopasdfghjklzxcvbnmkl",
  'lastlogin' => "2017-9-14 7:41",
  'level' => 1,);
  echo $manager->addData("LOGIN",$arrayName);
  echo "<br>";

  //-----------初始化博客表
  // 创建新的表
  $arrayName = array('id' => "int NOT NULL AUTO_INCREMENT PRIMARY KEY",
  'img' => "varchar(100)",
  'title' => "varchar(30)",
  'brief' => "varchar(100)",
  'text' => "varchar(20000)",
  'datetime' => "datetime",
  'share' => "int",
  'comment' => "int",
  'star' => "int",
  'tag' => "varchar(30)",);
  $manager->createTable("TASK",$arrayName);
  echo "<br>";

  // 添加数据
  $arrayName = array('img' => "http://localhost/progman/imgs/angular.png",
  'title' => "angularjs从入门到出门",
  'brief' => "angular概览",
  'text' => "啥也没有",
  'datetime' => "2017-11-27 15:45",
  'share' => "100",
  'comment' => "99",
  'star' => "10",
  'tag' => "angular",);
  echo $manager->addData("TASK",$arrayName);
  echo "<br>";

  // 添加数据
  $arrayName = array('img' => "http://localhost/progman/imgs/angular.png",
  'title' => "angularjs从入门到出门",
  'brief' => "angular概览",
  'text' => "啥也没有",
  'datetime' => "2017-11-27 15:45",
  'share' => "100",
  'comment' => "99",
  'star' => "10",
  'tag' => "angular",);
  echo $manager->addData("TASK",$arrayName);
  echo "<br>";

  // 添加数据
  $arrayName = array('img' => "http://localhost/progman/imgs/angular.png",
  'title' => "angularjs从入门到出门",
  'brief' => "angular概览",
  'text' => "啥也没有",
  'datetime' => "2017-11-27 15:45",
  'share' => "100",
  'comment' => "99",
  'star' => "10",
  'tag' => "angular",);
  echo $manager->addData("TASK",$arrayName);
  echo "<br>";

 ?>
