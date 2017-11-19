<?php

  error_reporting(E_ALL);
  set_time_limit(0);
  echo "<h2>TCP/IP Connection</h2>\n";
  $port = 1935;
  $ip = "127.0.0.1";
  /*
   +-------------------------------
   *    @socket连接整个过程
   +-------------------------------
   *    @socket_create
   *    @socket_connect
   *    @socket_write
   *    @socket_read
   *    @socket_close
   +--------------------------------
  */
  $socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
  // 第一个参数”AF_INET”用来指定域名;
  // 第二个参数”SOCK_STREM”告诉函数将创建一个什么类型的Socket(在这个例子中是TCP类型),UDP是SOCK_DGRAM

  if ($socket < 0) {
      echo "socket_create() failed: reason: " . socket_strerror($socket) . "\n";
  } else {
      echo "OK.\n";
  }
  echo "尝试连接 '$ip' 端口 '$port'...\n";

  $result = socket_connect($socket, $ip, $port);
  if ($result < 0) {
      echo "socket_connect() failed.\nReason: ($result) " . socket_strerror($result) . "\n";
  } else {
      echo "连接OK\n";
  }

  $in = "first blood\r\n";
  $out = '';

  $count = 0;
  do {

    $count ++;
    if ($count > 100000000) {
      $count = 0;

      if (!socket_write($socket, $in, strlen($in))) {

          echo "socket_write() failed: reason: " . socket_strerror($socket) . "\n";
      } else {

          echo "发送到服务器信息成功！\n";
      }
    }
  } while (true);

 ?>
