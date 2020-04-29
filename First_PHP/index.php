<?php
ob_start();
include_once "action.php";
include "menu.php";
include "header.php";
include "login.php";
echo '<div class="banner header-text">
        <div class="banner-item-01">
            <div class="text-content">
                <h4>Вас приветствует</h4>
                <h2>интернет-магазин "Сова"</h2>       
            </div>
        </div>
    </div>';
$out = out_best();
if(count($out)>0){
    foreach($out as $row){
        echo $row;
    }
}
include "main.php";
include "footer.php";