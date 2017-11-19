<?php

  $count = 0;
  do {

    $count ++;
    if ($count > 100000000) {
      $count = 0;

      echo "到100000000次了！！";
    }
  } while (true);

 ?>
