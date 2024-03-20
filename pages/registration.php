<?php
include_once "../components/header.php";
$url = "../components/reg.php";

if (isset($_SESSION['user']) && $_SESSION['user']!="") {
    $url = "../index.php";
}
if (isset($_SESSION['error']) && $_SESSION['error']!="") {
    echo "<div class='error_message'><p>{$_SESSION['error']}</p></div>";
    unset($_SESSION['error']);
}
?>

<form action="<?php echo $url; ?>" method="post">
    <input name="name" type="text" placeholder="Логин">
    <input name="password" type="password" placeholder="Пароль">
    <input name="email" type="email" placeholder="Email">
    <input class="submit" type="submit" value="Зарегистрироваться">
</form>

</body>
</html>