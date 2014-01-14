<div class="container">
    <div class="page-header">
        <h1>Денежный перевод</h1>
    </div>
    
    <div class="row">
        <div class="col-md-12">
            <? if($data['error']): ?>
                <div class="alert alert-danger">
                    <strong>Ошибка!</strong> Все поля должны быть заполнены.
                </div>
            <? elseif($data['success']): ?>
                <div class="alert alert-success">
                    <strong>Ваш перевод добавлен в базу!</strong> Результат: <? print htmlspecialchars($data['response']) ?>
                </div>
            <? endif; ?>
        </div>
        <div class="col-md-6">
            
            <form action="/transfer" method="post">
                <input type="hidden" name="host" value="127.0.0.1" />
                <dl class="dl-horizontal">
                    <dt>Сумма перевода</dt>
                    <dd>
                        <div class="form-group">
                            <input type="text" value="<? print htmlspecialchars($data['money']) ?>" name="money" class="form-control">
                        </div>
                    </dd>
                    <dt>ФИО получателя</dt>
                    <dd>
                        <div class="form-group">
                            <input type="text" value="<? print htmlspecialchars($data['receiver_name']) ?>" name="receiver_name" class="form-control">
                        </div>
                    </dd>
                    <dt>Реквизиты получателя</dt>
                    <dd>
                        <div class="form-group">
                            <input type="text" value="<? print htmlspecialchars($data['receiver_details']) ?>" name="receiver_details" class="form-control">
                        </div>
                    </dd>
                    <dt>Счет получателя</dt>
                    <dd>
                        <div class="form-group">
                            <input type="text" value="<? print htmlspecialchars($data['receiver_number']) ?>" name="receiver_number" class="form-control">
                        </div>
                    </dd>
                    <dt>Комментарий</dt>
                    <dd>
                        <div class="form-group">
                            <textarea name="comment" rows="5" class="form-control"><? print htmlspecialchars($data['comment']) ?></textarea>
                        </div>
                    </dd>
                </dl>
                <button type="submit" name="transfer" class="btn btn-success btn-lg">Произвести перевод</button>
            </form>
        </div>
    </div>
</div>