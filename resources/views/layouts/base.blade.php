<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=0, width=device-width"/>
    <link rel="icon" href="{{ asset('images/logo.ico') }}">
    <title>@yield('title') - SiteName</title>
    @section('head_css')
        <link type="text/css" rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
        <link type="text/css" rel="stylesheet" href="{{ asset('css/iconfont.css') }}">
        <link type="text/css" rel="stylesheet" href="{{ asset('css/custom_font.min.css') }}">
        <link type="text/css" rel="stylesheet" href="{{ asset('css/head_style_v3.3.min.css') }}">
        <link type="text/css" rel="stylesheet" href="{{ asset('css/jquery.half_star.min.css') }}">
        <link type="text/css" rel="stylesheet" href="{{ asset('css/footer_style_v3.min.css') }}">
        <link type="text/css" rel="stylesheet" href="{{ asset('css/pc_project_v3.min.css') }}">
    @show

    @section('custom_css')
    <style type="text/css">
        .nav-bars li{
            font-weight: normal;
        }
        .nav-bars li:hover{
            font-weight: bolder;
        }
        #main_box {
            padding-right: 320px;
        }
        #side_box {
            width: 300px;
        }
        #side_box > div:first-child {
            padding-top: 7px;
        }
        .manual_img{
            border: solid 1px #ddd;
        }
        #main_box .distributors_list .star_block{
            display: inline-block;
            margin-left: 20px;
        }
        #side_box > div {
            padding-top: 20px;
        }
        .main_top{
            clear: both;
            height: 255px;
            margin-top: 5px;
        }
        .main_top .news{
            width: 100%;
            margin-top: 20px;
            margin-left: 0;
        }
        .main_top .news .news_list li:nth-child(2n) {
            margin-left: 15px;
        }
        .main_top .news .news_list li {
            width: calc(50% - 10px);
        }
        .main_middle{
            margin-top: 0;
            padding-top: 30px;
        }
        .main_middle .q_and_a {
            width: 250px;
        }
        .main_middle .know_base{
            width: calc(100% - 260px);
        }
        .main_middle .know_base .know_base_list li {
            width: calc(50% - 10px);
        }
        .main_middle .know_base .know_base_list li:nth-child(2n){
            margin-left: 20px;
        }
        .stage_classify_filt {
            padding-bottom: 0px;
            float: initial;
            border-top: none;
        }
        .stage_classify_filt .filt_option_box{
            float: initial;
        }
        .stage_classify_filt .filt_option_box .filt_option {
            width: 100%;
            margin-left: 0px;
        }
        .other_options_block .other_option_box {
            padding-left: 0px;
            width: 100%;
        }
        .other_options_block .other_option_box dl {
            left: 0;
            width: 100%;
        }
        .other_options_block {
            border-bottom: none;
        }
        .q_and_a_list{
            padding-right: 10px;
        }
    </style>
    @show

    @section('head_js')
        <script src="{{ asset('js/ie10-viewport-bug-workaround.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/jquery-1.11.3.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/pc_head_js_v3.2.min.js') }}" async="async"></script>
        <script type="text/javascript" src="{{ asset('js/jquery.star_half.min.js') }}" async="async"></script>
        <script type="text/javascript" src="{{ asset('js/pc_home_v3.min.js') }}" async="async"></script>
        <script type="text/javascript" src="{{ asset('js/pc_footer_js_v3.min.js') }}"></script>
    @show
</head>
<body>

<header id="model-heard" class="heard">
    <div id="go_to_top"><span class="iconfont icon-daodingbu"></span></div>
    <div class="head_cantainer">
        <ul class="head_sign">
            <li><a href="{{ route('main.index') }}"><i class="icon-home iconfont f12"></i> Motortong.com </a></li>
            <li><a href="" rel="nofollow"><i class="icon-news iconfont f12"></i> News </a></li>
            <li> <a href="" rel="nofollow"><i class="icon-anonymous-iconfont iconfont f12"></i> Prices </a></li>
            <li><a href="" rel="nofollow"><i class="icon-xiazai1 iconfont f12"></i> Manual</a></li>
            <li><a href=""><i class="icon-wenhaosvg iconfont f12"></i> Q&A </a></li>
            <li><a href="" rel="nofollow"><i class="icon-denglu iconfont f12"></i> Distributor</a></li>
            <li><a href=""><i class="icon-gou1 iconfont f12"></i> Sign In</a></li>
        </ul>
        <div class="product-info-text-bottom">
            <span>Share to:</span>
            <ul>
                <li><a href=""></a></li>
                <li><a href=""></a></li>
                <li><a href=""></a></li>
                <li><a href=""></a></li>
            </ul>
        </div>
    </div>
    <div id="logo" class="">
        <a href="/">
            <div class="logo-img"></div>
        </a>
        <!--<div class="logo_name float_left f24"><b>Quotes</b></div>-->
        <div class="logo-search">
            <form action="/search.html" method="get">
                <div class="logo-search-box">
                    <div class="product-motors-search ">
                        <div class="product-motors-dropdown" id="Pdropdown">
                            <div class="product-btn-color">
                                <span id="text-meun">All</span>
                                <span class="product-carets icon-icon-triangle iconfont f_color_888"></span>
                                <ul class="product-motors-last">
                                    <li><a href="#" rel="nofollow">All</a></li>
                                    <li><a href="#" rel="nofollow">Products</a></li>
                                    <li><a href="#" rel="nofollow">Suppliers</a></li>
                                    <li><a href="#" rel="nofollow">Buyers</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="product-motors-text">
                            <input type="text" placeholder="Synchronous Motrs" name="q"
                                   class="product-motors-input">
                        </div>
                    </div>
                    <div class="">
                        <input class="logo-search-button product-motors-btnsearch" type="submit" value="Search">

                    </div>
                </div>
            </form>
        </div>
    </div>
</header>


@yield('content')


@section('footer')
<footer id="foot">
    <hr>
    <div class="">
        <div class="motors-bottom">
            <div class="motors-center">
                <div class="FollowUs">
                    <label>Follow Us :</label>

                    <div class="motors-share">
                        <span class='st_facebook_large' displayText='Facebook'></span>
                        <span class='st_twitter_large' displayText='Tweet'></span>
                        <span class='st_linkedin_large' displayText='LinkedIn'></span>
                        <span class='st_googleplus_large' displayText='Google +'></span>
                    </div>
                </div>
                <div class="motors-footer-nav">
                    Copyright © 2017 Motortong.com. All rights reserved. Designed by HK Netor LTD
                </div>
            </div>
        </div>
        <div class="clear"></div>
    </div>
</footer>
@show
</body>

</html>
