<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>会员卡管家</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script type="text/javascript"
            src="http://api.map.baidu.com/api?v=2.0&ak=GrC90v4MnVnmiGCivKCkhHSRl6rQMHQN"></script>
    <script type="text/javascript" src="https://res.wx.qq.com/open/js/jweixin-1.2.0.js"></script>
    <script>
        window.user = {
            'id': '{{getUser()->id}}',
            'nickname': '{{getUser()->nickname}}',
            'avatar': '{{getUser()->headimgurl}}',
            'phone': '{{getUser()->phone}}',
            'sex': '{{getUser()->sex}}',
            'subscribe': '{{getUser()->subscribe}}',
        };
        {{--wx.config({{ app('wechat')->js->config(array(--}}
            {{--'onMenuShareQQ',--}}
            {{--'onMenuShareWeibo',--}}
            {{--'onMenuShareTimeline',--}}
            {{--'onMenuShareAppMessage',--}}
            {{--'getLocation',--}}
            {{--'openLocation',--}}
            {{--'chooseImage',--}}
            {{--'previewImage',--}}
            {{--'uploadImage',--}}
            {{--'chooseWXPay'--}}
        {{--), true) }});--}}
    </script>
    @yield('style')
</head>
<body>
<div id="app">
    @yield('content')
</div>

<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
