<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>

<ul class="nav nav-tabs">
    <li <?php  if($op=='base') { ?>class="active"<?php  } ?>><a href="<?php  echo $this->createWebUrl('sysset',array('op'=>'base'))?>">系统基本设置</a></li>
    <li <?php  if($op=='tpl') { ?>class="active"<?php  } ?>><a href="<?php  echo $this->createWebUrl('sysset',array('op'=>'tpl'));?>">模板/分享设置</a></li>
    <li <?php  if($op=='credit') { ?>class="active"<?php  } ?>><a href="<?php  echo $this->createWebUrl('sysset',array('op'=>'credit'));?>">积分/费用设置</a></li>
    <!--<li <?php  if($op=='level') { ?>class="active"<?php  } ?>><a href="<?php  echo $this->createWebUrl('sysset',array('op'=>'level'));?>">分销设置</a></li>-->
</ul>
<div class="main">
	<form action="" method="post" class="form-horizontal form" enctype="multipart/form-data">
	    <input type="hidden" name="id" value="<?php  echo $set['id'];?>" />
        <?php  if($op == 'base') { ?>
        <div class="panel panel-default">
            <div class="panel-heading">系统基本设置</div>
            <div class="panel-body">
                <div class="form-group">
                    <label class="col-xs-12 col-sm-4 col-md-3 control-label">小程序标题背景色</label>
                    <div class="col-sm-9 col-xs-9 col-md-7 col-xs-12">
                        <?php  echo tpl_form_field_color('bgcolor', $set['bgcolor'])?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-4 col-md-3 control-label">首页自定义标题</label>
                    <div class="col-sm-9 col-xs-9 col-md-7 col-xs-12">
                        <input type="text" id="indexname" name="indexname"  class="form-control" value="<?php  echo $set['indexname'];?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-4 col-md-3 control-label">联系客服电话</label>
                    <div class="col-sm-9 col-xs-9 col-md-7 col-xs-12">
                        <input type="text" id="systel" name="systel"  class="form-control" value="<?php  echo $set['systel'];?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-4 col-md-3 control-label">版权</label>
                    <div class="col-sm-9 col-xs-9 col-md-7 col-xs-12">
                        <input type="text" id="copyright" name="copyright"  class="form-control" value="<?php  echo $set['copyright'];?>">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-xs-12 col-sm-4 col-md-3 control-label">推广中心访问量</label>
                    <div class="col-sm-9 col-xs-9 col-md-7 col-xs-12">
                        <input type="number" name="total_num"  class="form-control" value="<?php  echo $set['total_num'];?>" />
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-xs-12 col-sm-4 col-md-3 control-label">小程序流量主unit-id</label>
                    <div class="col-sm-9 col-xs-9 col-md-7 col-xs-12">
                        <input type="text" name="wxapp_url2" class="form-control" value="<?php  echo $set['wxapp_url2'];?>"/>
                        <div class="help-block">复制 unit-id   比如 adunit-72cf41411862424b </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-4 col-md-3 control-label">首页底部自定义</label>
                    <div class="col-sm-9 col-xs-9 col-md-7 col-xs-12">
                        <input type="text"  name="wxapp_name1"  class="form-control" value="<?php  echo $set['wxapp_name1'];?>">
                        <div class="help-block">小程序 首页，底部自定义文字。默认为 再次使用：发现-小程序-搜索 . </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-4 col-md-3 control-label">用户交流群</label>
                    <div class="col-sm-9 col-xs-9 col-md-7 col-xs-12">
                        <?php  echo tpl_form_field_image('share_thumb', $set['share_thumb']);?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-4 col-md-3 control-label">关联公众号</label>
                    <div class="col-sm-9 col-xs-9 col-md-7 col-xs-12">
                        <?php  echo tpl_form_field_image('mp', $set['mp']);?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-4 col-md-3 control-label"><span class="require">*</span>是否开启审核</label>
                    <div class="col-sm-9 col-xs-9 col-md-7 col-xs-12">
                        <label class="radio-inline"><input type="radio"  name="is_public" value="0" <?php  if($set['is_public'] == 0|| $set['enable']) { ?>checked<?php  } ?>>开启</label>
                        <label class="radio-inline"><input type="radio"  name="is_public" value="1" <?php  if($set['is_public'] == 1 ) { ?>checked<?php  } ?>>关闭</label>
                        <div class="help-block">发布名片是否需要审核 </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-4 col-md-3 control-label"><span class="require">*</span>是否开启客服</label>
                    <div class="col-sm-9 col-xs-9 col-md-7 col-xs-12">
                        <label class="radio-inline"><input type="radio"  name="isenable" value="0" <?php  if($set['isenable'] == 0|| $set['open_kefu']) { ?>checked<?php  } ?>>开启</label>
                        <label class="radio-inline"><input type="radio"  name="isenable" value="1" <?php  if($set['isenable'] == 1 ) { ?>checked<?php  } ?>>关闭</label>
                        <div class="help-block">发布名片是否需要审核 </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-4 col-md-3 control-label">高德地图key</label>
                    <div class="col-sm-8 col-xs-12">
                        <input type="text" name="amap_key" class="form-control" value="<?php  echo $set['amap_key'];?>" />
                        *申请网址:http://lbs.amap.com/dev/key/app
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-4 col-md-3 control-label"><span class="require">*</span>是否开启获取地理位置</label>
                    <div class="col-sm-9 col-xs-9 col-md-7 col-xs-12">
                        <label class="radio-inline"><input type="radio"  name="enable" value="0" <?php  if($set['enable'] == 0|| $set['enable']) { ?>checked<?php  } ?>>地图选择</label>
                        <label class="radio-inline"><input type="radio"  name="enable" value="1" <?php  if($set['enable'] == 1 ) { ?>checked<?php  } ?>>手动输入地址</label>
                        <div class="help-block">前台发布是否获取当前地理位置. 选择手动输入地址，必须设置好腾讯地图AK</div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-4 col-md-3 control-label">腾讯地图AK</label>
                    <div class="col-sm-9 col-xs-9 col-md-7 col-xs-12">
                        <input type="text" id="qqmap_ak" name="qqmap_ak"  class="form-control" value="<?php  echo $set['qqmap_ak'];?>">

                        <div class="help-block"><a href="http://lbs.qq.com/console/mykey.html">点我去申请</a> </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-4 col-md-3 control-label"><span class="require">*</span>是否开启分享</label>
                    <div class="col-sm-9 col-xs-9 col-md-7 col-xs-12">
                        <label class="radio-inline">
                            <input type="radio"  name="isshare" value="0" <?php  if($set['isshare'] == 0|| $set['isshare']) { ?>checked<?php  } ?>>开启</label>
                        <label class="radio-inline">
                            <input type="radio"  name="isshare" value="1" <?php  if($set['isshare'] == 1 ) { ?>checked<?php  } ?>>关闭</label>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-xs-12 col-sm-4 col-md-3 control-label"><span class="require">*</span>是否开启赠送积分</label>
                    <div class="col-sm-9 col-xs-9 col-md-7 col-xs-12">
                        <label class="radio-inline">
                            <input type="radio"  name="wxapp_name2" value="0" <?php  if($set['wxapp_name2'] == 0|| $set['wxapp_name2']) { ?>checked<?php  } ?>>开启</label>
                        <label class="radio-inline">
                            <input type="radio"  name="wxapp_name2" value="1" <?php  if($set['wxapp_name2'] == 1 ) { ?>checked<?php  } ?>>关闭</label>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-4 col-md-3 control-label"><span class="require">*</span>是否开启生成图片</label>
                    <div class="col-sm-9 col-xs-9 col-md-7 col-xs-12">
                        <label class="radio-inline">
                            <input type="radio"  name="iscreate" value="0" <?php  if($set['iscreate']==0 || $set['iscreate']) { ?>checked<?php  } ?>>开启</label>
                        <label class="radio-inline">
                            <input type="radio"  name="iscreate" value="1" <?php  if($set['iscreate']==1) { ?>checked<?php  } ?>>关闭</label>
                        <div class="help-block">小程序首页生成图片分享好友，审核的时候可以关闭 </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-4 col-md-3 control-label">是否开启必须发布个人名片才能查看好友</label>
                    <div class="col-sm-9 col-xs-9 col-md-7 col-xs-12">
                        <label class="radio-inline"><input type="radio"   name="public_status" value="0" <?php  if($set['public_status'] == 0) { ?>checked<?php  } ?>>是</label>
                        <label class="radio-inline"><input type="radio"   name="public_status" value="1" <?php  if($set['public_status'] == 1) { ?>checked<?php  } ?>>否</label>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-xs-12 col-sm-4 col-md-3 control-label">是否开启分享赠送会员</label>
                    <div class="col-sm-9 col-xs-9 col-md-7">
                        <label for="id_reg_1" class="radio-inline">
                            <input type="radio" name="exchange" value="0" id="id_reg_1" <?php  if($set['exchange']==0) { ?>checked="true"<?php  } ?> />开启
                        </label>
                        <label for="id_reg_2" class="radio-inline">
                            <input type="radio" name="exchange" value="1" id="id_reg_2" <?php  if($set['exchange']==1) { ?>checked="true"<?php  } ?> />关闭
                        </label>
                    </div>
                </div>
            </div>
        </div>
        <?php  } else if($op == 'tpl') { ?>
        <div class="panel panel-default">
            <div class="panel-heading">模板设置</div>
            <div class="panel-body">
                <div class="form-group">
                    <label class="col-xs-12 col-sm-4 col-md-3 control-label">名片新增收藏模板通知</label>
                    <div class="col-sm-9 col-xs-9 col-md-7 col-xs-12">
                        <input type="text" id="collect_tpl" name="collect_tpl"  class="form-control" value="<?php  echo $set['collect_tpl'];?>">
                        <div class="help-block">标题:名片新增收藏通知,关键字：收藏人，对方公司，对方职位，备注，电话，查看方式</div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-xs-12 col-sm-4 col-md-3 control-label">会员等级变更通知模板通知</label>
                    <div class="col-sm-9 col-xs-9 col-md-7 col-xs-12">
                        <input type="text" id="zan_tpl" name="zan_tpl"  class="form-control" value="<?php  echo $set['zan_tpl'];?>">
                        <div class="help-block">标题:会员等级变更通知,关键字：原会员等级，当前会员等级，有效期 ，温馨提示，备注</div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-xs-12 col-sm-4 col-md-3 control-label">名片保存成功模板通知</label>
                    <div class="col-sm-9 col-xs-9 col-md-7 col-xs-12">
                        <input type="text" id="save_tpl" name="save_tpl"  class="form-control" value="<?php  echo $set['save_tpl'];?>">
                        <div class="help-block">标题:名片保存成功通知,关键字：您的姓名 公司单位 部门职位 电话</div>
                    </div>
                </div>
                <!--2017年11月 您的姓名 艾米丽 公司单位  深度加速 部门职位 客服经理  电话 13787288845-->
                <div class="form-group">
                    <label class="col-xs-12 col-sm-4 col-md-3 control-label">分享标题</label>
                    <div class="col-sm-9 col-xs-9 col-md-7 col-xs-12">
                        <input type="text" id="share_title" name="share_title"  class="form-control" value="<?php  echo $set['share_title'];?>">
                        <span class="help-block">例如：这是#name#的名片,请惠存!</span>
                        <span class="help-block"><kbd>#name#</kbd>为名片名称</span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-4 col-md-3 control-label">分享描述</label>
                    <div class="col-sm-9 col-xs-9 col-md-7 col-xs-12">
                        <input type="text" id="share_desc" name="share_desc"  class="form-control" value="<?php  echo $set['share_desc'];?>">
                        <span class="help-block">例如：这是#name#的名片,请惠存!</span>
                        <span class="help-block"><kbd>#name#</kbd>为名片名称</span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-4 col-md-3 control-label"><span class="require">*</span>是否短信验证手机号</label>
                    <div class="col-sm-9 col-xs-9 col-md-7 col-xs-12">
                        <label class="radio-inline"><input type="radio" onclick="sendtypeshow(0)" name="mobile_verify_status" value="0" <?php  if($set['mobile_verify_status'] == 0|| $settle['mobile_verify_status']) { ?>checked<?php  } ?>>不验证</label>
                        <label class="radio-inline"><input type="radio" onclick="sendtypeshow(1)" name="mobile_verify_status" value="1" <?php  if($set['mobile_verify_status'] == 1 ) { ?>checked<?php  } ?>>验证手机号</label>
                        <div class="help-block">开启验证手机号,需要配置短信参数. </div>
                    </div>
                </div>
                <div class="form-group model2">
                    <label class="col-xs-12 col-sm-4 col-md-3 control-label">短信平台用户(Access Key ID)</label>
                    <div class="col-sm-9 col-xs-9 col-md-7 col-xs-12">
                        <input type="text" name="sms_user" class="form-control" value="<?php  echo $set['sms_user'];?>"/>
                        <p class="help-block">短信平台用户名</p>
                    </div>
                </div>
                <div class="form-group model2">
                    <label class="col-xs-12 col-sm-4 col-md-3 control-label">短信平台密码(Access Key Secret)</label>
                    <div class="col-sm-9 col-xs-9 col-md-7 col-xs-12">
                        <input type="text" name="sms_secret" class="form-control" value="<?php  echo $set['sms_secret'];?>"/>
                        <p class="help-block">短信平台密匙</p>
                    </div>
                </div>
                <div class="form-group model2">
                    <label class="col-xs-12 col-sm-4 col-md-3 control-label">阿里短信接口</label>
                    <div class="col-sm-9 col-xs-9 col-md-7">
                        <label for="sms_type2" class="radio-inline">
                            <input type="radio" name="sms_type" value="1" id="sms_type2" <?php  if($set['sms_type']==1) { ?>checked="true"<?php  } ?>/>新接口 (阿里云短信服务）
                        </label>
                        <label for="sms_type1" class="radio-inline">
                            <input type="radio" name="sms_type" value="0" id="sms_type1" <?php  if($set['sms_type']==0) { ?>checked="true"<?php  } ?>/>老接口 (阿里大于)
                        </label>
                        <p class="help-block">老接口填写的是 appkey secretKey，
                            新接口为阿里云短信服务Access Key ID Access Key Secret</p>
                    </div>
                </div>
                <div class="form-group model2">
                    <label class="col-xs-12 col-sm-4 col-md-3 control-label">阿里大鱼短信签名</label>
                    <div class="col-sm-8 col-xs-12">
                        <input type="text" name="sms_free_sign_name" class="form-control" value="<?php  echo $set['sms_free_sign_name'];?>"/>
                        <p class="help-block">阿里云/短信服务-短信签名-签名名称</p>

                    </div>
                </div>
                <div class="form-group model2">
                    <label class="col-xs-12 col-sm-4 col-md-3 control-label">注册短信模板Code</label>
                    <div class="col-sm-8 col-xs-12">
                        <input type="text" name="reg_sms_code" class="form-control" value="<?php  echo $set['reg_sms_code'];?>"/>
                        <p class="help-block">阿里云/短信服务-短信模版-模版CODE</p>
                        <strong class="text-danger"> 模板内容:  验证码${number}，您正进行身份验证，打死不告诉别人！</strong>
                    </div>
                </div>
                <div class="form-group model2">
                    <label class="col-xs-12 col-sm-4 col-md-3 control-label">短信通知模板Code</label>
                    <div class="col-sm-8 col-xs-12">
                        <input type="text" name="notice_sms_code" class="form-control" value="<?php  echo $set['notice_sms_code'];?>"/>
                        <p class="help-block">阿里云/短信服务-短信模版-模版CODE</p>
                        <strong class="text-danger">示例：尊敬的${uname}，您的名片已经好久没有更新了，新增了好多好友，赶紧去看看吧。小程序名称 名片来了。</strong>
                    </div>
                </div>
            </div>
        </div>
        <?php  } else if($op == 'credit') { ?>
        <div class="panel panel-default">
            <div class="panel-heading">积分/费用设置</div>
            <div class="panel-body">
                <div class="form-group">
                    <label class="col-xs-12 col-sm-4 col-md-3 control-label">商家上传幻灯片费用</label>
                    <div class="col-sm-9 col-xs-9 col-md-7 col-xs-12">
                        <input type="text" id="adv_fee" name="adv_fee"  class="form-control" value="<?php  echo $set['adv_fee'];?>">
                        <div class="help-block"> 商家上传幻灯片费用 小程序端不显示</div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-4 col-md-3 control-label">幻灯片到期时长(天)</label>
                    <div class="col-sm-9 col-xs-9 col-md-7 col-xs-12">
                        <input type="text" id="adv_day" name="adv_day"  class="form-control" value="<?php  echo $set['adv_day'];?>">
                    </div>
                </div>


                <div class="form-group" >
                    <label class="col-xs-12 col-sm-4 col-md-3 control-label">发布信息审核通过赠送积分</label>
                    <div class="col-sm-9 col-xs-12">
                        <input type="text" name="public_credit" class="form-control" value="<?php  echo $set['public_credit'];?>" />
                    </div>
                </div>
                <div class="form-group" >
                    <label class="col-xs-12 col-sm-4 col-md-3 control-label">转发赠送积分</label>
                    <div class="col-sm-9 col-xs-12">
                        <input type="text" name="share_credit" class="form-control" value="<?php  echo $set['share_credit'];?>" />
                    </div>
                </div>
                <div class="form-group" >
                    <label class="col-xs-12 col-sm-4 col-md-3 control-label">支付成功赠送积分</label>
                    <div class="col-sm-9 col-xs-12">
                        <input type="text" name="pay_credit" class="form-control" value="<?php  echo $set['pay_credit'];?>" />
                    </div>
                </div>
                <div class="form-group" >
                    <label class="col-xs-12 col-sm-4 col-md-3 control-label">每日限制最高积分</label>
                    <div class="col-sm-9 col-xs-12">
                        <input type="text" name="limit_credit" class="form-control" value="<?php  echo $set['limit_credit'];?>" />
                    </div>
                </div>

                <div class="form-group show_top">
                    <label class="col-xs-12 col-sm-4 col-md-3 col-lg-3 control-label">置顶信息</label>
                    <div class="col-sm-9 col-xs-10">
                        <div class="price-groups">
                            <?php  if(is_array($rules)) { foreach($rules as $index => $value) { ?>
                            <div class="row row-fix  price-group">
                                <div class="col-sm-12 col-xs-12">
                                    <div class="input-group">
                                        <input type="number" step="1" min="1" name="top_days[]"  class="form-control" placeholder="置顶天数" value="<?php  echo $value['day'];?>">
                                        <span class="input-group-addon">天</span>
                                        <input type="text" step="1"  name="top_amounts[]"  class="form-control" placeholder="置顶金额" value="<?php  echo $value['amount'];?>">
                                        <span class="input-group-addon">元</span>
                                        <span class="input-group-btn">
                                                <button class="btn btn-default btn-warning remove-price" type="button"  title="删除"> <i class="fa fa-remove"></i>
                                                </button>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <?php  } } ?>
                        </div>
                        <button type="button" class="btn btn-primary btn-block new-toprule btn-danger" style="margin-top: 10px;">
                            <i class="fa fa-plus"></i> 添加置顶信息
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <?php  } else if($op == 'level') { ?>
      <!--  <div class="panel panel-default">
            <div class="panel-heading">分销设置</div>
            <div class="panel-body">
                <div class="form-group">
                    <label class="col-xs-12 col-sm-4 col-md-3 control-label">是否开启三级分销</label>
                    <div class="col-xs-12 col-sm-9">
                        <label class="radio-inline">
                            <input type="radio" name="level[is_level]" value="1" <?php  if($set['level']['is_level'] == 1) { ?> checked="checked" <?php  } ?>>是
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="level[is_level]" value="0" <?php  if($set['level']['is_level'] == 0) { ?> checked="checked" <?php  } ?>>否
                        </label>
                    </div>
                </div>
                <div class="form-group model">
                    <label class="col-xs-12 col-sm-4 col-md-3 control-label">一级会员获得奖励</label>
                    <div class="col-sm-9 col-xs-9 col-md-7">
                        <div class="input-group">
                            <input type="text" class="form-control" name="level[first_credit]" value="<?php  echo $set['level']['first_credit'];?>">
                            <span class="input-group-addon">元</span>
                        </div>
                    </div>
                </div>
                <div class="form-group model">
                    <label class="col-xs-12 col-sm-4 col-md-3 control-label">二级会员获得奖励</label>
                    <div class="col-sm-9 col-xs-9 col-md-7">
                        <div class="input-group">
                            <input type="text" class="form-control" name="level[second_credit]" value="<?php  echo $set['level']['second_credit'];?>">
                            <span class="input-group-addon">元</span>
                        </div>
                    </div>
                </div>
                <div class="form-group model">
                    <label class="col-xs-12 col-sm-4 col-md-3 control-label">三级会员获得奖励</label>
                    <div class="col-sm-9 col-xs-9 col-md-7">
                        <div class="input-group">
                            <input type="text" class="form-control" name="level[three_credit]" value="<?php  echo $set['level']['three_credit'];?>">
                            <span class="input-group-addon">元</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>-->
        <?php  } ?>
        <div class="form-group">
            <div class="col-sm-12">
                <input name="submit" type="submit" value="提交" class="btn btn-primary col-lg-1">
                <input type="hidden" name="token" value="<?php  echo $_W['token'];?>"/>
            </div>
        </div>
    </form>
</div>

<script>
    function sendtypeshow(sf) {
        if (sf==0) {
            $(".model2").hide();
        } else {
            $(".model2").show();
        }
    }
    require(['jquery', 'util'], function ($, u) {
        $(function () {
            var mobile_verify_status = "<?php  echo $set['mobile_verify_status'];?>";
            if (mobile_verify_status ==0) {
                $(".model2").hide();
            } else {
                $(".model2").show();
            }
        });
    });

    function new_top_rule(){
        var content = '<div class="row row-fix  price-group">';
        content+=' <div class="col-sm-12 col-xs-12">';
        content+='<div class="input-group">';
        content+=' <input type="number" step="1" min="1" name="top_days[]"  class="form-control" placeholder="置顶天数" >';
        content+='<span class="input-group-addon">天</span>';
        content+=' <input type="number" step="1" min="1" name="top_amounts[]"  class="form-control" placeholder="置顶金额" >';
        content+=' <span class="input-group-addon">元</span>';
        content+=' <span class="input-group-btn">';
        content+=' <button class="btn btn-default btn-warning remove-price" type="button"  title="删除"><i class="fa fa-remove"></i>';
        content+=' </button>';
        content+=' </span>';
        content+=' </div>';
        content+=' </div>';
        content+=' </div>';
        $(".price-groups").append(content);
    };


    $(function() {
        $('.new-toprule').click(new_top_rule);
        $(document).on('click', '.remove-price', function() {
            $(this).closest('.price-group').remove();
        });
    });
</script>

