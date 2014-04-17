<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    {{ HTML::style('assets/bootstrap/css/bootstrap.css') }}
    {{ HTML::style('assets/css/uploadfile.css') }}
    {{ HTML::style('assets/css/tinyeditor.css') }}
    {{ HTML::style('assets/css/admin.css') }}
    {{ HTML::style('assets/css/style.css') }}

    {{ HTML::script('assets/js/lib/jquery-1.10.2.min.js') }}
    {{ HTML::script('assets/js/lib/jquery.uploadfile.min.js') }}
    {{ HTML::script('assets/js/lib/tiny.editor.packed.js') }}
    {{ HTML::script('assets/js/script.js') }}
    {{ HTML::script('assets/js/admin.js') }}
</head>
<body>
<header>
    <div class='header_text'>
        <span><a href='/admin'>Администрирование</a></span>
        <a href='/'>Зайти в сайт</a>
    </div>

    @section('header')

    @show

</header>
<section>
    @yield('content')
</section>
</body>
</html>