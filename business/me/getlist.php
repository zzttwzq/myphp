<?php
  include_once "../../classes/dataBaseControlManager.php";

  $action = $_GET['action'];
  //获取数据
  $raw_post_data = file_get_contents('php://input');
  $arr = json_decode($raw_post_data,true);

  //连接数据库
  $manager = new dbManager("ME");
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
  else if ($action == "gethterrkey"){

    //先查一遍总的数据
    $dataModelArray = $manager->selectFromTabel("ABC","id,wrongkey,wrongemotionkey","","abc");

    $thelist = array('灾变','极端的想法','算命','读心','感情用事','一概而论','贴标签','苛求','心理过滤','否认积极面','低挫折容忍力','以自我为中心');
    $thevalues = array(0,0,0,0,0,0,0,0,0,0,0,0);
    $eqlist = array('愤怒','焦虑','抑郁','羡慕','愧疚','伤心','嫉妒','羞耻');
    $eqvalues = array(0,0,0,0,0,0,0,0);

    foreach ($dataModelArray as $value) {

      $wrongkey = $value->wrongkey;
      $wrongemotionkey = $value->wrongemotionkey;

      $wrongkeylist = explode(",",$wrongkey);
      $wrongemotionkeylist = explode(",",$wrongemotionkey);

      foreach ($wrongkeylist as $data1) {

        $offset=array_search($data1,$thelist);
        $data = $thevalues[$offset];
        $data +=1;
        $thevalues[$offset] = $data;
      }

      foreach ($wrongemotionkeylist as $data2) {

        $offset=array_search($data2,$eqlist);
        $data = $eqvalues[$offset];
        $data +=1;
        $eqvalues[$offset] = $data;
      }
    }

    $array['eqlist'] = $eqlist;
    $array['eqvalues'] = $eqvalues;
    $array['thelist'] = $thelist;
    $array['thevalues'] = $thevalues;
    echo json_encode($array);
  }

 ?>
