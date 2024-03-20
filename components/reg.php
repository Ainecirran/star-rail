<?php
include "core.php";

$url = "Location: ../pages/registration.php";
if (!isset($_POST['name']) || !isset($_POST['password']) || !isset($_POST['email']) ||
        $_POST['name']=="" || $_POST['password']=="" || $_POST['email']=="") {
    $_SESSION['error']="Не все значения заданы";
} else {
    $name = $_POST['name'];
    $pass = $_POST['password'];
    $email = $_POST['email'];
    
    $res = $connect -> query("SELECT * FROM `users`");
    while ($res1 = mysqli_fetch_array($res)) {
        if ($name == $res1['login']) {
            $_SESSION['error']="такой логин уже существует";
        }
        if ($email == $res1['email']) {
            $_SESSION['error']="такой email уже существует";
        }
    }
    if ($_SESSION['error'] != "такой логин уже существует" && 
        $_SESSION['error'] != "такой email уже существует") {
            $result = $connect -> query("INSERT INTO `users` (`id`, `login`, `password`, `email`)
                VALUES (NULL, '$name', '$pass', '$email')");
            $url = "Location: ../index.php";
    }
}
header("{$url}");
?>