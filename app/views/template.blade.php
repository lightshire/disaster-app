<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">
        <link rel="stylesheet" href="/css/bootstrap.min.css">
        <link rel="stylesheet" href="/css/bootstrap-theme.min.css">
       
        <link rel="stylesheet" href="/css/main.css">

        <script src="/js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>
    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
        <![endif]-->

        @yield('content')
        <div class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="credits">
                            <ul class="list-inline">
                                <li><a href="#">Contact Us</a></li>
                                <li><a href="#">About</a></li>
                                <li><a href="#">Donate</a></li>
                            </ul>
                            <div class="row">
                                <div clas="col-md-12">
                                     <ul class="list-inline">
                                        <li><a href="#" target="_blank"><img src="/img/footer/1.png"/></a></li>
                                        <li><a href="#" target="_blank"><img src="/img/footer/2.png"/></a></li>
                                        <li><a href="#" target="_blank"><img src="/img/footer/3.png"/></a></li>
                                        <li><a href="#" target="_blank"><img src="/img/footer/4.png"/></a></li>
                                        <li><a href="#" target="_blank"><img src="/img/footer/5.png"/></a></li>
                                     
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.js"></script>
        <script>window.jQuery || document.write('<script src="/js/vendor/jquery-1.10.1.js"><\/script>')</script>
        <script src="/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="/js/jquery.backstretch.js" type="text/javascript"></script>
        <script src="/js/main.js"></script>
        @yield('scripts')
        <script>
            var _gaq=[['_setAccount','UA-XXXXX-X'],['_trackPageview']];
            (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
            g.src='//www.google-analytics.com/ga.js';
            s.parentNode.insertBefore(g,s)}(document,'script'));
        </script>
    </body>
</html>
