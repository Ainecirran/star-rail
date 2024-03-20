<?php
include_once "../components/header.php";
?>

<h1>Играбельные персонажи: <?php $count = $connect -> query("SELECT * FROM `characters`"); echo mysqli_num_rows($count); ?></h1>
<table class="character_list">
    <tr>
        <th>Иконка</th><th>Имя</th><th>Редкость</th><th class='hide'>Элемент</th><th>Путь</th>
    </tr>
    <?php
    $result = $connect -> query("SELECT * FROM `characters` JOIN `element` ON `characters`.`element_id` = `element`.`id_elem`");
    while ($res = $result -> fetch_array()) {
      $id = $res['id'];
      echo "<tr>
        <td><a class='a' href='character.php?id=$id'><img class='table_img_main' src='../img/{$res['img_list']}' alt=''></a></td>
        <td><a class='a' href='character.php?id=$id'><p>{$res['name']}</p></a></td>
        <td><a class='a' href='character.php?id=$id'><div class='star_imgs'>";
        for ($i=1; $i<=$res['rare']; $i++) {
          echo"<img class='star' src='../img/star.png' alt=''>";
        } echo "</div></a></td>
        <td class='hide'><a class='a' href='character.php?id=$id'><img class='table_img' src='../img/{$res['img_element']}' alt=''><p>{$res['name_element']}</p></a></td>
      <td><a class='a' href='character.php?id=$id'><img class='table_img' src='../img/{$res['img_path']}' alt=''><p>{$res['path']}</p></a></td></tr>";
    }
    ?>
</table>
<?php
include_once "../components/footer.php";
?>