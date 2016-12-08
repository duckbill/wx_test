<?php
/**
 * Created by PhpStorm.
 * User: jason
 * Date: 16-12-5
 * Time: 上午10:56
 */
require('DB.php');
$db = new DB();
$contacts = $db->all();
$errors = array();
function validate($q1)
{
    $username = trim($q1);
    if (!$username) {
        $errors[] = new Error('username', '用户名不能为空。');
    } elseif (strlen($username)<3) {
        $errors[] = new Error('username', '用户名长度不能小于3个字符。');
    } elseif (strlen($username)>30) {
        $errors[] = new Error('username', '用户名长度不能超过30个字符。');
    } elseif (!preg_match('/^[A-Za-z]+$/',substr($username, 0, 1))) {
        $errors[] = new Error('username', '用户名必须以字母开头。');
    } elseif (!preg_match('/^[A-Za-z0-9_]+$/', $username)) {
        $errors[] = new Error('username', '用户名只能是字母、数字以及下划线( _ )的组合。');
}

header("Content-Type:text/html; charset=utf-8");

//创建数据库链接：本地数据库，用户名：root，密码：空，数据库名称：test。

$connect = mysqli_connect("localhost","root","","test"); // 定义变量并设置为空值

$name = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = test_input($_POST["name"]);

    $password = test_input($_POST["password"]); }

function test_input($data) {

    $data = trim($data);

    $data = stripslashes($data);
    $data = htmlspecialchars($data);

    return $data;
}
$flags=0;

//从表admin中查询

$result = mysqli_query($connect,"SELECT * FROM admin where name = '".$name."'");

while($row = mysqli_fetch_array($result))

{

    if($row['password']==$password)

    {$flags=1;}

}

if($flags)

{

    mysqli_query($connect,"UPDATE admin SET times = times+1 WHERE name = '".$name."'");
    echo "<script>alert('登陆成功！');window.location='index.php';</script>";//(index.php)

}

else
{
    echo "<script>alert('密码或账号错误！');window.location='login.php';</script>";//跳转回登录界面

}

//关闭数据库链接

mysqli_close($connect);
