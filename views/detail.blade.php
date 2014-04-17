@extends('layout')

@section('header')
@parent

@stop

@section('sidebar_reviews')
@parent
@stop

@section('product-detail')
<div class='product-detail'>
    <div class="product_left">
        <div class='detail-name'>
            <p class="text-primary">{{ $product->name }}</p>
        </div>
        <div class='detail-image'>
            <div id="images_content" class='product-left'>

                <div class="slides_container">
                    <img src='/assets/img/goods/{{ $main_image }}'/>
                </div>
                <div class="pagination">
                    @foreach($images as $image)
                    <div class="item">
                        <img src="/assets/img/goods/{{ $image->image_name }}"/>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <div class='product-right'>
        <div class='detail-price'>
            Цена: <span class='price-value' id='one_price' name='one_price'>{{ $product->price }}</span> грн.
        </div>

        <div class='detail-count'>
            <label for='product_count'>Количество:</label>
            <input type='text' id='product_count' value='1' name='product_count' pattern="[0-9]*">
        </div>
        <div class='detail-button'>
            <a class="gray_button" href="#oreder_model" id='buy_btn' rel="modal:open"
               style='margin-right: 10px;'>Купить</a>
        </div>
        <div class='detail-privilege'>
            <div class='priv-q'>
                Почему стоит сделать заказ именно у Нас?:
            </div>
            <div>
                <ul>
                    <li>Разумные цены на все чехлы для iPhone, iPad;</li>
                    <li>Лучший выбор аксессуаров для Apple;</li>
                    <li>Наличие всех чехлов в Украине;</li>
                    <li>Возврат товара в течении 14 дней;</li>
                    <li>Оплата товара при получении после проверки;</li>
                </ul>
            </div>
        </div>
    </div>
    <div class='clear'></div>
    <div class='detail-description'>
        {{$product->content}}
    </div>

</div>
<div class='other_products'>
    <div class='other_prod_title'>Возможно Вам также будут интересны следующие товары:</div>
    <div id="wrapper">
        <div class="d-carousel">
            <ul id="mycarousel" class="jcarousel-skin-name">
                @foreach($id_other_products as $i => $id_other_product)
                <li>
                    <div class='product-image' title="{{ $other_products[$id_other_product]->name }}">
                        <a href='/detail/{{ $cur_type }}/{{ $other_products[$id_other_product]->id }}'>
                            <div class="image" style="background-image: url('/assets/img/goods/{{ $other_products[$id_other_product]->mainImage($other_products[$id_other_product]->id)->image_name }}')"></div>
                        </a>
                    </div>
                    <div class='product-price'>
                        <span data-id='one_price'>{{ $other_products[$id_other_product]->price}}</span> грн.
                    </div>
                    <div class='product-name' title="{{ $other_products[$id_other_product]->name }}">
                        <a href='/detail/{{ $cur_type }}/{{ $other_products[$id_other_product]->id }}'>{{
                            $other_products[$id_other_product]->name }}</a>
                    </div>
                </li>
                @endforeach
            </ul>
        </div>
        <div class="clear"></div>
    </div>
</div>
<script type="text/javascript">
    $(function () {
        $('#mycarousel').jcarousel({
            scroll: 1
        });

        function centering() {
            $('.slides_container img').load(function(){
                var content_height = $('.slides_container').height();
                var content_width = $('.slides_container').width();
                var image_height = $(this).height();
                var image_width = $(this).width();
                $(this).css('margin-top',(content_height-image_height)/2);
                $(this).css('margin-left',(content_width-image_width)/2);


            });
        }

        $('.pagination .item').on('click',function() {
            var image_src = $(this).find('img').attr("src");
            $('.slides_container img').attr('src',image_src);
            $('.pagination .item').removeClass('current');
            $(this).addClass('current');
            centering();
        });

        $('.pagination .item:first').addClass('current');
        centering();
    });
</script>

@stop