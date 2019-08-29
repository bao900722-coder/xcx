<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
<link rel="stylesheet" type="text/css" href="../addons/<?php  echo $_GPC['m']?>/resource/css/style.css" />
<link rel="stylesheet" type="text/css" href="../addons/<?php  echo $_GPC['m']?>/resource/swal/dist/sweetalert2.min.css" />
<style>
    .sort_status{
        overflow: hidden;
        position: absolute;
        top:0;
        left: 100%;
        width: 62px;
        height: 32px;
        padding-left: 10px;
        text-align: left;
    }
</style>
<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">
            <?php  echo $xtitle;?>
        </h3>
    </div>
    <div class="panel-body">
        <ul class="nav nav-tabs">
            <li role="presentation" class="active"><a>网站配置</a></li>
            <li role="presentation"><a href="<?php  echo url('site/entry/'.$_GPC['do'],array('m'=>$_GPC['m'],'op'=>'sort','version_id'=>$_GPC['version_id']));?>">首页排版</a></li>
            <li role="presentation"><a href="<?php  echo url('site/entry/'.$_GPC['do'],array('m'=>$_GPC['m'],'op'=>'map','version_id'=>$_GPC['version_id']));?>">地图配置</a></li>
            <li role="presentation"><a href="<?php  echo url('site/entry/'.$_GPC['do'],array('m'=>$_GPC['m'],'op'=>'theme','version_id'=>$_GPC['version_id']));?>">主题配置</a></li>
            <li role="presentation"><a href="<?php  echo url('site/entry/'.$_GPC['do'],array('m'=>$_GPC['m'],'op'=>'sms','version_id'=>$_GPC['version_id']));?>">短信配置</a></li>
            <li role="presentation"><a href="<?php  echo url('site/entry/'.$_GPC['do'],array('m'=>$_GPC['m'],'op'=>'print','version_id'=>$_GPC['version_id']));?>">打印配置</a></li>
            <li role="presentation"><a href="<?php  echo url('site/entry/'.$_GPC['do'],array('m'=>$_GPC['m'],'op'=>'card','version_id'=>$_GPC['version_id']));?>">会员卡配置</a></li>
            <li role="presentation"><a href="<?php  echo url('site/entry/'.$_GPC['do'],array('m'=>$_GPC['m'],'op'=>'refund','version_id'=>$_GPC['version_id']));?>">退款配置</a></li>
            <li role="presentation"><a href="<?php  echo url('site/entry/'.$_GPC['do'],array('m'=>$_GPC['m'],'op'=>'rotate','version_id'=>$_GPC['version_id']));?>">抽奖配置</a></li>
            <li role="presentation"><a href="<?php  echo url('site/entry/'.$_GPC['do'],array('m'=>$_GPC['m'],'op'=>'share','version_id'=>$_GPC['version_id']));?>">分销配置</a></li>
            <li role="presentation"><a href="<?php  echo url('site/entry/'.$_GPC['do'],array('m'=>$_GPC['m'],'op'=>'ad','version_id'=>$_GPC['version_id']));?>">公告配置</a></li>
            <li role="presentation"><a href="<?php  echo url('site/entry/'.$_GPC['do'],array('m'=>$_GPC['m'],'op'=>'group','version_id'=>$_GPC['version_id']));?>">退款地址</a></li>
            <li role="presentation"><a href="<?php  echo url('site/entry/'.$_GPC['do'],array('m'=>$_GPC['m'],'op'=>'online','version_id'=>$_GPC['version_id']));?>">客服配置</a></li>
            <li role="presentation"><a href="<?php  echo url('site/entry/'.$_GPC['do'],array('m'=>$_GPC['m'],'op'=>'audit','version_id'=>$_GPC['version_id']));?>">过审配置</a></li>
            <li role="presentation"><a href="<?php  echo url('site/entry/'.$_GPC['do'],array('m'=>$_GPC['m'],'op'=>'service_poster','version_id'=>$_GPC['version_id']));?>">分销海报配置</a></li>
            <li role="presentation"><a href="<?php  echo url('site/entry/'.$_GPC['do'],array('m'=>$_GPC['m'],'op'=>'store_poster','version_id'=>$_GPC['version_id']));?>">门店海报配置</a></li>
            <li role="presentation"><a href="<?php  echo url('site/entry/'.$_GPC['do'],array('m'=>$_GPC['m'],'op'=>'member_poster','version_id'=>$_GPC['version_id']));?>">店员海报配置</a></li>
            <li role="presentation"><a href="<?php  echo url('site/entry/'.$_GPC['do'],array('m'=>$_GPC['m'],'op'=>'mall_poster','version_id'=>$_GPC['version_id']));?>">商城海报配置</a></li>
            <li role="presentation"><a href="<?php  echo url('site/entry/'.$_GPC['do'],array('m'=>$_GPC['m'],'op'=>'package_poster','version_id'=>$_GPC['version_id']));?>">套餐海报配置</a></li>
            <li role="presentation"><a href="<?php  echo url('site/entry/'.$_GPC['do'],array('m'=>$_GPC['m'],'op'=>'ads','version_id'=>$_GPC['version_id']));?>">广告配置</a></li>
        </ul>
        <form class="form-horizontal" role="form" method="post" action="<?php  echo url('site/entry/'.$_GPC['do'],array('m'=>$_GPC['m'],'op'=>'savemodel','version_id'=>$_GPC['version_id']));?>" name="submit" style="padding: 20px 0;">
            <div class="form-group">
                <label for="name" class="col-sm-2 control-label">名称</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control"  name="name" id="name" value="<?php  echo $list['name'];?>">
                    <input type="hidden" name="id" value="<?php  echo $list['id'];?>">
                    <input type="hidden" name="sort">
                </div>
            </div>
            <div class="form-group">
                <label  class="col-sm-2 control-label">标题</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control"  name="title" id="title" value="<?php  echo $list['content']['title'];?>">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">客服功能</label>
                <div class="col-sm-8">
                    <?php  if($list['content']['online_status']==1) { ?>
                    <input type="checkbox" checked class="js-switch" value="1" name="online_status">
                    <?php  } else { ?>
                    <input type="checkbox" class="js-switch" name="online_status" value="1">
                    <?php  } ?>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">客服图标（100*100）</label>
                <div class="col-sm-8">
                    <?php  echo tpl_form_field_image('online_simg',$list['content']['online_simg']);?>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-2 col-sm-3 col-xs-12">客服模块消息配制</label>
                <div class="col-md-10 col-sm-9 col-xs-12">
                    <input type="text" class="form-control" placeholder="模块消息" name="xcmessage" value="<?php  echo $list['content']['xcmessage'];?>">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">电话功能</label>
                <div class="col-sm-8">
                    <?php  if($list['content']['mobile_status']==1) { ?>
                    <input type="checkbox" checked class="js-switch" value="1" name="mobile_status">
                    <?php  } else { ?>
                    <input type="checkbox" class="js-switch" name="mobile_status" value="1">
                    <?php  } ?>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">电话图标（100*100）</label>
                <div class="col-sm-8">
                    <?php  echo tpl_form_field_image('mobile_simg',$list['content']['mobile_simg']);?>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">电话</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control"  name="mobile" id="mobile" value="<?php  echo $list['content']['mobile'];?>">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">首页礼包图片</label>
                <div class="col-sm-8">
                    <?php  echo tpl_form_field_image('prize_img',$list['content']['prize_img']);?>
                </div>
            </div>
            <div class="form-group">
                <label  class="col-sm-2 control-label">版权</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control"  name="copyright" id="copyright" value="<?php  echo $list['content']['copyright'];?>">
                </div>
            </div>
            <div class="form-group" style="display: none;">
                <label  class="col-sm-2 control-label">首页图片(375*250)</label>
                <div class="col-sm-8">
                    <?php  echo tpl_form_field_image('wwww');?>
                </div>
            </div>
            <div class="form-group">
                <label  class="col-sm-2 control-label">预定成功模板<br/>（ID AT0104）</label>
                <div class="col-sm-8">
                    <input type="text" placeholder="(订单号、姓名、电话、项目、时间)" class="form-control"  name="template_id" id="template_id" value="<?php  echo $list['content']['template_id'];?>">
                </div>
            </div>
            <div class="form-group">
                <label  class="col-sm-2 control-label">团购成功通知<br/>（ID AT0357）</label>
                <div class="col-sm-8">
                    <input type="text" placeholder="(订单编号、团购价格、团购项目、时间)" class="form-control"  name="group_success" id="group_success" value="<?php  echo $list['content']['group_success'];?>">
                </div>
            </div>
            <div class="form-group">
                <label  class="col-sm-2 control-label">团购失败通知<br/>（ID AT0323）</label>
                <div class="col-sm-8">
                    <input type="text" placeholder="(订单号、团购价格、团购项目、失败原因)" class="form-control"  name="group_fail" id="group_fail" value="<?php  echo $list['content']['group_fail'];?>">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">门店大图</label>
                <div class="col-sm-8">
                    <?php  if($list['content']['store_status']==1) { ?>
                    <input type="checkbox" checked class="js-switch" value="1" name="store_status">
                    <?php  } else { ?>
                    <input type="checkbox" class="js-switch" name="store_status" value="1">
                    <?php  } ?>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">退款功能</label>
                <div class="col-sm-8">
                    <?php  if($list['content']['refund_status']==1) { ?>
                    <input type="checkbox" checked class="js-switch" value="1" name="refund_status">
                    <?php  } else { ?>
                    <input type="checkbox" class="js-switch" name="refund_status" value="1">
                    <?php  } ?>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">地址功能</label>
                <div class="col-sm-8">
                    <?php  if($list['content']['map_status']==1) { ?>
                    <input type="checkbox" checked class="js-switch" value="1" name="map_status">
                    <?php  } else { ?>
                    <input type="checkbox" class="js-switch" name="map_status" value="1">
                    <?php  } ?>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">服务项目选人员功能</label>
                <div class="col-sm-8">
                    <?php  if($list['content']['member_status']==1) { ?>
                    <input type="checkbox" checked class="js-switch" value="1" name="member_status">
                    <?php  } else { ?>
                    <input type="checkbox" class="js-switch" name="member_status" value="1">
                    <?php  } ?>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">上门服务</label>
                <div class="col-sm-8">
                    <?php  if($list['content']['home_status']==1) { ?>
                    <input type="checkbox" checked class="js-switch" value="1" name="home_status">
                    <?php  } else { ?>
                    <input type="checkbox" class="js-switch" name="home_status" value="1">
                    <?php  } ?>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">购买时间</label>
                <div class="col-sm-8">
                    <?php  if($list['content']['time_status']==1) { ?>
                    <input type="checkbox" checked class="js-switch" value="1" name="time_status">
                    <?php  } else { ?>
                    <input type="checkbox" class="js-switch" name="time_status" value="1">
                    <?php  } ?>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">团购时间</label>
                <div class="col-sm-8">
                    <?php  if($list['content']['group_time']==1) { ?>
                    <input type="checkbox" checked class="js-switch" value="1" name="group_time">
                    <?php  } else { ?>
                    <input type="checkbox" class="js-switch" name="group_time" value="1">
                    <?php  } ?>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">预约时间</label>
                <div class="col-sm-8">
                    <?php  if($list['content']['online_time']==1) { ?>
                    <input type="checkbox" checked class="js-switch" value="1" name="online_time">
                    <?php  } else { ?>
                    <input type="checkbox" class="js-switch" name="online_time" value="1">
                    <?php  } ?>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">更换门店</label>
                <div class="col-sm-8">
                    <?php  if($list['content']['store_change']==1) { ?>
                    <input type="checkbox" checked class="js-switch" value="1" name="store_change">
                    <?php  } else { ?>
                    <input type="checkbox" class="js-switch" name="store_change" value="1">
                    <?php  } ?>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">买单折扣功能</label>
                <div class="col-sm-8">
                    <?php  if($list['content']['buy_sale_status']==1) { ?>
                    <input type="checkbox" checked class="js-switch" value="1" name="buy_sale_status">
                    <?php  } else { ?>
                    <input type="checkbox" class="js-switch" name="buy_sale_status" value="1">
                    <?php  } ?>
                </div>
            </div>
            <div class="form-group">
                <label  class="col-sm-2 control-label">店员小标题</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control"  name="member_title" id="member_title" value="<?php  echo $list['content']['member_title'];?>">
                </div>
            </div>
            <div class="form-group">
                <label  class="col-sm-2 control-label">领优惠券提示文字</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control"  name="coupon_text" id="coupon_text" value="<?php  echo $list['content']['coupon_text'];?>">
                </div>
            </div>
            <div class="form-group">
                <label  class="col-sm-2 control-label">优惠券使用规则</label>
                <div class="col-sm-8">
                    <textarea class="form-control"  name="coupon_rule" id="coupon_rule" rows="10"><?php  echo $list['content']['coupon_rule'];?></textarea>
                </div>
            </div>
            <div class="form-group">
                <label  class="col-sm-2 control-label">优惠券图片(345*88)</label>
                <div class="col-sm-8">
                    <?php  echo tpl_form_field_image('coupon_bg',$list['content']['coupon_bg']);?>
                </div>
            </div>
            <div class="form-group">
                <label  class="col-sm-2 control-label">抽奖顶部图片(375*120)</label>
                <div class="col-sm-8">
                    <?php  echo tpl_form_field_image('rotate_bg',$list['content']['rotate_bg']);?>
                </div>
            </div>
            <div class="form-group">
                <label  class="col-sm-2 control-label">单次购买数量限制</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control"  name="total_limit" id="total_limit" value="<?php  echo $list['content']['total_limit'];?>">
                    <span class="help-block">不填则不限制</span>
                </div>
            </div>
            <div class="form-group">
                <label  class="col-sm-2 control-label">团购退款方式</label>
                <div class="col-sm-8">
                    <label class="radio inline" style="width:60px;">
                        <input type="radio" class="ui-radio" name="group_refund" id="group_refund1" value="1" <?php  if($list['content']['group_refund']==1) { ?>checked<?php  } ?>>手动退款
                    </label>
                    <label class="radio inline" style="width:60px;">
                        <input type="radio" class="ui-radio" name="group_refund" id="group_refund2" value="2" <?php  if($list['content']['group_refund']==2) { ?>checked<?php  } ?>>自动退款
                    </label>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">提现自动转账功能<br/>（微信）</label>
                <div class="col-sm-8">
                    <?php  if($list['content']['ti_status']==1) { ?>
                    <input type="checkbox" checked class="js-switch" value="1" name="ti_status">
                    <?php  } else { ?>
                    <input type="checkbox" class="js-switch" name="ti_status" value="1">
                    <?php  } ?>
                </div>
            </div>
            <div class="form-group">
                <label  class="col-sm-2 control-label">首页分享标题</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control"  name="share_index_title" id="share_index_title" value="<?php  echo $list['content']['share_index_title'];?>">
                    <span class="help-block">不填则默认</span>
                </div>
            </div>
            <div class="form-group">
                <label  class="col-sm-2 control-label">首页分享图片</label>
                <div class="col-sm-8">
                    <?php  echo tpl_form_field_image('share_index_img',$list['content']['share_index_img']);?>
                    <span class="help-block">【新睿社区建议】不传则使用默认截图。显示图片长宽比是 5:4</span>
                </div>
            </div>
            <div class="form-group">
                <label  class="col-sm-2 control-label">项目分享标题</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control"  name="share_service_title" id="share_service_title" value="<?php  echo $list['content']['share_service_title'];?>">
                    <span class="help-block">不填则默认</span>
                </div>
            </div>
            <div class="form-group">
                <label  class="col-sm-2 control-label">项目分享图片</label>
                <div class="col-sm-8">
                    <?php  echo tpl_form_field_image('share_service_img',$list['content']['share_service_img']);?>
                    <span class="help-block">不传则使用默认截图。显示图片长宽比是 5:4</span>
                </div>
            </div>
            <div class="form-group">
                <label  class="col-sm-2 control-label">团购分享标题</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control"  name="share_group_title" id="share_group_title" value="<?php  echo $list['content']['share_group_title'];?>">
                    <span class="help-block">不填则默认</span>
                </div>
            </div>
            <div class="form-group">
                <label  class="col-sm-2 control-label">团购分享图片</label>
                <div class="col-sm-8">
                    <?php  echo tpl_form_field_image('share_group_img',$list['content']['share_group_img']);?>
                    <span class="help-block">不传则使用默认截图。显示图片长宽比是 5:4</span>
                </div>
            </div>
            <div class="form-group">
                <label  class="col-sm-2 control-label">订单失效时间</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control"  name="order_fail" id="order_fail" value="<?php  echo $list['content']['order_fail'];?>">
                    <span class="help-block">未支付订单失效时间（单位：秒）</span>
                </div>
            </div>
            <div class="form-group">
                <label  class="col-sm-2 control-label">订单处理时间</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control"  name="order_do" id="order_do" value="<?php  echo $list['content']['order_do'];?>">
                    <span class="help-block">失效订单处理（内容：人员名额释放，限时抢购数量释放）（单位：秒）</span>
                </div>
            </div>
            <div class="form-group">
                <label  class="col-sm-2 control-label">特约商户</label>
                <div class="col-sm-8">
                    <?php  if($list['content']['sub_status']==1) { ?>
                    <input type="checkbox" checked class="js-switch" value="1" name="sub_status">
                    <?php  } else { ?>
                    <input type="checkbox" class="js-switch" name="sub_status" value="1">
                    <?php  } ?>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-2 col-sm-3 col-xs-12">服务商ID</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" placeholder="服务商ID" name="sub_appid" value="<?php  echo $list['content']['sub_appid'];?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-2 col-sm-3 col-xs-12">商户号</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" placeholder="商户号" name="sub_mch_id" value="<?php  echo $list['content']['sub_mch_id'];?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-2 col-sm-3 col-xs-12">支付秘钥</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" placeholder="支付秘钥" name="sub_key" value="<?php  echo $list['content']['sub_key'];?>">
                </div>
            </div>
            <?php  if($tiangong==1) { ?>
            <div class="form-group">
                <label class="col-sm-2 control-label">神秘支付</label>
                <div class="col-sm-8">
                    <?php  if($list['content']['tiangong']==1) { ?>
                    <input type="checkbox" checked class="js-switch" value="1" name="tiangong">
                    <?php  } else { ?>
                    <input type="checkbox" class="js-switch" name="tiangong" value="1">
                    <?php  } ?>
                </div>
            </div>
            <div class="form-group">
                <label  class="col-sm-2 control-label">神秘AppKey</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control"  name="AppKey" id="AppKey" value="<?php  echo $list['content']['AppKey'];?>">
                </div>
            </div>
            <div class="form-group">
                <label  class="col-sm-2 control-label">神秘AppSecret</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control"  name="AppSecret" id="AppSecret" value="<?php  echo $list['content']['AppSecret'];?>">
                </div>
            </div>
            <div class="form-group">
                <label  class="col-sm-2 control-label">神秘agent_id</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control"  name="agent_id" id="agent_id" value="<?php  echo $list['content']['agent_id'];?>">
                </div>
            </div>
            <div class="form-group">
                <label  class="col-sm-2 control-label">神秘user_id</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control"  name="user_id" id="user_id" value="<?php  echo $list['content']['user_id'];?>">
                </div>
            </div>
            <?php  } ?>
            <div class="form-group">
                <label class="col-sm-2 control-label">底部导航<br/>（图标50*50）</label>
                <div class="col-sm-8">
                    <div style="position: relative;">
                        <div class="input-group" style="width: 50%;float:left;">
                            <div class="input-group">
                                <input type="text" name="footer[0][icon]" value="<?php  echo $list['content']['footer'][0]['icon'];?>" class="form-control" autocomplete="off">
                                <span class="input-group-btn">
                                    <button class="btn btn-default" type="button" onclick="showImageDialog(this);">图标（未选）</button>
                                </span>
                            </div>
                            <div class="input-group " style="margin-top:.5em;">
                                <img src="<?php  echo tomedia($list['content']['footer'][0]['icon'])?>" onerror="this.src='./resource/images/nopic.jpg'; this.title='图片未找到.'" class="img-responsive img-thumbnail" style="width: 50px;height: 50px;">
                                <em class="close" style="position:absolute; top: 0px; right: -14px;" title="删除这张图片" onclick="deleteImage(this)">×</em>
                            </div>
                        </div>
                        <div class="input-group" style="width: 50%;float:left;">
                            <div class="input-group">
                                <input type="text" name="footer[0][select]" value="<?php  echo $list['content']['footer'][0]['select'];?>" class="form-control" autocomplete="off">
                                <span class="input-group-btn">
                                    <button class="btn btn-default" type="button" onclick="showImageDialog(this);">图标（选中）</button>
                                </span>
                            </div>
                            <div class="input-group " style="margin-top:.5em;">
                                <img src="<?php  echo tomedia($list['content']['footer'][0]['select'])?>" onerror="this.src='./resource/images/nopic.jpg'; this.title='图片未找到.'" class="img-responsive img-thumbnail" style="width: 50px;height: 50px;">
                                <em class="close" style="position:absolute; top: 0px; right: -14px;" title="删除这张图片" onclick="deleteImage(this)">×</em>
                            </div>
                        </div>
                        <div class="input-group" style="width: 50%;float:left;">
                            <span class="input-group-btn">
                            <button class="btn btn-default" type="button">底部文字</button>
                            </span>
                            <input type="text" name="footer[0][text]" value="<?php  echo $list['content']['footer'][0]['text'];?>" class="form-control">
                        </div>
                        <div class="input-group" style="width: 50%;float:left;">
                            <input type="text" name="footer[0][link]" value="<?php  echo $list['content']['footer'][0]['link'];?>" class="form-control">
                            <span class="input-group-btn">
                                <button class="btn btn-default link" type="button" data-toggle="modal" data-target="#selectUrl">选择链接</button>
                            </span>
                        </div>
                        <div class="sort_status">
                            <?php  if($list['content']['footer'][0]['status']==1) { ?>
                            <input type="checkbox" checked class="js-switch" value="1" name="footer[0][status]">
                            <?php  } else { ?>
                            <input type="checkbox" class="js-switch" value="1" name="footer[0][status]">
                            <?php  } ?>
                        </div>
                        <div style="clear: both;"></div>
                    </div>
                    <div style="margin-top: 10px;position: relative;">
                        <div class="input-group" style="width: 50%;float:left;">
                            <div class="input-group ">
                                <input type="text" name="footer[1][icon]" value="<?php  echo $list['content']['footer'][1]['icon'];?>" class="form-control" autocomplete="off">
                                <span class="input-group-btn">
                                    <button class="btn btn-default" type="button" onclick="showImageDialog(this);">图标（未选）</button>
                                </span>
                            </div>
                            <div class="input-group " style="margin-top:.5em;">
                                <img src="<?php  echo tomedia($list['content']['footer'][1]['icon'])?>" onerror="this.src='./resource/images/nopic.jpg'; this.title='图片未找到.'" class="img-responsive img-thumbnail" style="width: 50px;height: 50px;">
                                <em class="close" style="position:absolute; top: 0px; right: -14px;" title="删除这张图片" onclick="deleteImage(this)">×</em>
                            </div>
                        </div>
                        <div class="input-group" style="width: 50%;float:left;">
                            <div class="input-group">
                                <input type="text" name="footer[1][select]" value="<?php  echo $list['content']['footer'][1]['select'];?>" class="form-control" autocomplete="off">
                                <span class="input-group-btn">
                                    <button class="btn btn-default" type="button" onclick="showImageDialog(this);">图标（选中）</button>
                                </span>
                            </div>
                            <div class="input-group " style="margin-top:.5em;">
                                <img src="<?php  echo tomedia($list['content']['footer'][1]['select'])?>" onerror="this.src='./resource/images/nopic.jpg'; this.title='图片未找到.'" class="img-responsive img-thumbnail" style="width: 50px;height: 50px;">
                                <em class="close" style="position:absolute; top: 0px; right: -14px;" title="删除这张图片" onclick="deleteImage(this)">×</em>
                            </div>
                        </div>
                        <div class="input-group" style="width: 50%;float:left;">
                            <span class="input-group-btn">
                            <button class="btn btn-default" type="button">底部文字</button>
                            </span>
                            <input type="text" name="footer[1][text]" value="<?php  echo $list['content']['footer'][1]['text'];?>" class="form-control">
                        </div>
                        <div class="input-group" style="width: 50%;float:left;">
                            <input type="text" name="footer[1][link]" value="<?php  echo $list['content']['footer'][1]['link'];?>" class="form-control">
                            <span class="input-group-btn">
                                <button class="btn btn-default link" type="button" data-toggle="modal" data-target="#selectUrl">选择链接</button>
                            </span>
                        </div>
                        <div class="sort_status">
                            <?php  if($list['content']['footer'][1]['status']==1) { ?>
                            <input type="checkbox" checked class="js-switch" value="1" name="footer[1][status]">
                            <?php  } else { ?>
                            <input type="checkbox" class="js-switch" value="1" name="footer[1][status]">
                            <?php  } ?>
                        </div>
                        <div style="clear: both;"></div>
                    </div>
                    <div style="margin-top: 10px;position: relative;">
                        <div class="input-group" style="width: 50%;float:left;">
                            <div class="input-group">
                                <input type="text" name="footer[2][icon]" value="<?php  echo $list['content']['footer'][2]['icon'];?>" class="form-control" autocomplete="off">
                                <span class="input-group-btn">
                                    <button class="btn btn-default" type="button" onclick="showImageDialog(this);">图标（未选）</button>
                                </span>
                            </div>
                            <div class="input-group " style="margin-top:.5em;">
                                <img src="<?php  echo tomedia($list['content']['footer'][2]['icon'])?>" onerror="this.src='./resource/images/nopic.jpg'; this.title='图片未找到.'" class="img-responsive img-thumbnail" style="width: 50px;height: 50px;">
                                <em class="close" style="position:absolute; top: 0px; right: -14px;" title="删除这张图片" onclick="deleteImage(this)">×</em>
                            </div>
                        </div>
                        <div class="input-group" style="width: 50%;float:left;">
                            <div class="input-group">
                                <input type="text" name="footer[2][select]" value="<?php  echo $list['content']['footer'][2]['select'];?>" class="form-control" autocomplete="off">
                                <span class="input-group-btn">
                                    <button class="btn btn-default" type="button" onclick="showImageDialog(this);">图标（选中）</button>
                                </span>
                            </div>
                            <div class="input-group " style="margin-top:.5em;">
                                <img src="<?php  echo tomedia($list['content']['footer'][2]['select'])?>" onerror="this.src='./resource/images/nopic.jpg'; this.title='图片未找到.'" class="img-responsive img-thumbnail" style="width: 50px;height: 50px;">
                                <em class="close" style="position:absolute; top: 0px; right: -14px;" title="删除这张图片" onclick="deleteImage(this)">×</em>
                            </div>
                        </div>
                        <div class="input-group" style="width: 50%;float:left;">
                            <span class="input-group-btn">
                            <button class="btn btn-default" type="button">底部文字</button>
                            </span>
                            <input type="text" name="footer[2][text]" value="<?php  echo $list['content']['footer'][2]['text'];?>" class="form-control">
                        </div>
                        <div class="input-group" style="width: 50%;float:left;">
                            <input type="text" name="footer[2][link]" value="<?php  echo $list['content']['footer'][2]['link'];?>" class="form-control">
                            <span class="input-group-btn">
                                <button class="btn btn-default link" type="button" data-toggle="modal" data-target="#selectUrl">选择链接</button>
                            </span>
                        </div>
                        <div class="sort_status">
                            <?php  if($list['content']['footer'][2]['status']==1) { ?>
                            <input type="checkbox" checked class="js-switch" value="1" name="footer[2][status]">
                            <?php  } else { ?>
                            <input type="checkbox" class="js-switch" value="1" name="footer[2][status]">
                            <?php  } ?>
                        </div>
                        <div style="clear: both;"></div>
                    </div>
                    <div style="margin-top: 10px;position: relative;">
                        <div class="input-group" style="width: 50%;float:left;">
                            <div class="input-group">
                                <input type="text" name="footer[3][icon]" value="<?php  echo $list['content']['footer'][3]['icon'];?>" class="form-control" autocomplete="off">
                                <span class="input-group-btn">
                                    <button class="btn btn-default" type="button" onclick="showImageDialog(this);">图标（未选）</button>
                                </span>
                            </div>
                            <div class="input-group " style="margin-top:.5em;">
                                <img src="<?php  echo tomedia($list['content']['footer'][3]['icon'])?>" onerror="this.src='./resource/images/nopic.jpg'; this.title='图片未找到.'" class="img-responsive img-thumbnail" style="width: 50px;height: 50px;">
                                <em class="close" style="position:absolute; top: 0px; right: -14px;" title="删除这张图片" onclick="deleteImage(this)">×</em>
                            </div>
                        </div>
                        <div class="input-group" style="width: 50%;float:left;">
                            <div class="input-group">
                                <input type="text" name="footer[3][select]" value="<?php  echo $list['content']['footer'][3]['select'];?>" class="form-control" autocomplete="off">
                                <span class="input-group-btn">
                                    <button class="btn btn-default" type="button" onclick="showImageDialog(this);">图标（选中）</button>
                                </span>
                            </div>
                            <div class="input-group " style="margin-top:.5em;">
                                <img src="<?php  echo tomedia($list['content']['footer'][3]['select'])?>" onerror="this.src='./resource/images/nopic.jpg'; this.title='图片未找到.'" class="img-responsive img-thumbnail" style="width: 50px;height: 50px;">
                                <em class="close" style="position:absolute; top: 0px; right: -14px;" title="删除这张图片" onclick="deleteImage(this)">×</em>
                            </div>
                        </div>
                        <div class="input-group" style="width: 50%;float:left;">
                            <span class="input-group-btn">
                            <button class="btn btn-default" type="button">底部文字</button>
                            </span>
                            <input type="text" name="footer[3][text]" value="<?php  echo $list['content']['footer'][3]['text'];?>" class="form-control">
                        </div>
                        <div class="input-group" style="width: 50%;float:left;">
                            <input type="text" name="footer[3][link]" value="<?php  echo $list['content']['footer'][3]['link'];?>" class="form-control">
                            <span class="input-group-btn">
                                <button class="btn btn-default link" type="button" data-toggle="modal" data-target="#selectUrl">选择链接</button>
                            </span>
                        </div>
                        <div class="sort_status">
                            <?php  if($list['content']['footer'][3]['status']==1) { ?>
                            <input type="checkbox" checked class="js-switch" value="1" name="footer[3][status]">
                            <?php  } else { ?>
                            <input type="checkbox" class="js-switch" value="1" name="footer[3][status]">
                            <?php  } ?>
                        </div>
                        <div style="clear: both;"></div>
                    </div>
                    <div style="margin-top: 10px;position: relative;">
                        <div class="input-group" style="width: 50%;float:left;">
                            <div class="input-group">
                                <input type="text" name="footer[4][icon]" value="<?php  echo $list['content']['footer'][4]['icon'];?>" class="form-control" autocomplete="off">
                                <span class="input-group-btn">
                                    <button class="btn btn-default" type="button" onclick="showImageDialog(this);">图标（未选）</button>
                                </span>
                            </div>
                            <div class="input-group " style="margin-top:.5em;">
                                <img src="<?php  echo tomedia($list['content']['footer'][4]['icon'])?>" onerror="this.src='./resource/images/nopic.jpg'; this.title='图片未找到.'" class="img-responsive img-thumbnail" style="width: 50px;height: 50px;">
                                <em class="close" style="position:absolute; top: 0px; right: -14px;" title="删除这张图片" onclick="deleteImage(this)">×</em>
                            </div>
                        </div>
                        <div class="input-group" style="width: 50%;float:left;">
                            <div class="input-group">
                                <input type="text" name="footer[4][select]" value="<?php  echo $list['content']['footer'][4]['select'];?>" class="form-control" autocomplete="off">
                                <span class="input-group-btn">
                                    <button class="btn btn-default" type="button" onclick="showImageDialog(this);">图标（选中）</button>
                                </span>
                            </div>
                            <div class="input-group " style="margin-top:.5em;">
                                <img src="<?php  echo tomedia($list['content']['footer'][4]['select'])?>" onerror="this.src='./resource/images/nopic.jpg'; this.title='图片未找到.'" class="img-responsive img-thumbnail" style="width: 50px;height: 50px;">
                                <em class="close" style="position:absolute; top: 0px; right: -14px;" title="删除这张图片" onclick="deleteImage(this)">×</em>
                            </div>
                        </div>
                        <div class="input-group" style="width: 50%;float:left;">
                            <span class="input-group-btn">
                            <button class="btn btn-default" type="button">底部文字</button>
                            </span>
                            <input type="text" name="footer[4][text]" value="<?php  echo $list['content']['footer'][4]['text'];?>" class="form-control">
                        </div>
                        <div class="input-group" style="width: 50%;float:left;">
                            <input type="text" name="footer[4][link]" value="<?php  echo $list['content']['footer'][4]['link'];?>" class="form-control">
                            <span class="input-group-btn">
                                <button class="btn btn-default link" type="button" data-toggle="modal" data-target="#selectUrl">选择链接</button>
                            </span>
                        </div>
                        <div class="sort_status">
                            <?php  if($list['content']['footer'][4]['status']==1) { ?>
                            <input type="checkbox" checked class="js-switch" value="1" name="footer[4][status]">
                            <?php  } else { ?>
                            <input type="checkbox" class="js-switch" value="1" name="footer[4][status]">
                            <?php  } ?>
                        </div>
                        <div style="clear: both;"></div>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <input type="button" name="submit" class="btn btn-default" value="提交">
                    <button class="btn btn-primary upsql" type="button">一键更新</button>
                </div>
            </div>
        </form>
    </div>
</div>
<!--底部链接选择-->
<div class="modal fade" id="selectUrl"><div class="modal-dialog">
    <style>
        #selectUrl .modal-body {padding: 10px 15px;}
        #selectUrl .tab-pane {margin-top: 5px; min-height: 400px; max-height: 400px; overflow-y: auto;}
        #selectUrlTab{margin-bottom: 10px;}
    </style>
    <div class="modal-content">
        <div class="modal-header">
            <button data-dismiss="modal" class="close" type="button">×</button>
            <h4 class="modal-title">选择链接</h4>
        </div>
        <div class="modal-body">
            <ul class="nav nav-tabs" id="selectUrlTab">
                <li role="presentation" class="active"><a href="#sut_shop">页面</a></li>
                <li role="presentation"><a href="#sut_app">小程序</a></li>
                <li role="presentation"><a href="#sut_art">文章</a></li>
                <li role="presentation"><a href="#sut_store">店铺</a></li>
            </ul>
            <div class="tab-content ">
                <div class="tab-pane active" id="sut_shop">
                    <nav data-dismiss="modal" data-href="../index/index" class="btn btn-default btn-sm" title="首页">首页</nav>
                    <nav data-dismiss="modal" data-href="../service/service" class="btn btn-default btn-sm" title="套餐">套餐</nav>
                    <nav data-dismiss="modal" data-href="../rotate/rotate" class="btn btn-default btn-sm" title="抽奖">抽奖</nav>
                    <nav data-dismiss="modal" data-href="../store/porder" class="btn btn-default btn-sm" title="预约">预约</nav>
                    <nav data-dismiss="modal" data-href="../user/user" class="btn btn-default btn-sm" title="我的">我的</nav>
                    <nav data-dismiss="modal" data-href="../jishi/index" class="btn btn-default btn-sm" title="我的">技师</nav>
                    <nav data-dismiss="modal" data-href="../../pages/mall/mall" class="btn btn-default btn-sm" title="商城">商城</nav>
                </div>
                <div class="tab-pane" id="sut_app">
                    <form class="form-horizontal">
                        <div class="form-group">
                            <label  class="col-sm-2 control-label">小程序 appId</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control"  name="appId" id="appId">
                            </div>
                        </div>
                        <div class="form-group">
                            <label  class="col-sm-2 control-label">页面路径</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control"  name="path" id="path" placeholder="为空则打开首页">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <input data-dismiss="modal" type="button" name="app_btn" class="btn btn-default" value="确定">
                            </div>
                        </div>
                    </form>
                </div>
                <div class="tab-pane" id="sut_art">
                    <iframe width="100%" height="395" frameborder="no" border="0" scrolling="no" allowtransparency="yes" src="<?php  echo $http_type;?>://<?php  echo $_SERVER['HTTP_HOST'];?>/web/index.php?c=site&a=entry&do=banner&m=<?php  echo $_GPC['m'];?>&op=article&version_id=<?php  echo $_GPC['version_id'];?>"></iframe>
                </div>
                <div class="tab-pane" id="sut_store">
                    <iframe width="100%" height="395" frameborder="no" border="0" scrolling="no" allowtransparency="yes" src="<?php  echo $http_type;?>://<?php  echo $_SERVER['HTTP_HOST'];?>/web/index.php?c=site&a=entry&do=store&m=<?php  echo $_GPC['m'];?>&op=store&version_id=<?php  echo $_GPC['version_id'];?>"></iframe>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button data-dismiss="modal" class="btn btn-default" id="select-close" type="button">关闭</button>
        </div>
        <script>
            var obj='';
            $(function(){
                $(".link").click(function(){
                    obj=this;
                });
                $("#selectUrl").find('#selectUrlTab a').click(function(e) {
                    $('#tab').val($(this).attr('href'));
                    e.preventDefault();
                    $(this).tab('show');
                });
                $("#sut_shop").find("nav").click(function(){
                    $(obj).parent().prev().val($(this).attr("data-href"));
                });
            });
        </script>
    </div>
</div></div>
<!--底部链接选择 end-->
<script>
    require(["../addons/<?php  echo $_GPC['m']?>/resource/swal/dist/sweetalert2.min.js"],function(){
        $(function(){
            $("input[name='app_btn']").click(function(){
                var appid=$("input[name='appId']").val();
                var path=$("input[name='path']").val();
                if(appid!=""){
                    $(obj).parent().prev().val(appid+','+path);
                }
                $("input[name='appId']").val("");
                $("input[name='path']").val("");
            });
            $("input[name='submit']").click(function(){
                var data=$(".form-horizontal").serialize();
                console.log(data);
                $.ajax({
                    type:"post",
                    url:"<?php  echo url('site/entry/'.$_GPC['do'],array('m'=>$_GPC['m'],'op'=>'savemodel','version_id'=>$_GPC['version_id']));?>",
                    data:data,
                    dataType:'json',
                    success:function(res){
                        if(res.status==1){
                            swal('操作成功!', '操作成功!', 'success');
                        }else{
                            swal('操作失败!', '操作失败!', 'error');
                        }
                    }
                })
            });
            $(".upsql").click(function(){
                $.ajax({
                    type:"post",
                    url:"<?php  echo url('site/entry/UpSql',array('m'=>$_GPC['m'],'version_id'=>$_GPC['version_id']));?>",
                    dataType:'json',
                    success:function(res){
                        if(res.status==1){
                            swal('更新成功!', '更新成功!', 'success');
                        }else{
                            swal('操作失败!', '操作失败!', 'error');
                        }
                    }
                })
            });
        })
    })
</script>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>