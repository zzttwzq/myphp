<?php

  include_once "classes/mysqlConnectManager.php";

  $manager = new mysqlConnectManager();
  //连接数据库
  $manager->connectToDataBase("MYPLAN");

  $action = $_GET['action'];

  $rowArray = array();
  if ($action == "getproject") {
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
  }else if ($action == "getuser") {
    //查询数据
    $dataModelArray = $manager->selectFromTabel("LOGIN","id,password,name,age,mobile,cent,token","","login");

    //总条数
    $total = 0;
    foreach ($dataModelArray as $value) {

      $total ++;

      $singelArray = array('id' => $value->id, 'name' => $value->name, 'mobile' => $value->mobile,
      'age' => $value->age, 'cent' => $value->cent, 'token' => $value->token);
      $rowArray[] = $singelArray;
    }

    $array['rows'] = $rowArray;
    $array['total'] = $total;
    echo json_encode($array);
  }
 ?>
