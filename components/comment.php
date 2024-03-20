<?php
include "core.php";

if (!isset($_POST['login']) || !isset($_POST['comment']) ||
        $_POST['login']=="" || $_POST['comment']=="") {
    $_SESSION['error']="Не все значения заданы";
} else {
    $login = $_POST['login'];
    $comment = $_POST['comment'];
    
    $result = $connect -> query("INSERT INTO `comments` (`id`, `login_name`, `comment`)
        VALUES (NULL, '$login', '$comment')");
}
header("Location: ../index.php");
?>