<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
<div class='container' style='padding:0 5px 10px;margin:0;width:100%'>
    <ul class="nav nav-tabs">
        <li <?php  if($op=='post' && empty($id)) { ?>class="active"<?php  } ?>> <a href="<?php  echo $this->createWebUrl('category', array('op' => 'post'));?>">添加分类</a></li>
        <li <?php  if($op=='display') { ?>class="active"<?php  } ?>><a href="<?php  echo $this->createWebUrl('category',array('op'=>'display'));?>">管理分类</a></li>
        <?php  if(!empty($id) && $op == 'post') { ?>
        <li class="active"> <a href="<?php  echo $this->createWebUrl('category',array('op'=>'post','id'=>$id));?>">编辑分类 </a></li>
        <?php  } ?>
    </ul>

    <?php  if($op =='display') { ?>
    <div style="padding:15px;">
        <form id="form2" class="form-horizontal" method="post">
            <table class="table table-hover">
                <thead class="navbar-inner">
                <tr>
                    <th style="width:15%; text-align:center;">显示顺序</th>
                    <th style="width:35%;">分类名称</th>
                  <!--  <td class="col-md-2">图标</td>-->
                    <th style="width:30%;">操作</th>
                </tr>
                </thead>
                <tbody>
                <?php  if(is_array($list)) { foreach($list as $v) { ?>
                <tr>
                    <td class="text-center">
                        <input type="text" class="form-control" name="displayorder[<?php  echo $v['id'];?>]" value="<?php  echo $v['displayorder'];?>">
                    </td>

                    <td class="text-left">
                        <div style="">
                            <?php  echo $v['name'];?>
                        </div>
                    </td>
                    <!--<td>
                        <img style="width: 50px;height: 50px;" src="<?php  echo tomedia($v['thumb'])?>" alt=""/>
                    </td>-->
                    <td>
                        <a href="<?php  echo $this->createWebUrl('category', array('op' => 'post', 'id' => $v['id']))?>" title="编辑分类" class="btn btn-default btn-sm" data-toggle="tooltip" data-placement="top"><i class="fa fa-edit"></i></a>
                        <a onclick="return confirm('此操作不可恢复，确认吗？'); return false;"
                           href="<?php  echo $this->createWebUrl('category', array('id' => $v['id'],'op'=>'del'))?>" title="删除"
                           class="btn btn-default btn-sm"><i class="fa fa-times"></i></a>
                    </td>
                </tr>

                <?php  } } ?>
                </tbody>
            </table>
            <div class="form-group col-sm-12">
                <input name="submit" type="submit" class="btn btn-primary col-lg-1" value="更新排序">
                <input type="hidden" name="token" value="<?php  echo $_W['token'];?>"/>
            </div>
        </form>
    </div>
    <script type="text/javascript">
        require(['bootstrap'], function ($) {
            $('.btn').hover(function () {
                $(this).tooltip('show');
            }, function () {
                $(this).tooltip('hide');
            });
        });

    </script>
    <?php  } else if($op == 'post') { ?>
    <div class="main">
        <form action="" method="post" class="form-horizontal form" enctype="multipart/form-data" onsubmit="return validate(this);">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <?php  if(!empty($id)&&$op == 'post') { ?>编辑<?php  } else { ?>添加<?php  } ?>分类
                </div>
                <div class="panel-body">
                    <?php  if(!empty($parentid)) { ?>
                    <div class="form-group">
                        <label class="col-xs-12 col-sm-4 col-md-3 col-lg-2 control-label">上级分类</label>
                        <div class="col-sm-8 col-xs-12">
                            <div class="form-control-static"><?php  echo $parent['name'];?></div>
                        </div>
                    </div>
                    <?php  } ?>
                    <div class="form-group">
                        <label class="col-xs-12 col-sm-4 col-md-3 col-lg-2 control-label">排序</label>
                        <div class="col-sm-8 col-xs-12">
                            <input type="text" name="displayorder" class="form-control" value="<?php  echo $item['displayorder'];?>"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-xs-12 col-sm-3 col-md-2 control-label"><span style='color:red'>*</span>分类名称</label>

                        <div class="col-sm-9">
                            <input type="text" name="title" id="title" class="form-control" value="<?php  echo $item['name'];?>"/>
                        </div>
                    </div>

                   <!-- <div class="form-group">
                        <label class="col-xs-12 col-sm-3 col-md-2 control-label">分类图片</label>
                        <div class="col-sm-9 col-xs-12">
                            <?php  echo tpl_form_field_image('thumb', $item['thumb']);?>
                            <span class="help-block m-b-none">尺寸：80rpx*80rpx，大小30kb以下，建议png图片</span>
                        </div>
                    </div>-->
                    <div class="form-group">
                        <label class="col-xs-12 col-sm-3 col-md-2 control-label"></label>
                        <div class="col-sm-4">
                            <input type="hidden" name="id" value="<?php  echo $item['id'];?>">
                            <input type="hidden" name="token" value="<?php  echo $_W['token'];?>"/>
                            <input name="submit" type="submit" value="提交" class="btn btn-primary span3"/>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <?php  } ?>
</div>
