<div class="container">
    <div class="page-header">
        <h1>Шаблоны платежей</h1>
    </div>
    
    
    <table class="table">
        <thead>
            <td><strong>Имя шаблона</strong></td>
            <td><strong>Описание</strong></td>
            <td><strong>Действия</strong></td>
        </thead>
    <? foreach($data['templates'] as $template): ?>
        <tr>
            <td><a href="/templates/view/<? print $template['id'] ?>"><? print htmlspecialchars($template['title']) ?></a></td>
            <td><? print htmlspecialchars($template['description']) ?></td>
            <td>
                <a href="/templates/edit/<? print $template['id'] ?>" type="submit" class="btn btn-default btn-xs" role="button">Изменить</a>
                <a href="/templates/export/<? print $template['id'] ?>" type="submit" class="btn btn-default btn-xs" role="button">Экспорт</a>
                <a href="/templates/pay/<? print $template['id'] ?>" type="submit" class="btn btn-primary btn-xs" role="button">Оплатить</a>
            </td>
        </tr>
    <? endforeach; ?>
    </table>
</div>