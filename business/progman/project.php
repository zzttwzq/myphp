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

    $page = $jsonData["page"];
    $filter = $jsonData["filter"];
    if (!$page) {
      $page = 0;
    }

    //查询数据
    $resultTotal = $manager->selectFromTabel("TASK","id","","task");

    $result = $manager->selectFromTabel("TASK","id,title,brief,text,datetime,share,comment,star,tag,category"," $filter ORDER BY datetime DESC LIMIT $page,10","task");
    if ($result["result"]) {

      sendJson(0,$result["msg"],null);
    }else{

      //插入图片
      $listArray = array();
      foreach ($result as $row) {

        $row->pic = "http://120.78.131.83/progman/imgs/".$row->tag.'.png';
        Array_push($listArray,$row);
      }

      sendJsonWithTotal(count($resultTotal),1,"操作成功！",$listArray);
    }
  }
  else if ($action == "addTaskList") {

    //添加数据
    $arrayName = array(
    'img' => $jsonData['img'],
    'title' => $jsonData['title'],
    'brief' => $jsonData['brief'],
    'text' => $jsonData['text'],
    'datetime' => date("Y-m-d H:i:s"),
    'share' => 0,
    'comment' => 0,
    'star' => 0,
    'category' => $jsonData['category'],
    'tag' => $jsonData['tag']);

    //查询数据
    $result = $manager->addData("TASK",$arrayName);

    if ($result["result"]) {

      sendJson(0,$result["msg"],null);
    }else{

      sendJson(1,"操作成功！",$result);
    }
  }
  else if ($action == "updateTaskList") {

    $ids = $jsonData['id'];

    //添加数据
    $arrayName = array(
    'img' => $jsonData['img'],
    'title' => $jsonData['title'],
    'brief' => $jsonData['brief'],
    'text' => $jsonData['text'],
    'tag' => $jsonData['tag']);

    //查询数据
    $result = $manager->updateData("TASK",$arrayName,"where id=$ids");

    if ($result["result"]) {

      sendJson(0,$result["msg"],null);
    }else{

      sendJson(1,"操作成功！",$result);
    }
  }
  else if ($action == "deleteTaskList") {

    //添加数据
    $ids = $jsonData['id'];

    //查询数据
    $result = $manager->deleteData("TASK","where id=$ids");

    if ($result["result"]) {

      sendJson(0,$result["msg"],null);
    }else{

      sendJson(1,"操作成功！",$result);
    }
  }
  else if ($action == "getScoreList") {

    //查询数据
    $result = $manager->selectFromTabel("DATE","id,datetime,score","","task");

    if ($result["result"]) {

      sendJson(0,$result["msg"],null);
    }else{

      sendJson(1,"操作成功！",$result);
    }
  }
  else if ($action == "addScoreList") {

    //添加数据
    $arrayName = array(
    'datetime' => $jsonData['datetime'],
    'score' => $jsonData['score'],);

    //查询数据
    $result = $manager->addData("DATE",$arrayName);

    var_dump($result);

    if ($result["result"]) {

      sendJson(0,$result["msg"],null);
    }else{

      sendJson(1,"操作成功！",$result);
    }
  }
  
 ?>
