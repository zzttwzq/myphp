<?php

    include_once "classes/dataBaseControlManager.php";

    $total = array();
    
    //------------1
    $youhuiquan = array(
        "id"=>968.0,
        "cl_Code"=>"YH00000321000011",
        "cl_Type"=>"01",
        "cl_Name"=>"真眼睛吧",
        "cl_State"=>"01",
        "cl_BeginDate"=>1526693448,
        "cl_EndDate"=>1527004800,
        "cl_CreateDate"=>1526693448,
        "cl_UserType"=>null,
        "cl_Money"=>30,
        "cl_ResMoney"=>269,
        "cl_UseCondition"=>"只能用在箴言进步",
        "cl_UserId"=>1134,
        "cl_UserName"=>'15058196429',
        "cl_UseDate"=>0,
        "cl_CanUse"=>true,
        "cl_UnusableNote"=>null,
        "cl_CouId"=>32);
    Array_push($total,$youhuiquan);

    // $youhuiquan2 = array(
    //     "id"=>968,
    //     "cl_Code"=>"YH00000321000011",
    //     "cl_Type"=>"01",
    //     "cl_Name"=>"真眼睛吧",
    //     "cl_State"=>"02",
    //     "cl_BeginDate"=>1526693448,
    //     "cl_EndDate"=>1527004800,
    //     "cl_CreateDate"=>1526693448,
    //     "cl_UserType"=>null,
    //     "cl_Money"=>30,
    //     "cl_ResMoney"=>269,
    //     "cl_UseCondition"=>"只能用在箴言进步",
    //     "cl_UserId"=>1134,
    //     "cl_UserName"=>"15058196429",
    //     "cl_UseDate"=>0,
    //     "cl_CanUse"=>1,
    //     "cl_UnusableNote"=>null,
    //     "cl_CouId"=>32);
    // Array_push($total,$youhuiquan2);

    // $youhuiquan3 = array(
    //     "id"=>968,
    //     "cl_Code"=>"YH00000321000011",
    //     "cl_Type"=>"01",
    //     "cl_Name"=>"真眼睛吧",
    //     "cl_State"=>"03",
    //     "cl_BeginDate"=>1526693448,
    //     "cl_EndDate"=>1527004800,
    //     "cl_CreateDate"=>1526693448,
    //     "cl_UserType"=>null,
    //     "cl_Money"=>30,
    //     "cl_ResMoney"=>269,
    //     "cl_UseCondition"=>"只能用在箴言进步",
    //     "cl_UserId"=>1134,
    //     "cl_UserName"=>"15058196429",
    //     "cl_UseDate"=>0,
    //     "cl_CanUse"=>1,
    //     "cl_UnusableNote"=>null,
    //     "cl_CouId"=>32);
    // Array_push($total,$youhuiquan3);


    // //------------2
    // $折扣券1= array(
    //     "id"=>968,
    //     "cl_Code"=>"YH00000321000011",
    //     "cl_Type"=>"02",
    //     "cl_Name"=>"瑶浴折扣券",
    //     "cl_State"=>"01",
    //     "cl_BeginDate"=>1526693448,
    //     "cl_EndDate"=>1527004800,
    //     "cl_CreateDate"=>1526693448,
    //     "cl_UserType"=>null,
    //     "cl_Money"=>9,
    //     "cl_ResMoney"=>268.2,
    //     "cl_UseCondition"=>"阿斯顿发斯的",
    //     "cl_UserId"=>1509,
    //     "cl_UserName"=>"15058196429",
    //     "cl_UseDate"=>0,
    //     "cl_CanUse"=>1,
    //     "cl_UnusableNote"=>null,
    //     "cl_CouId"=>32);
    // Array_push($total,$折扣券1);

    // $折扣券2 = array(
    //     "id"=>968,
    //     "cl_Code"=>"YH00000321000011",
    //     "cl_Type"=>"02",
    //     "cl_Name"=>"瑶浴折扣券",
    //     "cl_State"=>"02",
    //     "cl_BeginDate"=>1526693448,
    //     "cl_EndDate"=>1527004800,
    //     "cl_CreateDate"=>1526693448,
    //     "cl_UserType"=>null,
    //     "cl_Money"=>9,
    //     "cl_ResMoney"=>268.2,
    //     "cl_UseCondition"=>"阿斯顿发斯的",
    //     "cl_UserId"=>1509,
    //     "cl_UserName"=>"15058196429",
    //     "cl_UseDate"=>0,
    //     "cl_CanUse"=>1,
    //     "cl_UnusableNote"=>null,
    //     "cl_CouId"=>32);
    // Array_push($total,$折扣券2);

    // $折扣券3 = array(
    //     "id"=>968,
    //     "cl_Code"=>"YH00000321000011",
    //     "cl_Type"=>"02",
    //     "cl_Name"=>"瑶浴折扣券",
    //     "cl_State"=>"03",
    //     "cl_BeginDate"=>1526693448,
    //     "cl_EndDate"=>1527004800,
    //     "cl_CreateDate"=>1526693448,
    //     "cl_UserType"=>null,
    //     "cl_Money"=>9,
    //     "cl_ResMoney"=>268.2,
    //     "cl_UseCondition"=>"阿斯顿发斯的",
    //     "cl_UserId"=>1509,
    //     "cl_UserName"=>"15058196429",
    //     "cl_UseDate"=>0,
    //     "cl_CanUse"=>1,
    //     "cl_UnusableNote"=>null,
    //     "cl_CouId"=>32);
    // Array_push($total,$折扣券3);


    // //------------3
    // $满减券 = array(
    //     "id"=>968,
    //     "cl_Code"=>"YH00000321000011",
    //     "cl_Type"=>"03",
    //     "cl_Name"=>"瑶浴满减券",
    //     "cl_State"=>"01",
    //     "cl_BeginDate"=>1526693448,
    //     "cl_EndDate"=>1527004800,
    //     "cl_CreateDate"=>1526693448,
    //     "cl_UserType"=>null,
    //     "cl_Money"=>9,
    //     "cl_ResMoney"=>268.2,
    //     "cl_UseCondition"=>"阿斯顿发斯的",
    //     "cl_UserId"=>1509,
    //     "cl_UserName"=>"15058196429",
    //     "cl_UseDate"=>0,
    //     "cl_CanUse"=>1,
    //     "cl_UnusableNote"=>null,
    //     "cl_CouId"=>32);
    // Array_push($total,$满减券);

    // $满减券1 = array(
    //     "id"=>968,
    //     "cl_Code"=>"YH00000321000011",
    //     "cl_Type"=>"03",
    //     "cl_Name"=>"瑶浴满减券",
    //     "cl_State"=>"02",
    //     "cl_BeginDate"=>1526693448,
    //     "cl_EndDate"=>1527004800,
    //     "cl_CreateDate"=>1526693448,
    //     "cl_UserType"=>null,
    //     "cl_Money"=>9,
    //     "cl_ResMoney"=>268.2,
    //     "cl_UseCondition"=>"阿斯顿发斯的",
    //     "cl_UserId"=>1509,
    //     "cl_UserName"=>"15058196429",
    //     "cl_UseDate"=>0,
    //     "cl_CanUse"=>1,
    //     "cl_UnusableNote"=>null,
    //     "cl_CouId"=>32);
    // Array_push($total,$满减券1);

    // $满减券2 = array(
    //     "id"=>968,
    //     "cl_Code"=>"YH00000321000011",
    //     "cl_Type"=>"03",
    //     "cl_Name"=>"瑶浴满减券",
    //     "cl_State"=>"03",
    //     "cl_BeginDate"=>1526693448,
    //     "cl_EndDate"=>1527004800,
    //     "cl_CreateDate"=>1526693448,
    //     "cl_UserType"=>null,
    //     "cl_Money"=>9,
    //     "cl_ResMoney"=>268.2,
    //     "cl_UseCondition"=>"阿斯顿发斯的",
    //     "cl_UserId"=>1509,
    //     "cl_UserName"=>"15058196429",
    //     "cl_UseDate"=>0,
    //     "cl_CanUse"=>1,
    //     "cl_UnusableNote"=>null,
    //     "cl_CouId"=>32);
    // Array_push($total,$满减券2);


    //------------4
    $兑换券 = array(
        "id"=>968,
        "cl_Code"=>"YH00000321000011",
        "cl_Type"=>"04",
        "cl_Name"=>"瑶浴兑换券",
        "cl_State"=>"01",
        "cl_BeginDate"=>1526693448,
        "cl_EndDate"=>1527004800,
        "cl_CreateDate"=>1526693448,
        "cl_UserType"=>null,
        "cl_Money"=>9,
        "cl_ResMoney"=>268.2,
        "cl_UseCondition"=>"阿斯顿发斯的",
        "cl_UserId"=>1509,
        "cl_UserName"=>"15058196429",
        "cl_UseDate"=>0,
        "cl_CanUse"=>1,
        "cl_UnusableNote"=>null,
        "cl_CouId"=>32);
    Array_push($total,$兑换券);

    // $兑换券1 = array(
    //     "id"=>968,
    //     "cl_Code"=>"YH00000321000011",
    //     "cl_Type"=>"04",
    //     "cl_Name"=>"瑶浴兑换券",
    //     "cl_State"=>"02",
    //     "cl_BeginDate"=>1526693448,
    //     "cl_EndDate"=>1527004800,
    //     "cl_CreateDate"=>1526693448,
    //     "cl_UserType"=>null,
    //     "cl_Money"=>9,
    //     "cl_ResMoney"=>268.2,
    //     "cl_UseCondition"=>"阿斯顿发斯的",
    //     "cl_UserId"=>1509,
    //     "cl_UserName"=>"15058196429",
    //     "cl_UseDate"=>0,
    //     "cl_CanUse"=>1,
    //     "cl_UnusableNote"=>null,
    //     "cl_CouId"=>32);
    // Array_push($total,$兑换券1);

    // $兑换券2 = array(
    //     "id"=>968,
    //     "cl_Code"=>"YH00000321000011",
    //     "cl_Type"=>"04",
    //     "cl_Name"=>"瑶浴兑换券",
    //     "cl_State"=>"03",
    //     "cl_BeginDate"=>1526693448,
    //     "cl_EndDate"=>1527004800,
    //     "cl_CreateDate"=>1526693448,
    //     "cl_UserType"=>null,
    //     "cl_Money"=>9,
    //     "cl_ResMoney"=>268.2,
    //     "cl_UseCondition"=>"阿斯顿发斯的",
    //     "cl_UserId"=>1509,
    //     "cl_UserName"=>"15058196429",
    //     "cl_UseDate"=>0,
    //     "cl_CanUse"=>1,
    //     "cl_UnusableNote"=>null,
    //     "cl_CouId"=>32);
    // Array_push($total,$兑换券2);


    // //------------5
    // $提货券 = array(
    //     "id"=>968,
    //     "cl_Code"=>"YH00000321000011",
    //     "cl_Type"=>"05",
    //     "cl_Name"=>"瑶浴提货券",
    //     "cl_State"=>"01",
    //     "cl_BeginDate"=>1526693448,
    //     "cl_EndDate"=>1527004800,
    //     "cl_CreateDate"=>1526693448,
    //     "cl_UserType"=>null,
    //     "cl_Money"=>9,
    //     "cl_ResMoney"=>268.2,
    //     "cl_UseCondition"=>"阿斯顿发斯的",
    //     "cl_UserId"=>1509,
    //     "cl_UserName"=>"15058196429",
    //     "cl_UseDate"=>0,
    //     "cl_CanUse"=>1,
    //     "cl_UnusableNote"=>null,
    //     "cl_CouId"=>32);
    // Array_push($total,$提货券);

    // $提货券1 = array(
    //     "id"=>968,
    //     "cl_Code"=>"YH00000321000011",
    //     "cl_Type"=>"05",
    //     "cl_Name"=>"瑶浴提货券",
    //     "cl_State"=>"02",
    //     "cl_BeginDate"=>1526693448,
    //     "cl_EndDate"=>1527004800,
    //     "cl_CreateDate"=>1526693448,
    //     "cl_UserType"=>null,
    //     "cl_Money"=>9,
    //     "cl_ResMoney"=>268.2,
    //     "cl_UseCondition"=>"阿斯顿发斯的",
    //     "cl_UserId"=>1509,
    //     "cl_UserName"=>"15058196429",
    //     "cl_UseDate"=>0,
    //     "cl_CanUse"=>1,
    //     "cl_UnusableNote"=>null,
    //     "cl_CouId"=>32);
    // Array_push($total,$提货券1);

    // $提货券2 = array(
    //     "id"=>968,
    //     "cl_Code"=>"YH00000321000011",
    //     "cl_Type"=>"05",
    //     "cl_Name"=>"瑶浴满减券",
    //     "cl_State"=>"03",
    //     "cl_BeginDate"=>1526693448,
    //     "cl_EndDate"=>1527004800,
    //     "cl_CreateDate"=>1526693448,
    //     "cl_UserType"=>null,
    //     "cl_Money"=>9,
    //     "cl_ResMoney"=>268.2,
    //     "cl_UseCondition"=>"阿斯顿发斯的",
    //     "cl_UserId"=>1509,
    //     "cl_UserName"=>"15058196429",
    //     "cl_UseDate"=>0,
    //     "cl_CanUse"=>1,
    //     "cl_UnusableNote"=>null,
    //     "cl_CouId"=>32);
    // Array_push($total,$提货券2);


    // //------------6
    // $抵扣券 = array(
    //     "id"=>968,
    //     "cl_Code"=>"YH00000321000011",
    //     "cl_Type"=>"03",
    //     "cl_Name"=>"瑶浴满减券",
    //     "cl_State"=>"03",
    //     "cl_BeginDate"=>1526693448,
    //     "cl_EndDate"=>1527004800,
    //     "cl_CreateDate"=>1526693448,
    //     "cl_UserType"=>null,
    //     "cl_Money"=>9,
    //     "cl_ResMoney"=>268.2,
    //     "cl_UseCondition"=>"阿斯顿发斯的",
    //     "cl_UserId"=>1509,
    //     "cl_UserName"=>"15058196429",
    //     "cl_UseDate"=>0,
    //     "cl_CanUse"=>1,
    //     "cl_UnusableNote"=>null,
    //     "cl_CouId"=>32);
    // Array_push($total,$抵扣券);

    // $抵扣券1 = array(
    //     "id"=>968,
    //     "cl_Code"=>"YH00000321000011",
    //     "cl_Type"=>"03",
    //     "cl_Name"=>"瑶浴满减券",
    //     "cl_State"=>"03",
    //     "cl_BeginDate"=>1526693448,
    //     "cl_EndDate"=>1527004800,
    //     "cl_CreateDate"=>1526693448,
    //     "cl_UserType"=>null,
    //     "cl_Money"=>9,
    //     "cl_ResMoney"=>268.2,
    //     "cl_UseCondition"=>"阿斯顿发斯的",
    //     "cl_UserId"=>1509,
    //     "cl_UserName"=>"15058196429",
    //     "cl_UseDate"=>0,
    //     "cl_CanUse"=>1,
    //     "cl_UnusableNote"=>null,
    //     "cl_CouId"=>32);
    // Array_push($total,$抵扣券1);

    // $抵扣券2 = array(
    //     "id"=>968,
    //     "cl_Code"=>"YH00000321000011",
    //     "cl_Type"=>"03",
    //     "cl_Name"=>"瑶浴满减券",
    //     "cl_State"=>"03",
    //     "cl_BeginDate"=>1526693448,
    //     "cl_EndDate"=>1527004800,
    //     "cl_CreateDate"=>1526693448,
    //     "cl_UserType"=>null,
    //     "cl_Money"=>9,
    //     "cl_ResMoney"=>268.2,
    //     "cl_UseCondition"=>"阿斯顿发斯的",
    //     "cl_UserId"=>1509,
    //     "cl_UserName"=>"15058196429",
    //     "cl_UseDate"=>0,
    //     "cl_CanUse"=>1,
    //     "cl_UnusableNote"=>null,
    //     "cl_CouId"=>32);
    // Array_push($total,$抵扣券2);


    // //------------7
    // $体验券 = array(
    //     "id"=>968,
    //     "cl_Code"=>"YH00000321000011",
    //     "cl_Type"=>"07",
    //     "cl_Name"=>"瑶浴体验券",
    //     "cl_State"=>"01",
    //     "cl_BeginDate"=>1526693448,
    //     "cl_EndDate"=>1527004800,
    //     "cl_CreateDate"=>1526693448,
    //     "cl_UserType"=>null,
    //     "cl_Money"=>9,
    //     "cl_ResMoney"=>268.2,
    //     "cl_UseCondition"=>"阿斯顿发斯的",
    //     "cl_UserId"=>1509,
    //     "cl_UserName"=>"15058196429",
    //     "cl_UseDate"=>0,
    //     "cl_CanUse"=>1,
    //     "cl_UnusableNote"=>null,
    //     "cl_CouId"=>32);
    // Array_push($total,$体验券);

    // $体验券1 = array(
    //     "id"=>968,
    //     "cl_Code"=>"YH00000321000011",
    //     "cl_Type"=>"07",
    //     "cl_Name"=>"瑶浴体验券",
    //     "cl_State"=>"02",
    //     "cl_BeginDate"=>1526693448,
    //     "cl_EndDate"=>1527004800,
    //     "cl_CreateDate"=>1526693448,
    //     "cl_UserType"=>null,
    //     "cl_Money"=>9,
    //     "cl_ResMoney"=>268.2,
    //     "cl_UseCondition"=>"阿斯顿发斯的",
    //     "cl_UserId"=>1509,
    //     "cl_UserName"=>"15058196429",
    //     "cl_UseDate"=>0,
    //     "cl_CanUse"=>1,
    //     "cl_UnusableNote"=>null,
    //     "cl_CouId"=>32);
    // Array_push($total,$体验券1);

    // $体验券2 = array(
    //     "id"=>968,
    //     "cl_Code"=>"YH00000321000011",
    //     "cl_Type"=>"07",
    //     "cl_Name"=>"瑶浴体验券",
    //     "cl_State"=>"03",
    //     "cl_BeginDate"=>1526693448,
    //     "cl_EndDate"=>1527004800,
    //     "cl_CreateDate"=>1526693448,
    //     "cl_UserType"=>null,
    //     "cl_Money"=>9,
    //     "cl_ResMoney"=>268.2,
    //     "cl_UseCondition"=>"阿斯顿发斯的",
    //     "cl_UserId"=>1509,
    //     "cl_UserName"=>"15058196429",
    //     "cl_UseDate"=>0,
    //     "cl_CanUse"=>1,
    //     "cl_UnusableNote"=>null,
    //     "cl_CouId"=>32);
    // Array_push($total,$体验券2);

    //==================
    // $youhuiquan4 = array(
    //     "id"=>968,
    //     "cl_Code"=>"YH00000321000011",
    //     "cl_Type"=>"02",
    //     "cl_Name"=>"代金券",
    //     "cl_State"=>"01",
    //     "cl_BeginDate"=>1526693448,
    //     "cl_EndDate"=>1527004800,
    //     "cl_CreateDate"=>1526693448,
    //     "cl_UserType"=>null,
    //     "cl_Money"=>30,
    //     "cl_ResMoney"=>269,
    //     "cl_UseCondition"=>"只能用在箴言进步",
    //     "cl_UserId"=>1134,
    //     "cl_UserName"=>"15058196429",
    //     "cl_UseDate"=>0,
    //     "cl_CanUse"=>0,
    //     "cl_UnusableNote"=>"未到活动时间",
    //     "cl_CouId"=>32);
    // Array_push($total,$youhuiquan4);

    // $折扣券4 = array(
    //     "id"=>968,
    //     "cl_Code"=>"YH00000321000011",
    //     "cl_Type"=>"01",
    //     "cl_Name"=>"瑶浴折扣券",
    //     "cl_State"=>"01",
    //     "cl_BeginDate"=>1526693448,
    //     "cl_EndDate"=>1527004800,
    //     "cl_CreateDate"=>1526693448,
    //     "cl_UserType"=>null,
    //     "cl_Money"=>9,
    //     "cl_ResMoney"=>268.2,
    //     "cl_UseCondition"=>"阿斯顿发斯的",
    //     "cl_UserId"=>1509,
    //     "cl_UserName"=>"15058196429",
    //     "cl_UseDate"=>0,
    //     "cl_CanUse"=>0,
    //     "cl_UnusableNote"=>"阿斯顿发发生的",
    //     "cl_CouId"=>32);
    // Array_push($total,$折扣券4);

    // $体验券4 = array(
    //     "id"=>968,
    //     "cl_Code"=>"YH00000321000011",
    //     "cl_Type"=>"07",
    //     "cl_Name"=>"瑶浴体验券",
    //     "cl_State"=>"03",
    //     "cl_BeginDate"=>1526693448,
    //     "cl_EndDate"=>1527004800,
    //     "cl_CreateDate"=>1526693448,
    //     "cl_UserType"=>null,
    //     "cl_Money"=>9,
    //     "cl_ResMoney"=>268.2,
    //     "cl_UseCondition"=>"阿斯顿发斯的",
    //     "cl_UserId"=>1509,
    //     "cl_UserName"=>"15058196429",
    //     "cl_UseDate"=>0,
    //     "cl_CanUse"=>0,
    //     "cl_UnusableNote"=>null,
    //     "cl_CouId"=>32);
    // Array_push($total,$体验券4);


    sendJson(1,'asdf',$total);

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
//     echo "socket_create() failed=> reason: " . socket_strerror($socket) . "\n";
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
