<!--在线留言 开始-->
<div class="msg" id="msg">
    <form onsubmit="return false;">
        <div class="hd">在线留言，商家会第一时间与您联系</div>
        <div class="bd">
            <ul>
                {{csrf_field()}}
                <li>
                    <label for="msg_name" class="label">姓名：</label>
                    <input id="msg_name" class="input_bk" type="text" name="username" value="" placeholder="如 万先生">
                </li>
                <li>
                    <label for="msg_phone" class="label">手机：</label>
                    <input id="msg_phone" class="input_bk" type="text" name="iphone" value="" placeholder="如 13888888888">
                </li>
                <li>
                    <label for="msg_cont" class="label">留言：</label>
                    <textarea id="msg_cont" class="textarea_bk" type="text" name="content" value="" placeholder="我对此项目很感兴趣，请联系我。"></textarea>
                </li>
                <li>
                    @if(isset($thisarticlebrandinfos) && !empty($thisarticlebrandinfos))
                        <input type="hidden" name="project_id" id="project_id" value="{{$thisarticlebrandinfos->id}}">
                        <input type="hidden" name="cid" id="cid" value="{{$thisbrandtypecidinfo->id}}">
                        <input type="hidden" name="title"  id="fm_title" value="{{$thisarticlebrandinfos->brandname}}">
                        <input type="hidden" name="cla" id="cla" value="{{$thisbrandtypeinfo->typename}}">
                        <input type="hidden" name="combrand" id="combrand" value="{{$thisarticlebrandinfos->brandname}}">
                    @elseif(isset($thisarticleinfos) && !empty($thisarticleinfos->brandname))
                        <input type="hidden" name="project_id"  id="project_id" value="{{$thisarticleinfos->id}}">
                        <input type="hidden" name="cid" id="cid" value="{{$thisbrandtypecidinfo->id}}">
                        <input type="hidden" name="title" id="fm_title" value="{{$thisarticleinfos->brandname}}">
                        <input type="hidden" name="cla" id="cla" value="{{$thisbrandtypeinfo->typename}}">
                        <input type="hidden" name="combrand" id="combrand" value="{{$thisarticleinfos->brandname}}">
                    @else
                        <input type="hidden" name="title" id="fm_title"  value="未知分类">
                        <input type="hidden" name="cla"  id="cla" value="未知分类">
                        <input type="hidden" name="combrand"  id="combrand"  value="未知分类">
                    @endif
                    <input type="submit" value="立即提交留言" id="sub_btn" class="btn">
                </li>
            </ul>
        </div>
    </form>
</div>
<!--在线留言 结束-->
@if(!Jenssegers\Agent\Facades\Agent::isRobot())
    <div class="popup_mask">
        <div class="lastCeng"></div>
        <div class="CengBox">
            <img src="/mobile/images/kai.png" class="money" />
            <span class="popup_close"></span>
            <p class="top1"><span id="brand_name_UNM">立即获取</span><span><font id="fengex">|</font></span><span>加盟方案</span></p>
            <form class="modalbox" onsubmit="return false">
                <input type="text" maxlength="11"  id="msg_phone2" placeholder="请输入手机号码">
                <input type="text" id="msg_name2" placeholder="请输入您的称呼" >
                @if(isset($thisarticlebrandinfos) && !empty($thisarticlebrandinfos))
                    <input type="hidden" name="project_id2" id="project_id2" value="{{$thisarticlebrandinfos->id}}">
                    <input type="hidden" name="cid2" id="cid2" value="{{$thisbrandtypecidinfo->id}}">
                    <input type="hidden" name="title2"  id="fm_title2" value="{{$thisarticlebrandinfos->brandname}}">
                    <input type="hidden" name="cla2" id="cla2" value="{{$thisbrandtypeinfo->typename}}">
                    <input type="hidden" name="combrand2" id="combrand2" value="{{$thisarticlebrandinfos->brandname}}">
                @elseif(isset($thisarticleinfos) && !empty($thisarticleinfos->brandname))
                    <input type="hidden" name="project_id2"  id="project_id2" value="{{$thisarticleinfos->id}}">
                    <input type="hidden" name="cid2" id="cid2" value="{{$thisbrandtypecidinfo->id}}">
                    <input type="hidden" name="title2" id="fm_title2" value="{{$thisarticleinfos->brandname}}">
                    <input type="hidden" name="cla2" id="cla2" value="{{$thisbrandtypeinfo->typename}}">
                    <input type="hidden" name="combrand2" id="combrand2" value="{{$thisarticleinfos->brandname}}">
                @else
                    <input type="hidden" name="title2" id="fm_title2"  value="未知分类">
                    <input type="hidden" name="cla2"  id="cla2" value="未知分类">
                    <input type="hidden" name="combrand2"  id="combrand2"  value="未知分类">
                @endif
                <button type="submit" id="msg_sub2" class="sure">立即咨询</button>
            </form>
        </div>
    </div>
    <div class="zxNavBar">
        <div class="zxnavbarcon">
            <div  role="button" tabindex="0"  id="btn-open" class="zxHdImgcons" >
                <div class="zxHdImg">
                    <img src="/mobile/images/hdimg2.jpg"/>
                </div>
                <div class="zxHdName">
                    <div class="zxHdName-peo">U88加盟网</div>
                    <p>招商经理<span>联系她</span></p>
                </div>
            </div>
            <div class="mfcall js_popup" >免费通话</div>
            <div class="mfcsain js_popup" >立即咨询</div>
        </div>
    </div>
@endif
