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

          sendJson(1,"登录成功！",$usrObj);
          //把token写入数据库
          $timesnap = date('Ymdhis', time());
          $token = md5($name . $timesnap);
          $manager->updateData("LOGIN",array('token' => $token),"where id = '".$usrObj->id."'");
        }else{

          sendJson(0,"用户名或密码错误!",null);
        }
      }
    }else {

      sendJson(0,'用户名或密码错误！',null);
    }
  }
  else if ($action == "adduser") {

    $mobile = "";
    $age = 0;
    $yanzhen = "";
    $name = $jsonData['username'];
    $password = $jsonData['password'];

    $lastlogin = date('y-m-d h:i:s',time());
    $timesnap = date('Ymdhis', time());
    $level = 1;
    $usr_token = md5($name.$timesnap);
    $usrimg = "http://zzttwzq.top/progman/imgs/logo.jpg";

    //添加数据
    $arrayName = array('name' => $name,'username' => $name,'age' => $age,'password' => $password,'mobile' => $mobile,'cent' => 100,
    'token' => $usr_token,'lastlogin' => $lastlogin,'level' => $level,'usrimg'=>$usrimg);
    $result = $manager->addData("LOGIN",$arrayName);

    if($result == 1){

      $arrayName['id'] = $manager->getLastID("task");
      sendJson(1,'注册登录成功！',$arrayName);
    }
    else{

      sendJson(0,'注册失败！',$result);
    }
  }
  else if ($action == "logout") {

    $userid = $jsonData['userid'];
    $result = $manager->updateData("LOGIN",array('token' => ""),"where id = '".$userid."'");

    if ($result["result"]) {

      sendJson(0,$result["msg"],null);
    }else{

      sendJson(1,"登出成功!",null);
    }
  }
  else if ($action == "saveuser") {

    $userid = $jsonData['userid'];

    $mobile = "";
    $age = 0;
    $yanzhen = "";
    $name = $jsonData['username'];
    $password = $jsonData['password'];

    $lastlogin = date('y-m-d h:i:s',time());
    $timesnap = date('Ymdhis', time());
    $level = 1;
    $usr_token = md5($name.$timesnap);
    $usrimg = "http://zzttwzq.top/progman/imgs/logo.jpg";

    //添加数据
    $arrayName = array(
      'name' => $name,
      'username' => $name,
      'age' => $age,
      'password' => $password,
      'mobile' => $mobile,
      'cent' => 100,
      'token' => $usr_token,
      'lastlogin' => $lastlogin,'level' => $level,'usrimg'=>$usrimg);
    $result = $manager->addData("LOGIN",$arrayName);



    $result = $manager->updateData("LOGIN",array('token' => ""),"where id = '".$userid."'");

    if ($result["result"]) {

      sendJson(0,$result["msg"],null);
    }else{

      sendJson(1,"登出成功!",null);
    }
  }
 ?>
