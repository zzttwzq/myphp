<?php

  include_once "../../classes/mysqlConnectManager.php";

  $fs = $_GET['action'];
  //获取数据
  $raw_post_data = file_get_contents('php://input');
  $arr = json_decode($raw_post_data,true);
  $title = $arr['title'];
  $text = $arr['text'];
  $starttime = $arr['starttime'];
  $endtime = $arr['endtime'];

  //连接数据库
  $manager = new mysqlConnectManager();
  $manager->connectToDataBase("MYPLAN");

  if ($fs == "add") {

    //添加数据
    $arrayName = array(
    'subid' => "1",
    'title' => $title,
    'text' => $text,
    'finished' => 0,
    'starttime' => $starttime,
    'endtime' => $endtime);

    $manager->addData("TASK",$arrayName);
  }
 ?>
