<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    {{ HTML::style('assets/css/detail.css') }}
    {{ HTML::style('assets/css/jquery.modal.css') }}
    {{ HTML::style('assets/css/carousel/style.css') }}
    {{ HTML::style('assets/bootstrap/css/bootstrap.css') }}
    {{ HTML::style('assets/css/slides_global.css') }}
    {{ HTML::style('assets/css/style.css') }}

    {{ HTML::style('assets/css/modal.css') }}

    {{ HTML::script('assets/js/lib/jquery-1.10.2.min.js') }}
    {{ HTML::script('assets/bootstrap/js/bootstrap.min.js') }}
    {{ HTML::script('assets/js/lib/jquery.modal.js') }}
    {{ HTML::script('assets/js/lib/jquery.textchange.min.js') }}
    {{-- HTML::script('assets/js/lib/jquery.zoom.js') --}}
    {{ HTML::script('assets/js/lib/carousel/jquery.jcarousel.min.js') }}
    {{ HTML::script('assets/js/lib/jquery.zoom.min.js') }}
    {{ HTML::script('assets/js/script.js') }}

    <script src="http://vk.com/js/api/openapi.js" type="text/javascript" charset="windows-1251"></script>
</head>
<body>
<div class='page-wrap'>
    <header>
        @section('header')
        <div class='header-wrapper area'>
            <div class='headl-logo'>
                <a href='/'><img src='/assets/img/logo.png'/> </a>
            </div>
            <div class='head-blocks'>
                <div class="block">
                    <img src="/assets/img/guest_call_back.png" alt="Обратный звонок" title='Обратный звонок'>

                    <div class="middle_top_block_right">
                        <h4>Перезвонить Вам?</h4>
                        <span>Напишите Ваш телефон, мы перезвоним</span>

                        <form action="" method="post" id="feedback_tel">
                            <input type="text" name="post_feedback_tel" id="post_feedback_tel"
                                   class="middle_top_input_text"
                                   value="Введите ваш номер телефона"
                                   onblur="if(this.value==''){this.value='Введите ваш номер телефона'}"
                                   onclick="if(this.value=='Введите ваш номер телефона'){this.value=''}">
                            <input type="button" name="post_feedback_tel_submit" class="middle_top_input_submit"
                                   value="Отправить" onclick="checkifempty3()">
                        </form>
                    </div>
                </div>
                <div class="block">
                    <img src="/assets/img/dostavka.png" alt="Доставка" title='Доставка'>

                    <div class="middle_top_block_right delivery">
                        <h4>Доставка по всей территоии Украины</h4>
                    </div>
                </div>
                <div class="block last">
                    <img src="/assets/img/guest_call_back.png" alt="Обратный звонок">

                    <div class="middle_top_block_right">
                        <h4>Перезвонить Вам?</h4>
                        <span>Напишите Ваш телефон, мы перезвоним</span>

                        <form action="" method="post" id="feedback_tel">
                            <input type="text" name="post_feedback_tel" id="post_feedback_tel"
                                   class="middle_top_input_text"
                                   value="Введите ваш номер телефона"
                                   onblur="if(this.value==''){this.value='Введите ваш номер телефона'}"
                                   onclick="if(this.value=='Введите ваш номер телефона'){this.value=''}">
                            <input type="button" name="post_feedback_tel_submit" class="middle_top_input_submit"
                                   value="Отправить" onclick="checkifempty3()">
                        </form>
                    </div>
                </div>
            </div>
            <div class='clear'></div>
        </div>
        @show
    </header>
    <div class='menu area'>
        <nav>
            <a href='/' class="index"><div>Главная</div></a>
            <a href='/'><div>Как оформить заказ</div></a>
            <a href='/'><div>Гарантия</div></a>
            <a href='/'><div>Отзывы</div></a>
            <a href='/'><div>Контакты</div></a>
        </nav>
    </div>
    <div class='clear'></div>
    <section>
        <div class='sidebar'>

            @section('sidebar_menu')
            @include('sidebar_menu')
            @show
            <div class='community_members'>
                <script type="text/javascript" src="//vk.com/js/api/openapi.js?101"></script>

                <!-- VK Widget -->
                <div id="vk_groups"></div>
                <script type="text/javascript">
                    VK.Widgets.Group("vk_groups", {mode: 0, width: "280", height: "400", color1: 'FFFFFF', color2: '2B587A', color3: '5B7FA6'}, 40804021);
                </script>
            </div>
        </div>
        <div class='maingoods area'>
            @yield('product-detail')
            @yield('maingoods')
        </div>
        <div class='clear'></div>
    </section>
</div>
@include('layout_modal')
@yield('order_modal')

@include('callback_modal')
@yield('callback_modal')
<div class='clear'></div>
<footer>
    @include('footer')
    @yield('footer')
</footer>
</body>
</html>
