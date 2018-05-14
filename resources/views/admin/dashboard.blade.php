@extends('layouts.admin.layout')

@section('title'){{ $title }}@endsection


@section('content')
    <!-- ============================================================== -->
    <!-- End Left Sidebar -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Page Content -->
    <!-- ============================================================== -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row bg-title">
                <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                    <h4 class="page-title">首页</h4></div>
                <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">

                    <ol class="breadcrumb">
                        <li><a href="#">控制台</a></li>
                        <li class="active">首页</li>
                    </ol>
                </div>
                <!-- /.col-lg-12 -->
            </div>


            <div class="row">
                <!-- col-md-9 -->
                <div class="col-md-12 col-lg-12">
                    <div class="manage-users">
                        <div class="sttabs tabs-style-iconbox">
                            <nav>
                                <ul>
                                    <li><a href="#section-iconbox-1" class="sticon ti-user"><span>管理信息</span></a></li>
                                    <li><a href="#section-iconbox-2" class="sticon ti-lock"><span>系统信息</span></a></li>

                                </ul>
                            </nav>
                            <div class="content-wrap">
                                <section id="section-iconbox-1">
                                    <div class="p-20 row">
                                        <div class="col-sm-6">
                                            <h3 class="m-t-0">Welcome {{ $user['name'] }}</h3></div>

                                    </div>

                                </section>
                                <section id="section-iconbox-2">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="white-box">

                                                <p class="text-muted m-b-20">站点的信息配置文件在 config/site.php 里面修改</p>
                                                <div class="table-responsive">
                                                    <table class="table table-striped">

                                                        <tbody>
                                                        <tr><td>站点名称</td><td>
                                                                {{ config('site.name') }}</td></tr>
                                                        <tr><td>站点URL</td><td>
                                                                {{ config('site.url') }}</td></tr>
                                                        <tr><td>服务器</td><td>
                                                                {{ $sysinfo['server'] }}</td></tr>
                                                        <tr><td>内存</td><td>
                                                                {{ $sysinfo['memory'] }}</td></tr>
                                                        <tr><td>Laravel 版本</td><td>
                                                                {{ $sysinfo['laraver'] }}</td></tr>
                                                        <tr><td>服务器时间</td><td>
                                                                {{ $sysinfo['timezone'] }}</td></tr>

                                                        <tr><td>最大上传文件</td><td>
                                                                {{ $sysinfo['upload_max_filesize'] }}</td></tr>
                                                        <tr><td>Mysql 版本</td><td>
                                                                {{ $sysinfo['mysql'] }}</td></tr>
                                                        <tr><td>PHP 版本</td><td>
                                                                {{ $sysinfo['php'] }}</td></tr>
                                                        <tr><td>服务器IP</td><td>
                                                                {{ $sysinfo['ip'] }}</td></tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </section>

                            </div>
                            <!-- /content -->
                        </div>
                        <!-- /tabs -->
                    </div>
                </div>
                <!-- /col-md-9 -->
            </div>

        </div>
        @section('footer')
            @parent
        @endsection
    </div>



@endsection


@section('scripts')
    @parent
    <!-- Custom tab JavaScript -->
    <script src="{{ asset('/static/js/cbpFWTabs.js') }}"></script>
    <script type="text/javascript">
        (function () {
            [].slice.call(document.querySelectorAll('.sttabs')).forEach(function (el) {
                new CBPFWTabs(el);
            });
        })();
    </script>
@endsection