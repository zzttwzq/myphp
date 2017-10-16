<?php

  include_once "classes/mysqlConnectManager.php";

  $manager = new mysqlConnectManager();
  // //连接数据库
  // $manager->connectToDataBase("ME");

  //删除旧的数据库
  $manager->deleteDatabase("ME");

  //创建新数据库
  $manager->createDataBase("ME");

  ////////////////创建登录表并插入数据
  //创建新的表
  $arrayName = array('id' => "int NOT NULL AUTO_INCREMENT PRIMARY KEY",'name' => "varchar(15)",'username' => "varchar(15) unique",'password' => "varchar(15)",'age' => "int",
  'mobile' => "varchar(11)",'cent' => "int",'token' => "varchar(40)",'lastlogin' => "varchar(20)",'level' => "int",);
  $manager->createTable("LOGIN",$arrayName);

  //添加数据
  $arrayName = array('username' => "wu",'name' => "吴志强",'password' => "111111",'age' => 27,'mobile' => "13023628319",'cent' => 100,
  'token' => "qwertyuiopasdfghjklzxcvbnmkl",'lastlogin' => "2017-9-14 7:41",'level' => 1,);
  $manager->addData("LOGIN",$arrayName);

  //查询数据
  $dataModelArray = $manager->selectFromTabel("LOGIN","id,password,username,name,age,mobile,cent,token,level","","login");
  //数组
  $array = array();
  //总条数
  $total = 0;
  foreach ($dataModelArray as $value) {

    $total ++;

    $singelArray = array('name' => $value->name,'username' => $value->username, 'age' => $value->age, 'password' => $value->password,
    'mobile' => $value->mobile, 'cent' => $value->cent, 'token' => $value->token, 'level' => $value->token);
    Array_push($array,$singelArray);
  }

  $array['total'] = $total;
  echo "<br />";
  echo json_encode($array);

  ////////////////创建我的abc表，并插入数据
  //创建新的表
  $arrayName = array(
  'id' => "int NOT NULL AUTO_INCREMENT PRIMARY KEY",
  'things' => "varchar(40)",'sence'=>'varchar(100)',
  'thought' => "varchar(200)",'wrongkey' => "varchar(100)",
  'feel' => "varchar(100)",'action' => "varchar(100)",
  'newthought' => "varchar(3000)",'newfeelaction' => "varchar(100)",
  'datetime'=>'datetime');
  $manager->createTable("ABC",$arrayName);

  //添加数据
  $arrayName = array(
  'things' => "第一件事情",'sence' => "888",
  'thought' => "我想哈哈哈",'wrongkey' => "111",
  'feel' => "222",'action' => "333",
  'newthought' => "444",'newfeelaction' => "555",
  'datetime' => "2017-10-04 10:42:34");
  $manager->addData("ABC",$arrayName);

  //查询数据
  $dataModelArray = $manager->selectFromTabel("ABC","things,sence,thought,wrongkey,feel,action,newthought,newfeelaction,datetime","","abc");

  //数组
  $array = array();

  //总条数
  $total = 0;
  foreach ($dataModelArray as $value) {

    $total ++;

    $singelArray = array('things' => $value->things, 'sence' => $value->sence, 'thought' => $value->thought,
    'wrongkey' => $value->wrongkey, 'feel' => $value->feel, 'action' => $value->action,'newthought' => $value->newthought,
    'newfeelaction' => $value->newfeelaction,'datetime' => $value->datetime);
    Array_push($array,$singelArray);
  }

  $array['total'] = $total;
  echo "<br />";
  echo json_encode($array);


  ////////////////创建我的exp表，并插入数据
  //创建新的表
  $arrayName = array(
  'id' => "int NOT NULL AUTO_INCREMENT PRIMARY KEY",
  'things' => "varchar(40)",'sence'=>'varchar(100)',
  'thought' => "varchar(200)",'wrongkey' => "varchar(100)",
  'process' => "varchar(3000)",'newthought' => "varchar(1000)",
  'datetime'=>'datetime');
  $manager->createTable("EXP",$arrayName);

  //添加数据
  $arrayName = array(
  'things' => "第一实验",'sence' => "888",
  'thought' => "我想哈哈哈",'wrongkey' => "111",
  'process' => "222",'newthought' => "333",
  'datetime' => "2017-10-04 10:42:34");
  $manager->addData("EXP",$arrayName);

  //查询数据
  $dataModelArray = $manager->selectFromTabel("EXP","things,sence,thought,wrongkey,process,newthought,datetime","","abc");

  //数组
  $array = array();

  //总条数
  $total = 0;
  foreach ($dataModelArray as $value) {

    $total ++;

    $singelArray = array('things' => $value->things, 'sence' => $value->sence, 'thought' => $value->thought,
    'wrongkey' => $value->wrongkey, 'process' => $value->process, 'newthought' => $value->newthought,'datetime' => $value->datetime);
    Array_push($array,$singelArray);
  }

  $array['total'] = $total;
  echo "<br />";
  echo json_encode($array);

  ////////////////创建我的fat表，并插入数据
  //创建新的表
  $arrayName = array(
  'id' => "int NOT NULL AUTO_INCREMENT PRIMARY KEY",
  'things' => "varchar(40)",'sence'=>'varchar(100)',
  'thought' => "varchar(200)",'wrongkey' => "varchar(100)",
  'process' => "varchar(3000)",'faith' => "varchar(100)",
  'datetime'=>'datetime');
  $manager->createTable("FAT",$arrayName);

  //添加数据
  $arrayName = array(
  'things' => "第一相信",'sence' => "888",
  'thought' => "我想哈哈哈",'wrongkey' => "111",
  'process' => "222",'faith' => "333",
  'datetime' => "2017-10-04 10:42:34");
  $manager->addData("FAT",$arrayName);

  //查询数据
  $dataModelArray = $manager->selectFromTabel("FAT","things,sence,thought,wrongkey,process,faith,datetime","","abc");

  //数组
  $array = array();

  //总条数
  $total = 0;
  foreach ($dataModelArray as $value) {

    $total ++;

    $singelArray = array('things' => $value->things, 'sence' => $value->sence, 'thought' => $value->thought,
    'wrongkey' => $value->wrongkey, 'process' => $value->process,'faith' => $value->faith,'datetime' => $value->datetime);
    Array_push($array,$singelArray);
  }

  $array['total'] = $total;
  echo "<br />";
  echo json_encode($array);
 ?>
