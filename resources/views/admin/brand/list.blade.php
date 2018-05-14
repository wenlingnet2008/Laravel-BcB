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
                <div class="col-md-12">
                    <div class="panel">
                        <div class="panel-heading">品牌列表</div>
                        <div class="table-responsive">
                            <table class="table table-hover manage-u-table">
                                <thead>
                                <tr>

                                    <th>品牌名称</th>

                                    <th width="300">操作</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($brands as $brand)
                                <tr>

                                    <td><span class="text-muted">{{ $brand['name'] }}</span></td>

                                    <td>
                                        <a href="{{ route('admin.brands.edit', ['brandid'=> $brand['brandid']]) }}"><button type="button" class="btn btn-info btn-outline btn-circle btn-lg m-r-5"><i class="ti-key"></i></button></a>
                                        <a href="#" onclick="delete_brand({{ $brand['brandid'] }})"> <button type="button" class="btn btn-info btn-outline btn-circle btn-lg m-r-5"><i class="ti-trash"></i></button></a>

                                    </td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div style="float:right">
                                {{ $brands->links() }}
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
    <script>
        function delete_brand(brandid) {
            $.ajax({
                type: "DELETE",
                url: "{{ url('admin/brands') }}/"+ brandid,
                data: "_token={{ csrf_token() }}",
                success: function(msg){
                    alert( msg.message );
                    location.reload();
                }
            });
        }
    </script>
@endsection