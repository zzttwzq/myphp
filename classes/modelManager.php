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

  class ABCModel{

    var $id;
    var $things;
    var $sence;
    var $thought;
    var $wrongkey;
    var $feel;
    var $action;
    var $newthought;
    var $newfeelaction;
    var $datetime;
    var $process;
    var $faith;
  }

  function createModel($type){

    if ($type == "login") {

      return new LoginModel();
    }else if ($type == "task") {

      return new TaskModel();
    }else if ($type == "abc") {

      return new ABCModel();
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
    }else if ($type == "abc") {

      $model->things = $row["THINGS"];
      $model->sence = $row["SENCE"];
      $model->thought = $row["THOUGHT"];
      $model->wrongkey = $row["WRONGKEY"];
      $model->feel = $row["FEEL"];
      $model->action = $row["ACTION"];
      $model->newthought = $row["NEWTHOUGHT"];
      $model->newfeelaction = $row["NEWFEELACTION"];
      $model->datetime = $row["DATETIME"];
      $model->process = $row["PROCESS"];
      $model->faith = $row["FAITH"];
    }
  }

 ?>
