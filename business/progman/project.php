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

    $page = $jsonData["page"]*10;
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
    $result = $manager->selectFromTabel("PROJECT","ID,TITLE,TAG,LASTITEM,CREATETIME,LINKLEARNID,LISTARRAY,IMG","$filterString ORDER BY CREATETIME DESC LIMIT $page,10","project");

    if ($result["result"]) {

      sendJson(0,$result["msg"],null);
    }else{

      // 插入图片
      $listArray = array();
      foreach ($result as $row) {

        if ($row->img == null){
          $row->img = "https://zzttwzq.top/progman/imgs/".$row->tag.'.png';
        }
        Array_push($listArray,$row);
      }

      sendJsonWithTotal($resultTotal,1,"操作成功！",$listArray);
    }
  }
  else if ($action == "addProject") {

    //添加数据
    $arrayName = array(
    'title' => $jsonData['title'],
    'tag' => $jsonData['tag'],
    'lastitem' => $jsonData['lastitem'],
    'createtime' => date("Y-m-d H:i:s"),
    'linklearnid' => $jsonData['linklearnid'],
    'listarray' => $jsonData['listarray']);

    //查询数据
    $result = $manager->addData("PROJECT",$arrayName);

    if ($result["result"]) {

      sendJson(0,$result["msg"],null);
    }else{

      sendJson(1,"操作成功！",$result);
    }
  }
  else if ($action == "udpateProject") {

    $ids = $jsonData['id'];

    //添加数据
    $arrayName = array(
      'title' => $jsonData['title'],
      'tag' => $jsonData['tag'],
      'lastitem' => $jsonData['lastitem'],
      'createtime' => date("Y-m-d H:i:s"),
      'linklearnid' => $jsonData['linklearnid'],
      'listarray' => $jsonData['listarray']);

    //查询数据
    $result = $manager->updateData("PROJECT",$arrayName,"WHERE ID=$ids");
    if ($result["result"]) {

      sendJson(0,$result["msg"],null);
    }else{

      sendJson(1,"操作成功！",$result);
    }
  }
  else if ($action == "deleteProject") {

    //添加数据
    $ids = $jsonData['id'];

    //查询数据
    $result = $manager->deleteData("PROJECT","WHERE ID=$ids");

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

          $utf8FileName = date("Y-m-d h:m:s").'.'.explode('.',$_FILES["file"]["name"])[1];

          // move_uploaded_file($_FILES["file"]["tmp_name"],"../../upload/".$utf8FileName);

          move_uploaded_file($_FILES["file"]["tmp_name"],"../../upload/".$_FILES["file"]["name"]);
          rename($_FILES["file"]["name"],$_FILES["file"]["name"]);

          $result = array('imgUrl' => 'https://zzttwzq.top/myphp/upload/'.$utf8FileName,filename => $_FILES["file"]["name"]);
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
  else if ($action == "uploadtoken"){

    //添加数据
    $arrayName = array(
      'title' => "",
      'tag' => "",
      'lastitem' => "",
      'createtime' => date("Y-m-d H:i:s"),
      'linklearnid' => 0,
      'listarray' => $_GET['token']);
  
      //查询数据
      $result = $manager->addData("PROJECT",$arrayName);
  
      if ($result["result"]) {
  
        sendJson(0,$result["msg"],null);
      }else{
  
        sendJson(1,"操作成功！",$result);
      }
  }
 ?>
