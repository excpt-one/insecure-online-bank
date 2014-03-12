<!DOCTYPE html>
<html lang="ru">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    
    <title>(in)Secure Online Bank</title>

    <!-- Bootstrap core CSS -->
    <link href="/css/bootstrap.css" rel="stylesheet">
    <link href="/css/bootstrap-theme.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="/css/style.css" rel="stylesheet">
  </head>
  <body>

    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="/">(in)Secure Online Bank</a>
        </div>
        <div class="navbar-collapse collapse">
          <? if (!User::isAuthorized()): ?>          
              <form action="/login" method="post" class="navbar-form navbar-right">
                <div class="form-group">
                  <input type="text" name="login" placeholder="Логин" class="form-control">
                </div>
                <div class="form-group">
                  <input type="password" name="password" placeholder="Пароль" class="form-control">
                </div>
                <button type="submit" class="btn btn-success">Войти</button>
              </form>
          <? else: ?>
              <ul class="nav navbar-nav">
                <li><a href="/transfer/history">История платежей</a></li>
                <li><a href="/transfer">Сделать перевод</a></li>
                <li class="dropdown">
                  <a href="/templates" class="dropdown-toggle" data-toggle="dropdown">Шаблоны <b class="caret"></b></a>
                  <ul class="dropdown-menu">
                    <li><a href="/templates">Список шаблонов</a></li>
                    <li><a href="/templates/upload">Загрузка шаблона</a></li>
                  </ul>
                </li>
              </ul>
          
              <ul class="nav navbar-nav navbar-right">
                <li><a href="/login/logout">Выход</a></li>
              </ul>
          <? endif; ?>
        </div><!--/.navbar-collapse -->
      </div>
    </div>
    
    <?php include 'application/views/'.$content_view; ?>
    
    <div class="container">
      <hr />
      <footer>
        <p>&copy; Online Bank</p>
      </footer>
    </div> <!-- /container -->
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
  </body>
</html>