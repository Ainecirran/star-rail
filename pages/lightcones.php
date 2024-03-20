<?php
include_once "../components/header.php";
?>

<h1>Таблица световых конусов</h1>
<table class="character_list">
    <tr>
        <th>Иконка</th><th>Название</th><th class='hide'>Редкость</th><th>Путь</th>
    </tr>
    <?php
    $result = $connect -> query("SELECT * FROM `light_cones`");
    while ($res = $result -> fetch_array()) {
      $id = $res['id'];
      echo "<tr>
        <td><a class='a' href='lightcone.php?id=$id'><img class='table_img_main' src='../img/{$res['cone_img']}' alt=''></a></td>
        <td><a class='a' href='lightcone.php?id=$id'><p>{$res['name_cone']}</p></a></td>
        <td class='hide'><a class='a' href='lightcone.php?id=$id'><div class='star_imgs'>";
        for ($i=1; $i<=$res['rare']; $i++) {
          echo"<img class='star' src='../img/star.png' alt=''>";
        } echo "</div></a></td>
      <td><a class='a' href='lightcone.php?id=$id'><img class='table_img' src='../img/{$res['img_path']}' alt=''><p>{$res['path']}</p></a></td></tr>";
    }
    ?>
</table>
<?php
include_once "../components/footer.php";
?>