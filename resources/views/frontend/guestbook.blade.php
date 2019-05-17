@extends('frontend.frontend')
@section('title')意见反馈-U88加盟网@stop
@section('main_content')
    <div class="btright">
        <div class="hd">
            <h1>意见反馈</h1>
        </div>
        <div class="right_center">
            <div style="padding: 15px 8px 8px 5px;">
                <div style="padding-bottom: 10px;"><font style="color: red;">* </font>非常感谢您的建议，如果您有其中任何一个问题，请告知我们：</div>
                <div class="feedback">
                    <div class="input_item input_item_level_2" input_item="u88_feedback.feedback" base_type="element" valid_regx="" base_on="radio" title="" be_required="required" display_mode="input">
                        <div class="fe_title"> </div>
                        <div class="fe_content">
                            <div>
                                <label>
                                    <input type="radio" value="主页打不开" name="u88_feedback[feedback]">
                                    <span>主页打不开</span></label>
                                <label>
                                    <input type="radio" value="主页打开速度慢" name="u88_feedback[feedback]">
                                    <span>主页打开速度慢</span></label>
                                <label>
                                    <input type="radio" value="主页打开不全、乱码（广告、弹窗、跳转）" name="u88_feedback[feedback]">
                                    <span>主页打开不全、乱码（广告、弹窗、跳转）</span></label>
                                <label>
                                    <input type="radio" value="优化建议及其他" checked="" name="u88_feedback[feedback]">
                                    <span>优化建议及其他</span></label>
                                <span class="fe_notice"></span></div>
                            <div class="fe_desc"></div>
                        </div>
                    </div>
                </div>
                <div style="padding-bottom: 10px; padding-top: 18px;"><font style="color: red;">* </font>请具体说明您的问题、建议或者您不满意的原因：</div>
                <div class="feedback-content">
                    <div class="input_item input_item_level_2" input_item="u88_feedback.content" base_type="element" valid_regx="" base_on="textarea" title="" be_required="required" display_mode="input">
                        <div class="fe_title"> </div>
                        <div class="fe_content">
                            <div>
                                <label>
                                    <textarea name="u88_feedback[content]"></textarea>
                                </label>
                                <span class="fe_notice"></span></div>
                            <div class="fe_desc"></div>
                        </div>
                    </div>
                </div>
                <div style="padding-bottom: 10px; padding-top: 18px;">希望您留下邮箱等联系方式，请优先填写QQ号，以便于我们与您进一步沟通</div>
                <div class="feedback-qq">
                    <div class="input_item input_item_level_2" input_item="u88_feedback.qq" base_type="element" valid_regx="" base_on="text" title="QQ" display_mode="input">
                        <div class="fe_title">QQ ： </div>
                        <div class="fe_content">
                            <div>
                                <label>
                                    <input type="text" value="" name="u88_feedback[qq]">
                                </label>
                                <span class="fe_notice"></span></div>
                            <div class="fe_desc"></div>
                        </div>
                    </div>
                </div>
                <div class="feedback-email">
                    <div class="input_item input_item_level_2" input_item="u88_feedback.email" base_type="element" valid_regx="" base_on="text" title="邮箱" display_mode="input">
                        <div class="fe_title">邮箱 ： </div>
                        <div class="fe_content">
                            <div>
                                <label>
                                    <input type="text" value="" name="u88_feedback[email]">
                                </label>
                                <span class="fe_notice"></span></div>
                            <div class="fe_desc"></div>
                        </div>
                    </div>
                </div>
                <div class="feedback-phone">
                    <div class="input_item input_item_level_2" input_item="u88_feedback.phone" base_type="element" valid_regx="" base_on="text" title="电话" display_mode="input">
                        <div class="fe_title">电话 ： </div>
                        <div class="fe_content">
                            <div>
                                <label>
                                    <input type="text" value="" name="u88_feedback[phone]">
                                </label>
                                <span class="fe_notice"></span></div>
                            <div class="fe_desc"></div>
                        </div>
                    </div>
                </div>
                <div class="feedback-valid_code">
                    <div class="input_item input_item_level_2" input_item="u88_feedback.valid_code" base_type="element" valid_regx="" base_on="text" title="验证码" base_item="common.valid_code" be_required="required" display_mode="input">
                        <div class="fe_title">验证码 ： </div>
                        <div class="fe_content">
                            <div>
                                <label>
                                    <input type="text" value="" name="u88_feedback[valid_code]">
                                </label>
                                <span class="fe_notice"></span></div>
                            <div class="fe_desc">防止恶意注册程序，请您输入验证码。</div>
                            <div class="valid_code_img"><img src="/app/misc_op/valid_code/1557389761503"></div>
                        </div>
                        <script>
                            function show_valid_code(){
                                $('.valid_code_img').html('<img src="/app/misc_op/valid_code/' + (new Date()).getTime() + '" />');
                                $('.valid_code_img img').click(function(){
                                    show_valid_code();
                                });
                            }
                            $(function(){
                                show_valid_code();
                            });
                        </script></div>
                </div>
                <div class="feedback-submit">
                    <div class="input_item input_item_level_3" input_item="u88_feedback.bt.submit" base_type="element" valid_regx="" base_on="button" title="" display_mode="input">
                        <div class="fe_title"> </div>
                        <div class="fe_content">
                            <div>
                                <label>
                                    <input type="button" value="提交" name="u88_feedback[bt][submit]">
                                </label>
                                <span class="fe_notice"></span></div>
                            <div class="fe_desc"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop