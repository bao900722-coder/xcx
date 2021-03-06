<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
<link rel="stylesheet" type="text/css" href="../addons/<?php  echo $_GPC['m']?>/resource/css/style.css" />
<link rel="stylesheet" type="text/css" href="../addons/<?php  echo $_GPC['m']?>/resource/swal/dist/sweetalert2.min.css" />
<link rel="stylesheet" type="text/css" href="../addons/<?php  echo $_GPC['m']?>/resource/bootstrap-select/bootstrap-select.min.css" />
<style>
    .container .type3,.container .type2,.type1{display: none;}
    .parameter>li{display:-webkit-flex; display:-webkit-box; display:-ms-flexbox; display:-moz-flex; display:flex;}
    .parameter>li input{-webkit-flex:1; -webkit-box-flex:1; -ms-flex:1; -moz-flex:1; flex:1;}
    .parameter>li .input-group-btn{width: auto;}
    .income li.income_top>input:nth-child(1),.income li.income_top>input:nth-child(2){width: 50%;}
    .income li.income_bottom>input:nth-child(2),.income li.income_bottom>input:nth-child(3),.income li.income_bottom>input:nth-child(4),.income li.income_bottom>input:nth-child(5),.income li.income_bottom>input:nth-child(6){width: 25%;}
    .type1,.type2.type3{display: none;}
</style>
<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">
            分类>编辑
        </h3>
    </div>
    <div class="panel-body">
        <form id="sign-form" class="form-horizontal" role="form" method="post" action="<?php  echo url('site/entry/'.$_GPC['do'],array('m'=>$_GPC['m'],'op'=>'savemodel','version_id'=>$_GPC['version_id']));?>" name="submit" style="padding: 20px 0;">
            <input type="hidden" name="id" value="<?php  echo $list['id'];?>">
            <input type="hidden" name="format">
            <div class="form-group">
                <label class="control-label col-md-2 col-sm-3 col-xs-12">标题</label>
                <div class="col-md-10 col-sm-9 col-xs-12">
                    <input type="text" class="form-control" placeholder="标题" name="name" value="<?php  echo $list['name'];?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-2 col-sm-3 col-xs-12">副标题</label>
                <div class="col-md-10 col-sm-9 col-xs-12">
                    <input type="text" class="form-control" placeholder="副标题" name="title" value="<?php  echo $list['title'];?>">
                </div>
            </div>
            <div class="form-group">
                <label  class="col-sm-2 control-label">类型</label>
                <div class="col-sm-8">
                    <label class="radio inline">
                        <input type="radio" class="ui-radio" name="type" id="type1" value="1" <?php  if($list['type']==1) { ?>checked<?php  } ?>>无
                    </label>
                    <label class="radio inline">
                        <input type="radio" class="ui-radio" name="type" id="type2" value="2" <?php  if($list['type']==2) { ?>checked<?php  } ?>>团购
                    </label>
                    <label class="radio inline" style="width: 100px;">
                        <input type="radio" class="ui-radio" name="type" id="type3" value="3" <?php  if($list['type']==3) { ?>checked<?php  } ?>>限时抢购
                    </label>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">分类</label>
                <div class="col-sm-8">
                    <select class="selectpicker show-tick form-control bs-select-hidden" data-live-search="true" name="cid" style="width: 50%;">
                        <option value="0" hassubinfo="true">请选择分类</option>
                        <?php  if(is_array($class)) { foreach($class as $index => $vo) { ?>
                        <option value="<?php  echo $vo['id'];?>" <?php  if($vo['id']==$list['cid']) { ?>selected<?php  } ?>><?php  echo $vo['name'];?></option>
                        <?php  } } ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-2 col-sm-3 col-xs-12">封面（340*288）</label>
                <div class="col-md-10 col-sm-9 col-xs-12">
                    <?php  echo tpl_form_field_image('simg',$list['simg']);?>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-2 col-sm-3 col-xs-12">产品图片</label>
                <div class="col-md-10 col-sm-9 col-xs-12">
                    <?php  echo tpl_form_field_multi_image('bimg',$list['bimg']);?>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-2 col-sm-3 col-xs-12">已售</label>
                <div class="col-md-10 col-sm-9 col-xs-12">
                    <input type="text" class="form-control" placeholder="已售" name="sold" value="<?php  echo $list['sold'];?>">
                    <span class="help-block">物品虚拟已售件数，用户下单此数据就增加, 无论是否支付</span>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-2 col-sm-3 col-xs-12">价格</label>
                <div class="col-md-10 col-sm-9 col-xs-12">
                    <input type="text" class="form-control" placeholder="价格" name="price" value="<?php  echo $list['price'];?>">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-2 col-sm-3 col-xs-12">多规格</label>
                <div class="col-md-10 col-sm-9 col-xs-12">
                    <ul class="parameter" data-field="format">
                        <?php  if($list['format']) { ?>
                        <?php  if(is_array($list['format'])) { foreach($list['format'] as $index => $item) { ?>
                        <li class="input-group">
                            <input type="text" class="form-control" name="format_name"
                                   value="<?php  echo $item['name'];?>" placeholder="名称">
                            <input type="text" class="form-control" name="format_price"
                                   value="<?php  echo $item['price'];?>" placeholder="价格">
                            <input type="text" class="form-control type2" name="group_price"
                                   value="<?php  echo $item['group_price'];?>" placeholder="团购价格">
                            <input type="text" class="form-control type3" name="limit_price"
                                   value="<?php  echo $item['limit_price'];?>" placeholder="抢购价格">
                                            <span class="input-group-btn" onclick="parameter.parameter_add(this)">
                                                <button class="btn btn-default" type="button"><i class="fa fa-plus"></i></button>
                                            </span>
                                            <span class="input-group-btn" onclick="parameter.parameter_del(this)">
                                                <button class="btn btn-danger" type="button"><i class="fa fa-remove"></i></button>
                                            </span>
                        </li>
                        <?php  } } ?>
                        <?php  } else { ?>
                        <li class="input-group">
                            <input type="text" class="form-control" name="format_name"
                                   value="" placeholder="名称">
                            <input type="text" class="form-control" name="format_price"
                                   value="" placeholder="价格">
                            <input type="text" class="form-control type2" name="group_price"
                                   value="" placeholder="团购价格">
                            <input type="text" class="form-control type3" name="limit_price"
                                   value="" placeholder="抢购价格">
                                            <span class="input-group-btn" onclick="parameter.parameter_add(this)">
                                                <button class="btn btn-default" type="button"><i class="fa fa-plus"></i></button>
                                            </span>
                                            <span class="input-group-btn" onclick="parameter.parameter_del(this)">
                                                <button class="btn btn-danger" type="button"><i class="fa fa-remove"></i></button>
                                            </span>
                        </li>
                        <?php  } ?>
                    </ul>
                </div>
            </div>
            <script>
                var parameter = {
                    parameter_add: function (objc) {
                        $(objc).parent().after('<li class="input-group"> <input type="text" class="form-control"  name="format_name" value="" placeholder="名称"><input type="text" class="form-control"  name="format_price" value="" placeholder="价格"><input type="text" class="form-control type3" name="limit_price"value="" placeholder="抢购价格"><input type="text" class="form-control type2" name="group_price"value="" placeholder="团购价格"><span class="input-group-btn" onclick="parameter.parameter_add(this)"> <button class="btn btn-default" type="button"><i class="fa fa-plus"></i></button> </span> <span class="input-group-btn" onclick="parameter.parameter_del(this)"> <button class="btn btn-danger" type="button"><i class="fa fa-remove"></i></button> </span></li>');
                        vip();
                    },
                    parameter_del: function (objc) {
                        if ($(objc).parent().siblings().length > 0) {
                            $(objc).parent().remove();
                        }
                    }
                }
            </script>
            <div class="form-group type2">
                <label class="control-label col-md-2 col-sm-3 col-xs-12">团购人数</label>
                <div class="col-md-10 col-sm-9 col-xs-12">
                    <input type="text" class="form-control" placeholder="团购人数" name="group_member" value="<?php  echo $list['group_member'];?>">
                </div>
            </div>
            <div class="form-group type2">
                <label class="control-label col-md-2 col-sm-3 col-xs-12">团购失败时间</label>
                <div class="col-md-10 col-sm-9 col-xs-12">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="团购失败时间" name="group_fail" value="<?php  echo $list['group_fail'];?>">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="button">小时</button>
                        </span>
                    </div>
                </div>
            </div>
            <div class="form-group type3">
                <label class="col-sm-2 control-label">活动时间</label>
                <div class="col-sm-8">
                    <?php  echo tpl_form_field_daterange('times',$list['times'],true);?>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">首页显示</label>
                <div class="col-sm-8">
                    <?php  if($list['index']==1) { ?>
                    <input type="checkbox" checked class="js-switch" value="1" name="index">
                    <?php  } else { ?>
                    <input type="checkbox" class="js-switch" name="index" value="1">
                    <?php  } ?>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">状态</label>
                <div class="col-sm-8">
                    <?php  if($list['status']==1) { ?>
                    <input type="checkbox" checked class="js-switch" value="1" name="status">
                    <?php  } else { ?>
                    <input type="checkbox" class="js-switch" name="status" value="1">
                    <?php  } ?>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">排序</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control"  name="sort" value="<?php  echo $list['sort'];?>">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">详情</label>
                <div class="col-sm-10">
                    <?php  echo tpl_ueditor('content',$list['content']);?>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <input type="button" name="submit" class="btn btn-default" value="提交">
                    <a class="btn btn-default" href="<?php  echo url('site/entry/'.$_GPC['do'],array('m'=>$_GPC['m']));?>">返回</a>
                    <input id="res" name="res" type="reset" style="display:none;" />
                </div>
            </div>
        </form>
    </div>
</div>

<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>
<script>
    function vip(){
        if($("#type1").is(":checked")){
            $(".type2").hide();
            $(".type3").hide();
            $(".type1").show();
        }else if($("#type2").is(":checked")){
            $(".type1").hide();
            $(".type3").hide();
            $(".type2").show();
        }else if($("#type3").is(":checked")){
            $(".type1").hide();
            $(".type2").hide();
            $(".type3").show();
        }
    }
    vip();
    require(["../addons/<?php  echo $_GPC['m']?>/resource/swal/dist/sweetalert2.min.js","../addons/<?php  echo $_GPC['m']?>/resource/bootstrap-select/bootstrap-select.min.js"],function(){
        $(function(){
            $("input[name='type']").change(function(){
                vip();
            });
            $("input[name='submit']").click(function(){
                getjson();
                var data=$(".form-horizontal").serialize();
                $.ajax({
                    type:"post",
                    url:"<?php  echo url('site/entry/'.$_GPC['do'],array('m'=>$_GPC['m'],'op'=>'savemodel','version_id'=>$_GPC['version_id']));?>",
                    data:data,
                    dataType:'json',
                    success:function(res){
                        if(res.status==1){
                            if($("input[name='id']").val()==""){
                                $("input[name='res']").click();
                                $("body").find(".img-responsive.img-thumbnail").attr("src","");
                                $(".selectpicker").selectpicker('refresh');
                            }
                            swal('操作成功!', '操作成功!', 'success');
                        }else{
                            swal('操作失败!', '操作失败!', 'error');
                        }
                    }
                })
            });
        })
    });

    function getjson(){
        var format=[];
        $(".parameter").find("li").each(function(){
            var name=$(this).find("input[name='format_name']").val();
            var price=$(this).find("input[name='format_price']").val();
            var group_price=$(this).find("input[name='group_price']").val();
            var limit_price=$(this).find("input[name='limit_price']").val();
            if(name!=""){
                var data={name:name,price:price,limit_price:limit_price,group_price:group_price};
                format.push(data);
            }
        });
        if(format.length>0){
            $("input[name='format']").val(JSON.stringify(format));
        }
    }
</script>