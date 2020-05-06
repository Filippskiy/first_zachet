<header class="">
      <nav class="navbar navbar-expand-lg">
        <div class="container">
          <a class="navbar-brand active" href="index.php"><h2>СОВА</h2></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <form  name="searchForm" action="search.php" method="post" onSubmit="return overify_login(this);" >
                 <input type="text" placeholder="Поиск" id="search_head" name="search">
                 <button type="submit" name="gosearch" id="butt-search"><i class="fas fa-search" style="font-style:normal;padding:5px"></i></button>
              </form>
              </li> 
              <li class="nav-item ">
                <a class="nav-link" href="index.php">Главная</a>
              </li> 
              <li class="nav-item">
                <a class="nav-link" href="products.php">Все книги</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="contacts.php">Контакты</a>
              </li>
              <li class="nav-item active">
              <button onclick="openForm()" id="but_log">Войти</button>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    </header>