@extends('admin.layout')

@section('header')
@include('admin.header_menu')
@stop

@section('content')
<div class="link_control">
    <div class="item add_product">
        <a href='{{ URL::to('admin/product') }}/add/{{ $cur_type }}'>Добавить товар</a>
    </div>
    <div class="item">
        <a href='{{ URL::to('admin/type') }}/edit/{{ $cur_type }}'>Редактировать категорию</a>
    </div>
    <div class="item">
        <a href='{{ URL::to('admin/type') }}/delete/{{ $cur_type }}'>Удалить категорию</a>
    </div>
</div>
<div class='clearfix'></div>
<div class='product_list'>
    <ul class="nav nav-list" style='display: inline-table;' id='products'>
        <li class="nav-header">Товары</li>
        @foreach ($products as $product)
        <li class="product-item">
            <a href='#' class='product-item-link' data-img={{ $product->mainImage($product->id)->image_name }}>{{ $product->name }}</a>
            <div class='control-buttons'>
                <a href='{{ URL::to('admin/product/edit/').'/'.$product->id }}' class='button-edit'></a>
                <a href='{{ URL::to('admin/product/delete/').'/'.$product->id }}' class='button-delete'></a>
            </div>
        </li>
        @endforeach
    </ul>
</div>
<div class='product_preview'>
    <img class="img-polaroid" id='preview_img' style='display: none'>
</div>
<div class='clearfix'></div>
@stop