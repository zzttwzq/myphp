<?php

  include_once 'classes/dataBaseControlManager.php';

  $manager = new dbManager('MYPLAN');

  $result = $manager->selectFromTabel('sys_users','username','','usr');

  // //数组
  $array = array('data' => $result);
  //
  // //总条数
  // $total = 0;
  // foreach ($result as $value) {
  //
  //   $total ++;
  //
  //   $singelArray = array('username' => $value->username);
  //   Array_push($array,$singelArray);
  // }
  //
  // $array['total'] = $total;
  // echo "<br />";
  echo json_encode($array);
?>
