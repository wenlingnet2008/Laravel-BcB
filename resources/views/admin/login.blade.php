<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('/static/plugins/images/favicon.png') }}">
    <title>{{ $title }}</title>
    <!-- Bootstrap Core CSS -->
    <link href="{{ asset('/static/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- animation CSS -->
    <link href=" {{ asset('/static/css/animate.css')}}" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="{{ asset('/static/css/style.css') }}" rel="stylesheet">
    <!-- color CSS -->
    <link href="{{ asset('/static/css/colors/blue.css') }}" id="theme" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<!-- Preloader -->
<div class="preloader">
    <div class="cssload-speeding-wheel"></div>
</div>
<section id="wrapper" class="login-register">
    <div class="login-box login-sidebar">
        <div class="white-box">
            <form class="form-horizontal form-material" id="loginform" action="{{ route('admin.login') }}" method="post"
                  data-toggle="validator">
                {{ csrf_field() }}
                <a href="javascript:void(0)" class="text-center db">后台登录</a>


                @foreach($errors->all() as $error)
                <div class="myadmin-alert myadmin-alert-icon myadmin-alert-click alert-danger m-t-40">
                    <span id="return-message">{{ $error }}</span>
                    <a href="#" class="closed">×</a>
                </div>
                @endforeach


                <div class="form-group m-t-40">
                    <div class="col-xs-12">
                        <input class="form-control" type="text" name="email" placeholder="邮箱"
                               data-error="请输入邮箱" value="{{old('email')}}" required>
                        <div class="help-block with-errors"></div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-xs-12">
                        <input class="form-control" type="password" name="password" required="" placeholder="密码"
                               data-error="请输入密码">
                        <div class="help-block with-errors"></div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-12">
                        <div class="checkbox checkbox-primary pull-left p-t-0">
                            <input id="checkbox-signup" type="checkbox" name="remmber">
                            <label for="checkbox-signup"> 记住我 </label>
                        </div>
                    </div>
                </div>
                <div class="form-group text-center m-t-20">
                    <div class="col-xs-12">
                        <button class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light"
                                type="submit">登录
                        </button>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 m-t-10 text-center">
                    </div>
                </div>

            </form>
        </div>
    </div>
</section>
<!-- jQuery -->
<script src="{{ asset('/static/plugins/bower_components/jquery/dist/jquery.min.js') }}"></script>
<!-- Bootstrap Core JavaScript -->
<script src="{{ asset('/static/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<!-- Menu Plugin JavaScript -->
<script src="{{ asset('/static/plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.js') }}"></script>

<!--slimscroll JavaScript -->
<script src="{{ asset('/static/js/jquery.slimscroll.js') }}"></script>
<!--Wave Effects -->
<script src="{{ asset('/static/js/waves.js') }}"></script>
<!-- Custom Theme JavaScript -->
<script src="{{ asset('/static/js/custom.min.js') }}"></script>
<script src="{{ asset('/static/js/validator.js') }}"></script>
<script type="text/javascript">
    //Alerts
    $(".myadmin-alert .closed").click(function(event) {
        $(this).parents(".myadmin-alert").fadeToggle(350);
        return false;
    });
    /* Click to close */
    $(".myadmin-alert-click").click(function(event) {
        $(this).fadeToggle(350);
        return false;
    });

    const regex = /.*reset$/g;
    const str = window.location.href;
    if(regex.exec(str) !== null){
        $("#recoverform").show()
        $("#loginform").hide()

    }
</script>
<!--Style Switcher -->
<script src="{{ asset('/static/plugins/bower_components/styleswitcher/jQuery.style.switcher.js') }}"></script>
</body>
</html>
