<?php

include_once "classes/dataBaseControlManager.php";

  $manager = new dbManager("ME");
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
  'things' => "varchar(1000)",'sence'=>'varchar(500)',
  'thought' => "varchar(2000)",'wrongkey' => "varchar(100)",
  'feel' => "varchar(100)",'action' => "varchar(1000)",
  'wrongemotionkey' => "varchar(100)",'newthought' => "varchar(5000)",
  'newfeelaction' => "varchar(100)",'datetime'=>'datetime');
  $manager->createTable("ABC",$arrayName);

  //添加数据
  $arrayName = array(
  'things' => "我是第一条",'sence' => "在办公室上班",
  'thought' => "大家一定当我是傻逼了，想要伤害我（读心，以自我为中心）",'wrongkey' => "读心,以自我为中心",
  'feel' => "羞耻90%,愤怒90%",'action' => "1.躲避一他人交流。\n2.躲避以他人互动。",
  'wrongemotionkey' => "羞耻,愤怒",'newthought' => "1.你的想法可能是错误的，大家可能并没有这么想。2.有一部分跟你意见对立的人可能会这么想，
  但是大部分分都不会这么想，跟你意见对立的人可能会，但是也不会怎么样。3.你以后可能会有所改观，不会一直这样，不会一只这样抑郁下去的。4.好多人都康复了，你也可以做到，可以做到不吃药就能好。5.你也有好多的朋友，也有关心你爱你的人，并不是所有人离你而去了。",
  'newfeelaction' => "羞耻(30%),愤怒(30%)",'datetime' => "2017-10-24 10:42:34");
  $manager->addData("ABC",$arrayName);

  for ($i = 0;$i<100;$i++){

      //添加数据
    $arrayName = array(
    'things' => "今天有点蒙逼",'sence' => "在办公室上班",
    'thought' => "大家一定当我是傻逼了，想要伤害我（读心，以自我为中心）",'wrongkey' => "读心,以自我为中心",
    'feel' => "羞耻90%,愤怒90%",'action' => "1.躲避一他人交流。\n2.躲避以他人互动。",
    'wrongemotionkey' => "羞耻,愤怒",'newthought' => "1.你的想法可能是错误的，大家可能并没有这么想。2.有一部分跟你意见对立的人可能会这么想，
    但是大部分分都不会这么想，跟你意见对立的人可能会，但是也不会怎么样。3.你以后可能会有所改观，不会一直这样，不会一只这样抑郁下去的。4.好多人都康复了，你也可以做到，可以做到不吃药就能好。5.你也有好多的朋友，也有关心你爱你的人，并不是所有人离你而去了。",
    'newfeelaction' => "羞耻(30%),愤怒(30%)",'datetime' => "2017-10-24 10:42:34");
    $manager->addData("ABC",$arrayName);
  }

    //添加数据
    $arrayName = array(
      'things' => "我是最后一条",'sence' => "在办公室上班",
      'thought' => "大家一定当我是傻逼了，想要伤害我（读心，以自我为中心）",'wrongkey' => "读心,以自我为中心",
      'feel' => "羞耻90%,愤怒90%",'action' => "1.躲避一他人交流。\n2.躲避以他人互动。",
      'wrongemotionkey' => "羞耻,愤怒",'newthought' => "1.你的想法可能是错误的，大家可能并没有这么想。2.有一部分跟你意见对立的人可能会这么想，
      但是大部分分都不会这么想，跟你意见对立的人可能会，但是也不会怎么样。3.你以后可能会有所改观，不会一直这样，不会一只这样抑郁下去的。4.好多人都康复了，你也可以做到，可以做到不吃药就能好。5.你也有好多的朋友，也有关心你爱你的人，并不是所有人离你而去了。",
      'newfeelaction' => "羞耻(30%),愤怒(30%)",'datetime' => "2017-10-24 10:42:34");
      $manager->addData("ABC",$arrayName);

  //查询数据
  $dataModelArray = $manager->selectFromTabel("ABC","things,sence,thought,wrongkey,feel,action,wrongemotionkey,newthought,newfeelaction,datetime","","abc");

  //数组
  $array = array();

  //总条数
  $total = 0;
  foreach ($dataModelArray as $value) {

    $total ++;

    $singelArray = array('things' => $value->things, 'sence' => $value->sence, 'thought' => $value->thought,
    'wrongkey' => $value->wrongkey, 'feel' => $value->feel, 'action' => $value->action,'newthought' => $value->newthought,
    'wrongemotionkey' => $value->wrongemotionkey,'newfeelaction' => $value->newfeelaction,'datetime' => $value->datetime);
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
  'feel' => "varchar(1000)",'progress' => "varchar(2000)",
  'datetime'=>'datetime');
  $manager->createTable("EXP",$arrayName);

  //添加数据
  $arrayName = array(
  'things' => "第一实验",'sence' => "888",
  'feel' => "111",'progress' => "222",
  'datetime' => "2017-10-04 10:42:34");
  $manager->addData("EXP",$arrayName);

  //查询数据
  $dataModelArray = $manager->selectFromTabel("EXP","things,sence,feel,progress,datetime","","abc");

  //数组
  $array = array();

  //总条数
  $total = 0;
  foreach ($dataModelArray as $value) {

    $total ++;

    $singelArray = array('things' => $value->things, 'sence' => $value->sence, 'feel' => $value->feel,
    'progress' => $value->progress,'datetime' => $value->datetime);
    Array_push($array,$singelArray);
  }

  $array['total'] = $total;
  echo "<br />";
  echo json_encode($array);

  ////////////////创建我的fat表，并插入数据
  //创建新的表
  $arrayName = array(
  'id' => "int NOT NULL AUTO_INCREMENT PRIMARY KEY",
  'sence' => "varchar(200)",'things' => "varchar(3000)",
  'faith' => "varchar(100)",'datetime'=>'datetime');
  $manager->createTable("FAT",$arrayName);

  //添加数据
  $arrayName = array(
  'things' => "第一相信",'sence' => "888",
  'faith' => "我想哈哈哈",'datetime' => "2017-10-04 10:42:34");
  $manager->addData("FAT",$arrayName);

  //查询数据
  $dataModelArray = $manager->selectFromTabel("FAT","things,sence,faith,datetime","","abc");

  //数组
  $array = array();

  //总条数
  $total = 0;
  foreach ($dataModelArray as $value) {

    $total ++;

    $singelArray = array('things' => $value->things, 'sence' => $value->sence,'faith' => $value->faith,'datetime' => $value->datetime);
    Array_push($array,$singelArray);
  }

  $array['total'] = $total;
  echo "<br />";
  echo json_encode($array);
 ?>
