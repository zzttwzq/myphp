<?php

class dbManager
{
  var $dsn;//数据源
  var $username;//用户名
  var $password;//密码
  var $pdo;//连接的pdo对象

  /**
   * 初始化方法
   */
  function __construct($dbname){

    if ($dbname == "") {

      $this->dsn = "mysql:host=127.0.0.1";
    }else{

      $this->dsn = "mysql:host=127.0.0.1;dbname=$dbname";
    }
    $this->username = "root";
    $this->password = "1111";
    $this->pdo = new PDO($this->dsn,$this->username,$this->password);
    $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);//设置错误模式

    //设置字符集
    echo $this->pdo->exec('SET NAMES utf8');
  }
}

$sql = "CREATE DATABASE wzq CHARACTER SET utf8"."  COLLATE utf8_general_ci";
echo ">>>".$pdo->exec($sql);
?>
