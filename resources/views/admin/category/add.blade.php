@extends('layouts.admin.layout')

@section('title'){{ $title }}@endsection

@section('header')
    @parent

@stop


@section('content')
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row bg-title">
                <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                    <h4 class="page-title">分类管理</h4></div>
                <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">

                    <ol class="breadcrumb">
                        <li><a href="{{ route('admin.dash.index') }}">控制台</a></li>
                        <li class="active">分类</li>
                    </ol>
                </div>
                <!-- /.col-lg-12 -->
            </div>

            <div class="row">

                <div class="col-md-12 col-xs-12">

                    @include('admin.flash_error_or_success')
                    <div class="white-box">

                        <form class="form-horizontal" method="post" action="{{ route('admin.categories.store') }}">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <input type="hidden" value="0" name="parent_id" id="parent_id">
                                <label class="col-sm-12">主分类</label>
                                <div class="input-group">
                                    <div class="col-sm-12">
                                        <select id="parent_category">

                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12">分类名称</label>
                                <div class="col-md-12">
                                    <input type="text" class="form-control" value="" name="name"> </div>
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


    <!-- LinkageSel js-->
    <script src="{{ asset('/static/plugins/bower_components/LinkageSel/comm.js') }}"></script>
    <script src="{{ asset('/static/plugins/bower_components/LinkageSel/linkagesel-min.js') }}"></script>
    <script>
        var opts = {
            data: @json($top_categories),
            ajax: '{{ route('admin.categories.subcategory') }}',
            selClass: 'form-control',
            select: '#parent_category',
            fixWidth: 150,
            loaderImg: '{{ asset('/static/plugins/bower_components/LinkageSel/ui-anim_basic_16x16.gif') }}',
            autoLink: false,
        };

        var linkageSel = new LinkageSel(opts);
        linkageSel.onChange(function() {
            var input = $('#parent_id');
            var v = linkageSel.getSelectedValue();
            input.val(v);
        });
    </script>
@endsection