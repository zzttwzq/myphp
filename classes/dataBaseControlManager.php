<?php

  require 'lib.php';
  require 'newDataModel.php';

  /**
   * 数据库管理对象
   */
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

      echo "初始化中。。。";
      echo var_dump($this);

      //设置字符集
      echo $this->pdo->exec('SET NAMES utf8');
    }

    /**
     * 执行sql语句
     * $sql 要执行的语句
     * 返回 PDOException 表示遇到错误
     * 返回 int 返回受影响的行数
     */
    public function exec($sql){

      try {

        return $this->pdo->exec($sql);
      } catch (PDOException $e) {

        return $e;
      }
    }

    /**
     * 执行sql语句
     * $sql 要执行的语句
     * 返回 -1 表示遇到错误
     * 返回 pdostatement 返回pdostatement对象
     */
    public function query($sql){

      try {

        return array('result' => 1,'data' => $this->pdo->query($sql), );;
      } catch (PDOException $e) {

        return array('result' => 0,'msg' => $e, );;
      }
    }

    //====================数据库创建====================

    /**
     * 创建数据库
     * $dataBaseName 要创建的数据库名
     */
    public function createDataBase($dataBaseName){

      $sql = "CREATE DATABASE $dataBaseName CHARACTER SET utf8"."  COLLATE utf8_general_ci";

      $result = $this->exec($sql);
      if (gettype($result) == "integer"){

        //用json返回成功信息
        sendJson(1,"数据库：$dataBaseName 已经创建!",null);

        //使用当前的数据库
        $this->changeDataBase($dataBaseName);
      }else{

        //用json返回错误信息
        sendJson(0,$result->getMessage()." \n <br>sql>> $sql",null);
      }
    }

    /**
     * 切换数据库
     * $dataBaseName 要切换的数据库名
     */
    public function changeDataBase ($dataBaseName){

      $sql = "USE $dataBaseName";

      $result = $this->exec($sql);
      if (gettype($result) == "integer"){

        //用json返回成功信息
        sendJson(1,"数据库已经切换至：$dataBaseName!",null);
      }else{

        //用json返回错误信息
        sendJson(0,$result->getMessage()." \n <br>sql>> $sql",null);
      }
    }

    /**
     * 删除数据库
     * $dataBaseName 要删除的数据库名
     */
    public function deleteDatabase($dataBaseName){

      $sql = "DROP DATABASE $dataBaseName";

      $result = $this->exec($sql);
      if (gettype($result) == "integer"){

        //用json返回成功信息
        sendJson(1,"数据库：$dataBaseName 已经删除!",null);
      }else{

        //用json返回错误信息
        sendJson(0,$result->getMessage()." \n <br>sql>> $sql",null);
      }
    }

    //====================表格创建====================

    /**
     * 创建表格
     * $tableName 要创建的表格名
     * $data 创建的数据（带有键值对的数组）
     */
    public function createTable($tableName,$data){

      $sql = "CREATE TABLE $tableName (";
      foreach ($data as $key => $value) {

        $sql = $sql.$key." ".$value.", ";
      }
      $sql = substr($sql,0,strlen($sql)-2);
      $sql = $sql.") ENGINE=InnoDB DEFAULT CHARSET='utf8'";

      $result = $this->exec($sql);
      if (gettype($result) == "integer"){

        //用json返回成功信息
        sendJson(1,"表格：$tableName 创建成功!",null);
      }else{

        //用json返回错误信息
        sendJson(0,$result->getMessage()." \n <br>sql>> $sql",null);
      }
    }

    /**
     * 删除表格
     * $tableName 要删除的表格名
     */
    public function deleteTable($tableName){

      $sql = "DROP TABLE $tableName";

      $result = $this->exec($sql);
      if (gettype($result) == "integer"){

        //用json返回成功信息
        sendJson(1,"表格：$tableName 删除成功!",null);
      }else{

        //用json返回错误信息
        sendJson(0,$result->getMessage()." \n <br>sql>> $sql",null);
      }
    }

    //====================数据操作====================

    /**
     * 添加数据
     * $tableName 添加数据的表格名
     * $data 字段和值的数组
     * return 1:成功；string:错误信息
     */
    public function addData($tableName,$data){

      $dataVaule = ") VALUES (";
      $sql = "INSERT INTO $tableName (";
      foreach ($data as $key => $value) {

        $sql = $sql.$key.", ";
        $dataVaule = $dataVaule." '$value', ";
      }
      $sql = substr($sql,0,strlen($sql)-2);
      $dataVaule = substr($dataVaule,0,strlen($dataVaule)-2);
      $sql = $sql.$dataVaule.");";

      $result = $this->exec($sql);
      if (gettype($result) == "integer"){

        //用json返回成功信息
        return 1;
      }else{

        $msg = $result->getMessage();
        if (strpos($msg,"Duplicate")&&
            strpos($msg,"entry")) {//包含重复的字段

          $array = explode(":",$msg);
          $msg = $array[2];
        }

        //用json返回错误信息
        return $result;
      }
    }

    /**
     * 修改数据
     * $tableName 修改数据的表格名
     * $data 字段和值的数组
     * $filter 条件
     * return 1:成功；string:错误信息
     */
    function updateData($tableName,$data,$filter){

      $sql = "UPDATE $tableName SET ";
      foreach ($data as $key => $value) {

        $sql = " $sql $key = '$value', ";
      }
      $sql = substr($sql,0,strlen($sql)-2);
      $sql = "$sql $filter;";

      $result = $this->exec($sql);
      if (gettype($result) == "integer"){

        //用json返回成功信息
        return 1;
      }else{

        //用json返回错误信息
        return $result;
      }
    }

    /**
     * 删除数据
     * $tableName 删除数据的表格名
     * $filter 条件
     * return 1:成功；string:错误信息
     */
    function deleteData($tableName,$filter){

      $sql = "DELETE FROM $tableName $filter";

      $result = $this->exec($sql);
      if (gettype($result) == "integer"){

        //用json返回成功信息
        return 1;
      }else{

        //用json返回错误信息
        return $result;
      }
    }

    /**
     * 查找数据
     * $tableName 查找数据的表格名
     * $fields 字段
     * $condition 条件
     * return array:返回的数据；string:错误信息
     */
    function selectFromTabel($tableName,$fields,$condition,$modelName){

      //转换成sql语句并转大写
      $sql = "SELECT $fields FROM $tableName $condition";
      $sql = strtoupper($sql);

      // echo $sql;

      $listArray = array();
      $result = $this->query($sql);

      if ($result["result"] == 1){

        $data = $result["data"];
        //用json返回成功信息
        foreach ($data as $row) {

          //从工厂方法中给模型赋值,并放入到数组中去
          Array_push($listArray,getModel($modelName,$row));
        }

        return $listArray;
      }else{

        //用json返回错误信息
        return $result;
      }
    }

    /**
     * 返回最后增加的ID
     * return string:ID
     */
     function getLastID($tablename){

       $sql = "SELECT MAX(ID) FROM $tablename";
       foreach ($this->pdo->query($sql) as $row) {

           return $row['MAX(ID)'];
       }
     }
  }
?>
