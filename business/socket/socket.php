<?php

  //获取协议
  $commonProtocol = getprotobyname('tcp');
  //产生一个socket
  $socket = socket_create(AF_INET, SOCK_STREAM, $commonProtocol);
  //把socket绑定在一个IP地址和端口上
  socket_bind($socket, 'localhost',1337);
  //监听由指定socket的所有连接
  socket_listen($socket);
  //初始化buffer
  $buffer = "NO DATA";
  while(true){

    //接受一个socket连接
    $connection = socket_accept($socket);
    printf("Socket connected\r\n");

    //检测buffer
    if($buffer != ""){
      printf("Something is in the buffer...sending data...\r\n");
        //写数据到socket缓存
        socket_write($connection, $buffer."\r\n");
        printf("Wrote to socket\r\n");
      }else{
        printf("No Data in the buffer\r\n");
      }

      //读取指定长度的数据
      while($data = socket_read($connection, 1024,PHP_NORMAL_READ)){
      $buffer = $data;

      //写数据到socket缓存
      socket_write($connection, $buffer."\r\n");
      printf("Buffer: " . $buffer . "\r\n");
    }

    //关闭一个socket资源
    socket_close($connection);
    printf("Closed the socket\r\n\r\n");
  }
 ?>
