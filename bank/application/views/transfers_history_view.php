<div class="container">
    <div class="page-header">
        <h1>История платежей</h1>
    </div>

    <table class="table">
        <thead>
            <td><strong>Дата</strong></td>
            <td><strong>Получатель</strong></td>
            <td><strong>Сумма</strong></td>
        </thead>
    <? foreach($data['transactions'] as $transaction): ?>
    <? //var_dump($transaction) ?>
        <tr>
            <td><? print htmlspecialchars($transaction['date']) ?></td>        
            <td><? print htmlspecialchars($transaction['receiver_name']) ?></td>
            <td><? print htmlspecialchars($transaction['money']) ?></td>
            <td><a href="/transfer/detail/%7B_id%3AObjectId%28%27<? print $transaction['_id']->{'$id'} ?>%27%29%7D" type="submit" class="btn btn-default btn-xs" role="button">Подробно</a></td>
        </tr>
    <? endforeach; ?>
    </table>
</div>
