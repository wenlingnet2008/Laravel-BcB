<!doctype html>
<html lang="zh-cn">
<head>
    <meta charset="UTF-8"/>
    <title>管理中心</title>
    <meta name="robots" content="noindex,nofollow"/>
    <meta http-equiv="x-ua-compatible" content="IE=8"/>
    <link rel="stylesheet" href="{{ asset('admin/image/style.css') }}" type="text/css"/>
    <script type="text/javascript">window.onerror = function () {
            return true;
        }</script>
    <script type="text/javascript" src="{{ asset('admin/script/lang.js') }}"></script>
    <script type="text/javascript" src="{{ asset('admin/script/config.js') }}"></script>
    <!--[if lte IE 9]><!-->
    <script type="text/javascript" src="{{ asset('admin/script/jquery-1.5.2.min.js') }}"></script>
    <!--<![endif]-->
    <!--[if (gte IE 10)|!(IE)]><!-->
    <script type="text/javascript" src="{{ asset('admin/script/jquery-2.1.1.min.js') }}"></script>
    <!--<![endif]-->
    <script type="text/javascript" src="{{ asset('admin/script/common.js') }}"></script>
    <script type="text/javascript" src="{{ asset('admin/script/admin.js') }}"></script>
    <base target="main"/>
    <style type="text/css">
        html {
            overflow-x: hidden;
            overflow-y: auto;
        }

        ::-webkit-scrollbar {
            width: 6px;
            height: 6px;
            overflow: auto;
        }

        ::-webkit-scrollbar-thumb {
            background-color: #E6E6E6;
            min-height: 25px;
            min-width: 25px;
            border: 1px solid #E0E0E0;
        }

        ::-webkit-scrollbar-track {
            background-color: #F7F7F7;
            border: 1px solid #EFEFEF;
        }
    </style>
</head>
<body>
<table cellpadding="0" cellspacing="0" width="218" height="100%">
    <tr>
        <td id="bar" class="bar" valign="top">
            <div class="barfix">
                <div onclick="sideshow(1);"><img src="{{ asset('admin/image/bar1-on.png') }}"
                                                 id="b_1"/><span>我的面板</span></div>
                <div onclick="sideshow(2);"><img src="{{ asset('admin/image/bar2.png') }}" id="b_2"/><span>系统维护</span>
                </div>
                <div onclick="sideshow(3);"><img src="{{ asset('admin/image/bar3.png') }}" id="b_3"/><span>功能模块</span>
                </div>
                <div onclick="sideshow(4);"><img src="{{ asset('admin/image/bar4.png') }}" id="b_4"/><span>会员管理</span>
                </div>
                <div onclick="sideshow(5);"><img src="{{ asset('admin/image/bar5.png') }}" id="b_5"/><span>扩展功能</span>
                </div>
            </div>
        </td>
        <td valign="top" class="barmain" id="menu">
            <div id="m_1">
                <dl>
                    <dt onclick="s(this)" onmouseover="this.className='dt_on';" onmouseout="this.className='';">我的面板
                    </dt>
                    <dd onclick="c(this);" class="dd_on"><a href="?action=main">后台首页</a></dd>
                    <dd onclick="c(this);"><a href="?file=mymenu">定义面板</a></dd>
                    <dd onclick="c(this);"><a href="?action=html">生成首页</a></dd>
                    <dd onclick="c(this);"><a href="?action=cache">更新缓存</a></dd>
                    <dd onclick="c(this);"><a href="?file=setting">网站设置</a></dd>
                    <dd onclick="c(this);"><a href="?file=module">模块管理</a></dd>
                    <dd onclick="c(this);"><a href="?file=database">数据维护</a></dd>
                    <dd onclick="c(this);"><a href="?file=template">模板管理</a></dd>
                    <dd onclick="c(this);"><a href="?moduleid=2">会员管理</a></dd>
                    <dd onclick="c(this);"><a href="?moduleid=3&file=webpage">单页管理</a></dd>
                    <dd onclick="c(this);"><a href="?moduleid=3&file=spread">排名推广</a></dd>
                    <dd onclick="c(this);"><a href="?moduleid=3&file=ad">广告管理</a></dd>
                </dl>
                <dl>
                    <dt onclick="s(this)" onmouseover="this.className='dt_on';" onmouseout="this.className='';">快速链接
                    </dt>
                    <dd onclick="c(this);" style="display:none;"><a href="./" target="_blank">网站首页</a></dd>
                    <dd onclick="c(this);" style="display:none;"><a href="http://192.168.0.38/member/" target="_blank">商务中心</a>
                    </dd>
                    <dd onclick="c(this);" style="display:none;"><a href="?file=logout" target="_top"
                                                                    onclick="return confirm('确定要退出管理后台吗');">安全退出</a>
                    </dd>
                </dl>
                <dl>
                    <dt onclick="s(this)" onmouseover="this.className='dt_on';" onmouseout="this.className='';">使用帮助
                    </dt>
                    <dd onclick="c(this);" style="display:none;"><a href="?file=cloud&action=license">使用协议</a></dd>
                    <dd onclick="c(this);" style="display:none;"><a href="?file=cloud&action=doc">在线文档</a></dd>
                    <dd onclick="c(this);" style="display:none;"><a href="?file=cloud&action=support">技术支持</a></dd>
                    <dd onclick="c(this);" style="display:none;"><a href="?file=cloud&action=store">应用商店</a></dd>
                    <dd onclick="c(this);" style="display:none;"><a href="?file=cloud&action=bbs">用户论坛</a></dd>
                    <dd onclick="c(this);" style="display:none;"><a href="?file=cloud&action=feedback">信息反馈</a></dd>
                    <dd onclick="c(this);" style="display:none;"><a href="?file=cloud&action=update">检查更新</a></dd>
                    <dd onclick="c(this);" style="display:none;"><a href="?file=cloud&action=about">关于软件</a></dd>
                </dl>
            </div>
            <div id="m_2" style="display:none;">
                <dl>
                    <dt onclick="s(this)" onmouseover="this.className='dt_on';" onmouseout="this.className='';">系统维护
                    </dt>
                    <dd onclick="c(this);"><a href="?file=setting">网站设置</a></dd>
                    <dd onclick="c(this);"><a href="?file=module">模块管理</a></dd>
                    <dd onclick="c(this);"><a href="?file=html">更新数据</a></dd>
                    <dd onclick="c(this);"><a href="?file=cate">分类管理</a></dd>
                    <dd onclick="c(this);"><a href="?file=area">地区管理</a></dd>
                    <dd onclick="c(this);"><a href="?file=city">城市分站</a></dd>
                    <dd onclick="c(this);"><a href="?file=admin">管理员设置</a></dd>
                </dl>
                <dl>
                    <dt onclick="s(this)" onmouseover="this.className='dt_on';" onmouseout="this.className='';">系统工具
                    </dt>
                    <dd onclick="c(this);"><a href="?file=count">信息统计</a></dd>
                    <dd onclick="c(this);"><a href="?file=database">数据维护</a></dd>
                    <dd onclick="c(this);"><a href="?file=patch">文件维护</a></dd>
                    <dd onclick="c(this);"><a href="?file=template">标签模板</a></dd>
                    <dd onclick="c(this);"><a href="?file=cron">计划任务</a></dd>
                    <dd onclick="c(this);"><a href="?file=upload">上传记录</a></dd>
                    <dd onclick="c(this);"><a href="?file=keyword">搜索记录</a></dd>
                    <dd onclick="c(this);"><a href="?file=log">后台日志</a></dd>
                    <dd onclick="c(this);"><a href="?file=404">404日志</a></dd>
                    <dd onclick="c(this);"><a href="?file=question">问题验证</a></dd>
                    <dd onclick="c(this);"><a href="?file=banword">词语过滤</a></dd>
                    <dd onclick="c(this);"><a href="?file=banip">禁止IP</a></dd>
                    <dd onclick="c(this);"><a href="?file=repeat">重名检测</a></dd>
                    <dd onclick="c(this);"><a href="?file=fetch">单页采编</a></dd>
                    <dd onclick="c(this);"><a href="?file=word">编辑助手</a></dd>
                    <dd onclick="c(this);"><a href="?file=doctor">系统体检</a></dd>
                </dl>
            </div>
            <div id="m_3" style="display:none;">
                <dl id="dl_16">
                    <dt onclick="m(16);" onmouseover="this.className='dt_on';" onmouseout="this.className='';">分类管理</dt>
                    <dd onclick="c(this);"><a href="{{ route('admin.categories.list') }}">行业分类</a></dd>
                    <dd onclick="c(this);"><a href="?moduleid=16">商品列表</a></dd>
                    <dd onclick="c(this);"><a href="?moduleid=16&file=order">订单列表</a></dd>
                    <dd onclick="c(this);"><a href="?moduleid=16&file=view">浏览历史</a></dd>
                    <dd onclick="c(this);"><a href="?moduleid=16&action=check">审核商品</a></dd>
                    <dd onclick="c(this);"><a href="?file=category&mid=16">商品分类</a></dd>
                    <dd onclick="c(this);"><a href="?moduleid=16&file=html">更新数据</a></dd>
                    <dd onclick="c(this);"><a href="?moduleid=16&file=setting">模块设置</a></dd>
                </dl>
                <dl id="dl_5">
                    <dt onclick="m(5);" onmouseover="this.className='dt_on';" onmouseout="this.className='';">供应管理</dt>
                    <dd onclick="c(this);" style="display:none;"><a href="?moduleid=5&action=add">添加供应</a></dd>
                    <dd onclick="c(this);" style="display:none;"><a href="?moduleid=5">供应列表</a></dd>
                    <dd onclick="c(this);" style="display:none;"><a href="?moduleid=5&file=order">订单列表</a></dd>
                    <dd onclick="c(this);" style="display:none;"><a href="?moduleid=5&action=check">审核供应</a></dd>
                    <dd onclick="c(this);" style="display:none;"><a href="?file=category&mid=5">行业分类</a></dd>
                    <dd onclick="c(this);" style="display:none;"><a href="?moduleid=5&file=html">更新数据</a></dd>
                    <dd onclick="c(this);" style="display:none;"><a href="?moduleid=5&file=setting">模块设置</a></dd>
                </dl>
                <dl id="dl_6">
                    <dt onclick="m(6);" onmouseover="this.className='dt_on';" onmouseout="this.className='';">品牌管理</dt>
                    <dd onclick="c(this);" style="display:none;"><a href="{{ route('admin.brands.index') }}">品牌列表</a></dd>
                    <dd onclick="c(this);" style="display:none;"><a href="?moduleid=6&action=check">审核求购</a></dd>
                    <dd onclick="c(this);" style="display:none;"><a href="?file=category&mid=6">行业分类</a></dd>
                    <dd onclick="c(this);" style="display:none;"><a href="?moduleid=6&file=html">更新数据</a></dd>
                    <dd onclick="c(this);" style="display:none;"><a href="?moduleid=6&file=setting">模块设置</a></dd>
                </dl>
                <dl id="dl_17">
                    <dt onclick="m(17);" onmouseover="this.className='dt_on';" onmouseout="this.className='';">团购管理</dt>
                    <dd onclick="c(this);" style="display:none;"><a href="?moduleid=17&action=add">添加团购</a></dd>
                    <dd onclick="c(this);" style="display:none;"><a href="?moduleid=17">团购列表</a></dd>
                    <dd onclick="c(this);" style="display:none;"><a href="?moduleid=17&file=order">订单列表</a></dd>
                    <dd onclick="c(this);" style="display:none;"><a href="?moduleid=17&action=check">审核团购</a></dd>
                    <dd onclick="c(this);" style="display:none;"><a href="?file=category&mid=17">分类管理</a></dd>
                    <dd onclick="c(this);" style="display:none;"><a href="?moduleid=17&file=html">更新数据</a></dd>
                    <dd onclick="c(this);" style="display:none;"><a href="?moduleid=17&file=setting">模块设置</a></dd>
                </dl>
                <dl id="dl_7">
                    <dt onclick="m(7);" onmouseover="this.className='dt_on';" onmouseout="this.className='';">行情管理</dt>
                    <dd onclick="c(this);" style="display:none;"><a href="?moduleid=7&action=add">添加行情</a></dd>
                    <dd onclick="c(this);" style="display:none;"><a href="?moduleid=7">行情列表</a></dd>
                    <dd onclick="c(this);" style="display:none;"><a href="?moduleid=7&action=check">审核行情</a></dd>
                    <dd onclick="c(this);" style="display:none;"><a href="?file=category&mid=7">分类管理</a></dd>
                    <dd onclick="c(this);" style="display:none;"><a href="?moduleid=7&file=product">产品报价</a></dd>
                    <dd onclick="c(this);" style="display:none;"><a href="?moduleid=7&file=html">更新数据</a></dd>
                    <dd onclick="c(this);" style="display:none;"><a href="?moduleid=7&file=setting">模块设置</a></dd>
                </dl>
                <dl id="dl_8">
                    <dt onclick="m(8);" onmouseover="this.className='dt_on';" onmouseout="this.className='';">展会管理</dt>
                    <dd onclick="c(this);" style="display:none;"><a href="?moduleid=8&action=add">添加展会</a></dd>
                    <dd onclick="c(this);" style="display:none;"><a href="?moduleid=8">展会列表</a></dd>
                    <dd onclick="c(this);" style="display:none;"><a href="?moduleid=8&file=sign">报名列表</a></dd>
                    <dd onclick="c(this);" style="display:none;"><a href="?moduleid=8&action=check">审核展会</a></dd>
                    <dd onclick="c(this);" style="display:none;"><a href="?file=category&mid=8">分类管理</a></dd>
                    <dd onclick="c(this);" style="display:none;"><a href="?moduleid=8&file=html">更新数据</a></dd>
                    <dd onclick="c(this);" style="display:none;"><a href="?moduleid=8&file=setting">模块设置</a></dd>
                </dl>
                <dl id="dl_21">
                    <dt onclick="m(21);" onmouseover="this.className='dt_on';" onmouseout="this.className='';">资讯管理</dt>
                    <dd onclick="c(this);" style="display:none;"><a href="?moduleid=21&action=add">添加资讯</a></dd>
                    <dd onclick="c(this);" style="display:none;"><a href="?moduleid=21">资讯列表</a></dd>
                    <dd onclick="c(this);" style="display:none;"><a href="?moduleid=21&action=check">审核资讯</a></dd>
                    <dd onclick="c(this);" style="display:none;"><a href="?file=category&mid=21">分类管理</a></dd>
                    <dd onclick="c(this);" style="display:none;"><a href="?moduleid=21&file=html">更新数据</a></dd>
                    <dd onclick="c(this);" style="display:none;"><a href="?moduleid=21&file=setting">模块设置</a></dd>
                </dl>
                <dl id="dl_22">
                    <dt onclick="m(22);" onmouseover="this.className='dt_on';" onmouseout="this.className='';">招商管理</dt>
                    <dd onclick="c(this);" style="display:none;"><a href="?moduleid=22&action=add">添加招商</a></dd>
                    <dd onclick="c(this);" style="display:none;"><a href="?moduleid=22">招商列表</a></dd>
                    <dd onclick="c(this);" style="display:none;"><a href="?moduleid=22&action=check">审核招商</a></dd>
                    <dd onclick="c(this);" style="display:none;"><a href="?file=category&mid=22">分类管理</a></dd>
                    <dd onclick="c(this);" style="display:none;"><a href="?moduleid=22&file=html">更新数据</a></dd>
                    <dd onclick="c(this);" style="display:none;"><a href="?moduleid=22&file=setting">模块设置</a></dd>
                </dl>
                <dl id="dl_13">
                    <dt onclick="m(13);" onmouseover="this.className='dt_on';" onmouseout="this.className='';">品牌管理</dt>
                    <dd onclick="c(this);" style="display:none;"><a href="?moduleid=13&action=add">添加品牌</a></dd>
                    <dd onclick="c(this);" style="display:none;"><a href="?moduleid=13">品牌列表</a></dd>
                    <dd onclick="c(this);" style="display:none;"><a href="?moduleid=13&action=check">审核品牌</a></dd>
                    <dd onclick="c(this);" style="display:none;"><a href="?file=category&mid=13">分类管理</a></dd>
                    <dd onclick="c(this);" style="display:none;"><a href="?moduleid=13&file=html">更新数据</a></dd>
                    <dd onclick="c(this);" style="display:none;"><a href="?moduleid=13&file=setting">模块设置</a></dd>
                </dl>
                <dl id="dl_9">
                    <dt onclick="m(9);" onmouseover="this.className='dt_on';" onmouseout="this.className='';">人才管理</dt>
                    <dd onclick="c(this);" style="display:none;"><a href="?moduleid=9&action=add">添加招聘</a></dd>
                    <dd onclick="c(this);" style="display:none;"><a href="?moduleid=9">招聘列表</a></dd>
                    <dd onclick="c(this);" style="display:none;"><a href="?moduleid=9&action=check">审核招聘</a></dd>
                    <dd onclick="c(this);" style="display:none;"><a href="?moduleid=9&file=resume&action=add">添加简历</a>
                    </dd>
                    <dd onclick="c(this);" style="display:none;"><a href="?moduleid=9&file=resume">简历列表</a></dd>
                    <dd onclick="c(this);" style="display:none;"><a href="?moduleid=9&file=resume&action=check">审核简历</a>
                    </dd>
                    <dd onclick="c(this);" style="display:none;"><a href="?file=category&mid=9">分类管理</a></dd>
                    <dd onclick="c(this);" style="display:none;"><a href="?moduleid=9&file=html">更新数据</a></dd>
                    <dd onclick="c(this);" style="display:none;"><a href="?moduleid=9&file=setting">模块设置</a></dd>
                </dl>
                <dl id="dl_10">
                    <dt onclick="m(10);" onmouseover="this.className='dt_on';" onmouseout="this.className='';">知道管理</dt>
                    <dd onclick="c(this);" style="display:none;"><a href="?moduleid=10&action=add">添加知道</a></dd>
                    <dd onclick="c(this);" style="display:none;"><a href="?moduleid=10">知道列表</a></dd>
                    <dd onclick="c(this);" style="display:none;"><a href="?moduleid=10&action=check">审核知道</a></dd>
                    <dd onclick="c(this);" style="display:none;"><a href="?moduleid=10&file=answer">答案列表</a></dd>
                    <dd onclick="c(this);" style="display:none;"><a href="?moduleid=10&file=expert">专家管理</a></dd>
                    <dd onclick="c(this);" style="display:none;"><a href="?file=category&mid=10">分类管理</a></dd>
                    <dd onclick="c(this);" style="display:none;"><a href="?moduleid=10&file=html">更新数据</a></dd>
                    <dd onclick="c(this);" style="display:none;"><a href="?moduleid=10&file=setting">模块设置</a></dd>
                </dl>
                <dl id="dl_11">
                    <dt onclick="m(11);" onmouseover="this.className='dt_on';" onmouseout="this.className='';">专题管理</dt>
                    <dd onclick="c(this);" style="display:none;"><a href="?moduleid=11&action=add">添加专题</a></dd>
                    <dd onclick="c(this);" style="display:none;"><a href="?moduleid=11">专题列表</a></dd>
                    <dd onclick="c(this);" style="display:none;"><a href="?file=category&mid=11">分类管理</a></dd>
                    <dd onclick="c(this);" style="display:none;"><a href="?moduleid=11&file=html">更新数据</a></dd>
                    <dd onclick="c(this);" style="display:none;"><a href="?moduleid=11&file=setting">模块设置</a></dd>
                </dl>
                <dl id="dl_12">
                    <dt onclick="m(12);" onmouseover="this.className='dt_on';" onmouseout="this.className='';">图库管理</dt>
                    <dd onclick="c(this);" style="display:none;"><a href="?moduleid=12&action=add">添加图库</a></dd>
                    <dd onclick="c(this);" style="display:none;"><a href="?moduleid=12">图库列表</a></dd>
                    <dd onclick="c(this);" style="display:none;"><a href="?moduleid=12&action=check">审核图库</a></dd>
                    <dd onclick="c(this);" style="display:none;"><a href="?file=category&mid=12">分类管理</a></dd>
                    <dd onclick="c(this);" style="display:none;"><a href="?moduleid=12&file=html">更新数据</a></dd>
                    <dd onclick="c(this);" style="display:none;"><a href="?moduleid=12&file=setting">模块设置</a></dd>
                </dl>
                <dl id="dl_14">
                    <dt onclick="m(14);" onmouseover="this.className='dt_on';" onmouseout="this.className='';">视频管理</dt>
                    <dd onclick="c(this);" style="display:none;"><a href="?moduleid=14&action=add">添加视频</a></dd>
                    <dd onclick="c(this);" style="display:none;"><a href="?moduleid=14">视频列表</a></dd>
                    <dd onclick="c(this);" style="display:none;"><a href="?moduleid=14&action=check">审核视频</a></dd>
                    <dd onclick="c(this);" style="display:none;"><a href="?file=category&mid=14">分类管理</a></dd>
                    <dd onclick="c(this);" style="display:none;"><a href="?moduleid=14&file=html">更新数据</a></dd>
                    <dd onclick="c(this);" style="display:none;"><a href="?moduleid=14&file=setting">模块设置</a></dd>
                </dl>
                <dl id="dl_15">
                    <dt onclick="m(15);" onmouseover="this.className='dt_on';" onmouseout="this.className='';">下载管理</dt>
                    <dd onclick="c(this);" style="display:none;"><a href="?moduleid=15&action=add">添加下载</a></dd>
                    <dd onclick="c(this);" style="display:none;"><a href="?moduleid=15">下载列表</a></dd>
                    <dd onclick="c(this);" style="display:none;"><a href="?moduleid=15&action=check">审核下载</a></dd>
                    <dd onclick="c(this);" style="display:none;"><a href="?file=category&mid=15">分类管理</a></dd>
                    <dd onclick="c(this);" style="display:none;"><a href="?moduleid=15&file=html">更新数据</a></dd>
                    <dd onclick="c(this);" style="display:none;"><a href="?moduleid=15&file=setting">模块设置</a></dd>
                </dl>
                <dl id="dl_18">
                    <dt onclick="m(18);" onmouseover="this.className='dt_on';" onmouseout="this.className='';">商圈管理</dt>
                    <dd onclick="c(this);" style="display:none;"><a href="?moduleid=18&file=group">商圈管理</a></dd>
                    <dd onclick="c(this);" style="display:none;"><a href="?moduleid=18">帖子管理</a></dd>
                    <dd onclick="c(this);" style="display:none;"><a href="?moduleid=18&file=reply">回复管理</a></dd>
                    <dd onclick="c(this);" style="display:none;"><a href="?moduleid=18&file=fans">粉丝管理</a></dd>
                    <dd onclick="c(this);" style="display:none;"><a href="?moduleid=18&file=manage">管理记录</a></dd>
                    <dd onclick="c(this);" style="display:none;"><a href="?file=category&mid=18">分类管理</a></dd>
                    <dd onclick="c(this);" style="display:none;"><a href="?moduleid=18&file=html">更新数据</a></dd>
                    <dd onclick="c(this);" style="display:none;"><a href="?moduleid=18&file=setting">模块设置</a></dd>
                </dl>
            </div>
            <div id="m_4" style="display:none;">
                <dl id="dl_2">
                    <dt id="dt_2" onclick="s(this);" onmouseover="this.className='dt_on';"
                        onmouseout="this.className='';">会员管理
                    </dt>
                    <dd onclick="c(this);"><a href="{{ route('admin.members.create') }}">添加会员</a></dd>
                    <dd onclick="c(this);"><a href="{{ route('admin.members.index') }}">会员列表</a></dd>
                    <dd onclick="c(this);"><a href="?moduleid=2&action=check">审核会员</a></dd>
                    <dd onclick="c(this);"><a href="?moduleid=4&file=vip">VIP管理</a></dd>
                    <dd onclick="c(this);"><a href="?moduleid=2&file=grade&action=check">会员升级</a></dd>
                    <dd onclick="c(this);"><a href="?moduleid=2&file=validate">资料审核</a></dd>
                    <dd onclick="c(this);"><a href="?moduleid=2&file=weixin">微信管理</a></dd>
                    <dd onclick="c(this);"><a href="?moduleid=2&file=oauth">一键登录</a></dd>
                    <dd onclick="c(this);"><a href="?moduleid=2&file=group">会员组管理</a></dd>
                    <dd onclick="c(this);"><a href="?moduleid=2&file=setting">模块设置</a></dd>
                </dl>
                <dl id="dl_4">
                    <dt id="dt_4" onclick="s(this);" onmouseover="this.className='dt_on';"
                        onmouseout="this.className='';">公司管理
                    </dt>
                    <dd onclick="c(this);" style="display:none;"><a href="?moduleid=4">公司列表</a></dd>
                    <dd onclick="c(this);" style="display:none;"><a href="?moduleid=4&file=vip">VIP管理</a></dd>
                    <dd onclick="c(this);" style="display:none;"><a href="?file=category&mid=4">行业分类</a></dd>
                    <dd onclick="c(this);" style="display:none;"><a href="?moduleid=2&file=honor">荣誉资质</a></dd>
                    <dd onclick="c(this);" style="display:none;"><a href="?moduleid=2&file=news">公司新闻</a></dd>
                    <dd onclick="c(this);" style="display:none;"><a href="?moduleid=2&file=page">公司单页</a></dd>
                    <dd onclick="c(this);" style="display:none;"><a href="?moduleid=2&file=link">友情链接</a></dd>
                    <dd onclick="c(this);" style="display:none;"><a href="?moduleid=2&file=style">公司模板</a></dd>
                    <dd onclick="c(this);" style="display:none;"><a href="?moduleid=4&file=html">更新数据</a></dd>
                    <dd onclick="c(this);" style="display:none;"><a href="?moduleid=4&file=setting">模块设置</a></dd>
                </dl>
                <dl id="dl_pay">
                    <dt id="dt_pay" onclick="s(this);" onmouseover="this.className='dt_on';"
                        onmouseout="this.className='';">财务管理
                    </dt>
                    <dd onclick="c(this);"><a href="?moduleid=2&file=record">资金管理</a></dd>
                    <dd onclick="c(this);"><a href="?moduleid=2&file=credit">积分管理</a></dd>
                    <dd onclick="c(this);"><a href="?moduleid=2&file=sms&action=record">短信管理</a></dd>
                    <dd onclick="c(this);"><a href="?moduleid=2&file=charge">支付记录</a></dd>
                    <dd onclick="c(this);"><a href="?moduleid=2&file=cash">提现记录</a></dd>
                    <dd onclick="c(this);"><a href="?moduleid=2&file=pay">信息支付</a></dd>
                    <dd onclick="c(this);"><a href="?moduleid=2&file=award">信息打赏</a></dd>
                    <dd onclick="c(this);"><a href="?moduleid=2&file=promo">优惠促销</a></dd>
                    <dd onclick="c(this);"><a href="?moduleid=2&file=deposit">保证金管理</a></dd>
                    <dd onclick="c(this);"><a href="?moduleid=2&file=card">充值卡管理</a></dd>
                </dl>
                <dl id="dl_oth">
                    <dt id="dt_oth" onclick="s(this);" onmouseover="this.className='dt_on';"
                        onmouseout="this.className='';">会员相关
                    </dt>
                    <dd onclick="c(this);"><a href="?moduleid=2&file=chat">在线交谈</a></dd>
                    <dd onclick="c(this);"><a href="?moduleid=2&file=message">站内信件</a></dd>
                    <dd onclick="c(this);"><a href="?moduleid=2&file=sendmail&action=record">电子邮件</a></dd>
                    <dd onclick="c(this);"><a href="?moduleid=2&file=sendsms&action=record">手机短信</a></dd>
                    <dd onclick="c(this);"><a href="?moduleid=2&file=ask">客服中心</a></dd>
                    <dd onclick="c(this);"><a href="?moduleid=2&file=alert">贸易提醒</a></dd>
                    <dd onclick="c(this);"><a href="?moduleid=2&file=mail">邮件订阅</a></dd>
                    <dd onclick="c(this);"><a href="?moduleid=2&file=favorite">商机收藏</a></dd>
                    <dd onclick="c(this);"><a href="?moduleid=2&file=friend">会员商友</a></dd>
                    <dd onclick="c(this);"><a href="?moduleid=2&file=address">收货地址</a></dd>
                    <dd onclick="c(this);"><a href="?moduleid=2&file=online">在线会员</a></dd>
                    <dd onclick="c(this);"><a href="?moduleid=2&file=loginlog">登录日志</a></dd>
                </dl>
            </div>
            <div id="m_5" style="display:none;">
                <dl id="dl_3">
                    <dt onclick="m(3);" onmouseover="this.className='dt_on';" onmouseout="this.className='';">扩展功能</dt>
                    <dd onclick="c(this);"><a href="?moduleid=3&file=spread">排名推广</a></dd>
                    <dd onclick="c(this);"><a href="?moduleid=3&file=ad">广告管理</a></dd>
                    <dd onclick="c(this);"><a href="?moduleid=3&file=announce">公告管理</a></dd>
                    <dd onclick="c(this);"><a href="?moduleid=3&file=webpage">单页管理</a></dd>
                    <dd onclick="c(this);"><a href="?moduleid=3&file=link">友情链接</a></dd>
                    <dd onclick="c(this);"><a href="?moduleid=3&file=comment">评论管理</a></dd>
                    <dd onclick="c(this);"><a href="?moduleid=3&file=guestbook">留言管理</a></dd>
                    <dd onclick="c(this);"><a href="?moduleid=3&file=gift">积分换礼</a></dd>
                    <dd onclick="c(this);"><a href="?moduleid=3&file=vote">投票管理</a></dd>
                    <dd onclick="c(this);"><a href="?moduleid=3&file=poll">票选管理</a></dd>
                    <dd onclick="c(this);"><a href="?moduleid=3&file=form">表单管理</a></dd>
                    <dd onclick="c(this);"><a href="?moduleid=3&file=setting">模块设置</a></dd>
                </dl>
            </div>
        </td>
    </tr>
</table>
<script type="text/javascript">
    function sideshow(ID) {
        for (i = 1; i < 6; i++) {
            if (i == ID) {
                Dd('b_' + i).src = '/admin/image/bar' + i + '-on.png';
                Ds('m_' + i);
            } else {
                Dd('b_' + i).src = '/admin/image/bar' + i + '.png';
                Dh('m_' + i);
            }
        }
    }
</script>
<script type="text/javascript">
    function c(o) {
        var dds = Dd('menu').getElementsByTagName('dd');
        for (var i = 0; i < dds.length; i++) {
            dds[i].className = dds[i] == o ? 'dd_on' : '';
            if (dds[i] == o) o.firstChild.blur();
        }
    }
    function s(o) {
        var dds = o.parentNode.getElementsByTagName('dd');
        for (var i = 0; i < dds.length; i++) {
            dds[i].style.display = dds[i].style.display == 'none' ? '' : 'none';
        }
    }
    function h(o) {
        var dds = o.parentNode.getElementsByTagName('dd');
        for (var i = 0; i < dds.length; i++) {
            dds[i].style.display = 'none';
        }
    }
    function m(ID) {
        var dls = Dd('m_3').getElementsByTagName('dl');
        for (var i = 0; i < dls.length; i++) {
            var dds = Dd(dls[i].id).getElementsByTagName('dd');
            for (var j = 0; j < dds.length; j++) {
                dds[j].style.display = dls[i].id == 'dl_' + ID ? dds[j].style.display == 'none' ? '' : 'none' : 'none';
            }
        }
    }
</script>
<script type="text/javascript" src="?action=cron"></script>
</body>
</html>