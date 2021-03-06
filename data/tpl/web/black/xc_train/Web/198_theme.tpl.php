<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
<link rel="stylesheet" type="text/css" href="../addons/<?php  echo $_GPC['m']?>/resource/css/style.css" />
<link rel="stylesheet" type="text/css" href="../addons/<?php  echo $_GPC['m']?>/resource/swal/dist/sweetalert2.min.css" />
<style>
    .theme3,.theme1,.theme2{
        display: none;
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
            <li role="presentation"><a href="<?php  echo url('site/entry/'.$_GPC['do'],array('m'=>$_GPC['m'],'version_id'=>$_GPC['version_id']));?>">网站配置</a></li>
            <li role="presentation" class="active"><a>主题配置</a></li>
            <li role="presentation"><a href="<?php  echo url('site/entry/'.$_GPC['do'],array('m'=>$_GPC['m'],'op'=>'ad','version_id'=>$_GPC['version_id']));?>">公告配置</a></li>
            <li role="presentation"><a href="<?php  echo url('site/entry/'.$_GPC['do'],array('m'=>$_GPC['m'],'op'=>'open_ad','version_id'=>$_GPC['version_id']));?>">广告配置</a></li>
            <li role="presentation"><a href="<?php  echo url('site/entry/'.$_GPC['do'],array('m'=>$_GPC['m'],'op'=>'map','version_id'=>$_GPC['version_id']));?>">地图配置</a></li>
            <li role="presentation"><a href="<?php  echo url('site/entry/'.$_GPC['do'],array('m'=>$_GPC['m'],'op'=>'sms','version_id'=>$_GPC['version_id']));?>">短信配置</a></li>
            <li role="presentation"><a href="<?php  echo url('site/entry/'.$_GPC['do'],array('m'=>$_GPC['m'],'op'=>'print','version_id'=>$_GPC['version_id']));?>">打印配置</a></li>
            <li role="presentation"><a href="<?php  echo url('site/entry/'.$_GPC['do'],array('m'=>$_GPC['m'],'op'=>'service_poster','version_id'=>$_GPC['version_id']));?>">课程海报配置</a></li>
        </ul>
        <form class="form-horizontal" role="form" method="post" action="<?php  echo url('site/entry/'.$_GPC['do'],array('m'=>$_GPC['m'],'op'=>'savetheme','version_id'=>$_GPC['version_id']));?>" name="submit" style="padding: 20px 0;">

            <div class="form-group">
                <label for="name" class="col-sm-2 control-label">名称</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control"  name="name" id="name" value="<?php  echo $list['name'];?>">
                    <input type="hidden" name="id" value="<?php  echo $list['id'];?>">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">主题</label>
                <div class="col-sm-8">
                    <label class="radio inline" style="width: 100px;">
                        <input type="radio" class="ui-radio" name="theme" id="theme1" value="1" <?php  if($list['content']['theme']==1) { ?>checked<?php  } ?>>主题一（默认）
                    </label>
                    <label class="radio inline" style="width: 100px;">
                        <input type="radio" class="ui-radio" name="theme" id="theme2" value="2" <?php  if($list['content']['theme']==2) { ?>checked<?php  } ?>>自定义主题
                    </label>
                    <span class="help-block">
                        <img class="theme1" data-toggle="modal" data-target=".bs-example-modal-sm" style="cursor: pointer;" src="../addons/<?php  echo $_GPC['m'];?>/resource/images/theme1.jpg" width="100">
                    </span>
                </div>
            </div>
            <div class="form-group theme2">
                <label  class="col-sm-2 control-label">主题色</label>
                <div class="col-sm-8">
                    <?php  echo tpl_form_field_color('color',$list['content']['color']);?>
                    <span class="help-block">所有图标（50*50）</span>
                </div>
            </div>
            <div class="form-group theme2">
                <label  class="col-sm-2 control-label"><img src="../addons/<?php  echo $_GPC['m'];?>/resource/images/icon01.png" width="36" height="36"></label>
                <div class="col-sm-8">
                    <?php  echo tpl_form_field_image('icon[0]',$list['content']['icon']['0']);?>
                </div>
            </div>
            <div class="form-group theme2">
                <label  class="col-sm-2 control-label"><img src="../addons/<?php  echo $_GPC['m'];?>/resource/images/icon02.png" width="36" height="36"></label>
                <div class="col-sm-8">
                    <?php  echo tpl_form_field_image('icon[1]',$list['content']['icon']['1']);?>
                </div>
            </div>
            <div class="form-group theme2">
                <label  class="col-sm-2 control-label"><img src="../addons/<?php  echo $_GPC['m'];?>/resource/images/icon03.png" width="36" height="36"></label>
                <div class="col-sm-8">
                    <?php  echo tpl_form_field_image('icon[2]',$list['content']['icon']['2']);?>
                </div>
            </div>
            <div class="form-group theme2">
                <label  class="col-sm-2 control-label"><img src="../addons/<?php  echo $_GPC['m'];?>/resource/images/icon04.png" width="36" height="36"></label>
                <div class="col-sm-8">
                    <?php  echo tpl_form_field_image('icon[3]',$list['content']['icon']['3']);?>
                </div>
            </div>
            <div class="form-group theme2">
                <label  class="col-sm-2 control-label"><img src="../addons/<?php  echo $_GPC['m'];?>/resource/images/icon05.png" width="36" height="36"></label>
                <div class="col-sm-8">
                    <?php  echo tpl_form_field_image('icon[4]',$list['content']['icon']['4']);?>
                </div>
            </div>
            <div class="form-group theme2">
                <label  class="col-sm-2 control-label"><img src="../addons/<?php  echo $_GPC['m'];?>/resource/images/icon06.png" width="36" height="36"></label>
                <div class="col-sm-8">
                    <?php  echo tpl_form_field_image('icon[5]',$list['content']['icon']['5']);?>
                </div>
            </div>
            <div class="form-group theme2">
                <label  class="col-sm-2 control-label"><img src="../addons/<?php  echo $_GPC['m'];?>/resource/images/icon07.png" width="36" height="36"></label>
                <div class="col-sm-8">
                    <?php  echo tpl_form_field_image('icon[6]',$list['content']['icon']['6']);?>
                </div>
            </div>
            <div class="form-group theme2">
                <label  class="col-sm-2 control-label"><img src="../addons/<?php  echo $_GPC['m'];?>/resource/images/icon08.png" width="36" height="36"></label>
                <div class="col-sm-8">
                    <?php  echo tpl_form_field_image('icon[7]',$list['content']['icon']['7']);?>
                </div>
            </div>
            <div class="form-group theme2">
                <label  class="col-sm-2 control-label"><img src="../addons/<?php  echo $_GPC['m'];?>/resource/images/icon09.png" width="36" height="36"></label>
                <div class="col-sm-8">
                    <?php  echo tpl_form_field_image('icon[8]',$list['content']['icon']['8']);?>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <input type="button" name="submit" class="btn btn-default" value="提交">
                </div>
            </div>
        </form>
    </div>
</div>
<div class="modal fade bs-example-modal-sm" tabindex="-1" id="theme" role="dialog" aria-labelledby="mySmallModalLabel">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">主题一</h4>
            </div>
            <div class="modal-body" style="text-align: center;">
                <img src="../addons/<?php  echo $_GPC['m'];?>/resource/images/theme1.jpg" width="50%">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
            </div>
        </div>
    </div>
</div>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>
<script>
    if($("#theme2").is(":checked")){
        $(".theme2").show();
    }else{
        $(".theme2").hide();
    }
    if($("#theme1").is(":checked")){
        $(".theme1").show();
    }else{
        $(".theme1").hide();
    }
    require(["../addons/<?php  echo $_GPC['m']?>/resource/swal/dist/sweetalert2.min.js"],function(){
        $(function(){
            $("input[name='theme']").change(function(){
                if($("#theme2").is(":checked")){
                    $(".theme2").show();
                }else{
                    $(".theme2").hide();
                }
                if($("#theme1").is(":checked")){
                    $(".theme1").show();
                }else{
                    $(".theme1").hide();
                }
            });
            $(".theme1").click(function(){
                var url=$(this).attr("src");
                $("#theme").find("h4").html("主题一");
                $("#theme").find("img").attr("src",url);
            });
            $("input[name='submit']").click(function(){
                var data=$(".form-horizontal").serialize();
                $.ajax({
                    type:"post",
                    url:"<?php  echo url('site/entry/'.$_GPC['do'],array('m'=>$_GPC['m'],'op'=>'savetheme','version_id'=>$_GPC['version_id']));?>",
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
        })
    })
</script>