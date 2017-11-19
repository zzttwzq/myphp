<?php

//获取tcp协议号码。
$tcp = getprotobyname("tcp");
// 建立server端socket ，创建并返回一个套接字，也称作一个通讯节点。一个典型的网络连接由 2 个套接字构成，一个运行在客户端，另一个运行在服务器端。
$socket = socket_create(AF_INET, SOCK_STREAM, $tcp);
//绑定要监听的ip和端口，这里绑定的ip一定要写局域网ip，写成127.0.0.1客户端将无法与服务端建议连接。
socket_bind($socket, '127.0.0.1', 1935);
 //监听端口
socket_listen($socket);

//初始化一个数据，和客户端通信
$buffer = "服务端返回的数据!!!";
while (true) {
    // 接受客户端请求过来的一个socket连接
    // $connection = socket_accept($socket);
    // if(!$connection){
    //     echo "connect faild";
    // }else{
    //         echo "Socket connected\n";
    //         // 向客户端传递一个信息数据
    //         if ($buffer != "") {
    //             echo "send data to client\n";
    //             socket_write($connection, $buffer . "\n");
    //             echo "Wrote to socket\n";
    //         } else {
    //             echo "no data in the buffer\n" ;
    //         }
    //         // 从客户端获取得的数据
    //         while ($data = @socket_read($connection, 1024, PHP_NORMAL_READ)) {
    //                 printf("Buffer: " . $data . "\n");
    //            //取得信息给客户端一个反馈, Thank you client, you data is  Received success发给客户端的回应信息。
    //                 socket_write($connection, "Thank you client, you data is  Received success\n");
    //         }
    // }


    // 函数 socket_recv() 从 socket 中接受长度为 len 字节的数据，并保存在 $buffer 中。
    $bytes = @socket_recv($socket, $buffer, 2048, 0);

    if ($bytes < 9) {
        // 当客户端忽然中断时，服务器会接收到一个 8 字节长度的消息（由于其数据帧机制，8字节的消息我们认为它是客户端异常中断消息），服务器处理下线逻辑，并将其封装为消息广播出去
        $recv_msg = $this->disconnect($socket);
    } else {
        // 如果此客户端还未握手，执行握手逻辑
        if (!$this->sockets[(int)$socket]['handshake']) {
            self::handShake($socket, $buffer);
            continue;
        } else {
            $recv_msg = self::parse($buffer);
        }
    }

    // //关闭 socket
    // socket_close($connection);
    // echo("Closed the socket\n");
  }

 ?>
