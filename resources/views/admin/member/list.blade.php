@extends('layouts.admin.layout')

@section('menu')
    <table cellpadding="0" cellspacing="0">
        <tr>
            <td id="Tab0" class="tab"><a href="{{route('admin.members.create')}}">添加会员</a></td>
            <td id="Tab1" class="tab"><a href="{{route('admin.members.index')}}">会员列表</a></td>
            <td id="Tab2" class="tab"><a href="?">审核会员</a></td>
        </tr>

    </table>
@stop

@section('content')
    @include('admin.flash_error_or_success')
    <form action="{{route('admin.members.search')}}" method="get">
        <table cellspacing="0" class="tb">
            <tr>
                <td>&nbsp;
                    <select name="fields">
                        <option value="0">按条件</option>
                        @foreach($show_fields as $id => $value)
                        <option value="{{$id}}" @if(request('fields') == $id) selected @endif>{{$value}}</option>
                        @endforeach
                    </select>&nbsp;
                    <input type="text" size="20" name="kw" value="@if(request()->has('kw')){{request('kw')}}@endif" placeholder="请输入关键词" title="请输入关键词"/>&nbsp;

                    <input type="text" name="psize" value="20" size="2" class="t_c" title="条/页"/>&nbsp;
                    <input type="submit" value="搜 索" class="btn"/>&nbsp;
                    <input type="button" value="重 置" class="btn" onclick="Go('');"/>
                </td>
            </tr>

        </table>
    </form>
    <form method="post">
        <table cellspacing="0" class="tb ls">
            <tr>
                <th width="20"><input type="checkbox" onclick="checkall(this.form);"/></th>
                <th>会员名</th>
                <th>公司</th>
                <th>真实姓名</th>
                <th>Email</th>
                <th>手机</th>
                <th>注册时间</th>
                <th width="100">操作</th>
            </tr>
            @foreach($members as $member)
            <tr align="center">
                <td><input type="checkbox" name="userid[]" value="{{$member->userid}}"/></td>
                <td align="left">&nbsp;{{$member->name}}</td>
                <td align="left">&nbsp;@if($member->company_name){{$member->company_name}} @else{{$member->company->name}}@endif</td>
                <td class="px12">{{$member->true_name}}</td>
                <td class="px12">{{$member->email}}</td>
                <td>{{$member->mobile}}</td>
                <td class="px12">{{$member->created_at}}</td>

                <td>
                    <a href="{{route('admin.members.edit', ['userid'=>$member->userid])}}">
                        <img src="/admin/image/edit.png" width="16" height="16" title="修改" alt=""/></a>&nbsp;
                    <a href="?moduleid=2&file=index&action=delete&userid=2"
                       onclick="if(!confirm('确定危险！！要删除此会员吗？系统将删除选中用户所有信息，此操作将不可撤销')) return false;"><img
                                src="/admin/image/delete.png" width="16" height="16" title="删除" alt=""/></a>
                </td>
            </tr>
            @endforeach

        </table>
        <div class="btns">
            <input type="submit" value="删除会员" class="btn-r"
                   onclick="if(confirm('确定要删除选中会员吗？系统将删除选中用户所有信息，此操作将不可撤销')){this.form.action='?moduleid=2&action=delete'}else{return false;}"/>&nbsp;

        </div>
    </form>

    <div >
        {{$members->links()}}
    </div>
    <script type="text/javascript">Menuon(1);</script>

@stop