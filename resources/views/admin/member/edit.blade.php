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
    <form method="post" action="{{ route('admin.members.update', ['userid'=>$member->userid]) }}" onsubmit="return Dcheck();">
        {{csrf_field()}}
        {{method_field('PUT')}}
        <table cellspacing="0" class="tb">
            <tr>
                <td class="tl"><span class="f_red">*</span> 会员登录名</td>
                <td>{{$member->name}}</td>
            </tr>
            <tr>
                <td class="tl"><span class="f_hid">*</span> 登录密码</td>
                <td><input type="password" size="20" name="password" id="password" value=""
                           autocomplete="off"/><span
                            class="f_gray">[如不更改,请留空]</span>&nbsp;<span id="dpassword" class="f_red"></span></td>
            </tr>
            <tr>
                <td class="tl"><span class="f_hid">*</span> 重复输入密码</td>
                <td><input type="password" size="20" name="password_confirmation" id="cpassword"
                           autocomplete="off"/>&nbsp;<span id="dcpassword" class="f_red"></span></td>
            </tr>
            <tr>
                <td class="tl"><span class="f_red">*</span> 电子邮件</td>
                <td><input type="text" size="30" name="email" id="email" value="@if(old('email')){{old('email')}}@else{{$member->email}}@endif"/> <span
                            class="f_gray">[不公开]</span>&nbsp;<span id="demail" class="f_red"></span></td>
            </tr>
            <tr>
                <td class="tl"><span class="f_red">*</span> 真实姓名</td>
                <td><input type="text" size="20" name="true_name" id="truename" value="@if(old('true_name')){{old('true_name')}}@else{{$member->true_name}}@endif"/>&nbsp;<span id="dtruename"
                                                                                                                                                     class="f_red"></span>
                </td>
            </tr>
            <tr>
                <td class="tl"><span class="f_red">*</span> 性别</td>
                <td>
                    <input type="radio" name="gender" value="Male" @if($member->gender == 'Male') checked @endif/> 先生&nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="radio" name="gender" value="Female" @if($member->gender == 'Female') checked @endif/> 女士
                </td>
            </tr>
            <tr>
                <td class="tl"><span class="f_hid">*</span> 部门</td>
                <td><input type="text" size="20" name="department" id="department" value="@if(old('department')){{old('department')}}@else{{$member->department}}@endif"/></td>
            </tr>
            <tr>
                <td class="tl"><span class="f_hid">*</span> 职位</td>
                <td><input type="text" size="20" name="career" id="career" value="@if(old('career')){{old('career')}}@else{{$member->career}}@endif"/></td>
            </tr>
            <tr>
                <td class="tl"><span class="f_hid">*</span> 手机号码</td>
                <td><input type="text" size="20" name="mobile" id="mobile" value="@if(old('mobile')){{old('mobile')}}@else{{$member->mobile}}@endif"/></td>
            </tr>
        </table>
        <div id="company_detail">
            <div class="tt">公司资料</div>
            <table cellspacing="0" class="tb">
                <tr>
                    <td class="tl"><span class="f_red">*</span> 公司名称</td>
                    <td><input type="text" size="60" name="post[company]" id="company" value="@if(old('post.company')){{old('post.company')}}@else{{$member->company->name}}@endif"/>
                        &nbsp;<span id="dcompany" class="f_red"></span></td>
                </tr>


                <tr>
                    <td class="tl"><span class="f_red">*</span> 主要经营范围</td>
                    <td><input type="text" size="80" name="post[business]" id="business" value="@if(old('post.business')){{old('post.business')}}@else{{$member->company->business}}@endif"/>&nbsp;
                        <span id="dbusiness" class="f_red"></span>
                    </td>
                </tr>
                <tr>
                    <td class="tl"><span class="f_hid">*</span> 经营模式</td>
                    <td>
                        <span id="com_mode"><input type="checkbox" name="post[mode][]" value="制造商"
                                                   onclick="check_mode(this,2);"> 制造商&nbsp;
                            <input type="checkbox"
                                   name="post[mode][]"
                                   value="贸易商"
                                   onclick="check_mode(this,2);"> 贸易商&nbsp;<input
                                    type="checkbox" name="post[mode][]" value="服务商" onclick="check_mode(this,2);"> 服务商&nbsp;<input
                                    type="checkbox" name="post[mode][]" value="其他机构" onclick="check_mode(this,2);"> 其他机构&nbsp;</span>
                        <span class="f_gray">(最多可选2种)</span></td>
                </tr>
                <tr>
                    <td class="tl"><span class="f_hid">*</span> 注册资本</td>
                    <td><select name="post[regunit]">
                            <option value="人民币">人民币</option>
                            <option value="港元">港元</option>
                            <option value="台币">台币</option>
                            <option value="美元">美元</option>
                            <option value="欧元">欧元</option>
                            <option value="英镑">英镑</option>
                        </select> <input type="text" size="6" name="post[capital]" value="@if(old('post.capital')){{old('post.capital')}}@else{{$member->company->capital}}@endif" id="capital"/> 万
                    </td>
                </tr>
                <tr>
                    <td class="tl"><span class="f_red">*</span> 公司成立年份</td>
                    <td><input type="text" size="15" name="post[regyear]" id="regyear" value="@if(old('post.regyear')){{old('post.regyear')}}@else{{$member->company->regyear}}@endif"/>
                        &nbsp;<span id="dregyear"  class="f_red"></span>
                        <span class="f_gray">(年份，如：2004)</span></td>
                </tr>
                <tr>
                    <td class="tl"><span class="f_red">*</span> 公司地址</td>
                    <td><input type="text" size="60" name="post[address]" id="address" value="@if(old('post.address')){{old('post.address')}}@else{{$member->company->address}}@endif"/>
                        &nbsp;<span id="daddress" class="f_red"></span>
                    </td>
                </tr>

                <tr>
                    <td class="tl"><span class="f_red">*</span> 公司电话</td>
                    <td><input type="text" size="20" name="post[telephone]" id="telephone" value="@if(old('post.telephone')){{old('post.telephone')}}@else{{$member->company->telephone}}@endif"/>
                        &nbsp;<span id="dtelephone"class="f_red"></span>
                    </td>
                </tr>
                <tr>
                    <td class="tl"><span class="f_hid">*</span> 公司传真</td>
                    <td><input type="text" size="20" name="post[fax]" id="fax" value="@if(old('post.fax')){{old('post.fax')}}@else{{$member->company->fax}}@endif"/></td>
                </tr>
                <tr>
                    <td class="tl"><span class="f_hid">*</span> 公司Email</td>
                    <td><input type="text" size="30" name="post[mail]" id="mail" value="@if(old('post.mail')){{old('post.mail')}}@else{{$member->company->mail}}@endif"/> <span class="f_gray">[公开]</span></td>
                </tr>
                <tr>
                    <td class="tl"><span class="f_hid">*</span> 公司网址</td>
                    <td><input type="text" size="30" name="post[homepage]" id="homepage" value="@if(old('post.homepage')){{old('post.homepage')}}@else{{$member->company->homepage}}@endif"/></td>
                </tr>

                <tr>
                    <td class="tl"><span class="f_red">*</span> 公司介绍</td>
                    <td><textarea name="post[content]" id="content" class="dsn">@if(old('post.content')){{old('post.content')}}@else{{$member->company->content}}@endif</textarea>
                        <script type="text/javascript">
                            var ModuleID = 5;
                            var DTAdmin = 1;
                            var EDPath = "/admin/editor/fckeditor/";
                            var ABPath = "/admin/editor/fckeditor/";
                            var EDW = "100%";
                            var EDH = "350px";
                            var EDD = "0";
                            var EID = "content";
                            var FCKID = "content";</script>
                        <script type="text/javascript" src="/admin/editor/fckeditor/fckeditor.js"></script>
                        <script type="text/javascript">
                            window.onload = function () {
                                var sBasePath = "/admin/editor/fckeditor/";
                                var oFCKeditor = new FCKeditor("content");
                                oFCKeditor.Width = "100%";
                                oFCKeditor.Height = "350px";
                                oFCKeditor.BasePath = sBasePath;
                                oFCKeditor.ToolbarSet = "Simple";
                                oFCKeditor.ReplaceTextarea();
                            }
                        </script>
                        <script type="text/javascript" src="/admin/editor/fckeditor/init.api.js"></script>
                        <script type="text/javascript" src="{{ asset('/admin/script/editor.js') }}"></script>
                        <br/>

                        <span id="dcontent" class="f_red"></span></td>
                </tr>
            </table>
        </div>

        <div class="sbt"><input type="submit" name="submit" value="确 定" class="btn-g"/>&nbsp;&nbsp;&nbsp;&nbsp;<input
                    type="button" value="取 消" class="btn" onclick="Go('');"/></div>
    </form>
    <script type="text/javascript">
        function check_mode(c, m) {
            if ($('#com_mode input:checkbox:checked').length > m) {
                confirm('最多可选' + m + '种经营模式');
                c.checked = false;
            }
        }

        var vid = '';
        function validator(id) {
            if (!Dd(id).value) return false;
            vid = id;
            $.post(AJPath, 'moduleid=2&action=member&job=' + id + '&value=' + Dd(id).value, function (data) {
                Dd('d' + vid).innerHTML = data ? '<img src="' + DTPath + 'file/image/check-ko.png" width="16" height="16" align="absmiddle"/> ' + data : '';
            });
        }

        function Dcheck() {

            if (Dd('email').value == '') {
                Dmsg('请填写电子邮箱', 'email');
                return false;
            }
            if (Dd('truename').value == '') {
                Dmsg('请填写真实姓名', 'truename');
                return false;
            }

            if (Dd('company_detail').style.display != 'none') {
                if (Dd('company').value == '') {
                    Dmsg('请填写公司名称', 'company');
                    return false;
                }

                if (Dd('business').value.length < 2) {
                    Dmsg('请填写主要经营范围', 'business');
                    return false;
                }
                if (Dd('regyear').value.length < 4) {
                    Dmsg('请填写公司成立年份', 'regyear');
                    return false;
                }
                if (Dd('address').value.length < 2) {
                    Dmsg('请填写公司地址', 'address');
                    return false;
                }
                if (Dd('telephone').value.length < 6) {
                    Dmsg('请填写公司电话', 'telephone');
                    return false;
                }
                if (FCKLen('content') < 10) {
                    Dmsg('公司介绍最少10字，当前已经输入' + FCKLen('content') + '字', 'content');
                    return false;
                }
            }
            return true;
        }
        Menuon(0);
    </script>

@stop