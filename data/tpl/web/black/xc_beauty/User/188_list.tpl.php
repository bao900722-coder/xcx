<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
<link rel="stylesheet" type="text/css" href="../addons/<?php  echo $_GPC['m']?>/resource/css/style.css" />
<link rel="stylesheet" type="text/css" href="../addons/<?php  echo $_GPC['m']?>/resource/swal/dist/sweetalert2.min.css" />
<style>
    .right-content{
        max-width: 988px;
        box-sizing: border-box;
    }
    .main-lg-body .right-content{
        max-width:100%;
    }
</style>
<div id="shop2" data-store="" data-name="" style="display: none;"></div>
<div id="store1" data-store="" data-name="" style="display: none;"></div>
<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">
            用户列表
        </h3>
    </div>
    <div class="panel-body">
        <div class="ibox-content">
            <form action="<?php  echo url('site/entry/'.$_GPC['do'],array('m'=>$_GPC['m'],'version_id'=>$_GPC['version_id']));?>" id="searchform" method="post">
                <div class="row" style="padding: 0 15px;">
                    <div class="col-sm-3">
                        <input type="text" class="form-control" placeholder="用户id" name="openid" value="<?php  echo $openid;?>">
                    </div>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" placeholder="昵称" name="nick" value="<?php  echo $nick;?>">
                    </div>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" placeholder="手机号" name="mobile" value="<?php  echo $mobile;?>">
                    </div>
                    <div class="col-sm-2">
                        <button type="submit" class="btn btn-default " style="margin-right:5px;">查询</button>
                    </div>
                </div>
            </form>
        </div>
        <form action="" method="post" class="form-horizontal form">
            <input type="hidden" name="token" value="<?php  echo $_W['token'];?>">

            <div class="table-responsive panel-body">
                <table class="table-striped table-bordered table-hover dataTables-example table">
                    <thead class="navbar-inner">
                    <tr>
                        <th style="width: 100px;">用户id</th>
                        <th>头像</th>
                        <th>昵称</th>
                        <th>会员信息</th>
                        <th>佣&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;金</th>
                        <th>绑定门店</th>
                        <th>商家中心</th>
                        <th>添加时间</th>
                        <th style="text-align: right;">操作</th>
                    </tr>
                    </thead>
                    <tbody id="level-list">
                    <?php  if(is_array($list)) { foreach($list as $index => $item) { ?>
                    <tr>
                        <td style="width: 100px;"><div class="type-parent" style="width: 100px;word-break:break-all;"><?php  echo $item['openid'];?></div></td>
                        <td><div class="type-parent"><img src="<?php  echo tomedia($item['avatar']);?>" width="50" height="50"/></div></td>
                        <td><div class="type-parent"><?php  echo $item['nick'];?></div></td>
                        <td><div class="type-parent">
                            会员卡状态：<?php  if($item['card']==1) { ?>已激活<?php  } else { ?>未激活<?php  } ?><br/>
                            余额：<?php  echo $item['money'];?><br/>
                            积分：<span class="score"><?php  echo $item['score'];?></span><br/>
                            <?php  if($item['name']) { ?>姓名:<?php  echo $item['name'];?><br/><?php  } ?>
                            <?php  if($item['mobile']) { ?>绑定手机：<?php  echo $item['mobile'];?><br/><?php  } ?>
                            <?php  if($card['content']['level_status']==1) { ?>
                            <?php  if($item['card_name']) { ?>会员等级：<?php  echo $item['card_name'];?><br/><?php  } ?>
                            <?php  if($item['card_price']) { ?>享受折扣：<?php  echo $item['card_price'];?>折<br/><?php  } ?>
                            <?php  if($item['card_amount'] && $item['card_amount']!=0) { ?>消费金额：<?php  echo $item['card_amount'];?><br/><?php  } ?>
                            <?php  } ?>
                        </div></td>
                        <td><div class="type-parent">
                            推荐人：<div style="width: 100px;word-break:break-all;"><?php  echo $item['share_nick'];?></div><br/>
                            累计佣金：<?php  echo $item['share_amount'];?><br/>
                            可提现佣金：<?php  echo $item['share_o_amount'];?><br/>
                            已提现佣金：<?php  echo $item['share_t_amount'];?><br/>
                            无效佣金：<?php  echo $item['share_empty'];?><br/>
                            一级数量：<?php  echo $item['level_one'];?><br/>
                            二级数量：<?php  echo $item['level_one'];?><br/>
                            三级数量：<?php  echo $item['level_three'];?><br/>
                        </div></td>
                        <td><div class="type-parent"><a class="btn btn-primary btn-xs store_bind" data-id="<?php  echo $item['id'];?>" data-toggle="modal" data-target="#sort_link"><?php  echo $item['store_name'];?></a></div></td>
                        <td id="shop_admin">
                            <div class="btn-group">
                                <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <?php  echo $item['shop_name'];?><span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu" data-id="<?php  echo $item['id'];?>">
                                    <li data-level="-1"><a href="javascript:;">无权限</a></li>
                                    <li data-level="1"><a href="javascript:;">管理员</a></li>
                                    <li data-level="2" data-toggle="modal" data-target="#sort_link" data-type="shop"><a href="javascript:;">店长</a></li>
                                    <li data-level="3" data-toggle="modal" data-target="#sort_link" data-type="shop"><a href="javascript:;">店员</a></li>
                                </ul>
                            </div>
                        </td>
                        <td><div class="type-parent"><?php  echo $item['createtime'];?></div></td>
                        <td style="text-align: right;">
                            <?php  if($item['card']==1) { ?>
                            <a class="btn btn-primary btn-xs score_change" data-id="<?php  echo $item['id'];?>" data-toggle="modal" data-target="#score_change"><i class="fa fa-edit"></i>积分修改</a>
                            <?php  } ?>
                        </td>
                    </tr>
                    <?php  } } ?>
                    </tbody>
                </table>
                <div style="text-align: right;">
                    <?php  echo $pager;?>
                </div>
            </div>
        </form>
    </div>
</div>
<div class="modal fade" id="sort_link"><div class="modal-dialog">
    <style>
        #sort_link .modal-body {padding: 10px 15px;}
        #sort_link .tab-pane {margin-top: 5px; min-height: 400px; max-height: 400px; overflow-y: auto;}
        #sort_tab{margin-bottom: 10px;}
    </style>
    <div class="modal-content">
        <div class="modal-header">
            <button data-dismiss="modal" class="close" type="button">×</button>
            <h4 class="modal-title">绑定门店</h4>
        </div>
        <div class="modal-body">
            <iframe width="100%" height="395" frameborder="no" border="0" scrolling="no" allowtransparency="yes" src="<?php  echo $http_type;?>://<?php  echo $_SERVER['HTTP_HOST'];?>/web/index.php?c=site&a=entry&do=user&m=<?php  echo $_GPC['m'];?>&op=service&version_id=<?php  echo $_GPC['version_id'];?>"></iframe>
        </div>
        <div class="modal-footer">
            <button data-dismiss="modal" class="btn btn-default" id="sort_close" type="button">关闭</button>
        </div>
        <script>
            var sort_objc='';
            $(function(){
                $(".sort_customize").on('click','.sort_link',function(){
                    var id=$(this).attr("data-id");
                    if(id==2){
                        $("#sort_link").find("#sort_tab li").eq(1).hide();
                    }else{
                        $("#sort_link").find("#sort_tab li").eq(1).show();
                    }
                    sort_objc=this;
                });
                $("#sort_link").find('#sort_tab a').click(function(e) {
                    $('#tab').val($(this).attr('href'));
                    e.preventDefault();
                    $(this).tab('show');
                });
            });
        </script>
    </div>
</div></div>
<div class="modal fade" id="score_change"><div class="modal-dialog">
    <style>
        #sort_link .modal-body {padding: 10px 15px;}
        #sort_link .tab-pane {margin-top: 5px; min-height: 400px; max-height: 400px; overflow-y: auto;}
    </style>
    <div class="modal-content">
        <div class="modal-header">
            <button data-dismiss="modal" class="close" type="button">×</button>
            <h4 class="modal-title">积分修改</h4>
        </div>
        <div class="modal-body">
            <form class="form-horizontal">
                <div class="form-group">
                    <label  class="col-sm-2 control-label">积分</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control"  name="score_val" id="score_val">
                        <span class="help-block">输入500,则积分增加500;输入-500则表示减少500</span>
                    </div>
                </div>
            </form>
        </div>
        <div class="modal-footer">
            <button data-dismiss="modal" class="btn btn-primary" id="score_btn" type="button">确定</button>
            <button data-dismiss="modal" class="btn btn-default" id="score_close" type="button">关闭</button>
        </div>
        <script>
            var sort_objc='';
            $(function(){
                $(".sort_customize").on('click','.sort_link',function(){
                    var id=$(this).attr("data-id");
                    if(id==2){
                        $("#sort_link").find("#sort_tab li").eq(1).hide();
                    }else{
                        $("#sort_link").find("#sort_tab li").eq(1).show();
                    }
                    sort_objc=this;
                });
                $("#sort_link").find('#sort_tab a').click(function(e) {
                    $('#tab').val($(this).attr('href'));
                    e.preventDefault();
                    $(this).tab('show');
                });
            });
        </script>
    </div>
</div></div>
<script>
    var objc="";
    require(["../addons/<?php  echo $_GPC['m']?>/resource/swal/dist/sweetalert2.min.js"],function(){
        $(function(){
            $(".score_change").click(function(){
                objc=this;
            });
            //改变状态
            $(".edit").click(function(){
                var status=$(this).attr("data-status");
                var that=$(this);
                var id=$(this).attr("data-id");
                $.ajax({
                    type:"post",
                    url:"<?php  echo url('site/entry/'.$_GPC['do'],array('m'=>$_GPC['m'],'op'=>'statuschange','version_id'=>$_GPC['version_id']));?>",
                    data:{id:id,status:status},
                    dataType:'json',
                    success:function(res){
                        if(res.status==1){
                            swal('操作成功!', '操作成功!', 'success');
                            if(status==1){
                                that.html("解绑");
                                that.attr("data-status",-1);
                                that.removeClass("btn-primary").addClass("btn-danger");
                                that.parent().prev().prev().find("a").html('已绑定');
                            }else{
                                that.html("绑定");
                                that.attr("data-status",1);
                                that.addClass("btn-primary").removeClass("btn-danger");
                                that.parent().prev().prev().find("a").html('未绑定');
                            }
                        }else{
                            swal('操作失败!', '操作失败!', 'error');
                        }
                    }
                })
            })
            //删除
            $(".delete").click(function(){
                var that=$(this);
                var id=$(this).attr('data-id');
                swal({
                    title: '确定删除吗?',
                    text: "确定删除吗?",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: '删除',
                    cancelButtonText: '取消',
                }).then(function(isConfirm) {
                    if (isConfirm) {
                        $.ajax({
                            type:"post",
                            url:"<?php  echo url('site/entry/banner',array('m'=>$_GPC['m'],'op'=>'delete','version_id'=>$_GPC['version_id']));?>",
                            data:{id:id},
                            dataType:'json',
                            success:function(res){
                                if(res.status==1){
                                    swal('操作成功!', '操作成功!', 'success');
                                    that.parent().parent().remove();
                                }else{
                                    swal('操作失败!', '操作失败!', 'error');
                                }
                            }
                        })
                    }
                })
            });
            //充值
            $("body").on('click','.recharge',function(){
                objc=this;
            })
            $("#recharge_btn").click(function(){
                var id=$(objc).attr("data-id");
                var amount=$("#amount").val();
                if(amount!=""){
                    $.ajax({
                        type:"post",
                        url:"<?php  echo url('site/entry/'.$_GPC['do'],array('m'=>$_GPC['m'],'op'=>'recharge','version_id'=>$_GPC['version_id']));?>",
                        data:{id:id,amount:amount},
                        dataType:'json',
                        success:function(res){
                            $("#recharge_close").click();
                            if(res.status==1){
                                swal('操作成功!', '操作成功!', 'success');
                                $(objc).parent().parent().find(".money").find("div").html(res.data.money);
                            }else{
                                swal('操作失败!', '操作失败!', 'error');
                            }
                        }
                    })
                }
            });
            //绑定门店
            $(".store_bind").click(function(){
                objc=this;
            });
            $("#store1").click(function(){
                var store=$(this).attr("data-store");
                var name=$(this).attr("data-name");
                if(store!="" && name!=""){
                    var id=$(objc).attr("data-id");
                    $.ajax({
                        type:"post",
                        url:"<?php  echo url('site/entry/'.$_GPC['do'],array('m'=>$_GPC['m'],'op'=>'store_bind','version_id'=>$_GPC['version_id']));?>",
                        data:{id:id,store:store},
                        dataType:'json',
                        success:function(res){
                            if(res.status==1){
                                swal('操作成功!', '操作成功!', 'success');
                                $(objc).html(name);
                            }else{
                                swal('操作失败!', '操作失败!', 'error');
                            }
                        }
                    })
                }
            });
            //商家中心
            $("#shop_admin .dropdown-menu li").click(function(){
                var level=$(this).attr("data-level");
                if(level!=2 && level!=3){
                    var id=$(this).parent().attr("data-id");
                    var that=this;
                    $.ajax({
                        type:"post",
                        url:"<?php  echo url('site/entry/'.$_GPC['do'],array('m'=>$_GPC['m'],'op'=>'shop','version_id'=>$_GPC['version_id']));?>",
                        data:{id:id,shop:level},
                        dataType:'json',
                        success:function(res){
                            if(res.status==1){
                                swal('操作成功!', '操作成功!', 'success');
                                if(level==-1){
                                    $(that).parent().prev().html('无权限<span class="caret"></span>');
                                }else if(level==1){
                                    $(that).parent().prev().html('管理员<span class="caret"></span>');
                                }
                            }else{
                                swal('操作失败!', '操作失败!', 'error');
                            }
                        }
                    })
                }else{
                    objc=this;
                }
            });
            $("#shop2").click(function(){
                var store=$(this).attr("data-store");
                var name=$(this).attr("data-name");
                if(store!="" && name!=""){
                    var id=$(objc).parent().attr("data-id");
                    var level=$(objc).attr("data-level");
                    $.ajax({
                        type:"post",
                        url:"<?php  echo url('site/entry/'.$_GPC['do'],array('m'=>$_GPC['m'],'op'=>'shop','version_id'=>$_GPC['version_id']));?>",
                        data:{id:id,shop:level,shop_id:store},
                        dataType:'json',
                        success:function(res){
                            if(res.status==1){
                                swal('操作成功!', '操作成功!', 'success');
                                if(level==2){
                                    $(objc).parent().prev().html('店长<br/>'+name+'<span class="caret"></span>');
                                }else if(level==3){
                                    $(objc).parent().prev().html('店员<br/>'+name+'<span class="caret"></span>');
                                }
                            }else{
                                swal('操作失败!', '操作失败!', 'error');
                            }
                        }
                    })
                }
            });

            $("#score_btn").click(function(){
                var id=$(objc).attr("data-id");
                var score=$(objc).parent().parent().find(".score").text();
                var change=$("#score_change").find("input[name='score_val']").val();
                if(change!=""){
                    $.ajax({
                        type:"post",
                        url:"<?php  echo url('site/entry/'.$_GPC['do'],array('m'=>$_GPC['m'],'op'=>'scorechange','version_id'=>$_GPC['version_id']));?>",
                        data:{id:id,score:parseInt(score)+parseInt(change)},
                        dataType:'json',
                        success:function(res){
                            if(res.status==1){
                                swal('操作成功!', '操作成功!', 'success');
                                $("#score_change").find("input[name='score_val']").val("");
                                $(objc).parent().parent().find(".score").html(parseInt(score)+parseInt(change));
                            }else{
                                swal('操作失败!', '操作失败!', 'error');
                            }
                        }
                    })
                }
            });
        })
    })
</script>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>