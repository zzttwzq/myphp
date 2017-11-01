<?php

  include_once "../../classes/mysqlConnectManager.php";

  $action = $_GET['action'];
  //获取数据
  $raw_post_data = file_get_contents('php://input');
  $arr = json_decode($raw_post_data,true);

  //连接数据库
  $manager = new mysqlConnectManager();
  $manager->connectToDataBase("MYPLAN");

  date_default_timezone_set('PRC');
  $datetime = date('y-m-d h:i:s',time());

  if ($action == "addlist") {

    //添加数据
    $arrayName = array(
    'title' => $arr['title'],
    'text' => $arr['text'],
    'pic' => "http://120.78.131.83/myweb/imgs/".$arr['tag'].".png",
    'seetime' => 0,
    'class' => $arr['class'],
    'brief' => $arr['brief'],
    'tag' => $arr['tag'],
    'statue' => $arr['statue'],
    'userid' => "1",//$arr['userid'],
    'datetime' => $datetime);

    $result = $manager->addData("TASK",$arrayName);

    if($result < 0){

      $id = $manager->getlastNum("task");
      
      $singelArray = array('id' => $id,'result' => 1, 'msg' => "添加成功！ ");
      echo json_encode($singelArray);
    }else {

      $singelArray = array('result' => 0, 'msg' => $result);
      echo json_encode($singelArray);
    }    
  }
  else if ($action == "getlist") {
    $rowArray = array();
    $page = $arr['page']*10;
    $total = 0;//总条数

    //先查一遍总的数据
    $dataModelArray = $manager->selectFromTabel("TASK","id",$arr['filter'],"task");
    $total = sizeof($dataModelArray);

     //再查询分页数据
    $dataModelArray = $manager->selectFromTabel("TASK","id,title,pic,text,seetime,datetime,class,tag,statue,userid,username,brief",$arr['filter']." ORDER BY datetime DESC"." limit ".$page.","."10","task");
    
    foreach ($dataModelArray as $value) {

      $singelArray = array('id' => $value->id, 'pic' => $value->pic, 'title' => $value->title,
      'text' => $value->text, 'seetime' => $value->seetime, 'datetime' => $value->datetime,'class' => $value->class,
      'tag' => $value->tag,'statue' => $value->statue,'userid' => $value->userid,'username' => $value->username,'brief' => $value->brief);

      $rowArray[] = $singelArray;
    }

    $array['rows'] = $rowArray;
    $array['total'] = $total;
    echo json_encode($array);
  }

 ?>
