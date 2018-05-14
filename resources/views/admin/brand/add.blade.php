@extends('layouts.admin.layout')

@section('title'){{ $title }}@endsection

@section('header')
    @parent
    <link rel="stylesheet" href="{{ asset('/static/plugins/bower_components/dropify/dist/css/dropify.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/static/plugins/bower_components/html5-editor/bootstrap-wysihtml5.css') }}" />

@stop


@section('content')
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row bg-title">
                <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                    <h4 class="page-title">品牌管理</h4></div>
                <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">

                    <ol class="breadcrumb">
                        <li><a href="{{ route('admin.dash.index') }}">控制台</a></li>
                        <li class="active">品牌</li>
                    </ol>
                </div>
                <!-- /.col-lg-12 -->
            </div>

            <div class="row">
                <div class="col-md-12 col-lg-12">
                    <div class="white-box">
                        <h3 class="box-title m-b-0">{{ $title }}</h3>
                        @if(session('status'))
                            <div class="myadmin-alert myadmin-alert-icon myadmin-alert-click alert-success m-t-40">
                                <span id="return-message">{{ session('status') }}</span>
                                <a href="#" class="closed">×</a>
                            </div>
                        @endif

                        @if(count($errors) > 0)
                            <div class="myadmin-alert myadmin-alert-icon myadmin-alert-click alert-danger m-t-40">
                                <span id="return-message">
                                    @foreach($errors->all() as $error)
                                        {{ $error }} <br/>
                                    @endforeach
                                </span>
                                <a href="#" class="closed">×</a>
                            </div>
                        @endif
                        <p class="text-muted m-b-30 font-13">  </p>
                        <div class="row">
                            <div class="col-sm-12 col-xs-12">


                                <form class="form-horizontal" method="post" action="{{ route('admin.brands.store') }}" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <div class="form-group">
                                        <label class="col-md-12">品牌名称</label>
                                        <div class="col-md-12">
                                        <input type="text" name="name" class="form-control" placeholder="" value="{{ old('name') }}">
                                        <div class="help-block with-errors"></div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-12">Logo</label>
                                        <div class="col-md-4">
                                            <input type="file" id="input-file-now" name='thumb' class="dropify"
                                                   data-height="100" data-max-file-size="2M" data-default-file=""/>
                                        </div>

                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-12">介绍</label>
                                        <div class="col-md-12">
                                            <textarea class="textarea_editor form-control" name="content" rows="15" placeholder="">{{ old('content') }}</textarea>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <button type="submit" class="btn btn-success"> 提交 </button>
                                        </div>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
        @section('footer')
            @parent
        @stop
    </div>


@stop


@section('scripts')
    @parent
    <script type="text/javascript">
        //Alerts
        $(".myadmin-alert .closed").click(function (event) {
            $(this).parents(".myadmin-alert").fadeToggle(350);
            return false;
        });
        /* Click to close */
        $(".myadmin-alert-click").click(function (event) {
            $(this).fadeToggle(350);
            return false;
        });
    </script>

    <!-- jQuery file upload -->
    <script src="{{ asset('/static/plugins/bower_components/dropify/dist/js/dropify.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            // Basic
            $('.dropify').dropify();

        });
    </script>

    <!-- wysuhtml5 Plugin JavaScript -->
    <script src="{{ asset('/static/plugins/bower_components/html5-editor/wysihtml5-0.3.0.js') }}"></script>
    <script src="{{ asset('/static/plugins/bower_components/html5-editor/bootstrap-wysihtml5.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('.textarea_editor').wysihtml5();
        });
    </script>
@endsection