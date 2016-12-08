
<!doctype html>
<html>
<?php
/**
 * Created by PhpStorm.
 * User: Jason
 * Date: 2016/11/24
 * Time: 上午12:51
 */
require_once (dirname(__FILE__).'/config/config.php');
?>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, minimum-scale=1.0, initial-scale=1.0, maximum-scale=1.0, user-scalable=1" />
    <title><?php echo WEB_TITLE; ?></title>
    <link rel = "Shortcut Icon" href="images/logo.png">
    <script type="text/javascript">
        document.addEventListener('WeixinJSBridgeReady', function onBridgeReady() {
            WeixinJSBridge.call('hideToolbar');
            WeixinJSBridge.call('hideOptionMenu');
        });
    </script>
<!--    <link rel="stylesheet" href="css/global.css" type="text/css" media="screen" />-->
</head>
<style>
    /*img {*/
        /*display: block;*/
        /*outline: none;*/
        /*border:0;*/
        /*height: 100%;*/
        /*width: 100%;*/
    /*}*/
    img{max-width: 100%;height: 100%;width: 100%}
    #title{
        text-align: right;
        font-size: x-large;
        font-weight: bold;
        }


</style>
<body>
<?php
$attenderID = htmlspecialchars($_GET["id"]);
echo $attenderID
?>
<!--<form action="sign_result.php" method="post" id="userInfo">-->
<div class="erweima" style="position: relative;text-align: center">
    <span id="title">设计3部扫码签到</span><BR>

    <!--    <div class="vote">-->
        <img  width="auto" height="auto" src="http://qr.liantu.com/api.php?m=15&w=180&text=<?php echo SIGN_URL?>?k=<?php echo $attenderID;?>#wechat_webview_type=1"/>
    </div>
<!--        <p>--><?php //echo MEETING_NAME;?><!--</p>-->
<!--        <p id="tips">-->
<!--            wo de id is :-->
<!--        style="text-align:center"-->
<!--            --><?php
//            echo $attenderID
//            ?>
<!--            !!!-->
<!--        </p>-->
<!--    </div>-->
<!--</form>-->
<!--<script type="text/javascript" src="http://tajs.qq.com/stats?sId=25799863" charset="UTF-8"></script>-->
</body>
</html>