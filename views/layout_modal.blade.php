@section('order_modal')
<aside>
    <form action="/order" class="buy_modal" method="POST" id="oreder_model">
        <div class='product-left'>
            <div class='detail-image'>
                <div class="img_content" style="background-image: url('/assets/img/goods/{{ $product->mainImage($product->id)->image_name }}')">
                </div>
            </div>
        </div>
        <div class='modal_product-right'>
            <div class='detail-name'>
                <p class="text-primary" id='modal_prod_name'>{{ @$product->name }}</p>
            </div>
            <div class='detail-price'>
                Цена: <span class='price-value-order' id='modal_prod_price'>{{ @$product->price }}</span> грн.
            </div>
            <div class='order-count'>
                Количество:
                <span id='select_count' name='select_count'>

                </span>
                <span><input type='text' pattern="[0-9]*" id='pre_product_count' name='pre_product_count'
                             class='pre_select_count' style='display: none;height: 22px;'/></span>
            </div>
            <div class='total-price'>
                Общая цена: <span class='total-price-value-order' id='total_price' name='total_price'></span> грн.
            </div>
            <div class='detail-username'>
                <label for='username'>Ф.И.О:</label>
                <input type='text' name='username' id='username'/>
            </div>
            <div class='detail-useraddress'>
                <label for='userphone'>Телефон:</label>
                <input type='text' name='userphone' id='userphone'/>
            </div>
            <div class='detail-useraddress'>
                <label for='email'>E-mail:</label>
                <input type='text' name='email' id='email'/>
            </div>
            <div class='order-detail'>
                <p>* Доставка по Украине осуществляется курьерской службой Новая почта.<p style='color:red;line-height: 0px;'>Пересылка товара осуществляется БЕСПЛАТНО.</p></p>
            </div>
        </div>
        <div class='order_btn'>
            <input type='button' value='Сделать заказ' id='to_order' class="green_button">
        </div>
        <span class="error" id='error'></span>
        <a href="#close-modal" rel="modal:close" class="close-modal">Close</a>
        <input type='hidden' name='product_id' id='product_id' value="{{ @$product->id }}" />
        <input type='hidden' name='type_id' id='type_id' value="{{ @$cur_type }}" />
    </form>
</aside>
@stop