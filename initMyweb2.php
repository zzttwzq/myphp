<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="twitter:" content="">
  <title>重置我的博客第二版数据</title>
</head>
<body>

  <script type="text/javascript">

    alert("数据是否备份？");
    alert("数据是否备份？");
    alert("请确保数据是否备份，在执行！！！！！是否执行此操作？");
  </script>

<?php

  include_once "classes/dataBaseControlManager.php";

  $manager = new dbManager("");
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
  $arrayName = array('id' => "int NOT NULL AUTO_INCREMENT PRIMARY KEY",'title' => "varchar(100)",'brief' => "varchar(100)",'pic' => "varchar(100)",'text' => "varchar(20000)",
  'seetime' => "int",'datetime' => "datetime",'category'=>'varchar(10)','tag'=>'varchar(50)','statue'=>'varchar(10)','userid'=>'int','username'=>'varchar(10)',);
  $manager->createTable("TASK",$arrayName);

  //添加数据
  $arrayName = array('title' => "博客网站",'brief' => "博客网站",'pic' => "http://120.78.131.83/myweb2/imgs/angular.png",'text' => "博客网站可以用了",
  'datetime' => "2017-10-20 20:12:12",'category' => "编程",'tag' => "angular",'statue' => "已发布",'userid' => 1,'username' => "wu",'seetime' => 9);
  echo $manager->addData("TASK",$arrayName);

  //添加数据
  $arrayName = array('title' => "webpack+vue",'brief' => "好好学习，天天向上！",'pic' => "http://120.78.131.83/myweb2/imgs/vue.png",'text' => "正在学习。。。",
  'datetime' => "2017-10-20 20:12:12",'class' => "编程",'tag' => "vue",'statue' => "已发布",'userid' => 1,'username' => "wu",'seetime' => 1);
  echo $manager->addData("TASK",$arrayName);

  //查询数据
  $dataModelArray = $manager->selectFromTabel("TASK","id,title,pic,text,seetime,datetime,class,tag,statue,userid,username,brief","","task");

  //数组
  $array = array();

  //总条数
  $total = 0;
  foreach ($dataModelArray as $value) {

    $total ++;

    $singelArray = array('id' => $value->id, 'pic' => $value->pic, 'title' => $value->title,
    'text' => $value->text, 'seetime' => $value->seetime, 'datetime' => $value->datetime,'class' => $value->class,
    'tag' => $value->tag,'statue' => $value->statue,'userid' => $value->userid,'username' => $value->username,'brief' => $value->brief);
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
