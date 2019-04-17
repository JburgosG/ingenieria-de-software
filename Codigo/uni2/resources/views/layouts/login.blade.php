<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Uni2 | Inicio de Sesión</title>

        <!-- CSS -->
        {!! Html::style('css/login/bootstrap/css/bootstrap.min.css') !!}
        {!! Html::style('font-awesome/css/font-awesome.css') !!}
        {!! Html::style('css/login/demo.css') !!}
        {!! Html::style('css/login/style1.css') !!}

        <!-- Formulario -->
        {!! Html::style('css/login/formulario.css') !!}
        {!! Html::style('css/login/animate.css') !!}
        {!! Html::style('css/login/style.css') !!}
    </head>
    <body>
        <ul class="cb-slideshow">
            <li><span>Image 01</span></li>
            <li><span>Image 02</span></li>
            <li><span>Image 03</span></li>
            <li><span>Image 04</span></li>
            <li><span>Image 05</span></li>
        </ul>
        <div class="content">
            @yield('content')
        </div>

        <!-- SCRIPTS -->
        {!! Html::script('js/login/jquery-2.1.1.js') !!}
        {!! Html::script('js/login/modernizr.custom.86080.js') !!}
        
        {!! Html::script('js/plugins/validate/jquery.validate.min.js') !!}
        {!! Html::script('js/plugins/validate/messages_es.js') !!}
        
        {!! Html::script('js/login/app.js') !!}
    </body>
</html>