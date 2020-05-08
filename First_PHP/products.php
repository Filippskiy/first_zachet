<?php
include_once "action.php";
include "menu.php";
include "header.php";
include "login.php";
echo '   <div class="page-heading products-heading header-text">
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="text-content">
        <h4>наши товары</h4>
        <h2>Удачных покупок</h2>
      </div>
    </div>
  </div>
    </div>
</div>
';
  if(isset($_POST['gosort'])){
    sorting($_POST['sort']);
}
$out = out_all();
  if(count($out)>0){
      foreach($out as $row){
        echo $row;
      }
  }

include "footer.php";
?>
