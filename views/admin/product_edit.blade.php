@extends('admin.layout')

@section('header')
@parent
@stop

@section('content')
<div class='product_form'>
    <div class='left'>
        {{ Form::open(array('url' => 'admin/product/edit/'.$product->id,'method' => 'post','enctype' =>
        'multipart/form-data')) }}
        @if (isset($error))
        <div class="alert alert-error">
            {{ $error }}
        </div>
        @endif
        <div class="row">
            <label for="product_name">Название:</label>
            {{ Form::text('product_name',$product->name,array('placeholder' => 'Название продукта','id'=> 'product_name')) }}
        </div>
        <div id="mulitplefileuploader">Загрузить картинки</div>
        <div id="status"></div>
        <div class="row">
            <label for="product_price">Цена:</label>
            {{ Form::text('product_price',$product->price,array('placeholder' => 'Цена','id'=> 'product_price')) }}
        </div>
        <div class="row">
            <textarea id="content" name="content" style="width: 400px; height: 200px">{{$product->content}}</textarea>
        </div>
        {{ Form::submit('Сохранить',array('class' => 'btn btn-primary')) }}
        {{ Form::close() }}
        <div style="display:none" id="product_id" value="{{$product->id}}"></div>
    </div>
    <div class='right'>
        <div id="preview_content" style='height: 100%; width: 100%'>
            @foreach($images as $image)
            <div class="preview_img_cont">
                @if ($image->general == 1)
                <img class="main" src="/assets/img/goods/{{ $image->image_name }}"/>
                @else
                <img  src="/assets/img/goods/{{ $image->image_name }}"/>
                @endif
                <div class="delete" style="display:none" data-id="{{ $image->id }}"></div>
                <div class="setasmain" data-id="{{ $image->id }}" style="display:none">Сделать главной</div>
                <div class="preloader" style="display:none"></div>
            </div>
            @endforeach
        </div>
    </div>
</div>

<script type="application/javascript">
    var editor = new TINY.editor.edit('editor', {
        id: 'content',
        name: 'content',
        width: 584,
        height: 175,
        cssclass: 'content',
        controlclass: 'tinyeditor-control',
        rowclass: 'tinyeditor-header',
        dividerclass: 'tinyeditor-divider',
        controls: ['bold', 'italic', 'underline', 'strikethrough', '|', 'subscript', 'superscript', '|',
            'orderedlist', 'unorderedlist', '|', 'outdent', 'indent', '|', 'leftalign',
            'centeralign', 'rightalign', 'blockjustify', '|', 'unformat', '|', 'undo', 'redo', 'n',
            'font', 'size', 'style', '|', 'image', 'hr', 'link', 'unlink', '|', 'print'],
        footer: true,
        fonts: ['Verdana','Arial','Georgia','Trebuchet MS'],
        xhtml: true,
        cssfile: 'custom.css',
        bodyid: 'editor',
        footerclass: 'tinyeditor-footer',
        toggle: {text: 'source', activetext: 'wysiwyg', cssclass: 'toggle'},
        resize: {cssclass: 'resize'}
    });
    $("input[type=submit]").click(function(){
        editor.post();
    });
</script>

@stop