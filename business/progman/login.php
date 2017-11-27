<?php

  include_once "../../classes/dataBaseControlManager.php";

  //获取类型
  $action = $_GET['action'];
  //获取一个manager
  $manager = new dbManager("ME1");
  //获取post过来的json数据
  $raw_post_data = file_get_contents('php://input');
  $jsonData = json_decode($raw_post_data,true);

  if ($action == "login") {

    $username = paramAddControlWord($jsonData["username"]);
    $password = paramAddControlWord($jsonData["password"]);

    //查询数据
    $result = $manager->selectFromTabel("LOGIN","id,password,name,age,mobile,cent,token","where username=$username and password=$password","login");

    if ($result["result"]) {

      sendJson(0,$result["msg"],null);
    }else{

      sendJson(1,"操作成功！",$result);

      $token = "asdfasfasdfasdkklaosdfi1o2398kjsdfk9";

      //把token写入数据库
      $manager->updateData("LOGIN",array('token' => $token),"where id = '".$haveusr->id."'");

    }
  }
 ?>
