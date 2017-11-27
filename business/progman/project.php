<?php

  include_once "../../classes/dataBaseControlManager.php";

  //获取类型
  $action = $_GET['action'];
  //获取一个manager
  $manager = new dbManager("PROGMAN");
  //获取post过来的json数据
  $raw_post_data = file_get_contents('php://input');
  $jsonData = json_decode($raw_post_data,true);

  if ($action == "getTaskList") {

    $page = paramAddControlWord($jsonData["page"]);
    $title = paramAddControlWord($jsonData["title"]);
    //查询数据
    $result = $manager->selectFromTabel("TASK","id,img,title,brief,text,datetime,share,comment,star,tag","ORDER BY datetime DESC LIMIT $page 10","task");

    if ($result["result"]) {

      sendJson(0,$result["msg"],null);
    }else{

      sendJson(1,"操作成功！",$result);
    }
  }
 ?>
