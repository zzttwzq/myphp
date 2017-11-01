<?php

  include_once "../../classes/mysqlConnectManager.php";

  $action = $_GET['action'];
  //获取数据
  $raw_post_data = file_get_contents('php://input');
  $arr = json_decode($raw_post_data,true);

  //连接数据库
  $manager = new mysqlConnectManager();
  $manager->connectToDataBase("ME");

  if ($action == "addlist") {

    $title = $arr['title'];
    $text = $arr['text'];

    date_default_timezone_set('PRC');
    $datetime = date('y-m-d h:i:s',time());

    $arrayName;
    //添加数据
    if ($arr['tablename'] == "ABC"){

      $arrayName = array(
        'things' => $arr['things'],
        'sence' => $arr['sence'],
        'thought' => $arr['thought'],
        'wrongkey' => $arr['wrongkey'],
        'feel' => $arr['feel'],
        'action' => $arr['action'],
        'wrongemotionkey' => $arr['wrongemotionkey'],
        'newthought' => $arr['newthought'],
        'newfeelaction' => $arr['newfeelaction'],
        'datetime' => $datetime);
    }else if ($arr['tablename'] == "EXP"){

      $arrayName = array(
        'things' => $arr['things'],
        'sence' => $arr['sence'],
        'progress' => $arr['progress'],
        'feel' => $arr['feel'],
        'datetime' => $datetime);
    }else if ($arr['tablename'] == "FAT"){
        $arrayName = array(
        'things' => $arr['things'],
        'sence' => $arr['sence'],
        'faith' => $arr['faith'],
        'datetime' => $datetime);
    }
    
    $result = $manager->addData($arr['tablename'],$arrayName);

    if($result < 0){

      $id = $manager->getlastNum("ABC");
      
      $singelArray = array('result' => 1,'id' => $id, 'msg' => "添加成功！ ");
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
    $dataModelArray = $manager->selectFromTabel($arr['tablename'],"id",$arr['filter'],"abc");
    $total = sizeof($dataModelArray);

     //再查询分页数据
    $dataModelArray;
    if ($arr['tablename'] == "ABC"){

      $dataModelArray = $manager->selectFromTabel($arr['tablename'],"id,things,sence,thought,wrongkey,feel,action,wrongemotionkey,newthought,newfeelaction,datetime"," ORDER BY datetime DESC"." limit ".$page.","."10","abc");

    }else if ($arr['tablename'] == "EXP"){

      $dataModelArray = $manager->selectFromTabel($arr['tablename'],"id,things,sence,progress,feel,datetime"," ORDER BY datetime DESC"." limit ".$page.","."10","abc");
      
    }else if ($arr['tablename'] == "FAT"){

      $dataModelArray = $manager->selectFromTabel($arr['tablename'],"id,things,sence,faith,datetime"," ORDER BY datetime DESC"." limit ".$page.","."10","abc");
      
    }

    foreach ($dataModelArray as $value) {

    $singelArray = array('id' => $value->id,'things' => $value->things, 'sence' => $value->sence, 'thought' => $value->thought,
    'wrongkey' => $value->wrongkey, 'feel' => $value->feel, 'action' => $value->action,'newthought' => $value->newthought,        
    'wrongemotionkey' => $value->wrongemotionkey,'newfeelaction' => $value->newfeelaction,'faith' => $value->faith,
    'progress' => $value->progress,'datetime' => $value->datetime);
    
      $rowArray[] = $singelArray;
    }

    $array['rows'] = $rowArray;
    $array['total'] = $total;
    echo json_encode($array);
  }
  else if ($action == "updatelist") {
    
    $id = $arr["id"];

    //添加数据
    if ($arr['tablename'] == "ABC"){
      $arrayName = array(
        'things' => $arr['things'],
        'sence' => $arr['sence'],
        'thought' => $arr['thought'],
        'wrongkey' => $arr['wrongkey'],
        'feel' => $arr['feel'],
        'action' => $arr['action'],
        'wrongemotionkey' => $arr['wrongemotionkey'],
        'newthought' => $arr['newthought'],
        'newfeelaction' => $arr['newfeelaction']);
    }else if ($arr['tablename'] == "EXP"){

      $arrayName = array(
        'things' => $arr['things'],
        'sence' => $arr['sence'],
        'progress' => $arr['progress'],
        'feel' => $arr['feel']);

    }else if ($arr['tablename'] == "FAT"){
      
        $arrayName = array(
        'things' => $arr['things'],
        'sence' => $arr['sence'],
        'faith' => $arr['faith']);
    }

    $result = $manager->updateData($arr['tablename'],$arrayName,"where id = '$id'");

    if($result < 0){
      
      $singelArray = array('result' => 1, 'msg' => "修改成功！ ");
      echo json_encode($singelArray);
    }else {

      $singelArray = array('result' => 0, 'msg' => $result);
      echo json_encode($singelArray);
    }    
  }
  else if ($action == "deletelist") {
    
    $id = $arr["id"];
    $result = $manager->deleteData($arr['tablename'],"where id = ".$id);
    
    if($result < 0){

      $singelArray = array('result' => 1, 'msg' => "删除成功！ ");
      echo json_encode($singelArray);
    }else {

      $singelArray = array('result' => 0, 'msg' => $result);
      echo json_encode($singelArray);
    }
  }
  
 ?>
