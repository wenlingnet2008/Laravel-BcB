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
                    <h4 class="page-title">分类管理</h4></div>
                <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">

                    <ol class="breadcrumb">
                        <li><a href="{{ route('admin.dash.index') }}">控制台</a></li>
                        <li><a href="{{ route('admin.categories.list') }}">分类</a></li>
                        @foreach($bread_nav as $category)
                            <li><a href="{{ route('admin.categories.list', ['catid'=>$category['catid']]) }}">{{ $category['name'] }}</a></li>
                        @endforeach
                    </ol>
                </div>
                <!-- /.col-lg-12 -->
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="panel">
                        <div class="panel-heading">分类列表</div>
                        <div class="table-responsive">
                            <table class="table table-hover manage-u-table">
                                <thead>
                                <tr>

                                    <th>分类名称</th>

                                    <th width="300">操作</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($categories as $category)
                                    <tr>

                                        <td><span class="text-muted">{{ $category['name'] }}</span></td>

                                        <td>
                                            <a href="{{ route('admin.categories.list', ['catid'=>$category['catid']]) }}" title="查看下级分类"><button type="button" class="btn btn-info btn-outline btn-circle btn-lg m-r-5"><i class="icon-folder-alt"></i></button></a>
                                            <a href="{{ route('admin.categories.edit', ['catid'=> $category['catid']]) }}" title="修改分类"><button type="button" class="btn btn-info btn-outline btn-circle btn-lg m-r-5"><i class="ti-key"></i></button></a>
                                            <a href="#" onclick="delete_category({{ $category['catid'] }})" title="删除分类"> <button type="button" class="btn btn-info btn-outline btn-circle btn-lg m-r-5"><i class="ti-trash"></i></button></a>

                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div style="float:right">
                                 {{ $categories->links() }}
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
        function delete_category(catid) {
            var r=confirm("注意：删除此分类将会连它的子类也删除,确定要删除吗?");
            if (r==true)
            {
                $.ajax({
                    type: "DELETE",
                    url: "{{ url('admin/categories') }}/"+ catid,
                    data: "_token={{ csrf_token() }}",
                    success: function(msg){
                        alert( msg.message );
                        location.reload();
                    }
                });
            }

        }
    </script>
@endsection