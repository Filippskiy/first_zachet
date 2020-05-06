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
echo '<div class="latest-products">
<div class="container">
  <div class="row">';
if (isset($_POST['gosearch'])) {
  $data = test_input($_POST['search']);
  $out = out_search($data);
  //print_r($out);
  if (count($out) > 0) {
      foreach ($out as $row) {
          echo $row;
      }
  } else
      echo "Ничего не найдено..."; 
}
echo '</div></div></div>';
include "footer.php";
?>