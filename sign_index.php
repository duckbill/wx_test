<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, minimum-scale=1, maximum-scale=1,user-scalable=no">
    <meta name="format-detection" content="telephone=no">
    <title>签到</title>
    <link rel="stylesheet" href="css/jqmobo.css">
    <link rel = "Shortcut Icon" href="images/logo.png">
    <script src="js/check.js" type="text/javascript"></script>
    <style>
    </style>
</head>
<body>
<form id="form1" method="post" action="success.html">
    <div id="toptitle">
        <h1 class="htitle">签到</h1>
    </div>
    <div id="divContent">
        <div id="divQuestion">
            <fieldset class="fieldset" style="" id="fieldset1">
                <div class="field ui-field-contain" id="div1" req="1" topic="1" data-role="fieldcontain" type="1">
                    <div class="field-label">1. 请输入姓名<span class="req">*</span></div>
                    <div class="ui-input-text">
                        <input id="q1"  name="q1"  verify="姓名" type="text">
                    </div>
                    <div id="showErrorMessage" class="errorMessage"></div>
                </div>
            </fieldset>
        </div>
        <div>
                <a id="ctlNext" onclick="judge()" class="button blue">提交</a>
        </div>
</body>
</html>