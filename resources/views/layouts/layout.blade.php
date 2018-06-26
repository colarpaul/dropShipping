<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Pingu-Shop</title>

    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/main.min.css') }}" rel="stylesheet" type="text/css">

    <script type="text/javascript">
        var _paq = _paq || [];
        _paq.push(['trackPageView']);
        _paq.push(['enableLinkTracking']);
        (function() {
            var u="//paulcolar.de/public/analytics/";
            _paq.push(['setTrackerUrl', u+'piwik.php']);
            _paq.push(['setSiteId', '1']);
            var d=document, g=d.createElement('script'), s=d.getElementsByTagName('script')[0];
            g.type='text/javascript'; g.async=true; g.defer=true; g.src=u+'piwik.js'; s.parentNode.insertBefore(g,s);
        })();
    </script>

    @yield('header')
</head>

<body>
    <div class="header-top">
        <div class="header-top-right container conainter-fluid">
            <span class="language-span">
                <div id="flagstrap" data-selected-country="US"></div>
            </span>
            <span>
                <select id="currency">
                    <option>EUR</option>
                    <!-- <option>USD</option> -->
                    <!-- <option>RON</option> -->
                </select>
            </span>
        </div>
    </div>
    <nav class="navbar navbar-default" id="navbar-top">
        <div class="container-fluid container layout-container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{ route('home') }}"><img id="#logo" src="{{ asset('images/logo_n2.png') }}"></a>
                <span class="searchbox-all">
                    <form id="search-product-form" method="POST" style="display: initial">
                        <input type="text" class="search-product-input" placeholder="Products, categories, tags.." required>
                        <button type="submit" class="search-tool"><i class="fas fa-search"></i></button>
                    </form>
                </span>
                <div class="shopping-cart-section">
                    <a class="shopping-cart-link" href="{{ route('cart') }}">
                        <img class="shopping-cart" src="{{ asset('images/shopping_cart_v6_new.png') }}">
                        <span class="shopping-cart-text-web">Cart</span>
                        <div class="shopping-cart-counter">{{ Cart::count() }}</div>
                    </a>
                </div>

            </div>
            @if(isset($categories))
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right layout-menu">
                    @foreach($categories as $category)
                    <li>
                        <a href="#">{{ $category->category }}</a>
                    </li>
                    @endforeach
                </ul>  
            </div>
            @endif
        </div>
    </nav>

    <div class="container container-fluid main-container">
        @yield('content')
    </div>

    <footer>
        <div class="footer-info">
            <div class="container container-fluid">
                <div class="col-sm-6 col-md-2 col-md-offset-1 ">
                    <div>
                        <img src="{{ asset('images/footer/price.png') }}">
                    </div>
                    <div class="title">
                        Great Value
                    </div>
                    <div class="description">
                        We offer competitive prices on our 100 million plus product range.
                    </div>
                </div>
                <div class="col-sm-6 col-md-2">
                    <div>
                        <img src="{{ asset('images/footer/shipping.png') }}">
                    </div>
                    <div class="title">
                        Worldwide Delivery
                    </div>
                    <div class="description">
                        We ship to over 200 countries & regions.
                    </div>
                </div>
                <div class="col-sm-6 col-md-2 ">
                    <div>
                        <img src="{{ asset('images/footer/card.png') }}">
                    </div>
                    <div class="title">
                        Safe Payment
                    </div>
                    <div class="description">
                        Pay with the world’s most popular and secure payment methods.
                    </div>
                </div>
                <div class="col-sm-6 col-md-2">
                    <div>
                        <img src="{{ asset('images/footer/security.png') }}">
                    </div>
                    <div class="title">
                        Shop with Confidence
                    </div>
                    <div class="description">
                        Our Buyer Protection covers your purchase from click to delivery.
                    </div>
                </div>
                <div class="col-sm-6 col-md-2">
                    <div>
                        <img src="{{ asset('images/footer/support.png') }}">
                    </div>
                    <div class="title">
                        24/7 Help Center
                    </div>
                    <div class="description">
                        Round-the-clock assistance for a smooth shopping experience.
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-subscribe">
            <div class="container container-fluid">
                <div class="title">
                    Register now to get updates on promotions.
                </div>
                <div class="input">
                    <form action="{{ route('joinNewsletter') }}">
                        <input class="col-xs-10 col-sm-7 col-md-3 col-xs-offset-1 col-sm-offset-1 col-md-offset-3" type="email" placeholder="Email" name="newsletterEmail" required>
                        <button class="col-xs-4 col-sm-3 col-md-2 col-xs-offset-4 col-sm-offset-1 col-md-offset-1" type="submit">Subscribe</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="footer-social">
            <div class="container container-fluid">
                <span><a class="btn facebook" href="//facebook.com"><i class="fab fa-facebook-f"></i></a></span>
                <span><a class="btn twitter" href="//twitter.com"><i class="fab fa-twitter"></i></a></span>
                <span><a class="btn instagram" href="//instagram.com"><i class="fab fa-instagram"></i></a></span>
            </div>
        </div>

        <div class="footer-copyright">
            <div class="container container-fluid">
                <div class="policy">
                    <a href="{{ route('refundPolicy') }}">Refund Policy</a> 
                    &nbsp;&nbsp;•&nbsp;&nbsp;
                    <a href="{{ route('privacyPolicy') }}">Privacy Policy</a> 
                    &nbsp;&nbsp;•&nbsp;&nbsp;
                    <a href="{{ route('termsService') }}">Terms of Service</a>
                </div>
                <div>© 2018 Pingu-Shop. All rights reserved.</div>
            </div>
        </div>

        <script src="{{ asset('https://code.jquery.com/jquery-3.3.1.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
        <script src="{{ asset('bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('jquery-ui-1.12.1/jquery-ui.min.js') }}"></script>
        <script src="{{ asset('flagstrap/js/flags.js') }}"></script>
        <script src="{{ asset('slick/slick.js') }}"></script>
        <script src="https://www.paypalobjects.com/api/checkout.js"></script>
        <script>
            $('#search-product-form').submit(function(e){
                e.preventDefault();
                var searchKey = $('.search-product-input').val();
                searchKey = searchKey.replace(' ', '-');
                searchKey = searchKey.replace('&', 'and');
                window.location = "/" + searchKey + "/s";
            });
        </script>
        <script src="{{ asset('js/main.js') }}"></script>
        @yield('footer')
    </footer>

    <div class="notification-popup">
        <a href="#" class="product-notification-hyperlink">
            <div class="product col-md-12">
                <div class="image col-xs-3 col-md-3">
                    <img src="">
                </div>
                <div class="description col-xs-9 col-md-9">
                </div>
            </div>
        </a>
        <div class="close-notification"><i class="far fa-times-circle"></i></div>
    </div>
</body>
</html>
