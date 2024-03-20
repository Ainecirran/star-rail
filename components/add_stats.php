<?php
include "core.php";

if (!isset($_POST['name']) || !isset($_POST['rare']) || empty($_FILES['img']) || !isset($_POST['element_id']) 
    || !isset($_POST['path']) || empty($_FILES['img_path']) || empty($_FILES['img_list']) || $_POST['name']=="" 
    || $_POST['rare']=="" || $_FILES['img']['name']=="" || $_POST['element_id']=="" || $_POST['path']=="" 
    || $_FILES['img_path']['name']=="" || $_FILES['img_list']['name']=="") {
    $_SESSION['error']="Не все значения заданы";
} else {
    $name = $_POST['name'];
    $rare = $_POST['rare'];
    $img = $_FILES['img'];
    $elem = $_POST['element_id'];
    $path = $_POST['path'];
    $img_path = $_FILES['img_path'];
    $img_list = $_FILES['img_list'];
    $result = $connect -> query("INSERT INTO `characters` (`id`, `name`, `rare`, `img`, `element_id`, `path`, `img_path`, `img_list`)
        VALUES (NULL, '$name', '$rare', '{$img['name']}', '$elem', '$path', '{$img_path['name']}', '{$img_list['name']}')");
}
header("Location: ../index.php");
?>