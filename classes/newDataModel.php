<?php

  /**
   * 登录模型
   */
  class UserModel{
    var $id;
    var $name;
    var $username;
    var $mobile;
    var $age;
    var $cent;
    var $token;
    var $lastlogin;
    var $level;
    var $yanzhen;
    var $password;
    var $usrimg;
  }

  /**
   * 博客列表模型
   */
  class BlogModel{
    var $id;
    var $title;
    var $brief;
    var $text;
    var $datetime;
    var $share;
    var $comment;
    var $star;
    var $tag;
    var $score;
    var $category;
  }

  /**
   * abc模型
   */
  class ABC_Model{
    var $id;
    var $things;
    var $sence;
    var $thought;
    var $wrongkey;
    var $feel;
    var $action;
    var $wrongemotionkey;
    var $newthought;
    var $newfeelaction;
    var $datetime;
    var $progress;
    var $faith;
    var $score;
  }

  /**
   * 我的项目列表
   */
  class ProjectModel{
    var $id;
    var $title;
    var $tag;
    var $lastItem;
    var $createTime;
    var $linkLearnID;
    var $listArray;
    var $img;
    var $progress;
  }

  /**
   * 创建模型
   * $type 模型类型
   * $row 数据集
   * return 返回创建的模型
   */
  function getModel($type,$row){

    if ($type == "project") {

      $model = new UserModel();
      $model->id = $row["ID"];
      $model->title = $row["TITLE"];
      $model->tag = $row["TAG"];
      $model->lastItem = $row["LASTITEM"];
      $model->createTime = $row["CREATETIME"];
      $model->linkLearnID = $row["LINKLEARNID"];
      $model->listArray = $row["LISTARRAY"];
      $model->img = $row["IMG"];
      $model->progress = $row["PROGRESS"];

      return $model;
    }
    else if ($type == "login") {

      $model = new UserModel();
      $model->username = $row["USERNAME"];
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
      $model->usrimg = $row["USRIMG"];

      return $model;
    }
    else if ($type == "task") {

      $model = new BlogModel();
      $model->id = $row["ID"];
      $model->img = $row["IMG"];
      $model->brief = $row["BRIEF"];
      $model->title = $row["TITLE"];
      $model->text = $row["TEXT"];
      $model->datetime = $row["DATETIME"];
      $model->share = $row["SHARE"];
      $model->comment = $row["COMMENT"];
      $model->star = $row["STAR"];
      $model->tag = $row["TAG"];
      $model->score = $row["SCORE"];
      $model->category = $row["CATEGORY"];

      return $model;
    }
    else if ($type == "abc") {

      $model = new ABC_Model();
      $model->id = $row["ID"];
      $model->things = $row["THINGS"];
      $model->sence = $row["SENCE"];
      $model->thought = $row["THOUGHT"];
      $model->wrongkey = $row["WRONGKEY"];
      $model->feel = $row["FEEL"];
      $model->action = $row["ACTION"];
      $model->wrongemotionkey = $row["WRONGEMOTIONKEY"];
      $model->newthought = $row["NEWTHOUGHT"];
      $model->newfeelaction = $row["NEWFEELACTION"];
      $model->datetime = $row["DATETIME"];
      $model->progress = $row["PROGRESS"];
      $model->faith = $row["FAITH"];
      $model->score = $row["SCORE"];

      return $model;
    }
  }
 ?>
