<?php
include "db.php";
//index
function out_best()
{
    global $books;
    $arr_out = array();
    $str = '<div class="latest-products">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="section-heading">
          <h2>Бестселлеры</h2>
          <a href="products.php">Посмотреть все<i class="fa fa-angle-right"></i></a>
        </div>
        </div>';
    $n = 0;
    foreach ($books as $book) {
        $str .= '<div class="col-md-3">
        <div class="product-item">';
        foreach ($book as $key => $value) {
            if (!is_array($value)) {
                if ($key == "image") {
                    $str .= '<a href="#"><img src="assets/images/' . $value . '" alt=""></a>
          <div class="down-content">';
                }
                if ($key == "name") {
                    $str .= '<a href="#"><h4>' . $value . '</h4></a>';
                }
                if ($key == "year") {
                    $str .= '<h6>' . $value . '</h6>';
                }
            } else {
                $surname = "";
                foreach ($value as $k => $v) {
                    $surname .= $v . ' ';
                }

            }
        }
        $str .= '<p>' . $surname . '</p>
        </div>
      </div>
    </div>';
        $n++;
        if ($n == 4) {
            break;
        }
    }
    $str .= '</div></div></div>';
    $arr_out[] = $str;
    return $arr_out;
}
//products
$str = '<div class="latest-products">
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="section-heading">
      <h3>Сортировать по:</h3>
  <form action="products.php" name="myform" method="post">
   <select name="sort" size="1">
     <option value="name">Названию</option>
     <option value="price">Цене</option>
     <option value="genre">Жанру</option>
     <option value="year">Году издания</option>
   </select>
   <input name="gosort" type=submit value="Сортировать" style="border:2px #f33f3f solid;background-color:#fff;">';

function out_all(){
    global $books;
    global $str;
    $arr_out = array();
    foreach ($books as $book) {
        $str .= '<div class="col-md-2">
        <div class="product-item-pr">';
        foreach ($book as $key => $value) {
            if (!is_array($value)) {
                if ($key == "image") {
                    $str .= '<a href="#"><img src="assets/images/' . $value . '" alt=""></a>
          <div class="down-content">';
                }
                if ($key == "name") {
                    $str .= '<a href="#"><h4>' . $value . '</h4></a>';
                }
                if ($key == "year") {
                    $str .= '<h6>' . $value . '</h6>';
                }
                if ($key == "count") {
                    if ($value > 0) {
                        $str .= '<p style="color:green;">Есть в наличии</p>';
                    } else {
                        $str .= '<p style="color:red;">Нет в наличии</p>';
                    }
                }
            } else {
                $surname = "";
                foreach ($value as $k => $v) {
                    $surname .= $v . ' ';
                }

            }
        }
        $str .= '<p>' . $surname . '</p>
        </div>
      </div>
    </div>';
    }
    $str .= '</div></div></div>';
    $arr_out[] = $str;
    return $arr_out;
}

function out_arr_search(array $arr_index = null)
{
    global $books; // делаем переменную $countries глобальной
    //global $str;
    $arr_out = array();
    foreach ($books as $index => $book) {
    $str = "";
        if ($arr_index != null && in_array($index, $arr_index)) {
            $str .= '<div class="col-md-2">
        <div class="product-item-pr">';
            foreach ($book as $key => $value) {
                if (!is_array($value)) {
                    if ($key == "image") {
                        $str .= '<a href="#"><img src="assets/images/' . $value . '" alt=""></a>
          <div class="down-content">';
                    }
                    if ($key == "name") {
                        $str .= '<a href="#"><h4>' . $value . '</h4></a>';
                    }
                    if ($key == "year") {
                        $str .= '<h6>' . $value . '</h6>';
                    }
                    if ($key == "count") {
                        if ($value > 0) {
                            $str .= '<p style="color:green;">Есть в наличии</p>';
                        } else {
                            $str .= '<p style="color:red;">Нет в наличии</p>';
                        }
                    }
                } else {
                    $surname = "";
                    foreach ($value as $k => $v) {
                        $surname .= $v . ' ';
                    }

                }
            }
            $str .= '<p>' . $surname . '</p>
        </div>
      </div>
    </div>';
        } 
        $arr_out[] = $str;
    }
   
    return $arr_out;
}

function test_input($data)
{
    return htmlspecialchars(stripslashes(trim($data)));
}
function out_search($data)
{
    global $books; // делаем переменную $countries глобальной
    $arr_index = array();
    foreach ($books as $book_number => $book) {
        foreach ($book as $key => $value) {
            if (!is_array($value)) {
                if (strstr($value, $data)) {
                    $arr_index[] = $book_number;
                }
            } else {
                foreach ($value as $k => $v) {
                    if (strstr($v, $data) || strstr($k, $data)) {
                        $arr_index[] = $book_number;
                    }
                }
            }
        }
    }
    return out_arr_search(array_unique($arr_index));
}
$str .= '</div></div>';
function check_autorize($log, $pas)
{
    global $users;
    if (in_array($log, $users)) {
        return true;
    } else {
        return false;
    }
}

function check_admin($log, $pas)
{
    global $users;
    if (in_array($log, $users) && ($pas == $users["admin"])) {
        return true;
    } else {
        return false;
    }
}

function check_log($log)
{
    if ($log == "admin") {
        return true;
    } else {
        return false;
    }
}
function name($a, $b)
{ // функция, определяющая способ сортировки (по названию столицы)
    if ($a["name"] < $b["name"]) {
        return -1;
    } elseif ($a["name"] == $b["name"]) {
        return 0;
    } else {
        return 1;
    }

}
function price($a, $b)
{ // функция, определяющая способ сортировки (по населению)
    if ($a["price"] < $b["price"]) {
        return -1;
    } elseif ($a["price"] == $b["price"]) {
        return 0;
    } else {
        return 1;
    }

}
function year($a, $b)
{ // функция, определяющая способ сортировки (по населению)
    if ($a["year"] < $b["year"]) {
        return -1;
    } elseif ($a["year"] == $b["year"]) {
        return 0;
    } else {
        return 1;
    }

}
function genre($a, $b)
{ // функция, определяющая способ сортировки (по названию столицы)
    if ($a["genre"] < $b["genre"]) {
        return -1;
    } elseif ($a["genre"] == $b["genre"]) {
        return 0;
    } else {
        return 1;
    }

}
function sorting($p)
{
    global $books;
    uasort($books, $p);
}
