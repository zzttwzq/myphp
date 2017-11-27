<?php

require 'classes/dataBaseControlManager.php';


$manager = new dbManager("ME1");

// $manager->createDataBase("ME1");
// echo "<br>";
//
// 创建新的表
// $arrayName = array('id' => "int NOT NULL AUTO_INCREMENT PRIMARY KEY",'name' => "varchar(15)",'username' => "varchar(15) unique",'password' => "varchar(15)",'age' => "int",
// 'mobile' => "varchar(11)",'cent' => "int",'token' => "varchar(40)",'lastlogin' => "varchar(20)",'level' => "int",);
// $manager->createTable("LOGIN",$arrayName);
// echo "<br>";
//
// $manager->deleteTable("LOGIN");
// echo "<br>";
//
// $manager->changeDataBase("ME");
// echo "<br>";
//
// $manager->deleteDatabase("ME1");
// echo "<br>";
//
// 添加数据
// $arrayName = array('username' => "4",'name' => "吴志强1",'password' => "111111",'age' => 27,'mobile' => "13023628319",'cent' => 100,
// 'token' => "qwertyuiopasdfghjklzxcvbnmkl",'lastlogin' => "2017-9-14 7:41",'level' => 1,);
// $manager->addData("LOGIN",$arrayName,"where id = 1");
// echo "<br>";
// //
// var_dump($manager->selectFromTabel("LOGIN","ids","","login"));
// // echo "<br>";
//
// echo $manager->getLastID("LOGIN");
// echo "<br>";
 ?>
