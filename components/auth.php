<?php
include "core.php";

$url = "Location: ../pages/authorization.php";
if (!isset($_POST['name']) || !isset($_POST['password']) ||
        $_POST['name']=="" || $_POST['password']=="") {
    $_SESSION['error']="Не все значения заданы";
} else {
    $name = $_POST['name'];
    $pass = $_POST['password'];
    
    $res = $connect -> query("SELECT * FROM `users`");
    $bool = false;
    while ($res1 = mysqli_fetch_array($res)) {
        if ($name == $res1['login'] && $pass == $res1['password']) {
            $bool = true;
        }
    }
    if ($bool == true) {
        $_SESSION['user']=$name;
        $url = "Location: ../index.php";
    }
    else { $_SESSION['error']="Логин или пароль введены не верно"; }
}
header("{$url}");
?>