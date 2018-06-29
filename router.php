<?php 
    include_once "classes/dataBaseControlManager.php";

    $listArray = array(
        'hmApp://interaction'=>"hmApp://InteractionViewController",
        'hmApp://htmlpage'=>"hmApp://HMHTMLViewController",
        'hmApp://recharge'=>"hmApp://RechargeTableViewController",
        'hmApp://messagecenter'=>"hmApp://HMessageCenter",
        'hmApp://guestcenter'=>"hmApp://HMGuestViewController",
        'hmApp://scancode'=>"hmApp://HScanCodeVC",
        'hmApp://videodetial'=>"hmApp://HVideoDetialVC",
        'hmApp://cosmetology'=>"hmApp://HMYiMeiViewController",
        'hmApp://medicalbeauty'=>"hmApp://abc",
        'hmApp://videolist'=>"hmApp://HVideoListVC",
        'hmApp://counpon'=>"hmApp://HCounponListVC",
        'hmApp://servedetial'=>"hmApp://serveDetiaViewController",
        'hmApp://location'=>"hmApp://HLocationVC",
        'hmApp://search'=>"hmApp://HSearchVC",

        // 'hmApp://interaction'=>"hmApp://InteractionViewController",
        // 'hmApp://interaction'=>"hmApp://InteractionViewController",
    );

    sendJsonWithTotal(count($resultTotal),1,"操作成功！",$listArray);
?>