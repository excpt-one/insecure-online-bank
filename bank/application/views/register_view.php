<div class="container">
    <div class="page-header">
        <h1>Регистрация</h1>
    </div>
    
    <div class="row">
        <? if ($data['success'] === true): ?>
            <div class="col-md-12">
                <div class="alert alert-success">
                    <strong>Вы зарегистрированы!</strong>
                </div>
            </div>
        <? elseif($data['success'] === false): ?>
            <? if ($data['login_exist'] === true): ?>
                <div class="alert alert-danger">
                    <strong>Ошибка!</strong> Пользователь с такими логином уже существует.
                </div>
            <? else: ?>
                <div class="alert alert-danger">
                    <strong>Ошибка!</strong> Проверьте правильность ввода полей! 
                </div>
            <? endif; ?>
        <? endif; ?>
        <div class="col-md-12">
        <p>Внимание! Длина пароля должна быть более 5 символов!</p>
        </div>
        <div class="col-md-6">
            <form action="" method="post">
                <dl class="dl-horizontal">
            		<dt>Логин:</dt>
            		<dd>
                        <div class="form-group">
                          <input type="text" name="login" class="form-control">
                        </div>
                    </dd>
        
            		<dt>Пароль:</dt>
            		<dd>
                        <div class="form-group">
                          <input type="password" name="password" class="form-control">
                        </div>
                    </dd>
        
            		<dt>Повторите пароль:</dt>
            		<dd>
                        <div class="form-group">
                          <input type="password" name="password2" class="form-control">
                        </div>
                    </dd>
            	 
                </dl>
                <button type="submit" class="btn btn-primary btn-lg">Регистрация</button>
            </form>
        </div>
    </div>
</div>