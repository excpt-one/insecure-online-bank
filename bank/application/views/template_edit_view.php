<div class="container">
    <div class="page-header">
        <h1>Редактирование шаблона <? print htmlspecialchars($data['title']) ?></h1>
    </div>
    
    <div class="row">
        <div class="col-md-6">
            <form action="" method="post">
                <input type="hidden" name="id" value="<? print htmlspecialchars($data['id']) ?>" />
                <input type="hidden" name="edit" value="edit" />
                <dl class="dl-horizontal">
                    <dt>Название шаблона</dt>
                    <dd>
                        <div class="form-group">
                            <input type="text" value="<? print htmlspecialchars($data['title']) ?>" name="title" class="form-control">
                        </div>
                    </dd>
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
                    <dt>Описание</dt>
                    <dd>
                        <div class="form-group">
                            <textarea name="description" rows="10" class="form-control"><? print htmlspecialchars($data['description']) ?></textarea>
                        </div>
                    </dd>
                </dl>
                <button type="submit" class="btn btn-success btn-lg">Сохранить</button>
            </form>
        </div>
    </div>
</div>