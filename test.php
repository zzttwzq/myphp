<?php
// error_reporting(E_ALL);
// set_time_limit(0);
// echo "<h2>TCP/IP Connection</h2>\n";
//
// $port = 2346;
// $ip = "120.78.131.83";
//
// /*
//  +-------------------------------
//  *    @socket连接整个过程
//  +-------------------------------
//  *    @socket_create
//  *    @socket_connect
//  *    @socket_write
//  *    @socket_read
//  *    @socket_close
//  +--------------------------------
//  */
//
// $socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
// if ($socket < 0) {
//     echo "socket_create() failed: reason: " . socket_strerror($socket) . "\n";
// }else {
//     echo "OK.\n";
// }
//
// echo "试图连接 '$ip' 端口 '$port'...\n";
// $result = socket_connect($socket, $ip, $port);
// if ($result < 0) {
//     echo "socket_connect() failed.\nReason: ($result) " . socket_strerror($result) . "\n";
// }else {
//     echo "连接OK\n";
// }
//
// $in = "Ho\r\n";
// $in .= "first blood\r\n";
// $out = '';
//
// if(!socket_write($socket, $in, strlen($in))) {
//     echo "socket_write() failed: reason: " . socket_strerror($socket) . "\n";
// }else {
//     echo "发送到服务器信息成功！\n";
//     echo "发送的内容为:<font color='red'>$in</font> <br>";
// }
//
// while($out = socket_read($socket, 8192)) {
//     echo "接收服务器回传信息成功！\n";
//     echo "接受的内容为:",$out;
// }
//
//
// echo "关闭SOCKET...\n";
// socket_close($socket);
// echo "关闭OK\n";



?>


<?php
//   if ((($_FILES["file"]["type"] == "image/gif")
//       || ($_FILES["file"]["type"] == "image/jpeg")
//       || ($_FILES["file"]["type"] == "image/pjpeg")
//       || ($_FILES["file"]["type"] == "image/png"))
//       && ($_FILES["file"]["size"] < 200000)){

//     if ($_FILES["file"]["error"] > 0){

//       echo "Return Code: " . $_FILES["file"]["error"] . "<br />";
//     }else{

//       echo "Upload: " . $_FILES["file"]["name"] . "<br />";
//       echo "Type: " . $_FILES["file"]["type"] . "<br />";
//       echo "Size: " . ($_FILES["file"]["size"] / 1024) . " Kb<br />";
//       echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br />";

//       if (file_exists("upload/" . $_FILES["file"]["name"])){

//         echo $_FILES["file"]["name"] . " already exists. ";
//       }else{

//         move_uploaded_file($_FILES["file"]["tmp_name"],
//         "upload/" . $_FILES["file"]["name"]);
//         echo "Stored in: " . "upload/" . $_FILES["file"]["name"];
//       }
//     }

//   }else{

//     echo $_FILES["file"]["size"];
//     echo "Invalid file";
//   }
// 

  
?>


