<?php
include_once "../components/header.php";
// mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$id = $_GET['id'];

$result = mysqli_query($connect, "SELECT * FROM `characters`, `element` WHERE 
    `characters`.`id` = '$id' and `characters`.`element_id` = `element`.`id_elem`");
$res = mysqli_fetch_assoc($result);
$img = $res['img'];
$img1 = $res['img_element'];
$img2 = $res['img_path'];
echo "<div class='character_page'>
    <div class='character_img'>
        <img src='../img/$img' alt=''>
    </div>

    <div class='character_info'>
        <div class='character_info1'>
            <p class='character_name'>{$res['name']}</p>
            <div class='star_images_char'>";
            for ($i=1; $i<=$res['rare']; $i++) {
                echo"<div class='star_images'><img src='../img/star.png' alt=''></div>";
            }
            echo "</div>
        </div>
        <div class='character_info1'>
            <div class='character_element_img'><img src='../img/$img1' alt=''></div>
            <p>{$res['name_element']}</p>
        </div>
        <div class='character_info1'>
            <div class='character_path_img'><img src='../img/$img2' alt=''></div>
            <p>{$res['path']}</p>
        </div>";

        echo "<div class='character_stats'>";
            $result1 = $connect -> query("SELECT * FROM `char_stat` WHERE
                `id_char` = '$id'");
            $res1 = mysqli_fetch_array($result1);
            echo "<h3>Характеристики</h3>
            <div class='lightcone_stats'>
                <div class='stat'><img class='img_stat' src='../img/hp.png' alt=''>здоровье</div>
                <div class='stat'>{$res1['hp']}</div>
                <div class='stat'><img class='img_stat' src='../img/atk.png' alt=''>ататка</div>
                <div class='stat'>{$res1['atk']}</div>
                <div class='stat'><img class='img_stat' src='../img/def.png' alt=''>защита</div>
                <div class='stat'>{$res1['def']}</div>
                <div class='stat'><img class='img_stat' src='../img/spd.png' alt=''>скорость</div>
                <div class='stat'>{$res1['spd']}</div>
                <div class='stat'><img class='img_stat' src='../img/energy.png' alt=''>энергия</div>
                <div class='stat'>{$res1['max_energy']}</div>
                <h3> + Доп статы с прокаченных следов</h3>
                <div class='stat'><img class='img_stat' src='../img/{$res1['trace1_stat_img']}' alt=''>{$res1['trace1_stat']}</div>
                <div class='stat'>{$res1['trace1_value']}</div>
                <div class='stat'><img class='img_stat' src='../img/{$res1['trace2_stat_img']}' alt=''>{$res1['trace2_stat']}</div>
                <div class='stat'>{$res1['trace2_value']}</div>
                <div class='stat'><img class='img_stat' src='../img/{$res1['trace3_stat_img']}' alt=''>{$res1['trace3_stat']}</div>
                <div class='stat'>{$res1['trace3_value']}</div>
            </div>
        </div>
    </div>
</div>";

$result2 = $connect -> query("SELECT * FROM `char_desc` WHERE
    `id_char_desc` = '$id'");
$res2 = mysqli_fetch_array($result2);
echo "<h1>Описание</h1>
<div class='char_desc'>
    <p class='description'>{$res2['hystory']}</p>
</div>";

echo "<h1>Способности следов</h1>
<div class='traces'>
    <div class='trace'>
        <img src='../img/{$res2['trace_ability1_img']}' alt=''>
        <div>{$res2['trace_ability1']}</div>
    </div>
    <div class='trace'>
        <img src='../img/{$res2['trace_ability2_img']}' alt=''>
        <div>{$res2['trace_ability2']}</div>
    </div>
    <div class='trace'>
        <img src='../img/{$res2['trace_ability3_img']}' alt=''>
        <div>{$res2['trace_ability3']}</div>
    </div>
</div>
<h1>Способности</h1>
<div class='char_abilities'>
    <div class='char_ability'>
        <img src='../img/{$res2['basic_atk_img']}' alt=''>
        <div>{$res2['basic_atk']}</div>
    </div>
    <div class='char_ability'>
        <img src='../img/{$res2['skill_img']}' alt=''>
        <div>{$res2['skill']}</div>
    </div>
    <div class='char_ability'>
        <img src='../img/{$res2['ult_img']}' alt=''>
        <div>{$res2['ult']}</div>
    </div>
    <div class='char_ability'>
        <img src='../img/{$res2['talant_img']}' alt=''>
        <div>{$res2['talant']}</div>
    </div>
    <div class='char_ability'>
        <img src='../img/{$res2['tech_img']}' alt=''>
        <div>{$res2['tech']}</div>
    </div>
</div>";

$result3 = $connect -> query("SELECT * FROM `char_eidolons` WHERE
    `id_char_eid` = '$id'");
$res3 = mysqli_fetch_array($result3);
echo "<h1>Эйдолоны</h1>
<div class='eidolons'>
    <div class='eid'>
        <img src='../img/{$res3['eid1_img']}' alt=''>
        <div>{$res3['eid1']}</div>
    </div>
    <div class='eid'>
        <img src='../img/{$res3['eid2_img']}' alt=''>
        <div>{$res3['eid2']}</div>
    </div>
    <div class='eid'>
        <img src='../img/{$res3['eid3_img']}' alt=''>
        <div>{$res3['eid3']}</div>
    </div>
    <div class='eid'>
        <img src='../img/{$res3['eid4_img']}' alt=''>
        <div>{$res3['eid4']}</div>
    </div>
    <div class='eid'>
        <img src='../img/{$res3['eid5_img']}' alt=''>
        <div>{$res3['eid5']}</div>
    </div>
    <div class='eid'>
        <img src='../img/{$res3['eid6_img']}' alt=''>
        <div>{$res3['eid6']}</div>
    </div>
</div>";

?>
<?php include_once "../components/footer.php"; ?>