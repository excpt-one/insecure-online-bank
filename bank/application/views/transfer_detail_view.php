<div class="container">
    <div class="page-header">
        <h1>Денежный перевод #<?=$data['_id']->{'$id'}?></h1>
    </div>

    <div class="row">
        <div class="col-md-6">
                <dl class="dl-horizontal">
                    <dt>Сумма перевода:</dt>
                    <dd><? print htmlspecialchars($data['money']) ?></dd>
                    <dt>ФИО получателя:</dt>
                    <dd><? print htmlspecialchars($data['receiver_name']) ?></dd>
                    <dt>Реквизиты получателя:</dt>
                    <dd><? print htmlspecialchars($data['receiver_details']) ?></dd>
                    <dt>Счет получателя:</dt>
                    <dd><? print htmlspecialchars($data['receiver_number']) ?></dd>
                    <dt>Дата:</dt>
                    <dd><? print htmlspecialchars($data['date']) ?></dd>
                    <dt>Комментарий:</dt>
                    <dd><? print htmlspecialchars($data['comment']) ?></dd>
                    <dt>Рузультат:</dt>
                    <dd><? print htmlspecialchars($data['response']) ?></dd>
                </dl>
        </div>
    </div>
</div>