<?php
include "core.php";
if (!isset($_POST['name']) || !isset($_POST['rare']) || empty($_FILES['cone_img']) || !isset($_POST['path'])
    || empty($_FILES['img_path']) || !isset($_POST['hp']) || !isset($_POST['atk']) || !isset($_POST['def'])
    || !isset($_POST['ability']) || !isset($_POST['description']) || $_POST['name']=="" || $_POST['rare']==""
    || $_FILES['cone_img']['name']=="" || $_POST['path']=="" || $_FILES['img_path']['name']=="" ||$_POST['hp']==""
    || $_POST['atk']=="" || $_POST['def']=="" || $_POST['ability']=="" || $_POST['description']=="")  {
    $_SESSION['error']="Не все значения заданы";
} else {
    $name = $_POST['name'];
    $cone_img = $_FILES['cone_img'];
    $rare = $_POST['rare'];
    $path = $_POST['path'];
    $img_path = $_FILES['img_path'];
    $hp = $_POST['hp'];
    $atk = $_POST['atk'];
    $def = $_POST['def'];
    $ability = $_POST['ability'];
    $description = $_POST['description'];
    $result = mysqli_query($connect, "INSERT INTO `light_cones` (`id`, `name_cone`, `cone_img`, `rare`, `path`, `img_path`, 
        `hp`, `atk`, `def`, `ability`, `description`) VALUES (NULL, '$name', '{$cone_img['name']}', '$rare', '$path',
        '{$img_path['name']}', '$hp', '$atk', '$def', '$ability', '$description')");
    
    if ($result) {
        $_SESSION['error']="конус успешно добавлен";
        header("Location: ../index.php");
    }
    else {
        echo "no - ";
        echo mysqli_error($connect);
    }
}
?>