@extends('layouts.base')

@section('title')
    Motortong
@endsection

@section('content')

    <nav id="nav" class="child_page_nav">
        <div class="nav-bars">
            <ul>
                <li><a href="{{ route('main.index') }}" rel="nofollow">Home</a></li>
                <li><a href="">News</a></li>
                <li><a href="">Price</a></li>
                <li><a href="">Manual</a></li>
                <li><a href="">Ask</a></li>
                <li><a href="">Distributor</a></li>
            </ul>
        </div>

    </nav>
    <main id="body_main">
        <div class="stage_classify_filt">
            @if($brands->isNotEmpty())
            <div class="filt_option_box brand_filt_option_box text_left">
                <div class="filt_option">
                    @foreach ($brands as $brand)
                    <span class="filt_option_item" title=""><a href=""><img src="{{ json_decode($brand['thumb'], true)['thumb1'] }}" alt="{{ $brand['name'] }}"/></a></span>
                    @endforeach
                </div>
            </div>
            @endif

            <div class="other_options_block">
                <ul class="other_option_box text_left">
                    @if($paras->isNotEmpty())
                    @foreach ($paras as $para)
                    <li class="other_option_name_item">

                        <span><?php echo ucfirst($para['name'])?><i class="iconfont icon-down_arrow-copy"></i></span>
                        <dl>
                            <?php foreach ($para['values'] as $value){?>
                            <dd class="other_option_item"><a href="">{{ $value['value'] }}</a></dd>
                            <?php }?>
                        </dl>

                    </li>
                    @endforeach

                    @endif
                </ul>
            </div>

        </div>
        <div class="position-relative clear-both">
            <div id="main_box" class="model_main text_left">
                <div>

                    @if($categories->isNotEmpty())
                    <div class="category">
                        <div class="f18 f_color_555 category_head"><b><i class="icon-rectangular4 iconfont"></i> Category</b></div>
                        <div class="side_category_first">
                            <ul class="first_category_list">
                                @foreach ($categories as $category)
                                <li>
                                    <a class="omit" href="">{{ $category['name'] }}</a>
                                    @if($category['descendants']->isNotEmpty())
                                    <ul class="second_category_list">
                                        @foreach ($category['descendants'] as $child)
                                        <li><a class="f_color_888" href="">{{ $child['name'] }}</a></li>
                                        @endforeach
                                    </ul>
                                    @endif

                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    @endif
                    <div class="content">
                        <div class="img_news">
                            <div class="headline_news">

                                <a href="">
                                    <div class="news_img"><img src="" alt=""/></div>
                                    <div class="css_aero_glass"><div></div></div>
                                    <div class="news_text">
                                        <p class="news_title f18">xx</p>
                                        <p class="news_con f12">xxxxx</p>
                                    </div>
                                </a>
                            </div>

                            <div>
                                <ul class="img_news_list">

                                    <li>
                                        <div class="news_img">
                                            <a href=""><img src="" alt=""/></a>
                                        </div>
                                        <div class="news_text">
                                            <a href="">yyyyyyyy</a>
                                        </div>
                                    </li>

                                </ul>
                            </div>

                        </div>
                        <div class="main_top">
                            <div class="news">
                                <div class="f18"><b>NEWS</b></div>
                                <div class="f15 news_title"><a class="f_color_f00" href="" target="_blank"><b></b></a></div>
                                <ul class="news_list">
                                    <
                                    <li class="omit" title=""><a href="" target="_blank">ttttt</a></li>

                                </ul>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="main_middle">
                    <?php if(!empty($question)):?>
                    <div class="q_and_a">
                        <div class="f18"><b>Q & A</b></div>
                        <ul class="q_and_a_list">
                            <?php foreach($question as $k => $qa):?>

                            <li>
                                <div class="q_block omit">
                                    <i class="iconfont <?php if($k==0):?>icon-up_arrow <?php else:?>icon-down_arrow-copy<?php endif?> f13"></i>
                                    <a href="https://ask.motortong.com/<?php echo $qa['question']['postid']?>" rel="nofollow" target="_blank"><?php echo $qa['question']['title']?></a>
                                </div>
                                <div class="a_block f_color_888">
                                    <?php if(!empty($qa['answer'])):?>
                                <?php echo substr($qa['answer']['content'],0,150)?>
								<?php endif?>
                                </div>
                            </li>

                            <?php endforeach?>
                        </ul>
                    </div>
                    <?php endif?>
                    <div class="know_base">
                        <div class="f18"><b>Knowledge base</b></div>
                        <ul class="know_base_list">

                            <li class="omit" title=""><a href="" target="_blank">kkkkkk</a></li>

                        </ul>
                    </div>
                </div>
                <?php if(!empty($brand_resource['resource'])){?>
                <div class="manual_block">
                    <div class="manual_title">
                        <span  class="f18"><b>Manual(<span><?php echo $brand_resource['total_num']?></span>)</b></span>
                        <?php foreach($first_category_resource as $value){?>
                        <span><a class="f_color_0871c2" href="<?php echo $value['siteurl']?>"><?php echo $value['content']?></a></span>
                        <?php }?>
                    </div>
                    <ul class="manual_list">
                        <?php foreach ($brand_resource['resource'] as $value){?>
                        <li>
                            <div class="manual_img"><a href="<?php echo $value['siteurl']?>"><img src="<?php echo $site['image_domain'].$value['thumb']?>" alt="<?php echo $value['res_name']?>"/></a></div>
                            <div><a href="<?php echo $value['siteurl']?>"><?php echo $value['res_name']?></a></div>
                        </li>
                        <?php }?>
                    </ul>
                </div>
                <?php }?>

                @if($companies->isNotEmpty())
                <div class="distributors">
                    <div class="distributors_title">
                        <span  class="f18"><b>Distributors</b></span>

                    </div>
                    <ul class="distributors_list">
                        @foreach($companies as $company)
                        <li>
                            <div>
                                <span class="f15"><b><a rel="nofollow" class="f_color_0871c2" href="">{{ $company['company']['name'] }}</a></b></span>
                                <div class="star_block" data-half_star="4.5">
                                <span class="star_img iconfont icon-favorfill">
                                </span><span class="star_img iconfont icon-favorfill">
                                </span><span class="star_img iconfont icon-favorfill">
                                </span><span class="star_img iconfont icon-favorfill">
                                </span><span class="star_img iconfont icon-favorfill"></span>
                                </div>
                            </div>
                            <div class="omit f_color_888"> <span>{{$company['company']['address']}}</span> <span>{{$company['company']['telephone']}}</span></div>
                        </li>
                        @endforeach

                    </ul>
                </div>
                @endif

            </div>
            <div id="side_box" class="text_left">
                <div class="rank">
                    @if($models->isNotEmpty())
                    <div class="f18 f_color_555"><b>TOP</b></div>
                    <ul class="rank_list">
                        @foreach ($models as $key=>$model)
                        <li class="rank_item" data-rank ="{{ $key + 1 }}"><span class="place">{{ $key + 1 }}</span><a class="f_color_888" href=""><span class="rank_model_name">{{ $model['name'] }}</span></a></li>
                        @endforeach
                    </ul>
                    @endif
                </div>
                <?php if(!empty($tags)){?>
                <div class="new_manual">
                    <div class="f18 f_color_555"><b>Hot Products</b></div>
                    <ul class="manual_list">
                        <?php foreach ($tags as $value){?>
                        <li title="<?php echo $value['tag']?>"><a class="f_color_0871c2" href="<?php echo $value['siteurl']?>"><?php echo $value['tag']?></a></li>
                        <?php }?>
                    </ul>
                </div>
                <?php }?>


            </div>
        </div>

    </main>
@endsection

@section('footer')
    @parent
@endsection



