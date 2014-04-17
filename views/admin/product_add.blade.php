@extends('admin.layout')

@section('header')
@parent
@stop

@section('content')
<div class='product_form'>
    <div class='left'>
        {{ Form::open(array('url' => 'admin/product/add/'.$cur_type,'method' => 'post','enctype' =>
        'multipart/form-data')) }}
        @if (isset($error))
        <div class="alert alert-error">
            {{ $error }}
        </div>
        @endif
        <div class="row">
            <label for="product_name">Название:</label>
            {{ Form::text('product_name',@$product_name,array('placeholder' => 'Название продукта')) }}
        </div>
        <div id="mulitplefileuploader">Загрузить картинки</div>
        <div id="status"></div>
        <div class="row">
            <label for="product_price">Цена:</label>
            {{ Form::text('product_price',@$product_price,array('placeholder' => 'Цена')) }}
        </div>
        <div class="row">
            <textarea id="content" name="content" style="width: 400px; height: 200px"></textarea>
        </div>
        {{ Form::submit('Сохранить',array('class' => 'btn btn-primary')) }}
        {{ Form::close() }}
    </div>
    <div class='right'>
        <div id="preview_content" style='height: 100%; width: 100%'></div>
    </div>
</div>

<script type="application/javascript">
    var editor = new TINY.editor.edit('editor', {
        id: 'content',
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