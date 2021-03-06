@extends('admin.layouts.admin_app')
@section('title')美食网站栏目管理@stop
@section('head')
    <link rel="stylesheet" href="/adminlte/plugins/fullcalendar/fullcalendar.min.css">
    <link rel="stylesheet" href="/adminlte/plugins/fullcalendar/fullcalendar.print.css" media="print">
    <link rel="stylesheet" href="/adminlte/plugins/iCheck/flat/blue.css">
    <style>
        .spide_span{display: inline-block; float: right; margin-right: 20px;}
        .spide_span span{padding: 5px; margin-left: 5px; font-weight: 400; cursor: pointer; line-height: 16px;}
        .spide_span span.ncls{display: inline-block;  width: 60px; }
        h3.box-title a{color: inherit; text-decoration: none;}
    </style>
@stop
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="btn btn-primary btn-block margin-bottom nleft"><span style="color: #ffffff; display: inline-block; float: left;">美食网站栏目管理</span> <a href="{{route('category_create')}}" style="color: #ffffff; display: inline-block; float: right;">添加栏目</a><span style="display: inline-block; height: 0px; clear: both;"></span></div>
            @foreach($topnavs as $key=>$topnav)
                <div class="box box-solid collapsed-box">
                    <div class="box-header with-border">
                        <h3 class="box-title "><a href="/admin/article/mstype/{{$key}}"> {{$topnav}}</a> </h3>
                        <div class="spide_span">
                            <span class="label label-primary pull-right ncls">暂不统计</span>
                            {{--<span class="label label-danger pull-right" data-toggle="modal" data-target=".modal-sm{{$key}}">删除</span>--}}
                            <span class="label label-success pull-right" onclick="link({{$key}},'admin/mscategory/edit')">编辑</span>
                        </div>
                        <div class="box-tools">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                            </button>
                        </div>
                    </div>
                    @if(\App\AdminModel\Mscategory::where('reid',$key)->value('id'))
                    <div class="box-body no-padding">
                        <ul class="nav nav-pills nav-stacked">
                            @foreach(\App\AdminModel\Mscategory::where('reid',$key)->orderBy('id','asc')->get(['id','typename']) as $item)
                            <li><a class="arctype" href="/admin/article/mstype/{{$item->id}}"><i class="fa fa-envelope-o"></i> {{$item->typename}}</a>
                                <span class="label label-success pull-right" onclick="link({{$item->id}},'admin/mscategory/edit')">编辑</span>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                </div>
            @endforeach
        </div>
    </div>
    <!-- /.row -->
@stop
@section('libs')
    <!-- iCheck -->
    <script src="/adminlte/plugins/iCheck/icheck.min.js"></script>
    <!-- Page Script -->
    <script>
        $(function () {
            //Enable iCheck plugin for checkboxes
            //iCheck for checkbox and radio inputs
            $('.mailbox-messages input[type="checkbox"]').iCheck({
                checkboxClass: 'icheckbox_flat-blue',
                radioClass: 'iradio_flat-blue'
            });
            //Enable check and uncheck all functionality
            $(".checkbox-toggle").click(function () {
                var clicks = $(this).data('clicks');
                if (clicks) {
                    //Uncheck all checkboxes
                    $(".mailbox-messages input[type='checkbox']").iCheck("uncheck");
                    $(".fa", this).removeClass("fa-check-square-o").addClass('fa-square-o');
                } else {
                    //Check all checkboxes
                    $(".mailbox-messages input[type='checkbox']").iCheck("check");
                    $(".fa", this).removeClass("fa-square-o").addClass('fa-check-square-o');
                }
                $(this).data("clicks", !clicks);
            });
            //Handle starring for glyphicon and font awesome
            $(".mailbox-star").click(function (e) {
                e.preventDefault();
                //detect type
                var $this = $(this).find("a > i");
                var glyph = $this.hasClass("glyphicon");
                var fa = $this.hasClass("fa");
                //Switch states
                if (glyph) {
                    $this.toggleClass("glyphicon-star");
                    $this.toggleClass("glyphicon-star-empty");
                }
                if (fa) {
                    $this.toggleClass("fa-star");
                    $this.toggleClass("fa-star-o");
                }
            });

        });
    </script>
    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            })
        });
        function link($id,$action) {
            window.location.href='/'+$action+'/'+$id;
        }
        function AjDelete (id,node) {
            var id = id;
            var node=node;
            $.ajax({
                //提交数据的类型 POST GET
                type:"POST",
                //提交的网址
                url:"/admin/mscategory/delete/"+id,
                //提交的数据
                data:{"id":id,'node':node},
                //返回数据的格式
                datatype: "html",    //"xml", "html", "script", "json", "jsonp", "text".
                success:function (response, stutas, xhr) {
                    $(".modal-s-m"+id+" .modal-body").html(response);
                    $("#btn-"+id).attr("disabled","disabled");

                }
            });
        }
    </script>
@stop

