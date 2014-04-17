@extends('layout')

@section('header')
@parent
@stop

@section('maingoods')
@if ($products->count() == 0)
<div>Товаров нет</div>
@else
@foreach ($products as $product)
<div class='product-wrapper'>
    <div class='product-image'>
        <a href='/detail/{{ $cur_type }}/{{ $product->id }}'>
            <!--<img class='img-rounded' src="assets/img/goods/{{ $product->mainImage($product->id)->image_name }}" />-->
            <div title="{{$product->name}}" class="img_content" style="background-image: url('/assets/img/goods/{{ $product->mainImage($product->id)->image_name }}')">
            </div>
        </a>
    </div>
    <div class='product-name'>
        <a href='/detail/{{ $cur_type }}/{{ $product->id }}' title="{{$product->name}}">{{ $product->name }}</a>
    </div>
    <div class='product-price'>
        <span data-id='one_price'>{{ $product->price}}</span> грн.
    </div>
    <div class='product-button'>
        <a href="#oreder_model" data-id='buy_btn' data-prod_id='{{ $product->id }}' rel="modal:open" type="button" class="gray_button" style='margin-right: 10px;'>Купить</a>
        <a href="/detail/{{ $cur_type }}/{{ $product->id }}" type="button" class="gray_button">Подробнее</a>
    </div>
</div>
@endforeach
@endif
{{ $products->links() }}

<script type="application/javascript">
    $( document ).ready(function() {
        $('.menu a.index div').addClass('active');
    });
</script>

@stop

