@section('callback_modal')
<aside>
    <form action="/callback" class="callback_modal" method="POST" id="callback_modal">
        <div class='callback_wrapper'>
            <label for='call_username'>Ваше имя:</label>
            <input type='text' id='call_username' name='call_username' placeholder="Имя" class="form-control" />
            <label for='call_username'>Номер телефона:</label>
            <input type='text' id='call_username' name='call_userphone' placeholder="Телефон" class="form-control" />
            <label for='call_username'>Удобное время звонка:</label>
            <input type='text' id='call_username' name='call_time' placeholder="Удобное время звонка" class="form-control" />
            <input type='submit' class='btn btn-primary' value="Отправить" />
        </div>
    </form>
</aside>
@stop