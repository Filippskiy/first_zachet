<?php
if (isset($_POST['go'])) {
    $login = $_POST['login'];
    $password = $_POST['pass'];
    if (check_autorize($login, $password)) {
        if (check_admin($login, $password)) {
            header("Location: admin_panel.php?login=$login");
            ob_end_flush(); // Конец буфферизации
        } else
            echo "<h4 id='login_span'>Приветствуем Вас, $login!</h4>";
    } else {
        echo "Вы не зарегистрированы!";
    }
}
?>
<div class="form-popup" id="myForm">
<form  name='autoForm' action='index.php' method='post' class="form-container" onSubmit='return overify_login(this);'>
    <label for="name"><b>Логин</b></label>
    <button type="button" id="close_form" onclick="closeForm()">&#10006;</button>
    <input type="text" placeholder="Ваш логин" name="login" required>
    <label for="email"><b>Пароль</b></label>
    <input type="password" placeholder="Ваш пароль" name="pass" required>
    <button type="submit" name='go' class="btn">Войти</button>
  </form>
</div>