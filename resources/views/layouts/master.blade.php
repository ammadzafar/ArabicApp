<!doctype html>
<!--[if lt IE 7]>		<html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>			<html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>			<html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->	<html class="no-js" lang=""> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Arabic Learning | @yield('title')</title>
    @include('layouts.css')
    @yield('style')
</head>
<body class="at-bgwhite">
<!--[if lt IE 8]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->

<!--************************************
        Loader Start
*************************************-->
<div class="at-loaderarea hidden">
    <div class="lds-spinner">
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
    </div>
</div>
<!--************************************
        Loader End
*************************************-->
<!--************************************
        Wrapper Start
*************************************-->
<div id="at-wrapper" class="at-wrapper {{auth()->user()->isStudent() || auth()->user()->isRater() ? 'at-wrappervtwo' : ''}} {{auth()->user()->isRater() ? 'at-nopaddingwrapper' : ''}}">

    <!--************************************
            Header Start
    *************************************-->
@include('layouts.header')
<!--************************************
            Header End
    *************************************-->

    <!--************************************
            Main Start
    *************************************-->
    <main id="at-main" class="at-main {{auth()->user()->isStudent() || auth()->user()->isRater() ? 'at-haslayout' : ''}}">
        @yield('body')

    </main>
    <!--************************************
            Main End
    *************************************-->
</div>
<!--************************************
        Wrapper End
*************************************-->
@include('layouts.js')
@yield('scripts')


<script>

    if(sessionStorage.remember === 'checked'){
        let user = {};
        user['name'] = "{{auth()->user()->name}}";
        user['email'] = "{{auth()->user()->email}}";
        user['avatar'] = "{{asset('uploads/profile-pictures/'.auth()->user()->avatar)}}";

        localStorage.setItem('{{auth()->user()->id}}', JSON.stringify(user));

    }
    sessionStorage.clear();
    //...

    function showPreLoader(){
        $('.at-loaderarea').removeClass('hidden');
    }

    function hidePreLoader(){
        $('.at-loaderarea').addClass('hidden');
    }
    // jQuery(window).load(function() {
    //     jQuery(".lds-spinner").delay(500).fadeOut();
    //     jQuery(".wifi-symbol").delay(500).fadeOut("slow");
    // });
    // $(function() {
    //     'use strict';
    //     (function(factory) {
    //         if (typeof module === 'object' && module.exports) {
    //             module.exports = factory;
    //         } else {
    //             factory(Highcharts);
    //         }
    //     }(function(Highcharts) {
    //         (function(H) {
    //             H.wrap(H.seriesTypes.column.prototype, 'translate', function(proceed) {
    //                 const options = this.options;
    //                 const topMargin = options.topMargin || 0;
    //                 const bottomMargin = options.bottomMargin || 0;
    //
    //                 proceed.call(this);
    //
    //                 H.each(this.points, function(point) {
    //                     if (options.borderRadiusTopLeft || options.borderRadiusTopRight || options.borderRadiusBottomRight || options.borderRadiusBottomLeft) {
    //                         const w = point.shapeArgs.width;
    //                         const h = point.shapeArgs.height;
    //                         const x = point.shapeArgs.x;
    //                         const y = point.shapeArgs.y;
    //
    //                         let radiusTopLeft = H.relativeLength(options.borderRadiusTopLeft || 0, w);
    //                         let radiusTopRight = H.relativeLength(options.borderRadiusTopRight || 0, w);
    //                         let radiusBottomRight = H.relativeLength(options.borderRadiusBottomRight || 0, w);
    //                         let radiusBottomLeft = H.relativeLength(options.borderRadiusBottomLeft || 0, w);
    //
    //                         const maxR = Math.min(w, h) / 2
    //
    //                         radiusTopLeft = radiusTopLeft > maxR ? maxR : radiusTopLeft;
    //                         radiusTopRight = radiusTopRight > maxR ? maxR : radiusTopRight;
    //                         radiusBottomRight = radiusBottomRight > maxR ? maxR : radiusBottomRight;
    //                         radiusBottomLeft = radiusBottomLeft > maxR ? maxR : radiusBottomLeft;
    //
    //                         point.dlBox = point.shapeArgs;
    //
    //                         point.shapeType = 'path';
    //                         point.shapeArgs = {
    //                             d: [
    //                                 'M', x + radiusTopLeft, y + topMargin,
    //                                 'L', x + w - radiusTopRight, y + topMargin,
    //                                 'C', x + w - radiusTopRight / 2, y, x + w, y + radiusTopRight / 2, x + w, y + radiusTopRight,
    //                                 'L', x + w, y + h - radiusBottomRight,
    //                                 'C', x + w, y + h - radiusBottomRight / 2, x + w - radiusBottomRight / 2, y + h, x + w - radiusBottomRight, y + h + bottomMargin,
    //                                 'L', x + radiusBottomLeft, y + h + bottomMargin,
    //                                 'C', x + radiusBottomLeft / 2, y + h, x, y + h - radiusBottomLeft / 2, x, y + h - radiusBottomLeft,
    //                                 'L', x, y + radiusTopLeft,
    //                                 'C', x, y + radiusTopLeft / 2, x + radiusTopLeft / 2, y, x + radiusTopLeft, y,
    //                                 'Z'
    //                             ]
    //                         };
    //                     }
    //
    //                 });
    //             });
    //         }(Highcharts));
    //     }));
    //     Highcharts.chart('container', {
    //         chart: {
    //             type: 'column'
    //         },
    //         xAxis: {
    //             categories: ['MON', 'TUE', 'WED', 'THU', 'FRI', 'SAT', 'SUN']
    //         },
    //
    //         plotOptions: {
    //             column: {
    //                 pointPadding: 0.2,
    //                 borderWidth: 0,
    //                 grouping: true,
    //                 borderRadiusTopLeft: 20,
    //                 borderRadiusTopRight: 20
    //             }
    //         },
    //         series: [{
    //             name: 'Students',
    //             data: [49.9, 71.5, 106.4, 129.2, 176.0, 95.6, 54.4]
    //
    //         }, {
    //             name: 'Masters',
    //             data: [70.4, 82.2, 124.5, 139.7, 188.6, 104.8, 71.1]
    //
    //         }]
    //     });
    // });
</script>

</body>
</html>
















{{--<!doctype html>--}}
{{--<html lang="en">--}}
{{--<head>--}}
{{--    <meta charset="utf-8">--}}
{{--    <meta http-equiv="X-UA-Compatible" content="IE=edge">--}}

{{--    <!-- Responsive -->--}}
{{--    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>--}}
{{--@yield('title')--}}


{{--<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->--}}
{{--    <meta name="description" content="">--}}
{{--    <meta name="author" content="">--}}
{{--    <meta name="keywords" content="">--}}

{{--    <!--CSS -->--}}
{{--    @include('layouts.css')--}}
{{--</head>--}}
{{--<body>--}}
{{--@yield('body')--}}




{{--@include('layouts.js')--}}
{{--@yield('scripts')--}}
{{--</body>--}}
{{--</html>--}}
