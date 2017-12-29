<?php

  include_once "../../classes/dataBaseControlManager.php";

  $action = $_GET['action'];
  //获取数据
  $raw_post_data = file_get_contents('php://input');
  $arr = json_decode($raw_post_data,true);

  //连接数据库
  $manager = new dbManager("MYPLAN");

  date_default_timezone_set('PRC');
  $datetime = date('y-m-d h:i:s',time());

  if ($action == "addlist") {

    //添加数据
    $arrayName = array(
    'title' => $arr['title'],
    'text' => $arr['text'],
    'pic' => "http://120.78.131.83/myweb2/imgs/".$arr['tag'].".png",
    'seetime' => 0,
    'class' => $arr['class'],
    'brief' => $arr['brief'],
    'tag' => $arr['tag'],
    'statue' => $arr['statue'],
    'username' => $arr['username'],
    'datetime' => $datetime);

    $result = $manager->addData("TASK",$arrayName);

    if($result == 1){

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
  else if ($action == "gettags") {
    $rowArray = array();
    $page = $arr['page']*10;
    $total = 0;//总条数

    //先查一遍总的数据
    $dataModelArray = $manager->selectFromTabel("TAG","id,name,type",$arr['filter']." limit ".$page.","."10","tag");
    $total = sizeof($dataModelArray);

    foreach ($dataModelArray as $value) {

      $singelArray = array('id' => $value->id,'name' => $value->name, 'type' => $value->type,);
      $rowArray[] = $singelArray;
    }

    $array['rows'] = $rowArray;
    $array['total'] = $total;
    echo json_encode($array);
  }
  else if ($action == "updatelist") {

    $id = $arr["id"];

    //添加数据
    $arrayName;

    if ($arr["seetime"]){

      $arrayName = array(
        'seetime' => $arr['seetime'],);
    }else{

      $arrayName = array(
        'title' => $arr['title'],
        'text' => $arr['text'],
        'pic' => "http://120.78.131.83/myweb2/imgs/".$arr['tag'].".png",
        'class' => $arr['class'],
        'brief' => $arr['brief'],
        'tag' => $arr['tag'],
        'statue' => $arr['statue']);
    }

    $result = $manager->updateData("TASK",$arrayName,"where id = '$id'");

    if($result == 1){

      $singelArray = array('result' => 1, 'msg' => "修改成功！ ");
      echo json_encode($singelArray);
    }else {

      $singelArray = array('result' => 0, 'msg' => $result);
      echo json_encode($singelArray);
    }
  }
  else if ($action == "deletelist") {

    $id = $arr["id"];
    $result = $manager->deleteData("TASK","where id = ".$id);

    if($result == 1){

      $singelArray = array('result' => 1, 'msg' => "删除成功！ ");
      echo json_encode($singelArray);
    }else {

      $singelArray = array('result' => 0, 'msg' => $result);
      echo json_encode($singelArray);
    }
  }
  else if ($action == "addtag") {

    //添加数据
    $arrayName = array(
    'type' => $arr['type'],
    'name' => $arr['name']);

    $result = $manager->addData("TAG",$arrayName);

    if($result < 0){

      $id = $manager->getlastNum("tag");

      $singelArray = array('result' => 1, 'msg' => "添加成功！ ",'id' => $id);
      echo json_encode($singelArray);
    }else {

      $singelArray = array('result' => 0, 'msg' => $result);
      echo json_encode($singelArray);
    }
  }
  else if ($action == "updatetag") {

    $id = $arr["id"];

    //添加数据
    $arrayName = array(
    'name' => $arr['name']);

    $result = $manager->updateData("TAG",$arrayName,"where id = '$id'");

    if($result < 0){

      $singelArray = array('result' => 1, 'msg' => "删除成功！ ");
      echo json_encode($singelArray);
    }else {

      $singelArray = array('result' => 0, 'msg' => $result);
      echo json_encode($singelArray);
    }
  }
  else if ($action == "deletetag") {

    $id = $arr["id"];
    $result = $manager->deleteData("TAG","where id = ".$id);

    if($result < 0){

      $singelArray = array('result' => 1, 'msg' => "删除成功！ ");
      echo json_encode($singelArray);
    }else {

      $singelArray = array('result' => 0, 'msg' => $result);
      echo json_encode($singelArray);
    }
  }

 ?>
