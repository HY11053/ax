@extends('admin.layouts.admin_app')
@section('title')编辑普通文档@stop
@section('head')
    <link href="/adminlte/plugins/summernote/summernote.css" rel="stylesheet">
    <link href="/adminlte/plugins/iCheck/all.css" rel="stylesheet">
    <link rel="stylesheet" href="/adminlte//plugins/daterangepicker/daterangepicker.css">
    <link rel="stylesheet" href="/adminlte/plugins/datepicker/datepicker3.css">
    <link href="/adminlte/plugins/bootstrap-fileinput/css/fileinput.min.css" rel="stylesheet">
    <link href="/adminlte/plugins/select2/select2.min.css" rel="stylesheet">
    <style>
        .select2-container--default .select2-selection--single {
            border-radius: 0px;
        }
        .select2-container .select2-selection--single {
            height: 34px;
            border: 1px solid #d2d6de;
        }
        .select2-container .select2-selection--single .select2-selection__rendered {
            padding-left: 0px;
        }
    </style>
@stop
@section('content')
    <!-- row -->
    <div class="row">
        {{Form::model($articleinfos,array('route' =>array( 'msarticle_edit','id'=>$id),'method' => 'put','files' => true,))}}
        <div class="col-md-12">
            <!-- The time line -->
            <ul class="timeline">

                <!-- timeline time label -->
                <li class="time-label">
                  <span class="bg-red">
                     {{date("M j, Y")}}
                  </span>
                </li>
                <!-- /.timeline-label -->
                <!-- timeline item -->

                <li>
                    <i class="fa fa-pencil-square bg-blue"></i>

                    <div class="timeline-item">
                        <span class="time"><i class="fa fa-clock-o"></i> {{date('H:i')}}</span>

                        <h3 class="timeline-header"><a href="#">文章基本信息|</a> 按需填写</h3>

                        <div class="timeline-body basic_info">
                            <div class="form-group col-md-12">
                                {{Form::label('title', '文章标题', array('class' => 'control-label col-md-2 col-sm-3 col-xs-12'))}}
                                <div class="col-md-4 col-sm-9 col-xs-12">
                                    {{Form::text('title', null, array('class' => 'form-control','id'=>'title','placeholder'=>'文章标题'))}}
                                </div>
                            </div>
                            <div class="form-group col-md-12">
                                <label class="col-md-2 col-sm-3 col-xs-12 control-label">自定义文档属性</label>
                                <div class="checkbox" style="margin-top: 0px;">
                                    <label>
                                        @if(strpos($articleinfos->flags, 'h') !== false)
                                            {{Form::checkbox('flags[]', 'h',true,array('class'=>'flat-red'))}} 头条
                                        @else
                                            {{Form::checkbox('flags[]', 'h',false,array('class'=>'flat-red'))}} 头条
                                        @endif
                                    </label>
                                    <label>
                                        @if(strpos($articleinfos->flags, 'p') !== false)
                                            {{Form::checkbox('flags[]', 'p',true,array('class'=>'flat-red'))}} 图片
                                        @else
                                            {{Form::checkbox('flags[]', 'p',false,array('class'=>'flat-red'))}} 图片
                                        @endif
                                    </label>
                                    <label>
                                        @if(strpos($articleinfos->flags, 'c') !== false)
                                            {{Form::checkbox('flags[]', 'c',true,array('class'=>'flat-red'))}}  推荐
                                        @else
                                            {{Form::checkbox('flags[]', 'c',false,array('class'=>'flat-red'))}}  推荐
                                        @endif

                                    </label>
                                    <label>
                                        @if(strpos($articleinfos->flags, 'f') !== false)
                                            {{Form::checkbox('flags[]', 'f',true,array('class'=>'flat-red'))}}  幻灯
                                        @else
                                            {{Form::checkbox('flags[]', 'f',false,array('class'=>'flat-red'))}}  幻灯
                                        @endif
                                    </label>
                                    <label>
                                        @if(strpos($articleinfos->flags, 's') !== false)
                                            {{Form::checkbox('flags[]', 's',true,array('class'=>'flat-red'))}}  滚动
                                        @else
                                            {{Form::checkbox('flags[]', 's',false,array('class'=>'flat-red'))}}  滚动
                                        @endif
                                    </label>
                                    <label>
                                        @if(strpos($articleinfos->flags, 'a') !== false)
                                            {{Form::checkbox('flags[]', 'a',true,array('class'=>'flat-red'))}}  特荐
                                        @else
                                            {{Form::checkbox('flags[]', 'a',false,array('class'=>'flat-red'))}}  特荐
                                        @endif
                                    </label>
                                </div>
                            </div>
                            <div class="form-group col-md-12">
                                {{Form::label('keywords', '文档关键字', array('class' => 'control-label col-md-2 col-sm-3 col-xs-12'))}}
                                <div class="col-md-4 col-sm-9 col-xs-12">
                                    {{Form::text('keywords',null, array('class' => 'form-control','id'=>'keywords','placeholder'=>'文档关键词'))}}
                                </div>
                            </div>
                            <div class="form-group col-md-12">
                                {{Form::label('brandcid', '品牌所属大类', array('class' => 'col-sm-2 control-label'))}}
                                <div class="col-md-4">
                                    {{Form::select('brandcid', $brandcid, null,array('class'=>'form-control select2' ,'id'=>'brandcid'))}}
                                </div>
                            </div>
                            <div class="form-group col-md-12 ">
                                {{Form::label('brandtypeid', '品牌所属子类', array('class' => 'col-sm-2 control-label'))}}
                                <div class="col-md-4">
                                    {{Form::select('brandtypeid', $brandnavs, null,array('class'=>'form-control select2' ,'id'=>'brandtypeid'))}}
                                </div>
                            </div>
                            <div class="form-group col-md-12 ">
                                {{Form::label('typeid', '文章所属栏目', array('class' => 'col-sm-2 control-label'))}}
                                <div class="col-md-4">
                                    {{Form::select('typeid', $allnavinfos, null,array('class'=>'form-control select2'))}}
                                </div>
                            </div>
                            <div class="form-group col-md-12 ">
                                {{Form::label('updatetime', '更新发布时间', array('class' => 'control-label col-md-2 col-sm-3 col-xs-12'))}}
                                <div class="radio col-md-4 col-sm-9 col-xs-12">
                                    {{Form::radio('updatetime', 1, false,array('class'=>'flat-red'))}} 更新时间
                                    {{Form::radio('updatetime', 0, true,array('class'=>'flat-red'))}}不更新
                                </div>
                            </div>
                            @if(!$articleinfos->ismake)
                                <div class="form-group col-md-12 ">
                                    {{Form::label('xiongzhang', '熊掌号推送', array('class' => 'control-label col-md-2 col-sm-3 col-xs-12'))}}
                                    <div class="radio col-md-4 col-sm-9 col-xs-12">
                                        {{Form::radio('xiongzhang', '1', false,array('class'=>'flat-red'))}} 熊掌号天级推送
                                        {{Form::radio('xiongzhang', '0', true,array('class'=>'flat-red'))}}熊掌号周级推送
                                    </div>
                                </div>
                            @endif
                            <div class="form-group col-md-12">
                                {{Form::label('description', '文档描述', array('class' => 'control-label col-md-2 col-sm-3 col-xs-12'))}}
                                <div class="col-md-4 col-sm-9 col-xs-12">
                                    {{Form::textarea('description',null, array('class' => 'form-control col-md-10','id'=>'desrciption','rows'=>3,'placeholder'=>'不填写将自动提取首段'))}}
                                </div>
                            </div>
                            <div class="form-group col-md-12 ">
                                {{Form::label('ismake', '文章状态', array('class' => 'control-label col-md-2 col-sm-3 col-xs-12'))}}
                                <div class="radio col-md-4 col-sm-9 col-xs-12">
                                    @if($articleinfos->ismake)
                                        {{Form::radio('ismake', '1', true,array('class'=>'flat-red','checked'=>'checked'))}} 已审核
                                        {{Form::radio('ismake', '0', false,array('class'=>'flat-red'))}}未审核
                                    @else
                                        {{Form::radio('ismake', '1', true,array('class'=>'flat-red','checked'=>'checked'))}} 已审核
                                        {{Form::radio('ismake', '0', false,array('class'=>'flat-red','checked'=>'checked'))}}未审核
                                    @endif
                                </div>
                            </div>
                            @if(!$articleinfos->ismake || $articleinfos->published_at > \Carbon\Carbon::now())
                                <div class="form-group col-md-12 ">
                                    {{Form::label('published_at', '预选发布时间', array('class' => 'control-label col-md-2 col-sm-3 col-xs-12'))}}
                                    <div class="input-group date  col-md-4 " style="padding-right: 15px; padding-left: 15px;">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </div>
                                        {{Form::text('published_at', null, array('class' => 'form-control pull-right','id'=>'datepicker','placeholder'=>'点击选择时间',"autocomplete"=>"off"))}}
                                    </div>
                                </div>
                            @endif
                        </div>
                        <div class="timeline-footer">
                            <button class="btn btn-primary btn-xs">Read more</button>
                        </div>
                    </div>
                </li>
                <!-- END timeline item -->
                <!-- timeline item -->
                <li>
                    <i class="fa fa-photo bg-aqua"></i>
                    <div class="timeline-item">
                        <span class="time"><i class="fa fa-clock-o"></i> {{date('D M j')}}</span>
                        <h3 class="timeline-header no-border"><a href="#">缩略图处理</a> 图片上传</h3>
                        <div class="timeline-body">
                            <div class="col-md-4 col-sm-12 col-xs-12">
                                <img src="{{ $articleinfos->litpic }}" class="img-rounded img-responsive"/>
                            </div>
                            <div class="col-md-8 col-sm-12 col-xs-12">
                                {{Form::file('image', array('class' => 'file col-md-10','id'=>'input-2','data-show-upload'=>"false",'data-show-caption'=>"true",'accept'=>'image/*'))}}
                                {{Form::hidden('litpic',null , array('class' => 'form-control col-md-10','id'=>'litpic'))}}
                            </div>
                            <div style="clear: both"></div>

                        </div>
                    </div>
                </li>
                <!-- END timeline item -->
                <!-- timeline item -->
                <li>
                    <i class="fa fa-user bg-yellow"></i>

                    <div class="timeline-item">
                        <span class="time"><i class="fa fa-clock-o"></i> 27 mins ago</span>

                        <h3 class="timeline-header"><a href="#">产品信息</a> 产品信息描述</h3>

                        <div class="timeline-body">
                            <div class="row">
                                <div class="form-group col-md-6">
                                    {{Form::label('brandname', '品牌名称', array('class' => 'control-label col-md-2 col-sm-3 col-xs-12'))}}
                                    <div class="col-md-8 col-sm-9 col-xs-12">
                                        {{Form::text('brandname',null, array('class' => 'form-control col-md-10','id'=>'brandname','placeholder'=>'品牌名称'))}}
                                    </div>
                                </div>

                                <div class="form-group col-md-6">
                                    {{Form::label('brandcompany', '公司名称', array('class' => 'control-label col-md-2 col-sm-3 col-xs-12'))}}
                                    <div class="col-md-8 col-sm-9 col-xs-12">
                                        {{Form::text('brandcompany', null, array('class' => 'form-control col-md-10','id'=>'brandcompany','placeholder'=>'公司名称'))}}
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    {{Form::label('brandaddress', '公司地址', array('class' => 'control-label col-md-2 col-sm-3 col-xs-12'))}}
                                    <div class="col-md-8 col-sm-9 col-xs-12">
                                        {{Form::text('brandaddress', null, array('class' => 'form-control col-md-10','id'=>'brandorigin','placeholder'=>'公司地址'))}}
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    {{Form::label('production', '主营产品', array('class' => 'control-label col-md-2 col-sm-3 col-xs-12'))}}
                                    <div class="col-md-8 col-sm-9 col-xs-12">
                                        {{Form::text('production', null, array('class' => 'form-control col-md-10','id'=>'brandnum','placeholder'=>'主营产品'))}}
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    {{Form::label('brandpay', '加盟费用', array('class' => 'control-label col-md-2 col-sm-3 col-xs-12'))}}
                                    <div class="col-md-8 col-sm-9 col-xs-12">
                                        {{Form::text('brandpay', null, array('class' => 'form-control col-md-10','id'=>'brandpay','placeholder'=>'加盟费用'))}}
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    {{Form::label('brandnum', '门店数量', array('class' => 'control-label col-md-2 col-sm-3 col-xs-12'))}}
                                    <div class="col-md-8 col-sm-9 col-xs-12">
                                        {{Form::text('brandnum', null, array('class' => 'form-control col-md-10','id'=>'brandarea','placeholder'=>'门店数量'))}}
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    {{Form::label('branddev', '发展模式', array('class' => 'control-label col-md-2 col-sm-3 col-xs-12'))}}
                                    <div class="col-md-8 col-sm-9 col-xs-12">
                                        {{Form::text('branddev', null, array('class' => 'form-control col-md-10','id'=>'branddev','placeholder'=>'发展模式'))}}
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="timeline-footer">
                            <a class="btn btn-warning btn-flat btn-xs">View comment</a>
                        </div>
                    </div>
                </li>
                <!-- END timeline item -->
                <li>
                    <i class="fa fa-file-text bg-maroon"></i>
                    <div class="timeline-item">
                        <span class="time"><i class="fa fa-clock-o"></i> {{date('H:m:s')}}</span>
                        <h3 class="timeline-header"><a href="#">文档处理</a>文章内容编辑</h3>
                        <div class="timeline-body">
                        @include('admin.layouts.ueditor')
                        <!-- 编辑器容器 -->
                            <script id="container" name="body" type="text/plain" > {!! $articleinfos->body!!}</script>
                        </div>
                        <div class="timeline-footer">
                            <button type="submit"  class="btn btn-md bg-maroon">提交文档</button>
                        </div>
                    </div>
                </li>
                <!-- END timeline item -->
                <li>
                    <i class="fa fa-clock-o bg-gray"></i>
                </li>
            </ul>
        </div>
        <!-- /.col -->
        {!! Form::close() !!}
    </div>
    @if(count($errors) > 0)
        <ul class="alert alert-danger">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
        @endif
        </section>

@stop
@section('libs')
    <!-- iCheck -->
    <script src="/adminlte/plugins/iCheck/icheck.min.js"></script>
    <script src="/adminlte/plugins/datepicker/bootstrap-datepicker.js"></script>
    <script src="/adminlte/plugins/datepicker/locales/bootstrap-datepicker.zh-CN.js"></script>
    <script src="/adminlte/plugins/bootstrap-fileinput/js/fileinput.min.js"></script>
    <script src="/adminlte/plugins/bootstrap-fileinput/js/locales/zh.js"></script>
    <script src="/adminlte/plugins/select2/select2.full.min.js"></script>
    <script src="/adminlte/plugins/select2/i18n/zh-CN.js"></script>
    <script src="/adminlte/validator.js"></script>
    <script>
        $(function () {
            $('.select2').select2({language: "zh-CN"});
            $('#datepicker').datepicker({autoclose: true,language: 'zh-CN',todayHighlight: true });
            $('.basic_info input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({ checkboxClass: 'icheckbox_flat-green', radioClass: 'iradio_flat-green'});
        });
    </script>
  @stop

