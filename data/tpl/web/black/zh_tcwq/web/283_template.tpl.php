<?php defined('IN_IA') or exit('Access Denied');?>﻿<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('public/header', TEMPLATE_INCLUDEPATH)) : (include template('public/header', TEMPLATE_INCLUDEPATH));?>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('public/comhead', TEMPLATE_INCLUDEPATH)) : (include template('public/comhead', TEMPLATE_INCLUDEPATH));?>
<link rel="stylesheet" type="text/css" href="../addons/zh_tcwq/template/public/ygcss.css">
<ul class="nav nav-tabs">    
    <span class="ygxian"></span>
    <div class="ygdangq">当前位置:</div>
    <li class="active"><a href="javascript:void(0);">模板消息</a></li>
</ul>
  <div class="main">
    <form action="" method="post" class="form-horizontal form" enctype="multipart/form-data" id="invitative">
        <div class="panel panel-default ygdefault">
            <div class="panel-heading wyheader">
                系统设置&nbsp;>&nbsp;模板消息
            </div>
            <div class="panel-body">
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">商家入驻申请通知：</label>
                    <div class="col-sm-9">
                        <p class="form-control-static">
                             <input type="text" name="tid1" value="<?php  echo $item['tid1'];?>" id="points" class="form-control" />
                        </p>
                        <div style="color: #999;">*模板编号AT0444,关键词(商家名称,申请人,申请时间,状态,备注)</div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">申请提现通知：</label>
                    <div class="col-sm-9">
                        <p class="form-control-static">
                             <input type="text" name="tid2" value="<?php  echo $item['tid2'];?>" id="points" class="form-control" />
                        </p>
                        <div style="color: #999;">*模板编号AT0324,关键词(姓名,帐号,提现金额,实际到账,方式,提现时间)</div>
                    </div>
                </div>
               <div class="form-group">
                 <label class="col-xs-12 col-sm-3 col-md-2 control-label">帖子评论成功通知：</label>
                 <div class="col-sm-9">
                     <p class="form-control-static">
                          <input type="text" name="tid3" value="<?php  echo $item['tid3'];?>" id="points" class="form-control" />
                     </p>
                     <div style="color: #999;">*AT0813,关键词(评论内容,评论人,评论时间)</div>
                 </div>
             </div> 
            <div class="form-group">
                 <label class="col-xs-12 col-sm-3 col-md-2 control-label">订单发货通知：</label>
                 <div class="col-sm-9">
                     <p class="form-control-static">
                          <input type="text" name="fh_tid" value="<?php  echo $item['fh_tid'];?>" id="points" class="form-control" />
                     </p>
                     <div style="color: #999;">*AT0007,关键词(温馨提示,订单编号,商品名称,订单金额,物流公司,物流单号,收货人,收货人电话,收货地址)</div>
                 </div>
             </div> 
             <div class="form-group">
                 <label class="col-xs-12 col-sm-3 col-md-2 control-label">新订单通知：</label>
                 <div class="col-sm-9">
                     <p class="form-control-static">
                          <input type="text" name="gm_tid" value="<?php  echo $item['gm_tid'];?>" id="points" class="form-control" />
                     </p>
                     <div style="color: #999;">*AT0079,关键词(订单状态,订单号,商品名称,订单金额,支付状态,支付时间,收货人,联系电话,收货地址,备注)</div>
                 </div>
             </div> 
             <div class="form-group">
                 <label class="col-xs-12 col-sm-3 col-md-2 control-label">评论回复通知：</label>
                 <div class="col-sm-9">
                     <p class="form-control-static">
                          <input type="text" name="hp_tid" value="<?php  echo $item['hp_tid'];?>" id="points" class="form-control" />
                     </p>
                     <div style="color: #999;">*AT1235,关键词(备注,回复者,回复内容,评论时间,评论内容)</div>
                 </div>
             </div> 
             <div class="form-group">
                 <label class="col-xs-12 col-sm-3 col-md-2 control-label">帖子被赞通知：</label>
                 <div class="col-sm-9">
                     <p class="form-control-static">
                          <input type="text" name="dz_tid" value="<?php  echo $item['dz_tid'];?>" id="points" class="form-control" />
                     </p>
                     <div style="color: #999;">*AT1250,关键词(点赞人,点赞时间,主题)</div>
                 </div>
             </div> 
             <div class="form-group">
                 <label class="col-xs-12 col-sm-3 col-md-2 control-label">帖子审核通过通知：</label>
                 <div class="col-sm-9">
                     <p class="form-control-static">
                          <input type="text" name="tg_tid" value="<?php  echo $item['tg_tid'];?>" id="points" class="form-control" />
                     </p>
                     <div style="color: #999;">*AT0168,关键词(审核结果,帖子主题,会员昵称,发布时间,备注)</div>
                 </div>
             </div>

              <div class="form-group">
                 <label class="col-xs-12 col-sm-3 col-md-2 control-label">抢购成功通知：</label>
                 <div class="col-sm-9">
                     <p class="form-control-static">
                          <input type="text" name="qg_tid" value="<?php  echo $item['qg_tid'];?>" id="points" class="form-control" />
                     </p>
                     <div style="color: #999;">*AT0688,关键词(商品名称,抢购价,抢购时间,购买数量,订单号,抢购有效期,商户名称)</div>
                 </div>
             </div>
            <div class="form-group">
                 <label class="col-xs-12 col-sm-3 col-md-2 control-label">活动参与成功通知：</label>
                 <div class="col-sm-9">
                     <p class="form-control-static">
                          <input type="text" name="hd_tid" value="<?php  echo $item['hd_tid'];?>" id="points" class="form-control" />
                     </p>
                     <div style="color: #999;">*AT1348,关键词(活动名称,活动类型,活动地点,活动时间,负责人电话,温馨提示,支付金额,订单编号)</div>
                 </div>
             </div>
             <div class="form-group">
                 <label class="col-xs-12 col-sm-3 col-md-2 control-label">卡券领取成功通知：</label>
                 <div class="col-sm-9">
                     <p class="form-control-static">
                          <input type="text" name="kq_tid" value="<?php  echo $item['kq_tid'];?>" id="points" class="form-control" />
                     </p>
                     <div style="color: #999;">*AT1198,关键词(卡券名称,领取人,获得数量,优惠内容,领取时间,有效日期,温馨提示,适用门店)</div>
                 </div>
             </div>
             <div class="form-group">
                 <label class="col-xs-12 col-sm-3 col-md-2 control-label">拼团成功通知：</label>
                 <div class="col-sm-9">
                     <p class="form-control-static">
                          <input type="text" name="pt_tid" value="<?php  echo $item['pt_tid'];?>" id="points" class="form-control" />
                     </p>
                     <div style="color: #999;">*AT0051,关键词(订单号,商品名称,成团人数,购买数量,拼团价格,支付金额,支付时间,门店名称,商家地址)</div>
                 </div>
             </div>

             <div class="form-group">
                 <label class="col-xs-12 col-sm-3 col-md-2 control-label">模板消息群发通知：</label>
                 <div class="col-sm-9">
                     <p class="form-control-static">
                          <input type="text" name="qf_tid" value="<?php  echo $item['qf_tid'];?>" id="points" class="form-control" />
                     </p>
                     <div style="color: #999;">*AT0480,关键词(备注,信息来源,信息内容,通知时间)</div>
                 </div>
             </div> 

            </div>
        </div>
        
        <div class="form-group">
            <input type="submit" name="submit" value="保存设置" class="btn col-lg-3" style="color: white;background-color: #44ABF7;" />
            <input type="hidden" name="token" value="<?php  echo $_W['token'];?>" />
            <input type="hidden" name="id" value="<?php  echo $item['id'];?>"/>
        </div>
    </form>
</div>
<script type="text/javascript">
    $(function(){
        $("#frame-12").show();
        $("#yframe-12").addClass("wyactive");
    })
</script>