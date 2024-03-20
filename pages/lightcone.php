<?php
include_once "../components/header.php";
$id = $_GET['id'];

$result = mysqli_query($connect, "SELECT * FROM `light_cones` WHERE `light_cones`.`id` = '$id'");
$res = mysqli_fetch_assoc($result);
$img = $res['cone_img'];
$img_path = $res['img_path'];
echo "<div class='lightcone_page'>
    <div class='lightcone_img'>
        <img src='../img/$img' alt=''>
    </div>

    <div class='lightcone_info'>
        <div class='lightcone_info2'>
            <div class='lightcone_info1'>
                <p class='lightcone_name'>{$res['name_cone']}</p>
                <div class='star_images_lc'>";
                for ($i=1; $i<=$res['rare']; $i++) {
                    echo"<div class='star_images'><img src='../img/star.png' alt=''></div>";
                }
                echo "</div>
            </div>
            <div class='lightcone_info1'>
                <div class='lightcone_path_img'><img src='../img/$img_path' alt=''></div>
                <h3>{$res['path']}</h3>
            </div>
        </div>";
        echo "<h3>Характеристики</h3>
            <div class='lightcone_stats'>    
            <div class='stat'>здоровье</div>
            <div class='stat'>{$res['hp']}</div>
            <div class='stat'>ататка</div>
            <div class='stat'>{$res['atk']}</div>
            <div class='stat'>защита</div>
            <div class='stat'>{$res['def']}</div>
            <div class='lightcone_ability'>
                <h3>Способность</h3>
                <p>{$res['ability']}</p>
            </div>
        </div>
    </div>
</div>";

echo "<h1>Описание</h1>
<div class='lightcone_desc'>
    <p class='description'>{$res['description']}</p>
</div>";
include_once "../components/footer.php";
?>