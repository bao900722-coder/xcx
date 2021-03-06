<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('public/header', TEMPLATE_INCLUDEPATH)) : (include template('public/header', TEMPLATE_INCLUDEPATH));?>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('public/comhead', TEMPLATE_INCLUDEPATH)) : (include template('public/comhead', TEMPLATE_INCLUDEPATH));?>
<link rel="stylesheet" type="text/css" href="../addons/zh_tcwq/template/public/ygcss.css">
<style type="text/css">
    input[type="radio"] + label::before {
        content: "\a0"; /*不换行空格*/
        display: inline-block;
        vertical-align: middle;
        font-size: 16px;
        width: 1em;
        height: 1em;
        margin-right: .4em;
        border-radius: 50%;
        border: 2px solid #ddd;
        text-indent: .15em;
        line-height: 1; 
    }
    input[type="radio"]:checked + label::before {
        background-color: #44ABF7;
        background-clip: content-box;
        padding: .1em;
        border: 2px solid #44ABF7;
    }
    input[type="radio"] {
        position: absolute;
        clip: rect(0, 0, 0, 0);
    }
    .moda{
    	position: fixed;
    	top: 30%;
    	left: 0;
    	right: 0;
    	margin:auto;
    }
    .ygmargin{margin-top: 10px;color: #999;}
    .op{
    	opacity: 0
    }
</style>
<ul class="nav nav-tabs">
    <span class="ygxian"></span>
    <div class="ygdangq">当前位置:</div>    
    <li ><a href="<?php  echo $this->createWebUrl('messagelist')?>">发送记录</a></li>
    <li class="active"><a href="<?php  echo $this->createWebUrl('message')?>">群发模板消息</a></li>
</ul>



<div class="main">
    <form action="" method="post" class="form-horizontal form" enctype="multipart/form-data" id="invitative">
        <div class="panel panel-default ygdefault">
            <div class="panel-body">
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">备注</label>
                    <div class="col-sm-9">
                        <input type="text" name="bz" class="form-control" value="" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">信息来源</label>
                    <div class="col-sm-9">
                        <input type="text" name="ly" class="form-control" value="" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">信息内容</label>
                    <div class="col-sm-9">
                        <input type="text" name="nr" class="form-control" value="" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">通知时间</label>
                    <div class="col-sm-9">
                        <input type="text" name="sj" class="form-control" value="" />
                        <font color="red">*不填默认为系统当前时间</font>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">跳转地址</label>
                    <div class="col-sm-9">
                        <input type="text" name="dz" class="form-control" value="" />
                        <font color="red">*不填默认跳转到小程序首页</font>
                        <span class="help-block">*跳转商家页面请按以下格式填写,id值在商家列表中获取(zh_tcwq/pages/sellerinfo/sellerinfo?id=1)</span>
                        <span class="help-block">*跳转商家分类页面请按以下格式填写,id和name值在分类列表中获取(zh_tcwq/pages/store/business?id=1&typename=商家分类名字)</span>
                        <span class="help-block">*跳转资讯页面请按以下格式填写(zh_tcwq/pages/message/message)</span>
                        <span class="help-block">*跳转顺风车页面请按以下格式填写(zh_tcwq/pages/shun/shun)</span>
                        <span class="help-block">*跳转帖子分类页面请按以下格式填写,id和name值在分类列表中获取(zh_tcwq/pages/marry/marry?id=1&name=帖子分类名字)</span>
                        <span class="help-block">*跳转帖子页面请按以下格式填写,id在帖子列表中获取(zh_tcwq/pages/infodetial/infodetial?id=1)</span>
                        <span class="help-block">*跳转黄页页面请按以下格式填写(zh_tcwq/pages/yellow_page/yellow)</span>
                        <span class="help-block">*跳转视频页面请按以下格式填写(zh_tcwq/pages/spzx/spzx?name=自定义视频中心顶部标题)</span>
                        <span class="help-block">*跳转签到页面请按以下格式填写(zh_tcwq/pages/qd/qd)</span>
                        <span class="help-block">*跳转积分商城页面请按以下格式填写(zh_tcwq/pages/integral/integral)</span>
                        <span class="help-block">*跳转底部发布页面请按以下格式填写(zh_tcwq/pages/fabu/fabu/fabu)</span>
                        <span class="help-block">*跳转底部商家页面请按以下格式填写(zh_tcwq/pages/store/store)</span>
                        <span class="help-block">*跳转活动中心请按以下格式填写(zh_tcwq/pages/hdzx/hdzx?name=自定义活动中心标题)</span>
                    </div>
                </div>
            </div>
        </div>

		 <div class="moda op"  style="z-index: 9999999999999999;">
		    <div class="modal-dialog">
		        <div class="modal-content">
		            <div class="modal-header">
			            <button type="button" class="close cancels" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			                <h4 class="modal-title" id="myModalLabel" style="font-size: 20px;">提示</h4>
		           	</div>
		            <div class="modal-body" style="font-size: 20px">
		                温馨提示:请不要频繁的推送!
		            </div>
		        	<div class="modal-footer">
		            	<button type="button" class="btn btn-default cancels" data-dismiss="modal">取消</button>
		                <input type="submit" class="btn btn-info" name="submit" value="发送"/>
		                <!-- <button class="btn btn-info yes">确定</button> -->
		        	</div>
		        </div>
			</div>
		</div>

        <div class="form-group">
            <!-- <input type="submit" value="发送" class="btn col-lg-3" style="color: white;background-color: #44ABF7;" /> -->
			<p class="btn col-lg-3 form_sub" style="color: white;background-color: #44ABF7;">发送</p>
            <input type="hidden" name="token" value="<?php  echo $_W['token'];?>" />
            <input type="hidden" name="id" value="<?php  echo $item['id'];?>" />
        </div>
    </form>
</div>
<script type="text/javascript">
    $(function(){
        // $("#frame-8").addClass("in");
        $("#frame-9").show();
        $("#yframe-9").addClass("wyactive");
        $(".moda").hide()
        $('.form_sub').click(function(){
        	 $(".moda").show()
        	 $(".moda").css('opacity','1')
        });
        $(".cancels").click(function(){
        	$(".moda").css('opacity','0')
        })
        $(".yes").click(function(){
        	console.log(2)
        	$('.submit').submit();
        })
    })
</script>

