<?php
global $_GPC, $_W;
$GLOBALS['frames'] = $this->getMainMenu();
$list=pdo_getall('zhtc_bottom',array('uniacid'=>$_W['uniacid']),array(),'','num ASC');
if($_GPC['op']=='delete'){
	$res=pdo_delete('zhtc_bottom',array('id'=>$_GPC['id']));
	if($res){
		 message('删除成功！', $this->createWebUrl('bottom'), 'success');
		}else{
			  message('删除失败！','','error');
		}
}
if($_GPC['state']){
	$data['state']=$_GPC['state'];
	$res=pdo_update('zhtc_bottom',$data,array('id'=>$_GPC['id']));
	if($res){
		 message('编辑成功！', $this->createWebUrl('bottom'), 'success');
		}else{
			  message('编辑失败！','','error');
		}
}
include $this->template('web/bottom');