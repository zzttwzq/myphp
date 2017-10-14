<?php
  include_once "../../classes/mysqlConnectManager.php";


  //获取数据
  $raw_post_data = file_get_contents('php://input');
  $arr = json_decode($raw_post_data,true);


  $action = $_GET['action'];  //请求方式
  $name = $arr["name"]; //用户名
  $password = $arr["password"]; //密码

  //连接数据库
  $manager = new mysqlConnectManager();
  $manager->connectToDataBase("MYPLAN");
  if ($action == "login") {

    $haveusr;

    //查询数据
    $dataModelArray = $manager->selectFromTabel("LOGIN","id,password,name,age,mobile,cent,token","","login");
    foreach ($dataModelArray as $value) {

      if ($value->name == $name &&
          $value->password == $password) {

            $haveusr = $value;
            break;
      }
    }

    if ($haveusr) {

      $singelArray = array('result' => 1, 'msg' => "登录成功！ ",'name' => $haveusr->name, 'age' => $haveusr->age, 'password' => $haveusr->password, 'mobile' => $haveusr->mobile, 'cent' => $haveusr->cent, 'token' => $haveusr->token);
      echo json_encode($singelArray);
    }else {

      $singelArray = array('result' => 0, 'msg' => "登录失败！ ");
      echo json_encode($singelArray);
    }
  }
  else if ($action == "add") {

    $mobile = $arr['mobile'];
    $age = (int)$arr['age'];
    $yanzhen = (int)$arr['yanzhen'];

    date_default_timezone_set('PRC');
    $lastlogin = date('y-m-d h:i:s',time());
    $timesnap = date('Ymdhis', time());
    $level = 1;
    $usr_token = md5($name . $timesnap);

    //添加数据
    $arrayName = array('name' => $name,'age' => $age,'password' => $password,'mobile' => $mobile,'cent' => 100,
    'token' => $usr_token,'lastlogin' => $lastlogin,'level' => $level,'yanzhen' => $yanzhen);
    $manager->addData("LOGIN",$arrayName);
  }else if ($action == "getuser") {

    $rowArray = array();
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
