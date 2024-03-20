<?php
include_once "../components/header.php";
?>

<!-- итог картинки с диковинками, благославениями и мирами -->
<h1>Виртуальная вселенная</h1>
<form id="mainForm" class='main_uni_choice'>
    <!-- добавить базовую инфу к диплому
    <label>
      <input class='rad' type="radio" name="uni" value="1">
      <img src="../img/worlds.png">
      <p>миры</p>
    </label> -->  
    <label>
      <input class='rad' type="radio" name="uni" value="2">
      <img src="../img/blessings.png">
      <p>благославения</p>
    </label>
    <label>
      <input class='rad' type="radio" name="uni" value="3">
      <img src="../img/curios.png">
      <p>диковинки</p>
    </label>
</form>

<!-- миры виртуалки -->
<div id="content1" style="display:none;">
<form id="subForm" class='sub_uni_choice'>
    <label>
      <input class='rad' type="radio" name="uni_world" value="3">
      <img src="../img/world3.png">
      <p>Мир 3</p>
    </label>
    <label>
      <input class='rad' type="radio" name="uni_world" value="4">
      <img src="../img/world4.png">
      <p>Мир 4</p>
    </label>
    <label>
      <input class='rad' type="radio" name="uni_world" value="5">
      <img src="../img/world5.png">
      <p>Мир 5</p>
    </label>
    <label>
      <input class='rad' type="radio" name="uni_world" value="6">
      <img src="../img/world6.png">
      <p>Мир 6</p>
    </label>
    <label>
      <input class='rad' type="radio" name="uni_world" value="7">
      <img src="../img/world7.png">
      <p>Мир 7</p>
    </label>
    <label>
      <input class='rad' type="radio" name="uni_world" value="8">
      <img src="../img/world8.png">
      <p>Мир 8</p>
    </label>
    <label>
      <input class='rad' type="radio" name="uni_world" value="0">
      <img src="../img/world_swarm.png">
      <p>Нашествие роя</p>
    </label>
</form>
</div>

<div id="worldContent">
    <div id="subcontent3" style="display:none;">mir3</div>
    <div id="subcontent4" style="display:none;">mir4</div>
    <div id="subcontent5" style="display:none;">mir5</div>
    <div id="subcontent6" style="display:none;">mir6</div>
    <div id="subcontent7" style="display:none;">mir7</div>
    <div id="subcontent8" style="display:none;">mir8</div>
    <div id="subcontent0" style="display:none;">roi</div>
</div>

<!-- благословения -->
<div id="content2" style="display:none;">
    <h1>Благословения</h1>
    <div class="bless_list">
        <?php
        $result2 = $connect -> query("SELECT * FROM `blessings`");
        while ($res2 = mysqli_fetch_array($result2)) {
            echo "<div class='bless'>
            <img src='../img/{$res2['img']}' alt=''><h1>{$res2['name']}</h1>
            <p>{$res2['descrip']}</p>
            </div>";
        }
        ?>
    </div>
</div>

<!-- диковинки -->
<div id="content3" style="display:none;">
    <h1>Диковинки</h1>
    <div class="curios_list">
        <?php
        $result3 = $connect -> query("SELECT * FROM `curios`");
        while ($res3 = mysqli_fetch_array($result3)) {
            echo "<div class='curios'>
            <img src='../img/{$res3['img']}' alt=''><h1>{$res3['name']}</h1>
            <h3>Свойство</h3><p>{$res3['ability']}</p>
            <h3>Описание</h3><p>{$res3['history']}</p>
            </div>";
        }
        ?>
    </div>
</div>

<script src="../js/rad.js"></script>
<?php
include_once "../components/footer.php";
?>