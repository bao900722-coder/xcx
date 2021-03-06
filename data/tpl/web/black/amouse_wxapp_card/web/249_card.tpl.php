<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
<ul class="nav nav-tabs">
    <li <?php  if($operation=='post') { ?>class="active"<?php  } ?>><a href="<?php  echo $this->createWebUrl('cards', array('op' => 'post'))?>"><?php  if($id==0) { ?>添加名片<?php  } else { ?>修改名片<?php  } ?></a></li>
    <li <?php  if($operation=='display') { ?>class="active"<?php  } ?>><a href="<?php  echo $this->createWebUrl('cards', array('op' => 'display'))?>">管理名片</a></li>
    <li <?php  if($operation =='export_submit') { ?>class="active"<?php  } ?>><a href="<?php  echo $this->createWebUrl('cards', array('op' => 'export_submit'))?>">导出名片</a></li>
    <li <?php  if($operation =='clearall') { ?>class="active"<?php  } ?>><a href="<?php  echo $this->createWebUrl('cards', array('op' => 'clearall'))?>">清除所有二维码</a></li>
    <!--<li <?php  if($operation =='clearall') { ?>class="active"<?php  } ?>><a href="<?php  echo $this->createWebUrl('cards', array('op' => 'smsall'))?>">发送短信通知</a></li>-->
</ul>
<?php  if($operation == 'display') { ?>
<div class="main">
    <div class="panel panel-info">
        <div class="panel-heading">筛选</div>
        <div class="panel-body">
            <form action="./index.php" method="get" class="form-horizontal" role="form">
                <input type="hidden" name="c" value="site" />
                <input type="hidden" name="a" value="entry" />
                <input type="hidden" name="m" value="amouse_wxapp_card" />
                <input type="hidden" name="do" value="cards" />
                <div class="form-group">
                    <label class="col-xs-12 col-sm-2 col-md-2 col-lg-1 control-label">联系方式</label>
                    <div class="col-sm-2 col-lg-2">
                        <input class="form-control" name="mobile" id="" type="text" value="<?php  echo $_GPC['mobile'];?>">
                    </div>
                    <label class="col-xs-12 col-sm-2 col-md-2 col-lg-1 control-label">姓名</label>
                    <div class="col-sm-2 col-lg-2">
                        <input class="form-control" name="username"  type="text" value="<?php  echo $_GPC['username'];?>">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-2 col-lg-2">
                        <button class="btn btn-default">
                            <i class="fa fa-search"></i> 搜索</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <style>
        .page-nav {
            margin: 0;
            width: 100%;
            min-width: 800px;
        }

        .page-nav > li > a {
            display: block;
        }

        .page-nav-tabs {
            background: #EEE;
        }

        .page-nav-tabs > li {
            line-height: 40px;
            float: left;
            list-style: none;
            display: block;
            text-align: -webkit-match-parent;
        }

        .page-nav-tabs > li > a {
            font-size: 14px;
            color: #666;
            height: 40px;
            line-height: 40px;
            padding: 0 10px;
            margin: 0;
            border: 1px solid transparent;
            border-bottom-width: 0px;
            -webkit-border-radius: 0;
            -moz-border-radius: 0;
            border-radius: 0;
        }

        .page-nav-tabs > li > a, .page-nav-tabs > li > a:focus {
            border-radius: 0 !important;
            background-color: #f9f9f9;
            color: #999;
            margin-right: -1px;
            position: relative;
            z-index: 11;
            border-color: #c5d0dc;
            text-decoration: none;
        }

        .page-nav-tabs >li >a:hover {
            background-color: #FFF;
        }

        .page-nav-tabs > li.active > a, .page-nav-tabs > li.active > a:hover, .page-nav-tabs > li.active > a:focus {
            color: #576373;
            border-color: #c5d0dc;
            border-top: 2px solid #4c8fbd;
            border-bottom-color: transparent;
            background-color: #FFF;
            z-index: 12;
            margin-top: -1px;
            box-shadow: 0 -2px 3px 0 rgba(0, 0, 0, 0.15);
        }
    </style>

    <div style="margin:0;" class="alert alert-info"><i class="icon-warning-sign"></i>
        <span style="font-weight:bold;"> 当前小程序unacid：  <?php  echo $weid;?> 设置好会员等级变更通知模板通知需要
        </span>
    </div>
    <div class="panel panel-default">
        <form id="form2" class="form-horizontal" method="post">
            <div class="table-responsive panel-body">
                <table class="table table-hover">
                    <thead class="navbar-inner">
                    <tr>
                        <th style="width:5%;">全选</th>
                        <th>信息</th> <th>审核状态</th>
                        <th>点赞</th> <th>浏览</th> <th>收藏</th>
                        <th style="width: 15%;">推广码</th>
                        <th style="text-align:right;">操作</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td class="row-first">
                            <input type="checkbox"  onclick="var ck = this.checked;$(':checkbox').each(function(){this.checked = ck});" name=''></td>
                        <td colspan="8" style="text-align:left;">
                            <input name="token" type="hidden" value="<?php  echo $_W['token'];?>"/>
                            <input type="submit" class="btn btn-primary" name="submit1" value="批量删除"/>
                            <input type="submit" class="btn btn-primary" name="submit2" value="批量发送短信"/>
                        </td>
                    </tr>
                    <?php  if(is_array($list)) { foreach($list as $item) { ?>
                    <tr>
                        <td> <input type="checkbox" value="<?php  echo $item['id'];?>" name="delete[]">  </td>
                        <td>
                            <img src="<?php  echo $item['avater'];?>" style='width:30px;height:30px;padding:1px;border:1px solid #ccc' /><?php  echo $item['username'];?>
                            <br/>
                            <label class='label label-primary'><?php  echo $item['mobile'];?> </label> <br/>
                            <label class='label label-default'>邮箱:<?php  echo $item['email'];?> <?php  if($item['weixin']) { ?> | 微信：[<?php  echo $item['weixin'];?>]<?php  } ?></label> <br/>
                            <label class='label label-info'><?php  if($item['vip']=='0') { ?> 普通会员 <?php  } else { ?>VIP会员 会员到期日期：<?php  echo date('Y-m-d H:i',$item['createtime'])?><?php  } ?>
                            </label> <br/>
                            <label class='label label-primary'><?php  if($item['categoryId']>0) { ?><?php  echo $item['categoryName'];?><?php  } else { ?>全部<?php  } ?> </label><br/>
                            <label class='label label-primary'><?php  echo $item['openid'];?></label>
                        </td>
                        <td>
                            <label title="点击自动切换是否审核" data="<?php  echo $item['audit_status'];?>" class='label label-default <?php  if($item['audit_status']==0) { ?>label-success<?php  } ?>' onclick="setProperty(this,<?php  echo $item['id'];?>,'audit_status')"><?php  if($item['audit_status']==0) { ?>已审核<?php  } else if($item['audit_status']==1) { ?>待审核<?php  } ?>
                            </label>
                        </td>
                        <td>
                            <?php  echo $item['zan'];?>
                        </td>
                        <td  >
                           <?php  echo $item['view'];?>
                        </td>
                        <td >
                             <?php  echo $item['collect'];?>
                        </td>
                        <td><div class="qr-code-item-image">
                            <?php  if($item['qrcode']) { ?><img   src="<?php  echo tomedia($item['qrcode'])?>" style='width:30px;height:30px;padding:1px;border:1px solid #ccc'><?php  } ?>
                        </div></td>

                        <td style="text-align:right;">
                            <a href="<?php  echo $this->createWebUrl('cards', array('op' => 'post', 'id' => $item['id']))?>" title="详情" class="btn btn-default btn-sm" data-toggle="tooltip" data-placement="top" title="" data-original-title="详情" >
                                <i class="fa fa-edit">编辑</i>
                            </a>
                            <a href="<?php  echo $this->createWebUrl('cards', array('op' => 'clear', 'id' => $item['id']))?>" title="详情" class="btn btn-default btn-sm" data-toggle="tooltip" data-placement="top" title="" data-original-title="详情" >
                                <i class="fa fa-eye">清除二维码</i>
                            </a>
                            <a href="<?php  echo $this->createWebUrl('cards', array('op' => 'smsall', 'id' => $item['id']))?>" class="btn btn-default btn-sm" > <i class="fa fa-eye">发送短信</i></a>
                            <a onclick="return confirm('删除订单无法恢复，确认吗？');return false;"
                               href="<?php  echo $this->createWebUrl('cards', array('op' => 'delete','id' => $item['id']))?>" class="btn btn-default btn-sm"> <i class="fa fa-times"></i></a>
                        </td>
                    </tr>
                    <?php  } } ?>
                    </tbody>
                </table>
                <?php  echo $pager;?>
            </div>
        </form>
    </div>
    <script>
        function setProperty(obj, id,type) {
            $(obj).html($(obj).html() + "...");
            $.post("<?php  echo $this->createWebUrl('cards',array('op'=>'setstatus','version_id'=>$_GPC['version_id']))?>",{id: id,type: type,data: obj.getAttribute("data")},function (d) {
                $(obj).html($(obj).html().replace("...", ""));
                $(obj).html(d.data == '0' ? '已审核' : '待审核');
                $(obj).attr("data", d.data);
                if (d.result == 1) {
                    $(obj).toggleClass("label-info");
                }
            }, "json");
        }
    </script>
</div>
<?php  } else if($operation == 'post') { ?>
<style>
    .checkbox input[type=checkbox], .checkbox-inline input[type=checkbox], .radio input[type=radio], .radio-inline input[type=radio]{ margin-left:-25px;}
    .checkbox label, .radio label{ padding-left:25px;}
    input[type=checkbox], input[type=radio]{ margin:1px;}
    input[type=checkbox],input[type=radio]{ position: relative; width: 18px; height:18px; background-clip: border-box; -webkit-appearance: none; -moz-appearance: none; appearance: none; vertical-align:top; border-radius: 2px; -webkit-transition: background-color .25s; transition: background-color .25s; background-color: #fff; border: 1px solid #d7d7d7; }
    input[type=checkbox]:hover,input[type=radio]:hover{ border:1px solid #09bb07;}
    input[type=checkbox]:checked:after,input[type=radio]:checked:after{ content: ''; display: block; height: 6px; width: 10px; border: 0 solid #333; border-width: 0 0 2px 2px; -webkit-transform: rotate(-45deg); transform: rotate(-45deg); position: absolute; top: 4px; left: 3px; border-color:#fff;}
    input[type=checkbox]:checked,input[type=radio]:checked{ color:#fff; background-color: #5cb85c; border-color: #5cb85c; }
</style>
<div class="main">
    <form class="form-horizontal form" action="" method="post" enctype="multipart/form-data" >
        <input type="hidden" name="id" value="<?php  echo $item['id'];?>">
        <div class="panel panel-default">
            <div class="panel-heading">
                名片信息
            </div>
            <div class="panel-body">
                <div class="form-group">
                    <label class="col-xs-12 col-sm-4 col-md-3 col-lg-2 control-label">名片名称</label>
                    <div class="col-sm-8 col-xs-12">
                        <input type="text" name="username" id="username" class="form-control" value="<?php  echo $item['username'];?>" />
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-xs-12 col-sm-4 col-md-3 col-lg-2 control-label">email</label>
                    <div class="col-sm-8 col-xs-12">
                        <input type="email" name="email" id="email" class="form-control" value="<?php  echo $item['email'];?>" />
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-xs-12 col-sm-4 col-md-3 col-lg-2 control-label">手机号码</label>
                    <div class="col-sm-8 col-xs-12">
                        <input type="tel" name="mobile" id="mobile" class="form-control" value="<?php  echo $item['mobile'];?>" />
                    </div>
                </div>
                <div class="form-group" >
                    <label class="col-xs-12 col-sm-4 col-md-3 col-lg-2 control-label">分类</label>
                    <div class="col-sm-8 col-xs-12">
                        <?php  echo tpl_form_field_category_2level('category', $parent, $children, $pcate, $ccate)?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-4 col-md-3 col-lg-2 control-label">微信号</label>
                    <div class="col-sm-8 col-xs-12">
                        <input type="text" name="weixin" id="weixin" class="form-control" value="<?php  echo $item['weixin'];?>" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-4 col-md-3 col-lg-2 control-label">头像</label>
                    <div class="col-sm-8">
                        <?php  echo tpl_form_field_image('avater', $item['avater']);?>
                    </div>
                </div>
                <!--<div class="form-group">
                    <label class="col-xs-12 col-sm-4 col-md-3 col-lg-2 control-label">微信二维码</label>
                    <div class="col-sm-8">
                        <?php  echo tpl_form_field_image('weixinImg', $item['weixinImg']);?>
                    </div>
                </div>-->
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">介绍图片</label>
                    <div class="col-sm-9 col-xs-12">
                        <?php  echo tpl_form_field_multi_image('imgs',$piclist)?>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-xs-12 col-sm-4 col-md-3 col-lg-2 control-label">公司</label>
                    <div class="col-sm-8 col-xs-12">
                        <input type="text" name="company" id="company" class="form-control" value="<?php  echo $item['company'];?>" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-4 col-md-3 col-lg-2 control-label">职位</label>
                    <div class="col-sm-8 col-xs-12">
                        <input type="text" name="job" id="job" class="form-control" value="<?php  echo $item['job'];?>" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">是否隐藏</label>
                    <div class="col-sm-9 col-xs-12">
                        <input type="radio" name="status" value="1" id="form-st-1"  <?php  if($item['status'] == 1) { ?>checked="true"<?php  } ?>  />
                        <label for="form-st-1">隐藏</label>
                        <input type="radio" name="status" value="0" id="form-st-0"  <?php  if($item['status'] == 0) { ?>checked="true"<?php  } ?>  />
                        <label for="form-st-0">显示</label>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">审核状态</label>
                    <div class="col-sm-9 col-xs-12">
                        <input type="radio" name="audit_status" value="1" id="form-audit_status-1"  <?php  if($item['audit_status'] == 1) { ?>checked="true"<?php  } ?>  />
                        <label for="form-audit_status-1">禁用</label>
                        <input type="radio" name="audit_status" value="0" id="form-audit_status-0"  <?php  if($item['audit_status'] == 0) { ?>checked="true"<?php  } ?>  />
                        <label for="form-audit_status-0">启用</label>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">是否会员</label>
                    <div class="col-sm-9 col-xs-12">
                        <input type="radio" name="vip" value="1" id="form-oauth-1"  <?php  if($item['vip'] == 1) { ?>checked="true"<?php  } ?>  />
                        <label for="form-oauth-1">是</label>
                        <input type="radio" name="vip" value="0" id="form-oauth-0"  <?php  if($item['vip'] == 0) { ?>checked="true"<?php  } ?>  />
                        <label for="form-oauth-0">否</label>
                    </div>
                </div>
                <div class="form-group model">
                    <label class="col-xs-12 col-sm-4 col-md-3 col-lg-2 control-label">置顶时间</label>
                    <div class="col-sm-8 col-xs-12">
                        <?php  echo tpl_form_field_date('createtime', date('Y-m-d H:i',$item['createtime']), 1)?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-4 col-md-3 col-lg-2 control-label">点赞</label>
                    <div class="col-sm-8 col-xs-12">
                        <input type="text" name="zan" id="zan" class="form-control" value="<?php  echo $item['zan'];?>" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-4 col-md-3 col-lg-2 control-label">查看</label>
                    <div class="col-sm-8 col-xs-12">

                        <input type="text" name="view" id="view" class="form-control" value="<?php  echo $item['view'];?>" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-4 col-md-3 col-lg-2 control-label">收藏</label>
                    <div class="col-sm-8 col-xs-12">
                        <input type="text" name="collect" id="collect" class="form-control" value="<?php  echo $item['collect'];?>" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-4 col-md-3 col-lg-2 control-label">个人介绍</label>
                    <div class="col-sm-8">
                        <textarea cols="20" class="form-control" name="desc" rows="4"><?php  echo $item['desc'];?></textarea>
                    </div>
                </div>
                <div class="hr-line-dashed"></div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">经度</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="longitude" name="lng" value="<?php  echo $item['lng'];?>">
                    </div>
                </div>
                <div class="hr-line-dashed"></div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">纬度</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="latitude" name="lat" value="<?php  echo $item['lat'];?>">
                    </div>
                </div>
                <div class="hr-line-dashed"></div>
                <script charset="utf-8" src="https://map.qq.com/api/js?v=2.exp&key=P2XBZ-HVMCQ-YZ75X-G5VUJ-OFXFZ-F5BFR"></script>
                <div class="form-group">
                    <label class="col-sm-2 control-label">地图:</label>
                    <div class="col-sm-10">
                        <div class="input-group">
                            <input type="text" id="address" name="address" class="form-control" value="<?php  echo $item['address'];?>">
                            <span class="input-group-btn">
                            <button type="button"  id="mapseacrh" class="btn btn-primary">搜索</button></span>
                        </div>
                        <span class="help-block m-b-none"> 地图上选自己公司的位置会自动获取到你的经纬度</span>
                        <div id="container" style="width:100%;height:300px;"></div>
                    </div>
                </div>

                <div class="form-group col-sm-12">
                    <input type="submit" name="submit" value="提交" class="btn btn-primary col-lg-1"/>
                    <input type="hidden" name="token" value="<?php  echo $_W['token'];?>"/>
                </div>
            </div>
        </div>
    </form>
</div>
<script>
    $(function(){
        var geocoder,citylocation,map,marker = null;
        var markersArray=[];
        var x=$("#longitude").val();
        var y=$("#latitude").val();
        var center = new qq.maps.LatLng(y,x);
        map = new qq.maps.Map(document.getElementById('container'),{
            center: center,
            zoom: 13
        });
        geocoder = new qq.maps.Geocoder({
            complete : function(result){
                map.setCenter(result.detail.location);
                var marker = new qq.maps.Marker({
                    map:map,
                    position: result.detail.location
                });
            }
        });
        marker = new qq.maps.Marker({
            position: new qq.maps.LatLng(y,x),
            map: map
        });
        //获取城市列表接口设置中心点
        if(y==''||x==''){
            citylocation = new qq.maps.CityService({
                complete : function(result){
                    map.setCenter(result.detail.latLng);
                }
            });
            citylocation.searchLocalCity();
        }

        geocoder = new qq.maps.Geocoder({
            complete : function(result){
                marker.setMap(null);
                map.setCenter(result.detail.location);
                marker = new qq.maps.Marker({
                    map:map,
                    position: result.detail.location
                });
                $("#latitude").attr("value",marker.position.lat);
                $("#longitude").attr("value",marker.position.lng);
            }
        });
        qq.maps.event.addListener(map, 'click', function(event) {
            qq.maps.event.addListener(map, 'click', function(event) {
                marker.setMap(null);
                $("#longitude").attr("value","");
                $("#longitude").attr("value",event.latLng.getLng());
                $("#latitude").attr("value","");
                $("#latitude").attr("value",event.latLng.getLat());
                var latLng = new qq.maps.LatLng(event.latLng.getLat(), event.latLng.getLng());
                marker=new qq.maps.Marker({
                    position:latLng,
                    map:map
                });
            });
        });
        $("#mapseacrh").click(function(){
            var address =$("#address").val();
            geocoder.getLocation(address);
        });

        <?php  if($id>0) { ?>
            var address =$("#address").val();
            geocoder.getLocation(address);
        <?php  } ?>

            document.onkeydown=function(event){
                var e = event || window.event || arguments.callee.caller.arguments[0];
                if(e && e.keyCode==27){ // 按 Esc
                }
                if(e && e.keyCode==113){ // 按 F2
                }
                if(e && e.keyCode==13){ // enter 键
                    $("#mapseacrh").click();
                    return false;
                }
            };

        });
</script>
<?php  } ?>