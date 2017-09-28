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

  if ($action == "add") {

    //添加数据
    $arrayName = array(
    'subid' => "1",
    'title' => $title,
    'text' => $text,
    'finished' => 0,
    'starttime' => $starttime,
    'endtime' => $endtime);

    $manager->addData("TASK",$arrayName);
  }else if ($action == "getproject") {
    $rowArray = array();
    //查询数据
    $dataModelArray = $manager->selectFromTabel("TASK","id,subid,title,text,finished,starttime,endtime","","task");
    //总条数
    $total = 0;
    foreach ($dataModelArray as $value) {

      $total ++;

      $singelArray = array('id' => $value->id, 'subid' => $value->subid, 'title' => $value->title,
      'text' => $value->text, 'finished' => $value->finished, 'starttime' => $value->starttime, 'endtime' => $value->endtime);

      $rowArray[] = $singelArray;
    }
    $array['rows'] = $rowArray;
    $array['total'] = $total;
    echo json_encode($array);
  }
 ?>
