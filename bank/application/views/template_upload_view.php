<div class="container">
    <div class="page-header">
        <h1>Загрузка шаблона</h1>
    </div>
    <? if ($data['success'] === true): ?>
        <div class="col-md-12">
            <div class="alert alert-success">
                <strong>Шаблон успешно импортирован!</strong>
            </div>
        </div>
    <? elseif($data['error'] === true): ?>
        <div class="col-md-12">
            <div class="alert alert-danger">
                <strong>Ошибка!</strong> Выберите XML-файл c шаблоном платежа.
            </div>
        </div>
    <? endif; ?>
    <form method="post" enctype="multipart/form-data">
        <dl>
            <dt>Выберите XML-файл с шаблоном:</dt>
            <dd><input type="file" name="xml" /></dd>
        </dl>
        
        <button type="submit" class="btn btn-primary">Загрузить</button>
    </form>
</div>