<?php

  include_once "../../classes/dataBaseControlManager.php";

  //获取类型
  $action = $_GET['action'];
  //获取一个manager
  $manager = new dbManager("PROGMAN");
  //获取post过来的json数据
  $raw_post_data = file_get_contents('php://input');
  $jsonData = json_decode($raw_post_data,true);

  if ($action == "login") {

    $username = paramAddControlWord($jsonData["username"]);
    $password = paramAddControlWord($jsonData["password"]);

    //查询数据
    $result = $manager->selectFromTabel("LOGIN","id,password,name,age,mobile,cent,token,usrimg","where username=$username and password=$password","login");

    if (count($result) > 0) {

      if ($result["result"]) {

        sendJson(0,$result["msg"],null);
      }else{

        $usrObj = $result[0];
        if ($usrObj->id) {

          sendJson(1,"操作成功！",$usrObj);
          $token = "111";

          //把token写入数据库
          $manager->updateData("LOGIN",array('token' => $token),"where id = '".$usrObj->id."'");
        }else{

          sendJson(0,"用户名或密码错误!",null);
        }
      }
    }else {

      sendJson(0,'没有这个用户！',null);
    }
  }
 ?>
