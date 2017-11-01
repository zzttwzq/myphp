<?php

  include 'modelManager.php';

  class mysqlConnectManager {

    var $session;         //连接句柄
    var $mysqlConnectSate;//连接状态

    function __construct(){

      $this->session = mysql_connect("127.0.0.1","root","1111");

      if (!$this->session){

        die('Could-not-connect: ' . mysql_error());
      }else {

        $this->mysqlConnectSate = "已连接";
      }
    }

    function connectToDataBase ($dataBase){

      mysql_select_db($dataBase, $this->session);
    }

    function deleteDatabase($dataBaseName){

      if (mysql_query("DROP DATABASE ".$dataBaseName,$this->session)){

        echo "<br />";
        echo "1.$dataBaseName deleted";
      }
      else{

        echo "<br />";
        echo "Error deleted $dataBaseName: " . mysql_error();
      }

      mysql_select_db($dataBaseName, $this->session);
    }

    function createDataBase($dataBaseName){

      $sql = "CREATE DATABASE ".$dataBaseName."  CHARACTER SET utf8"."  COLLATE utf8_general_ci";

      if (mysql_query($sql,$this->session)){

        echo "<br />";
        echo "2.$dataBaseName created";
      }
      else{

        echo "<br />";
        echo "Error creating $dataBaseName: " . mysql_error();
      }

      mysql_select_db($dataBaseName, $this->session);
    }

    function createTable($tableName,$data){

      $sql = "CREATE TABLE ".$tableName." (";
      foreach ($data as $key => $value) {

        $sql = $sql.$key." ".$value.", ";
      }
      $sql = substr($sql,0,strlen($sql)-2);
      $sql = $sql.") ENGINE=InnoDB DEFAULT CHARSET='utf8'";

      if (mysql_query($sql,$this->session)){

        echo "<br />";
        echo "3.$tableName created";
      }
      else{

        echo "<br />";
        echo "Error creating $tableName: " . mysql_error();
      }
    }

    function addData($tableName,$data){

      //设置字符集
      mysql_query('SET NAMES utf8');

      $dataVaule = ") VALUES (";
      $sql = "INSERT INTO $tableName (";
      foreach ($data as $key => $value) {

        $sql = $sql.$key.", ";
        $dataVaule = $dataVaule." '$value', ";
      }
      $sql = substr($sql,0,strlen($sql)-2);
      $dataVaule = substr($dataVaule,0,strlen($dataVaule)-2);
      $sql = $sql.$dataVaule.");";

      // echo $sql;

      if (mysql_query($sql,$this->session)){
        
        return -1;
      }
      else{

        return "Error 添加失败！ " . mysql_error()." sql:".$sql;
      }
    }

    function updateData($tableName,$data,$filter){
      
      //设置字符集
      mysql_query('SET NAMES utf8');
  
      $sql = "UPDATE $tableName SET ";
      foreach ($data as $key => $value) {

        $sql = " $sql $key = '$value', ";
      }
      $sql = substr($sql,0,strlen($sql)-2);
      $sql = $sql." $filter;";

      // echo $sql;

      if (mysql_query($sql,$this->session)){

        return -1;
      }
      else{

        return "Error 修改失败！ " . mysql_error()." sql:".$sql;
      }
    }

    function deleteData($tableName,$filter){
      
      //设置字符集
      mysql_query('SET NAMES utf8');
      $sql = "DELETE FROM $tableName $filter";

      // echo $sql;

      if (mysql_query($sql,$this->session)){

        return -1;
      }
      else{

        return "Error 删除失败！ " . mysql_error()." sql:".$sql;
      }
    }

    function selectFromTabel ($tableName,$fields,$condition,$modelName){
      //设置字符集
      mysql_query('SET NAMES utf8');

      //转换成sql语句并转大写
      $sql = "SELECT $fields FROM $tableName";
      $sql = strtoupper($sql);
      $sql = $sql." ".$condition;

      //获取结果集
      $result = mysql_query($sql);

      //判断是否有结果！
      if ($result) {

        //创建数组
        $listArray = array();
        while($row = mysql_fetch_array($result))
        {
          //从工厂创建模型
          $model = createModel($modelName);

          //从工厂方法中给模型赋值
          setModel($modelName,$model,$row);

          Array_push($listArray,$model);
        }

        return $listArray;
      }else{

        $singelArray = array('result' => 0, 'msg' => "查询失败！！！". mysql_error()." sql>>".$sql);
        echo json_encode($singelArray);
      }
    }
    
    function getlastNum($tablename){

      $result = mysql_query("select max(id) from $tablename"); 
      //判断是否有结果！
      if ($result) {
  
        //创建数组
        $listArray = array();
        while($row = mysql_fetch_array($result)){
          
          return $row["max(id)"];
        }

      }else{

        return 0;
      }
    }
  }
 ?>
