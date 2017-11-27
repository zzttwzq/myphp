<?php

  /**
   * 发送json数据
   * $result 状态码 0:错误,1:表示成功,其他待定
   * $msg 提示信息
   * $data 返回的数据都放这里面(空的话就返回空字符串)
   */
  function sendJson($result,$msg,$data){

    //用json信息
    $resultArray = array('result' => $result, 'msg' => $msg, 'data' => $data);
    echo json_encode($resultArray);
  }

  /**
   * 添加‘’
   * $string 要添加的字符串
   * return 返回添加‘’的字符串
   */
  function paramAddControlWord($string)
  {
    // $str1 = "'|and|exec|execute|insert|select|delete|update|count|drop|*|%|chr|mid|master|truncate|".
    //             "char|declare|sitename|net user|xp_cmdshell|;|or|-|+|,|like'|and|exec|execute|insert|create|drop|".
    //             "table|from|grant|use|group_concat|column_name|".
    //             "information_schema.columns|table_schema|union|where|select|delete|update|order|by|count|*|".
    //             "chr|mid|master|truncate|char|declare|or|;|-|--|+|,|like|//|/|%|#";
    //
    // foreach ($variable as $key => $str1.explode("|",$str1)) {
    //
    //   echo "$variable<br>";
    // }
    return "'$string'";
  }

 ?>
