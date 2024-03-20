</div>


    <div class='end'></div>
    <footer>
        <div class='info_for_user'>
            <h1>Ссылки</h1> 
            <p><a href='https://hsr.hoyoverse.com'>Оффициальный сайт</a></p>
            <p><a href='https://www.youtube.com/channel/UC2PeMPA8PAOp-bynLoCeMLA'>Youtube</a></p>
        </div>
        <?php 
        if (isset($_SESSION['user']) && ($_SESSION['user']!=""))
            echo "<div class='comment'>
            <h1>Оставить комментарий</h1> 
            <form action='../components/comment.php' method='post'>
                <input type='hidden' name='login' value='{$_SESSION['user']}'>
                <input type='textarea' name='comment' placeholder='коммент'>
                <input type='submit' class='submit' value='Отправить'>
            </form>
        </div>";
        ?>
    </footer>
</div>
</body>
</html>