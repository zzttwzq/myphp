<?php

  class LoginModel{

    var $id;
    var $name;
    var $mobile;
    var $age;
    var $cent;
    var $token;
    var $lastlogin;
    var $level;
    var $yanzhen;
    var $password;
  }

  class TaskModel{

    var $id;
    var $pic;
    var $title;
    var $text;
    var $seetime;
    var $datetime;
    var $type;
  }

  function createModel($type){

    if ($type == "login") {

      return new LoginModel();
    }else if ($type == "task") {

      return new TaskModel();
    }
  }

  function setModel($type,$model,$row){

    if ($type == "login") {

      $model->name = $row["NAME"];
      $model->id = $row["ID"];
      $model->mobile = $row["MOBILE"];
      $model->age = $row["AGE"];
      $model->cent = $row["CENT"];
      $model->token = $row["TOKEN"];
      $model->lastlogin = $row["LASTLOGIN"];
      $model->level = $row["LEVEL"];
      $model->yanzhen = $row["YANZHEN"];
      $model->password = $row["PASSWORD"];
    }else if ($type == "task") {

      $model->type = $row["TYPE"];
      $model->pic = $row["PIC"];
      $model->id = $row["ID"];
      $model->title = $row["TITLE"];
      $model->text = $row["TEXT"];
      $model->seetime = $row["SEETIME"];
      $model->datetime = $row["DATETIME"];
    }
  }

 ?>
