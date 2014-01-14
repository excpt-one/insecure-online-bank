<div class="container">
    <div class="page-header">
        <h1>Шаблон &laquo;<? print htmlspecialchars($data['title']) ?>&raquo;</h1>
    </div>
    
    <div class="row">
        <div class="col-md-6">
                <dl class="dl-horizontal">
                    <dt>Название шаблона</dt>
                    <dd><? print htmlspecialchars($data['title']) ?></dd>
                    <dt>Сумма перевода</dt>
                    <dd><? print htmlspecialchars($data['money']) ?></dd>
                    <dt>ФИО получателя</dt>
                    <dd><? print htmlspecialchars($data['receiver_name']) ?></dd>
                    <dt>Реквизиты получателя</dt>
                    <dd><? print htmlspecialchars($data['receiver_details']) ?></dd>
                    <dt>Счет получателя</dt>
                    <dd><? print htmlspecialchars($data['receiver_number']) ?></dd>
                    <dt>Описание</dt>
                    <dd><? print htmlspecialchars($data['description']) ?></dd>
                </dl>
        </div>
    </div>
</div>