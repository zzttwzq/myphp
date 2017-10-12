<?php

  include_once "../../classes/mysqlConnectManager.php";

  $action = $_GET['action'];
  //获取数据
  $raw_post_data = file_get_contents('php://input');
  $arr = json_decode($raw_post_data,true);

  //连接数据库
  $manager = new mysqlConnectManager();
  $manager->connectToDataBase("MYPLAN");

  if ($action == "add") {

    $title = $arr['title'];
    $text = $arr['text'];

    date_default_timezone_set('PRC');
    $datetime = date('y-m-d h:i:s',time());

    //添加数据
    $arrayName = array(
    'title' => $title,
    'text' => $text,
    'pic' => "http://120.78.131.83/myweb/imgs/".$arr['type'].".png",
    'seetime' => 0,
    'type' => $arr['type'],
    'datetime' => $datetime);

    $manager->addData("TASK",$arrayName);
  }else if ($action == "gettask") {
    $rowArray = array();

    //查询数据
    $dataModelArray = $manager->selectFromTabel("TASK","id,type,title,text,pic,seetime,datetime",$arr['filter'],"task");
    //总条数
    $total = 0;
    foreach ($dataModelArray as $value) {

      $total ++;

      $singelArray = array('id' => $value->id, 'pic' => $value->pic, 'title' => $value->title,
      'text' => $value->text, 'seetime' => $value->seetime, 'datetime' => $value->datetime,'type' => $value->type,);

      $rowArray[] = $singelArray;
    }
    $array['rows'] = $rowArray;
    $array['total'] = $total;
    echo json_encode($array);
  }
 ?>
