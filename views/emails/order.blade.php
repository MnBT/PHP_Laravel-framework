<html>
<head>

</head>
<body>
<h3>Новый заказ!</h3>

<div>
    <b>Имя:</b> {{ $username }}
</div>
<div>
    <b>Телефон:</b> {{ $userphone }}
</div>
<div>
    <h2>Товар</h2>
    <div><b>Название:</b> {{ $product->name }}</div>
    <div><b>Цена:</b> {{ $product->price }}</div>
    <div><b>Количество:</b> {{ $count }}</div>
    <div><b>Общая цена:</b> {{ $total_price }}</div>
    <div><b>Ссылка:</b> <a href="{{ $product_link }}">Перейти к товару</a></div>
</div>
</body>
</html>