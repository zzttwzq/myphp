<?php

  include_once "../../classes/dataBaseControlManager.php";

  //获取类型
  $action = $_GET['action'];
  //获取一个manager
  $manager = new dbManager("PROGMAN");
  //获取post过来的json数据
  $raw_post_data = file_get_contents('php://input');
  $jsonData = json_decode($raw_post_data,true);

  if ($action == "getProjectList") {

    $page = $jsonData["page"];
    $filter = $jsonData["filter"];
    $id = $jsonData["id"];

    if ($filter != "") {
      $filterString = " WHERE TITLE LIKE '%$filter%' OR TAG LIKE '%$filter%' OR LASTITEM LIKE '%$filter%'";
    }

    if ($id) {
      $filterString = "WHERE id='$id'";
    }

    if (!$page) {
      $page = 0;
    }

    //查询数据
    $resultTotal = $manager->getTotalNum("PROJECT");
    $result = $manager->selectFromTabel("PROJECT","ID,TITLE,TAG,LASTITEM,CREATETIME,LINKLEARNID,LISTARRAY,IMG","$filterString ORDER BY DATETIME DESC LIMIT $page,10","project");

    if ($result["result"]) {

      sendJson(0,$result["msg"],null);
    }else{

      //插入图片
      $listArray = array();
      foreach ($result as $row) {

        if ($row->img == null){
          $row->img = "https://zzttwzq.top/progman/imgs/".$row->tag.'.png';
        }
        Array_push($listArray,$row);
      }

      sendJsonWithTotal(count($resultTotal),1,"操作成功！",$listArray);
    }
  }
  else if ($action == "addProject") {

    //添加数据
    $arrayName = array(
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
  else if ($action == "deleteProject") {

    $ids = $jsonData['id'];

    //添加数据
    $arrayName = array(
    'title' => $jsonData['title'],
    'brief' => $jsonData['brief'],
    'text' => $jsonData['text'],
    'tag' => $jsonData['tag'],
    'category' => $jsonData['category'],);

    //查询数据
    $result = $manager->updateData("TASK",$arrayName,"where id=$ids");

    if ($result["result"]) {

      sendJson(0,$result["msg"],null);
    }else{

      sendJson(1,"操作成功！",$result);
    }
  }
  else if ($action == "udpateProject") {

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
  else if ($action == "uploadImg"){

    if ((($_FILES["file"]["type"] == "image/gif")
        || ($_FILES["file"]["type"] == "image/jpeg")
        || ($_FILES["file"]["type"] == "image/pjpeg")
        || ($_FILES["file"]["type"] == "image/png"))
        && ($_FILES["file"]["size"] < 200000)){

      if ($_FILES["file"]["error"] > 0){

        sendJson(0,"Return Code: " . $_FILES["file"]["error"] . "<br />",null);
      }else{

        if (file_exists("upload/" . $_FILES["file"]["name"])){

          sendJson(0,$_FILES["file"]["name"] . " already exists. ",null);
        }else{

          move_uploaded_file($_FILES["file"]["tmp_name"],"upload/".$_FILES["file"]["name"]);

          $result = array('filename' => 'https://zzttwzq.top/myphp/upload/'.$_FILES["file"]["name"]);
          sendJson(1,"操作成功！",$result);
        }
      }

    }else{

      $filename = $_FILES['file']['name'];
      $filetype = $_FILES['file']['type'];
      $filesize = $_FILES['file']['size'];

      sendJson(0,"Invalid file "."filename:$filename filetype:$filetype filesize:$filesize",null);
    }
  }
 ?>
