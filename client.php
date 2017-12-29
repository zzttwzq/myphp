<?php

  //创建socket
  $socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
  //连接socket
  $connection = socket_connect($socket, 'localhost',1337);

  //读取指定长度的数据
  while($buffer = socket_read($socket, 1024,PHP_BINARY_READ)){

    if($buffer == "NO DATA"){
      printf("NO DATA");
      break;
    }else{
      //输出buffer
      printf("Buffer Data: " . $buffer . "");
    }
  }

  printf("Writing to Socket");

  //写数据到socket缓存
  if(!socket_write($socket, "SOME DATA\r\n"))
  printf("Write failed");

 ?>
