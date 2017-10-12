<?php

  include_once "classes/mysqlConnectManager.php";

  $manager = new mysqlConnectManager();
  // //连接数据库
  // $manager->connectToDataBase("MYPLAN");

  //删除旧的数据库
  $manager->deleteDatabase("MYPLAN");

  //创建新数据库
  $manager->createDataBase("MYPLAN");

////////////////创建登录表并插入数据
  //创建新的表
  $arrayName = array('id' => "int NOT NULL AUTO_INCREMENT PRIMARY KEY",'name' => "varchar(15) unique",'password' => "varchar(15)",'age' => "int",
  'mobile' => "varchar(11)",'cent' => "int",'token' => "varchar(40)",'lastlogin' => "varchar(20)",'level' => "int",'yanzhen' => "int",);
  $manager->createTable("LOGIN",$arrayName);

  //添加数据
  $arrayName = array('name' => "wu",'password' => "111111",'age' => 27,'mobile' => "13023628319",'cent' => 100,
  'token' => "qwertyuiopasdfghjklzxcvbnmkl",'lastlogin' => "2017-9-14 7:41",'level' => 1,'yanzhen' => 660528,);
  $manager->addData("LOGIN",$arrayName);

  //查询数据
  $dataModelArray = $manager->selectFromTabel("LOGIN","id,password,name,age,mobile,cent,token","","login");
  //数组
  $array = array();
  //总条数
  $total = 0;
  foreach ($dataModelArray as $value) {

    $total ++;

    $singelArray = array('name' => $value->name, 'age' => $value->age, 'password' => $value->password,
    'mobile' => $value->mobile, 'cent' => $value->cent, 'token' => $value->token);
    Array_push($array,$singelArray);
  }

  $array['total'] = $total;
  echo "<br />";
  echo json_encode($array);

////////////////创建我的日程表，并插入数据
  //创建新的表
  $arrayName = array('id' => "int NOT NULL AUTO_INCREMENT PRIMARY KEY",'title' => "varchar(100)",'pic' => "varchar(40)",'text' => "varchar(1000000)",
  'seetime' => "int",'datetime' => "datetime",'type'=>'varchar(10)');
  $manager->createTable("TASK",$arrayName);

  // //添加数据
  // $arrayName = array('title' => "第一件事情",'pic' => "http://localhost/myweb/imgs/ios.png",'text' => "我哈哈哈哈哈哈当发生的发低烧",'seetime' => 1,
  // 'datetime' => "2091-10-20 20:12:12",'type' => "ios",);
  // $manager->addData("TASK",$arrayName);
  //
  // $arrayName = array('title' => "第一件事情",'pic' => "http://localhost/myweb/imgs/php.png",'text' => "我哈哈哈哈哈哈当发生的发低烧",'seetime' => 1,
  // 'datetime' => "2091-10-20 20:12:12",'type' => "php",);
  // $manager->addData("TASK",$arrayName);
  //
  // $arrayName = array('title' => "第一件事情",'pic' => "http://localhost/myweb/imgs/vue.png",'text' => "我哈哈哈哈哈哈当发生的发低烧",'seetime' => 1,
  // 'datetime' => "2091-10-20 20:12:12",'type' => "vue",);
  // $manager->addData("TASK",$arrayName);

  //查询数据
  $dataModelArray = $manager->selectFromTabel("TASK","id,type,title,text,pic,seetime,datetime","","task");

  //数组
  $array = array();

  //总条数
  $total = 0;
  foreach ($dataModelArray as $value) {

    $total ++;

    $singelArray = array('id' => $value->id, 'pic' => $value->pic, 'title' => $value->title,
    'text' => $value->text, 'seetime' => $value->seetime, 'datetime' => $value->datetime,'type' => $value->type);
    Array_push($array,$singelArray);
  }

  $array['total'] = $total;
  echo "<br />";
  echo json_encode($array);

 ?>
