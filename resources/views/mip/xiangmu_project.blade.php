@extends('mip.mip')
@section('title')@if(isset($project_title)){{$project_title}}@endif{{$thistypeinfo->title}}-{{config('app.indexname')}}@stop
@section('keywords'){{$thistypeinfo->keywords}} @stop
@section('description'){{trim($thistypeinfo->description)}}@stop
@section('main_content')
    <div class="path">
        <a href="/">首页</a>&gt; <a href="/xiangmu/">创业项目</a>&gt;
    </div>
    <!--项目列表 开始-->
    <div class="item_sort">
        <span class="tit"><a href="/xiangmu/">项目推荐</a></span>
        <mip-accordion sessions-key="mip_4" expaned-limit>
            <section>
                <p>所有项目<i></i></p>
                <ul class="sum">
                    <li  @if(trim(Request::getrequesturi(),'/') == 'xiangmu')class="dq" @endif><a href="/xiangmu/">不限</a></li>
                    @foreach($topbrandtypeinfos as $topbrandtypeinfo)
                        <li @if(trim(Request::getrequesturi(),'/') == $topbrandtypeinfo->real_path || $topbrandtypeinfo->real_path == $thistypeinforeid->real_path) class="dq" @endif>
                            <a href="/{{$topbrandtypeinfo->real_path}}/">{{$topbrandtypeinfo->typename}}</a>
                        </li>
                    @endforeach
                </ul>
            </section>
            <section>
                <p>投资金额<i></i></p>
                <ul class="sum">
                    <li  class="dq" ><a href="/{{$thistypeinfo->real_path}}/">不限</a></li>
                    @foreach($type_investment_types as $investment_type)
                        <li @if(str_contains(Request::getrequesturi(),$investment_type->url)) class="on" @endif>@if(array_key_exists($investment_type->id,$investment_ids))<a href="/{{$thistypeinfo->real_path}}/{{$investment_type->url}}/">{{$investment_type->type}}</a></li>@endif
                    @endforeach
                </ul>
            </section>
        </mip-accordion>
    </div>
    <div class="item_list">
        <div class="index_item ntb">
            <div class="bd">
                <ul>
                    @foreach($pagelists as $pagelist)
                        <li>
                            <a href="/xiangmu/{{$pagelist->id}}.html">
                                <div class="img_show"><i>{{$loop->iteration}}</i><mip-img src="{{$pagelist->litpic}}"></mip-img></div>
                                <div class="cont">
                                    <p class="tit">{{$pagelist->brandname}}</p>
                                    <p class="pt">{{$thistypeinfo->typename}}</p>
                                    <p class="price">投资金额：<em>{{$investment_types[$pagelist->tzid]}}</em></p>
                                    <p class="company">公司名称：{{$pagelist->brandgroup}}</p>
                                </div>
                                <i class="cert">已认证</i>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="pages">
            {!! str_replace(['?cid=&amp;page','p=','?cid='],['/p','p',''],preg_replace('#(\/p[0-9]+)(\/p[0-9]+)#','${2}',str_replace('?p=','/p',preg_replace('/<a href=[\'\"]?([^\'\" ]+).*?>/','<a href="${1}/">',$pagelists->links())))) !!}
        </div>
    </div>
    <!--项目列表 结束-->
@stop