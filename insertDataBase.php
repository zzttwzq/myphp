<!DOCTYPE html>
<html lang="en">
<head>
  <title>重置数据</title>
</head>
<body>
  
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

    $singelArray = array('id' => $value->id,'name' => $value->name, 'age' => $value->age, 'password' => $value->password,
    'mobile' => $value->mobile, 'cent' => $value->cent, 'token' => $value->token);
    Array_push($array,$singelArray);
  }

  $array['total'] = $total;
  echo "<br />";
  echo json_encode($array);

  ////////////////创建我的日程表，并插入数据
  //创建新的表
  $arrayName = array('id' => "int NOT NULL AUTO_INCREMENT PRIMARY KEY",'title' => "varchar(100)",'brief' => "varchar(100)",'pic' => "varchar(40)",'text' => "varchar(20000)",
  'seetime' => "int",'datetime' => "datetime",'class'=>'varchar(10)','tag'=>'varchar(50)','statue'=>'varchar(10)','userid'=>'int');
  $manager->createTable("TASK",$arrayName);

  //添加数据
  $arrayName = array('title' => "第一件事情",'brief' => "做的第一件是，好似拉萨的发送空间的法律思考的风景阿斯顿发阿斯顿啊爽的",'pic' => "http://localhost/myweb/imgs/ios.png",'text' => "我哈哈哈哈哈哈当发生的发低烧",'seetime' => 1,
  'datetime' => "2017-10-20 20:12:12",'class' => "编程",'tag' => "iOS,socket,http",'statue' => "已发布",'userid' => 1,'seetime' => 10);
  echo $manager->addData("TASK",$arrayName);

  //查询数据
  $dataModelArray = $manager->selectFromTabel("TASK","id,title,pic,text,seetime,datetime,class,tag,statue,userid,brief","","task");

  //数组
  $array = array();

  //总条数
  $total = 0;
  foreach ($dataModelArray as $value) {

    $total ++;

    $singelArray = array('id' => $value->id, 'pic' => $value->pic, 'title' => $value->title,
    'text' => $value->text, 'seetime' => $value->seetime, 'datetime' => $value->datetime,'class' => $value->class,
    'tag' => $value->tag,'statue' => $value->statue,'userid' => $value->userid,'brief' => $value->brief);
    Array_push($array,$singelArray);
  }

  $array['total'] = $total;
  echo "<br />";
  echo json_encode($array);


  ////////////////创建分类标签的表
  //创建新的表
  $arrayName = array('id' => "int NOT NULL AUTO_INCREMENT PRIMARY KEY",'name' => "varchar(15) unique",'type' => "varchar(15)",);
  $manager->createTable("TAG",$arrayName);

  //添加数据
  $arrayName = array('name' => "编程",'type' => "class");
  $manager->addData("TAG",$arrayName);

  //添加数据
  $arrayName = array('name' => "ios",'type' => "tag");
  $manager->addData("TAG",$arrayName);

  //查询数据
  $dataModelArray = $manager->selectFromTabel("TAG","id,name,type","","tag");
  //数组
  $array = array();
  //总条数
  $total = 0;
  foreach ($dataModelArray as $value) {

    $total ++;

    $singelArray = array('id' => $value->id,'name' => $value->name, 'type' => $value->type,);
    Array_push($array,$singelArray);
  }

  $array['total'] = $total;
  echo "<br />";
  echo json_encode($array);
 ?>
</body>
</html>